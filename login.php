<?php 
include 'auth/includes/header.php'; 
?>

<div class="min-h-screen bg-white flex items-center justify-center px-4">
  <div class="w-full max-w-md p-8 rounded-lg shadow-lg border border-gray-200">
    
    <!-- Logo -->
    <div class="flex justify-center mb-6">
      <img src="images/Trackify.png" alt="Trackify Logo" class="h-12 w-12">
    </div>

    <!-- Heading -->
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">Welcome to Trackify</h2>
    <p class="text-center text-gray-500 mb-6">Your journey to better habits starts here</p>


    <!-- Email Login Form -->
    <form method="POST" action="auth/login_auth.php" class="space-y-4">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">EMAIL <span class="text-red-500">*</span></label>
        <input type="email" name="email" id="email" placeholder="your-email@example.com" required class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">PASSWORD <span class="text-red-500">*</span></label>
        <input type="password" name="password" id="password" placeholder="Password" required class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>
      <button type="submit" class="w-full bg-blue-600 text-white font-medium py-2 rounded hover:bg-blue-700 transition">
        Sign In
      </button>
    </form>

    <!-- Footer Links -->
    <p class="text-center text-sm text-gray-600 mt-4">
      No account? <a href="signup.php" class="text-blue-600 hover:underline">Create an account</a>
    </p>
    <p class="text-center text-sm text-gray-500 mt-1">
      Forgot Password? <a href="#" class="text-blue-600 hover:underline">Reset here</a>
    </p>

  </div>
</div>

<?php include 'auth/includes/footer.php'; ?>
