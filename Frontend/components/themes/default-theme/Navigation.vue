<template>
  <nav class="bg-blue-50 border-b border-blue-100 py-3">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-6">
          <NuxtLink to="/categories" class="text-sm text-gray-700 hover:text-blue-600 transition flex items-center space-x-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span>Categories</span>
          </NuxtLink>
          <NuxtLink to="/remote-jobs" class="text-sm text-gray-700 hover:text-blue-600 transition">
            Remote Jobs
          </NuxtLink>
          <NuxtLink to="/full-time" class="text-sm text-gray-700 hover:text-blue-600 transition">
            Full Time
          </NuxtLink>
          <NuxtLink to="/part-time" class="text-sm text-gray-700 hover:text-blue-600 transition">
            Part Time
          </NuxtLink>
        </div>
        <div class="hidden md:flex items-center space-x-4">
          <span class="text-sm text-gray-600">Need help?</span>
          <NuxtLink to="/contact" class="text-sm text-blue-600 hover:text-blue-700 font-medium">
            Contact Support
          </NuxtLink>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup lang="ts">
</script>
