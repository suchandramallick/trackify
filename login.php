<?php
session_start();
include 'auth/includes/db.php'; // Ensure this file connects to your DB using $pdo

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        // Check if username exists
        $stmt = $pdo->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->execute([$username]);

        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch();
            if (password_verify($password, $user['password'])) {
                // Login success
                $_SESSION['user'] = $username;
                $_SESSION['user_id'] = $user['id'];
                header('Location: dashboard.php');
                exit;
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "Username not found.";
        }
    } else {
        $error = "Please enter both username and password.";
    }
}
?>

<?php include 'auth/includes/header.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-gray-100 pt-20">
  <form method="POST" class="bg-white p-8 rounded shadow-md text-gray-800 w-96">
    <h2 class="text-xl font-bold mb-4">Sign In</h2>

    <?php if (!empty($error)): ?>
      <p class="text-red-500 mb-4"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <input name="username" type="text" placeholder="Enter username" class="w-full px-4 py-2 mb-4 border rounded" required />
    <input name="password" type="password" placeholder="Enter password" class="w-full px-4 py-2 mb-4 border rounded" required />
    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Login</button>
  </form>
</div>

<?php 
include 'auth/includes/footer.php'; 
?>

