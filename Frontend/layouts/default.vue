<template>
  <div class="min-h-screen flex flex-col">
    <!-- Header -->
    <header
      class="bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg"
    >
      <nav class="container-custom py-4">
        <div class="flex items-center justify-between">
          <div class="text-2xl font-bold">
            <NuxtLink to="/" class="hover:opacity-90 transition">
              Job Portal
            </NuxtLink>
          </div>
          <div class="hidden md:flex space-x-6">
            <NuxtLink to="/" class="hover:text-blue-200 transition"
              >Home</NuxtLink
            >
            <NuxtLink to="/jobs" class="hover:text-blue-200 transition"
              >Jobs</NuxtLink
            >
            <NuxtLink to="/companies" class="hover:text-blue-200 transition"
              >Companies</NuxtLink
            >
            <NuxtLink to="/about" class="hover:text-blue-200 transition"
              >About</NuxtLink
            >
          </div>
          <div class="flex space-x-4">
            <NuxtLink to="/login" class="btn-secondary">Login</NuxtLink>
            <NuxtLink to="/register" class="btn-primary">Register</NuxtLink>
          </div>
        </div>
      </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
      <slot />
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-8 mt-12">
      <div class="container-custom">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
          <div>
            <h3 class="text-white text-lg font-semibold mb-4">Job Portal</h3>
            <p class="text-sm">
              Your trusted multi-tenant job portal platform.
            </p>
          </div>
          <div>
            <h4 class="text-white text-md font-semibold mb-4">Quick Links</h4>
            <ul class="space-y-2 text-sm">
              <li>
                <NuxtLink to="/jobs" class="hover:text-white transition"
                  >Browse Jobs</NuxtLink
                >
              </li>
              <li>
                <NuxtLink to="/companies" class="hover:text-white transition"
                  >Companies</NuxtLink
                >
              </li>
              <li>
                <NuxtLink to="/about" class="hover:text-white transition"
                  >About Us</NuxtLink
                >
              </li>
            </ul>
          </div>
          <div>
            <h4 class="text-white text-md font-semibold mb-4">For Employers</h4>
            <ul class="space-y-2 text-sm">
              <li>
                <NuxtLink to="/post-job" class="hover:text-white transition"
                  >Post a Job</NuxtLink
                >
              </li>
              <li>
                <NuxtLink to="/pricing" class="hover:text-white transition"
                  >Pricing</NuxtLink
                >
              </li>
            </ul>
          </div>
          <div>
            <h4 class="text-white text-md font-semibold mb-4">Contact</h4>
            <ul class="space-y-2 text-sm">
              <li>Email: info@jobportal.com</li>
              <li>Phone: +1 234 567 890</li>
            </ul>
          </div>
        </div>
        <div class="mt-8 pt-8 border-t border-gray-800 text-center text-sm">
          <p>
            &copy; {{ new Date().getFullYear() }} Job Portal. All rights
            reserved.
          </p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup lang="ts">
// Default layout setup
</script>
