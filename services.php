<?php include 'auth/includes/header1.php'; ?>

<div class="min-h-screen bg-white py-20 px-4">
  <div class="max-w-5xl mx-auto text-center">
    <h1 class="text-4xl font-bold text-blue-600 mb-4">Our Services</h1>
    <p class="text-gray-600 text-lg mb-12">
      At Trackify, we offer tools to make habit tracking effective, easy, and engaging. Here's what you can count on:
    </p>

    <!-- Services Grid -->
    <div class="grid md:grid-cols-1 gap-8">
      
      <!-- Service 1 -->
      <div class="bg-gray-70 border border-gray-200 rounded p-6 shadow hover:shadow-md transition">
        <div class="text-blue-500 text-8xl mb-3">
          📈
        </div>
        <h3 class="text-xl font-semibold mb-2">Visual Habit Tracker</h3>
        <p class="text-gray-600 text-sm">
          Track your daily and weekly progress with easy-to-use visual charts that keep you motivated.
        </p>
      </div>

      <!-- Service 2 -->
      <div class="bg--70 border border-gray-200 rounded p-6 shadow hover:shadow-md transition">
        <div class="text-green-500 text-8xl mb-3">
          ⏰
        </div>
        <h3 class="text-xl font-semibold mb-2">Reminders & Alerts</h3>
        <p class="text-gray-600 text-sm">
          Never miss a habit again. Set custom alerts and get reminders tailored to your schedule.
        </p>
      </div>

      <!-- Service 3 -->
      <div class="bg-gray-70 border border-gray-200 rounded p-6 shadow hover:shadow-md transition">
        <div class="text-purple-500 text-8xl mb-3">
          🧠
        </div>
        <h3 class="text-xl font-semibold mb-2">Insights & Analytics</h3>
        <p class="text-gray-600 text-sm">
          See your progress over time with smart analytics that help you understand your behavior.
        </p>
      </div>

    </div>

    <!-- CTA -->
    <div class="mt-16">
      <a href="signup.php" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-full font-medium hover:bg-blue-700 transition">
        Start Building Better Habits
      </a>
    </div>
  </div>
</div>

<?php include 'auth/includes/footer.php'; ?>
