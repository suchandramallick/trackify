<?php 
    include_once 'auth.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="images/Trackify.png">
  <title>Trackify</title>
  <script src="css/style.css"></script>
</head>
<body class="bg-white text-gray-900">

<header class="bg-white shadow-md sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
    
    <!-- Logo and Name -->
    <div class="flex items-center space-x-2">
      <img src="/trackify/images/Trackify.png" alt="Trackify.Logo" class="h-10 w-auto" />
      <span class="text-2xl font-bold text-blue-600 tracking-wider">Trackify</span>
    </div>

    <!-- Navigation Links -->
    <nav class="hidden md:flex space-x-8 text-sm font-semibold">
      <a href="index.php" class="text-gray-700 hover:text-blue-600 transition">Home</a>
      <a href="#about" class="text-gray-700 hover:text-blue-600 transition">About</a>
      <a href="services.php" class="text-gray-700 hover:text-blue-600 transition">Services</a>
      <a href="contact.php" class="text-gray-700 hover:text-blue-600 transition">Contact</a>
    </nav>

    <!-- Auth Buttons -->
    <div class="space-x-4">
      <a href="login.php" class="px-4 py-1 border border-blue-600 text-blue-600 rounded hover:bg-blue-600 hover:text-white transition">Sign In</a>
      <a href="signup.php" class="px-4 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Sign Up</a>
    </div>
  </div>
</header>
