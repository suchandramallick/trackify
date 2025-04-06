<?php 
    include_once 'auth.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>TRACKIFY-HABIT TRACKER</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans text-white">

<header class="flex justify-between items-center px-6 py-4 bg-white shadow-md fixed top-0 left-0 w-full z-10">
  <div class="text-blue-600 font-bold text-lg">TRACKIFY-HABIT TRACKER</div>
  <div class="flex items-center space-x-4">
    <?php if (isLoggedIn()): ?>
      <span class="text-gray-600">Hello, <?= htmlspecialchars($_SESSION['user']) ?></span>
      <a href="logout.php" class="text-red-600 border border-red-600 px-4 py-1 rounded hover:bg-red-100">LOGOUT</a>
    <?php else: ?>
      <a href="login.php" class="text-blue-600 border border-blue-600 px-4 py-1 rounded hover:bg-blue-100">SIGN IN</a>
      <a href="signup.php" class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">SIGN UP</a>
    <?php endif; ?>
  </div>
</header>
