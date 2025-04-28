<?php
session_start();
include 'auth/includes/db.php'; // make sure this connects to your MySQL

$signup_error = '';
$signup_success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = trim($_POST['email']);
  $password = $_POST['password'];
  $re_password = $_POST['re_password'];
  $fullname=$_POST['full_name'];
  $userName=$_POST['username'];

  // Check if passwords match
  if ($password !== $re_password) {
    $signup_error = "Passwords do not match!";
  } else {
    // Check if email already exists
    $check = $conn->prepare("SELECT id FROM User WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
      $signup_error = "Email is already registered!";
    } else {
      // Insert into database
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $stmt = $conn->prepare("INSERT INTO User (Username,Fullname,email, password) VALUES (?,?,?,?)");
      $stmt->bind_param("ssss",$userName,$fullname ,$email, $hashed_password);
      if ($stmt->execute()) {
        session_start();
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['user_name']=$userName; // Store the new user's ID
        $_SESSION['email'] = $email;

        header("Location: dashboard.php");
        exit();
        // $signup_success = "Signup successful! You can now <a href='signin.php' class='text-blue-600 underline'>Sign In</a>.";
      } else {
        $signup_error = "Something went wrong. Please try again.";
      }
      $stmt->close();
    }

    $check->close();
  }
}
?>

<?php include 'auth/includes/header.php'; ?>

<div class="min-h-screen bg-white flex items-center justify-center px-4">
  <div class="w-full max-w-md p-8 rounded-lg shadow-lg border border-gray-200">

    <!-- Logo -->
    <div class="flex justify-center mb-6">
      <img src="images/Trackify.png" alt="Trackify Logo" class="h-12 w-12">
    </div>

    <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">Create new Account</h2>
    <p class="text-center text-gray-500 mb-4">Your journey to better habits starts here</p>

    <!-- Error/Success Messages -->
    <?php if ($signup_error): ?>
      <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm"><?= $signup_error ?></div>
    <?php elseif ($signup_success): ?>
      <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 text-sm"><?= $signup_success ?></div>
    <?php endif; ?>

    <!-- Signup Form -->
    <form method="POST" action="signup.php" class="space-y-4">
      <div>
        <label for="full_name" class="block text-sm font-medium text-gray-700">FULL NAME <span
            class="text-red-500">*</span></label>
        <input type="text" name="full_name" id="Full_name" required placeholder="Enter your full_name"
          class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700">USERNAME <span
            class="text-red-500">*</span></label>
        <input type="text" name="username" id="username" required placeholder="Choose a username"
          class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">EMAIL <span
            class="text-red-500">*</span></label>
        <input type="email" name="email" id="email" required placeholder="your-email@example.com"
          class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">PASSWORD <span
            class="text-red-500">*</span></label>
        <input type="password" name="password" id="password" required placeholder="Password"
          class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>
      <div>
        <label for="re_password" class="block text-sm font-medium text-gray-700">RE-ENTER PASSWORD <span
            class="text-red-500">*</span></label>
        <input type="password" name="re_password" id="re_password" required placeholder="Re-enter Password"
          class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>
      <button type="submit" class="w-full bg-blue-600 text-white font-medium py-2 rounded hover:bg-blue-700 transition">
        Sign Up
      </button>
    </form>

    <!-- Footer -->
    <p class="text-center text-sm text-gray-600 mt-4">
      Already have an account? <a href="signin.php" class="text-blue-600 hover:underline">Sign In</a>
    </p>

  </div>
</div>

<?php include 'auth/includes/footer.php'; ?>