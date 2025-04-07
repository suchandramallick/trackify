<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

include '../auth/includes/db.php';

$habit_id = $_GET['id'] ?? null;
$error = '';
$habit = null;

if ($habit_id) {
    $stmt = $pdo->prepare("SELECT * FROM habits WHERE id = ? AND user_id = ?");
    $stmt->execute([$habit_id, $_SESSION['user_id']]);
    $habit = $stmt->fetch();

    if (!$habit) {
        $error = "Habit not found or unauthorized.";
    }
} else {
    $error = "No habit ID provided.";
}

// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $habit) {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $days = $_POST['days'] ?? [];

    if (!empty($title)) {
        $schedule = '';
        foreach (['mon','tue','wed','thu','fri','sat','sun'] as $day) {
            $schedule .= in_array($day, $days) ? '1' : '0';
        }

        $update = $pdo->prepare("UPDATE habits SET title = ?, description = ?, schedule = ? WHERE id = ? AND user_id = ?");
        $update->execute([$title, $description, $schedule, $habit_id, $_SESSION['user_id']]);

        header("Location: ../dashboard.php");
        exit;
    } else {
        $error = "Title cannot be empty.";
    }
}

// Prepopulate days
$schedule_days = str_split($habit['schedule'] ?? '0000000');
$day_keys = ['Trial','tue','wed','thu','fri','sat','sun'];

?>

<?php include '../auth/includes/header.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-gray-100 pt-20 px-4">
  <form method="POST" class="bg-white p-8 rounded shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-4">Edit Habit</h2>

    <?php if ($error): ?>
      <p class="text-red-500 mb-4"><?php echo htmlspecialchars($error); ?></p>
    <?php 
    endif; 
    ?>

    <?php 
    if ($habit): 
    ?>
      <label class="block mb-2 font-semibold">Habit Title</label>
      <input type="text" name="title" value="<?php echo htmlspecialchars($habit['title']); ?>" class="w-full px-3 py-2 border rounded mb-4" required />

      <label class="block mb-2 font-semibold">Description</label>
      <textarea name="description" rows="3" class="w-full px-3 py-2 border rounded mb-4"><?php echo htmlspecialchars($habit['description']); ?></textarea>

      <label class="block mb-2 font-semibold">Repeat On</label>
      <div class="grid grid-cols-7 gap-2 text-sm mb-4">
        <?php 
        foreach ($day_keys as $i => $day): ?>
          <label>
            <input type="checkbox" name="days[]" value="<?php echo $day; ?>" class="mr-1"
              <?php 
                if ($schedule_days[$i] === '1') echo 'checked'; 
            ?>>
            <?php 
                echo ucfirst($day); 
            ?>
          </label>
        <?php endforeach; ?>
      </div>

      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Update Habit</button>
    <?php 
        endif; 
    ?>
  </form>
</div>

<?php 
    include '../auth/includes/footer.php'; 
?>
