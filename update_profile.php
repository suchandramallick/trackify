<?php
session_start();
include 'includes/db.php';

$user_id = $_SESSION['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];

// Upload image if selected
$profile_picture = null;
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
    $targetDir = "../uploads/";
    $fileName = uniqid() . "_" . basename($_FILES["profile_picture"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFilePath)) {
        $profile_picture = $fileName;
    }
}

// Update query
if ($profile_picture) {
    $sql = "UPDATE User SET name = ?, email = ?, profile_picture = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $email, $profile_picture, $user_id);
} else {
    $sql = "UPDATE User SET name = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $name, $email, $user_id);
}

$stmt->execute();
header("Location: ../profile.php");
exit;
?>
