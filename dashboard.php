<?php
    include 'auth/includes/auth.php';
    requireLogin();
    include 'auth/includes/header.php';
?>

<div class="pt-20 min-h-screen bg-blue-50 text-center text-blue-800">
  <h1 class="text-3xl font-bold mt-10">Welcome to your Dashboard, <?= htmlspecialchars($_SESSION['user']) ?>!</h1>
  <p class="mt-4 text-lg">You can track your habits here. (Coming soon!)</p>
</div>

<?php 
    include 'auth/includes/footer.php';
?>
