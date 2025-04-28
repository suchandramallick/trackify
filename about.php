<?php include 'auth/includes/header1.php'; ?>

 <div class="min-h-screen bg-gray-100 px-7 py-19">
  <!-- <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow text-gray-800">  -->
    <!-- About Section -->
    <h1 class="text-3xl font-bold mb-4 text-blue-600">About Trackify</h1>
<p class="mb-4">
  <strong>Trackify</strong> is a powerful yet simple habit tracking web app built to help individuals create consistency and accountability in their daily routines. Whether you’re aiming to build better habits, break bad ones, or just visualize your progress, Trackify provides a clean, intuitive interface to help you stay on track.
</p>
<p class="mb-4">
  With features like weekly tracking, progress visualization, and easy habit editing, Trackify turns habit-building into a motivating and rewarding experience. It removes the clutter and focuses on what matters most: helping you build meaningful routines over time.
</p>
<p class="mb-4">
  The application is built using <strong>PHP</strong> for the backend and <strong>Tailwind CSS</strong> for a modern frontend look. It's fully responsive, lightweight, and privacy-friendly—your habits stay yours.
</p>
<p class="mb-4">
  Whether you want to wake up earlier, exercise daily, learn a new language, or even drink more water—Trackify is your perfect daily companion. It’s ideal for students, professionals, creators, or anyone looking to grow personally or professionally.
</p>
<p class="mb-6">
  <strong>Our vision:</strong> Make habit tracking more human, accessible, and visually fun—without the distractions of social feeds or ads.
</p>

<!-- Visual Model Diagram -->
<div class="my-6 p-4 bg-white border rounded shadow text-center">
  <h3 class="text-lg font-semibold mb-2">🧠 Habit Formation Loop</h3>
  <div class="flex flex-col md:flex-row items-center justify-center gap-4">
    <div class="p-4 bg-blue-100 rounded shadow w-40">🔔 Cue<br><small>For example, morning reminder</small></div>
    <span class="text-xl">➡️</span>
    <div class="p-4  bg-green-100 rounded shadow w-40">💪 Action<br><small>For example, 10 mins meditation</small></div>
    <!-- <span class="text-xl">➡️</span> -->
    <!-- <div class="p-4 bg-yellow-100 rounded shadow w-40">🏆 Reward<br><small>e.g., checked-off day</small></div>
  </div> -->
</div>
<h2 class="text-2xl font-semibold mt-10 mb-4 text-blue-500">⚙️ Tech Stack</h2>
<ul class="list-disc list-inside mb-6">
  <li><strong>PHP</strong> — Backend logic, user authentication, and habit CRUD</li>
  <li><strong>MySQL</strong> — For storing users, habits, and tracking logs</li>
  <li><strong>Tailwind CSS</strong> — Modern utility-first styling</li>
  <li><strong>HTML5</strong> — Semantic, accessible markup</li>
</ul>


   <!-- Meet the Team -->
<h2 class="text-2xl font-semibold mt-8 mb-4 text-blue-500">Meet the Team</h2>
<div class="grid md:grid-cols-4 gap-6">

<!-- Team Card 1 -->
<div class="bg-gray-50 rounded-lg shadow p-4 text-center">
    <img src="images/PC.png" alt="Palak" class="w-24 h-24 mx-auto rounded-full mb-3 object-cover">
    <h3 class="text-lg font-bold">Palak Choudhary</h3>
    <p class="text-sm text-gray-600">Team Leader & Database Manager</p>
  </div>

  <!-- Team Card 2 -->
  <div class="bg-gray-50 rounded-lg shadow p-4 text-center">
    <img src="images/SM.jpg" alt="Suchandra" class="w-24 h-24 mx-auto rounded-full mb-3 object-cover">
    <h3 class="text-lg font-bold">Suchandra Mallick</h3>
    <p class="text-sm text-gray-600">Developer & Designer</p>
  </div>
  
  <!-- Team Card 3 -->
  <div class="bg-gray-50 rounded-lg shadow p-4 text-center">
    <img src="images/NK.jpg" alt="Nirjara" class="w-24 h-24 mx-auto rounded-full mb-3 object-cover">
    <h3 class="text-lg font-bold">Nirjara Kumari</h3>
    <p class="text-sm text-gray-600">Designer</p>
  </div>
  
  <!-- Team Card 4 -->
  <div class="bg-gray-50 rounded-lg shadow p-4 text-center">
    <img src="images/PR.jpg" alt="Preetiparna" class="w-24 h-24 mx-auto rounded-full mb-3 object-cover">
    <h3 class="text-lg font-bold">Preetiparna Roy</h3>
    <p class="text-sm text-gray-600">QA & Support</p>
  </div>
  </div>

    <!-- Contact Us
    <h2 class="text-2xl font-semibold mt-12 mb-4 text-blue-500">Contact Us</h2>
    <p class="mb-4">Have questions or suggestions? We'd love to hear from you!</p>

    <form class="space-y-4">
      <div>
        <input type="text" placeholder="Your Name" class="w-full border rounded px-4 py-2" required>
      </div>
      <div>
        <input type="email" placeholder="Your Email" class="w-full border rounded px-4 py-2" required>
      </div>
      <div>
        <textarea placeholder="Your Message" rows="4" class="w-full border rounded px-4 py-2" required></textarea>
      </div>
      <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
        Send Message
      </button>
    </form> -->
    <h2 class="text-2xl font-semibold mt-10 mb-4 text-blue-500">🌱 What’s Next?</h2>
<p class="mb-4">
  We're planning to add features like:
</p>
<ul class="list-disc list-inside mb-6">
  <li>📅 Monthly tracking views</li>
  <li>📈 Streak badges and progress stats</li>
  <li>📱 Mobile responsiveness with offline support</li>
  <li>🔔 Reminders and goal-setting</li>
</ul>
<div class="max-w-4x2 mx-10 bg-white p-8 rounded shadow text-gray-600">
<p class="text-lg font-semibold">We're just getting started. Build with us 💙</p>
  </div>
</div>

<?php  include 'auth/includes/footer.php'?>
