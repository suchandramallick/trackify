<?php
session_start();
include 'auth/includes/db.php';
include 'auth/includes/header.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT username AS name, email, profile_picture FROM user WHERE id = ?";
// // $stmt = $conn->prepare($sql);
// $stmt->bind_param("i", $user_id);
// $stmt->execute();
// $result = $stmt->get_result();
// $user = $result->fetch_assoc();
?>

<div class="max-w-xl mx-auto p-6 bg-white shadow mt-10 rounded">
  <h2 class="text-2xl font-bold mb-4">My Account</h2>

  <form action="auth/update_profile.php" method="POST" enctype="multipart/form-data" class="space-y-4">
    <div class="flex items-center gap-4">
      <!-- <?php if ($user['profile_picture']): ?>
        <!-- <img src="uploads/<?= htmlspecialchars($user['profile_picture']) ?>" alt="Profile Picture" class="h-20 w-20 rounded-full object-cover">
      <?php else: ?>
        <img src="images/default-avatar.png" alt="Default Avatar" class="h-20 w-20 rounded-full object-cover">
      <?php endif; ?> --> -->
      
      <input type="file" name="profile_picture" accept="image/*" class="text-sm">
    </div>

    <div>
      <label class="block text-sm font-medium">Name</label>
      <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required class="w-full px-4 py-2 border rounded">
    </div>

    <div>
      <label class="block text-sm font-medium">Email</label>
      <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required class="w-full px-4 py-2 border rounded">
    </div>

    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Update Profile</button>
  </form>
</div>

<?php include 'auth/includes/footer.php'; ?>
