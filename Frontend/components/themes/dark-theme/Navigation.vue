<template>
  <nav class="bg-gray-800 border-b border-gray-700 py-3 shadow-lg">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-6">
          <NuxtLink to="/categories" class="text-sm text-gray-300 hover:text-purple-400 transition-all duration-300 flex items-center space-x-2 group">
            <svg class="w-4 h-4 group-hover:rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span>Categories</span>
          </NuxtLink>
          <NuxtLink to="/remote-jobs" class="text-sm text-gray-300 hover:text-purple-400 transition-all duration-300 relative group">
            <span>Remote Jobs</span>
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-purple-500 to-pink-600 group-hover:w-full transition-all duration-300"></span>
          </NuxtLink>
          <NuxtLink to="/full-time" class="text-sm text-gray-300 hover:text-purple-400 transition-all duration-300 relative group">
            <span>Full Time</span>
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-purple-500 to-pink-600 group-hover:w-full transition-all duration-300"></span>
          </NuxtLink>
          <NuxtLink to="/part-time" class="text-sm text-gray-300 hover:text-purple-400 transition-all duration-300 relative group">
            <span>Part Time</span>
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-purple-500 to-pink-600 group-hover:w-full transition-all duration-300"></span>
          </NuxtLink>
        </div>
        <div class="hidden md:flex items-center space-x-4">
          <span class="text-sm text-gray-400">Need help?</span>
          <NuxtLink to="/contact" class="text-sm bg-gradient-to-r from-purple-500 to-pink-600 bg-clip-text text-transparent hover:from-purple-400 hover:to-pink-500 font-medium transition">
            Contact Support
          </NuxtLink>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup lang="ts">
</script>
