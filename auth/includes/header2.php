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
  <script src="https://cdn.tailwindcss.com"></script>
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
      <a href="#services" class="text-gray-700 hover:text-blue-600 transition">Services</a>
      <a href="#contact" class="text-gray-700 hover:text-blue-600 transition">Contact</a>
    </nav>
<!-- Auth Buttons
<div class="space-x-4">
  <a href="logout.php" class="px-4 py-1 border border-red-600 text-red-600 rounded hover:bg-red-600 hover:text-white transition">
    Log Out
  </a>
</div>
<div class="flex items-center gap-4"> -->
  <!-- Profile Dropdown -->
  <div class="relative group">
    <button class="flex items-center gap-2 focus:outline-none">
      <img src="images/user-avatar.png" alt="Profile" class="w-9 h-9 rounded-full border">
      <span class="text-sm font-medium text-gray-700">Account</span>
      <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </button>

    <!-- Dropdown Menu -->
    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border opacity-0 group-hover:opacity-100 group-hover:translate-y-1 transform transition duration-200 z-50">
      <a href="profile.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Your Profile</a>
      <a href="settings.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Settings</a>
      <a href="logout.php" class="block px-4 py-2 text-red-600 hover:bg-red-100">Log Out</a>
    </div>
  </div>
</div>

  </div>
</header>
