<template>
  <header class="bg-white shadow-md sticky top-0 z-50">
    <nav class="container mx-auto px-4 py-4">
      <div class="flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-700 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
          <NuxtLink to="/" class="text-2xl font-bold text-gray-800 hover:text-blue-600 transition">
            {{ company?.name || 'Job Portal' }}
          </NuxtLink>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center space-x-8">
          <NuxtLink to="/" class="text-gray-700 hover:text-blue-600 font-medium transition">
            Home
          </NuxtLink>
          <NuxtLink to="/jobs" class="text-gray-700 hover:text-blue-600 font-medium transition">
            Jobs
          </NuxtLink>
          <NuxtLink to="/companies" class="text-gray-700 hover:text-blue-600 font-medium transition">
            Companies
          </NuxtLink>
          <NuxtLink to="/about" class="text-gray-700 hover:text-blue-600 font-medium transition">
            About
          </NuxtLink>
        </div>

        <!-- Auth Buttons -->
        <div class="hidden md:flex items-center space-x-4">
          <NuxtLink to="/login" class="px-4 py-2 text-blue-600 hover:text-blue-700 font-medium transition">
            Login
          </NuxtLink>
          <NuxtLink to="/register" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition transform hover:scale-105 shadow-md">
            Sign Up
          </NuxtLink>
        </div>

        <!-- Mobile Menu Button -->
        <button @click="toggleMenu" class="md:hidden text-gray-700 hover:text-blue-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path v-if="!isMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Mobile Menu -->
      <div v-if="isMenuOpen" class="md:hidden mt-4 pb-4 border-t border-gray-200 pt-4">
        <div class="flex flex-col space-y-4">
          <NuxtLink to="/" class="text-gray-700 hover:text-blue-600 font-medium transition">
            Home
          </NuxtLink>
          <NuxtLink to="/jobs" class="text-gray-700 hover:text-blue-600 font-medium transition">
            Jobs
          </NuxtLink>
          <NuxtLink to="/companies" class="text-gray-700 hover:text-blue-600 font-medium transition">
            Companies
          </NuxtLink>
          <NuxtLink to="/about" class="text-gray-700 hover:text-blue-600 font-medium transition">
            About
          </NuxtLink>
          <div class="flex flex-col space-y-2 pt-4 border-t border-gray-200">
            <NuxtLink to="/login" class="px-4 py-2 text-center text-blue-600 hover:text-blue-700 font-medium transition border border-blue-600 rounded-lg">
              Login
            </NuxtLink>
            <NuxtLink to="/register" class="px-4 py-2 text-center bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
              Sign Up
            </NuxtLink>
          </div>
        </div>
      </div>
    </nav>
  </header>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const { company } = useThemeConfig();
const isMenuOpen = ref(false);

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value;
};
</script>
