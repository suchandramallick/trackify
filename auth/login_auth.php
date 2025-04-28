<?php
session_start();
require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validate input
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: ../login.php");
        exit();
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT id, fullname, password FROM User WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // If user found
    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Success
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];
            header("Location: ../dashboard.php");
            exit();
        } else {
            // Incorrect password
            $_SESSION['error'] = "Incorrect password.";
            header("Location: ../login.php");
            exit();
        }
    } else {
        // User not found
        $_SESSION['error'] = "User not found.";
        header("Location: ../login.php");
        exit();
    }

} else {
    // Invalid access
    header("Location: ../login.php");
    exit();
}
?>