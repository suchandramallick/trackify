<?php
session_start();
include 'auth/includes/db.php'; // PDO connection via $pdo

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        // Check if username already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);

        if ($stmt->rowCount() > 0) {
            $error = "Username is already taken.";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            if ($stmt->execute([$username, $hashedPassword])) {
                // Success: Redirect or show success
                $success = "Account created! You can now log in.";
                header("Location: login.php");
                exit;
            } else {
                $error = "Something went wrong. Please try again.";
            }
        }
    } else {
        $error = "Please fill in all fields.";
    }
}
?>

<?php include 'auth/includes/header.php'; ?>

<div class="min-h-screen flex items-center justify-center pt-20 bg-cover bg-center"
     style="background-image: url('assets/images/Trackify.png');">
  
  <!-- Optional overlay -->
  <div class="absolute inset-0 bg-black bg-opacity-40"></div>

  <form method="POST" class="relative bg-white bg-opacity-90 p-8 rounded shadow-md text-gray-800 w-96 z-10">
    <h2 class="text-xl font-bold mb-4 text-center">Create Account</h2>

    <?php if (!empty($error)): ?>
      <p class="text-red-500 mb-4 text-sm text-center"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
      <p class="text-green-500 mb-4 text-sm text-center"><?php echo htmlspecialchars($success); ?></p>
    <?php endif; ?>

    <input name="username" type="text" placeholder="Choose a username"
           class="w-full px-4 py-2 mb-4 border rounded" required />

    <input name="password" type="password" placeholder="Choose a password"
           class="w-full px-4 py-2 mb-4 border rounded" required />

    <button type="submit"
            class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition duration-200">
      Sign Up
    </button>

    <p class="text-center mt-4 text-sm">
      Already have an account? <a href="login.php" class="text-blue-600 hover:underline">Log in</a>
    </p>
  </form>
</div>

<?php include 'auth/includes/footer.php'; ?>
