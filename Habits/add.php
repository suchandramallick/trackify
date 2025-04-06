<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

include '../auth/includes/db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $days = $_POST['days'] ?? [];

    if (!empty($title)) {
        // Create schedule string like "1010100" for Mon–Sun
        $schedule = '';
        foreach (['mon','tue','wed','thu','fri','sat','sun'] as $day) {
            $schedule .= in_array($day, $days) ? '1' : '0';
        }

        $stmt = $pdo->prepare("INSERT INTO habits (user_id, title, description, schedule) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_SESSION['user_id'], $title, $description, $schedule]);

        header("Location: ../dashboard.php");
        exit;
    } else {
        $error = "Please enter a habit title.";
    }
}
?>

<?php include '../auth/includes/header.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-gray-100 pt-20 px-4">
  <form method="POST" class="bg-white p-8 rounded shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-4">Add New Habit</h2>

    <?php if ($error): ?>
      <p class="text-red-500 mb-4"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <label class="block mb-2 font-semibold">Habit Title</label>
    <input type="text" name="title" required class="w-full px-3 py-2 border rounded mb-4" />

    <label class="block mb-2 font-semibold">Description</label>
    <textarea name="description" rows="3" class="w-full px-3 py-2 border rounded mb-4"></textarea>

    <label class="block mb-2 font-semibold">Repeat On</label>
    <div class="grid grid-cols-7 gap-2 text-sm mb-4">
      <?php
      $days = ['mon' => 'Mon', 'tue' => 'Tue', 'wed' => 'Wed', 'thu' => 'Thu', 'fri' => 'Fri', 'sat' => 'Sat', 'sun' => 'Sun'];
      foreach ($days as $key => $label) {
          echo "<label><input type='checkbox' name='days[]' value='$key' class='mr-1'>$label</label>";
      }
      ?>
    </div>

    <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Save Habit</button>
  </form>
</div>

<?php include '../auth/includes/footer.php'; ?>
