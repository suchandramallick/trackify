<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
include 'auth/includes/header2.php';
?>

<div class="min-h-screen bg-gray-100 pt-20 px-4">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold mb-10 text-center">Welcome, <?php echo     $_SESSION['user_name']  ;?> 👋</h1>

    <!-- Add New Habit Button -->
    <div class="flex justify-end mb-4">
      <a href="habits/add.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Habit</a>
    </div>

    <!-- Habit List -->
    <div class="grid gap-6">
      <!-- 🟢 Habit Card Template (repeat for each habit) -->
      <div class="bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
          <div>
            <h2 class="text-xl font-semibold"> Morning Meditation</h2>
            <p class="text-sm text-gray-500">10 minutes calm breathing</p>
          </div>
          <div class="flex gap-2">
            <a href="habits/edit.php?id=1" class="text-blue-500 hover:underline text-sm">Edit</a>
            <a href="habits/delete.php?id=1" class="text-red-500 hover:underline text-sm">Delete</a>
          </div>
        </div>

        <!-- Weekly Tracker -->
        <form method="post" action="save_days.php">
          <div class="grid grid-cols-7 gap-2 text-center" id="day-buttons">
            <?php
            $days = ['M', 'T', 'W', 'T', 'F', 'S', 'S'];
            foreach ($days as $i => $day) {
              echo "<button type='button' data-day='$day' class='day-btn w-10 h-10 rounded-full bg-gray-200 hover:bg-green-400 focus:outline-none'>$day</button>";
            }
            ?>
          </div>
          <input type="hidden" name="selected_days" id="selected-days">
          <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Save</button>
        </form>

        <script>
          document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.day-btn');
            const hiddenInput = document.getElementById('selected-days');
            const selectedDays = new Set();

            buttons.forEach(button => {
              button.addEventListener('click', () => {
                const day = button.getAttribute('data-day');

                button.classList.toggle('bg-green-500');
                button.classList.toggle('text-white');
                button.classList.toggle('bg-gray-200');

                if (selectedDays.has(day)) {
                  selectedDays.delete(day);
                } else {
                  selectedDays.add(day);
                }

                // Update hidden input value (e.g., "M,T,W")
                hiddenInput.value = Array.from(selectedDays).join(',');
              });
            });
          });
        </script>

      </div>

      <!-- Repeat habit cards as needed -->
    </div>
  </div>
</div>


<?php

include 'auth/includes/footer.php';
?>