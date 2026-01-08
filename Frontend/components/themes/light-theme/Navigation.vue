<template>
  <nav class="bg-white border-b border-emerald-100 py-3 shadow-sm">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-6">
          <NuxtLink to="/categories" class="text-sm text-gray-700 hover:text-emerald-600 transition-all duration-200 flex items-center space-x-2 group">
            <div class="w-6 h-6 bg-emerald-100 rounded-lg flex items-center justify-center group-hover:bg-emerald-500 transition-colors">
              <svg class="w-3.5 h-3.5 text-emerald-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </div>
            <span class="font-medium">Categories</span>
          </NuxtLink>
          <NuxtLink to="/remote-jobs" class="text-sm text-gray-700 hover:text-emerald-600 transition-all duration-200 font-medium relative group">
            <span>Remote Jobs</span>
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-emerald-500 group-hover:w-full transition-all duration-200"></span>
          </NuxtLink>
          <NuxtLink to="/full-time" class="text-sm text-gray-700 hover:text-emerald-600 transition-all duration-200 font-medium relative group">
            <span>Full Time</span>
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-emerald-500 group-hover:w-full transition-all duration-200"></span>
          </NuxtLink>
          <NuxtLink to="/part-time" class="text-sm text-gray-700 hover:text-emerald-600 transition-all duration-200 font-medium relative group">
            <span>Part Time</span>
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-emerald-500 group-hover:w-full transition-all duration-200"></span>
          </NuxtLink>
        </div>
        <div class="hidden md:flex items-center space-x-3">
          <div class="flex items-center space-x-2 text-sm text-gray-600">
            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Need help?</span>
          </div>
          <NuxtLink to="/contact" class="text-sm text-emerald-600 hover:text-emerald-700 font-semibold transition px-3 py-1.5 bg-emerald-50 rounded-lg hover:bg-emerald-100">
            Contact Support
          </NuxtLink>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup lang="ts">
</script>
