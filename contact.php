<?php include 'auth/includes/header1.php'; ?>
<?php include 'auth/includes/db.php'; ?>

<?php
$success = $error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name']);
    $email   = trim($_POST['email']);
    $message = trim($_POST['message']);

    if ($name && $email && $message) {
        // Prepare & insert into DB
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            $success = "Thanks for contacting us! We’ll get back to you soon.";
            $name = $email = $message = ''; // Clear fields
        } else {
            $error = "Something went wrong. Please try again later.";
        }

        $stmt->close();
    } else {
        $error = "Please fill in all fields.";
    }
}
?>

<div class="min-h-screen bg-white px-4 py-20">
  <div class="max-w-xl mx-auto bg-gray-100 p-8 rounded shadow text-gray-800">

    <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Contact Us</h1>

    <?php if ($success): ?>
      <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
        <?= $success ?>
      </div>
    <?php elseif ($error): ?>
      <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Full Name</label>
        <input type="text" name="name" placeholder="Please enter your Full Name" required value="<?= htmlspecialchars($name ?? '') ?>" class="w-full border px-4 py-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" placeholder="your-email@example.com" required value="<?= htmlspecialchars($email ?? '') ?>" class="w-full border px-4 py-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-blue-400">
        
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">What do you have in your Mind??</label>
        <textarea name="message" rows="4" placeholder="Please enter your Query" required class="w-full border px-4 py-2 rounded bg-white focus:outline-none focus:ring-2 focus:ring-blue-400"><?= htmlspecialchars($message ?? '') ?></textarea>
      </div>
      <button type="submit" class="w-full bg-blue-600 text-white font-medium py-2 rounded hover:bg-blue-700 transition">
        Submit
      </button>
    </form>
  </div>
</div>

<?php include 'auth/includes/footer.php'; ?>
