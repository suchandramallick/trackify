<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

include '../auth/includes/db.php'; // DB connection
include '../auth/includes/header2.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $selected_days = isset($_POST['days']) ? $_POST['days'] : [];

    if (!empty($title)) {
        $user_id = $_SESSION['user_id']; // Replace with $_SESSION['user_id'] when login is connected

        $title = mysqli_real_escape_string($conn, $title);
        $description = mysqli_real_escape_string($conn, $description);

        // 1. Insert into habits table
        $query = "INSERT INTO habits (user_id, title, description) VALUES ('$user_id', '$title', '$description')";
        if (mysqli_query($conn, $query)) {
            $habit_id = mysqli_insert_id($conn); // Get the last inserted habit id

            // 2. Insert selected days into habit_days table
            if (!empty($selected_days)) {
                foreach ($selected_days as $day) {
                    $day = mysqli_real_escape_string($conn, $day);
                    $insert_day_query = "INSERT INTO habit_days (habit_id, day) VALUES ('$habit_id', '$day')";

                    // Check for errors in the query execution
                    if (!mysqli_query($conn, $insert_day_query)) {
                        // If an error occurs, capture it and continue
                        $error = "Error saving days: " . mysqli_error($conn);
                    }
                }
            }

            // Redirect to the dashboard
            header('Location: ../dashboard.php');
            exit;
        } else {
            $error = "Error adding habit: " . mysqli_error($conn);
        }
    } else {
        $error = "Please enter a habit title.";
    }
}
?>

<!-- Your HTML remains the same below this -->
<div class="min-h-screen bg-gray-100 py-12 px-4">
  <div class="max-w-xl mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">➕ Add New Habit</h2>

    <?php if (isset($error)): ?>
      <div class="text-red-500 mb-4"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Habit Title</label>
        <input type="text" name="title" class="w-full border border-gray-300 p-2 rounded" required>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Description</label>
        <textarea name="description" rows="3" class="w-full border border-gray-300 p-2 rounded"></textarea>
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium mb-2">Days of the Week</label>
        <div class="flex flex-wrap gap-3">
          <?php
          $days = ['M' => 'Monday', 'T' => 'Tuesday', 'W' => 'Wednesday', 'T2' => 'Thursday', 'F' => 'Friday', 'S' => 'Saturday', 'S2' => 'Sunday'];
          foreach ($days as $key => $dayName):
            $short = $key === 'T2' ? 'T2' : ($key === 'S2' ? 'S2' : $key);
          ?>
            <label class="flex items-center space-x-2">
              <input type="checkbox" name="days[]" value="<?= $short ?>" class="accent-blue-600">
              <span><?= $dayName ?></span>
            </label>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="flex justify-between items-center mt-6">
        <a href="../dashboard.php" class="text-sm text-blue-600 hover:underline">← Back</a>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Habit</button>
      </div>
    </form>
  </div>
</div>

<?php include '../auth/includes/footer.php'; ?>
