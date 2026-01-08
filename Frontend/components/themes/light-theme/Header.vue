<template>
  <header class="bg-gradient-to-r from-emerald-50 to-teal-50 shadow-sm sticky top-0 z-50 border-b border-emerald-100">
    <nav class="container mx-auto px-4 py-4">
      <div class="flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-xl flex items-center justify-center shadow-md">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
          </div>
          <NuxtLink to="/" class="text-2xl font-bold text-emerald-700 hover:text-emerald-600 transition">
            {{ company?.name || 'Job Portal' }}
          </NuxtLink>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center space-x-8">
          <NuxtLink to="/" class="text-gray-700 hover:text-emerald-600 font-medium transition-colors duration-200 relative group">
            <span>Home</span>
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-emerald-500 group-hover:w-full transition-all duration-200"></span>
          </NuxtLink>
          <NuxtLink to="/jobs" class="text-gray-700 hover:text-emerald-600 font-medium transition-colors duration-200 relative group">
            <span>Jobs</span>
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-emerald-500 group-hover:w-full transition-all duration-200"></span>
          </NuxtLink>
          <NuxtLink to="/companies" class="text-gray-700 hover:text-emerald-600 font-medium transition-colors duration-200 relative group">
            <span>Companies</span>
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-emerald-500 group-hover:w-full transition-all duration-200"></span>
          </NuxtLink>
          <NuxtLink to="/about" class="text-gray-700 hover:text-emerald-600 font-medium transition-colors duration-200 relative group">
            <span>About</span>
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-emerald-500 group-hover:w-full transition-all duration-200"></span>
          </NuxtLink>
        </div>

        <!-- Auth Buttons -->
        <div class="hidden md:flex items-center space-x-4">
          <NuxtLink to="/login" class="px-5 py-2 text-emerald-600 hover:text-emerald-700 font-medium transition">
            Login
          </NuxtLink>
          <NuxtLink to="/register" class="px-6 py-2.5 bg-gradient-to-r from-emerald-500 to-teal-500 text-white rounded-xl hover:from-emerald-600 hover:to-teal-600 transition transform hover:scale-105 shadow-md hover:shadow-lg">
            Sign Up
          </NuxtLink>
        </div>

        <!-- Mobile Menu Button -->
        <button @click="toggleMenu" class="md:hidden text-gray-700 hover:text-emerald-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path v-if="!isMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Mobile Menu -->
      <div v-if="isMenuOpen" class="md:hidden mt-4 pb-4 border-t border-emerald-200 pt-4">
        <div class="flex flex-col space-y-4">
          <NuxtLink to="/" class="text-gray-700 hover:text-emerald-600 font-medium transition px-2 py-1 rounded hover:bg-emerald-50">
            Home
          </NuxtLink>
          <NuxtLink to="/jobs" class="text-gray-700 hover:text-emerald-600 font-medium transition px-2 py-1 rounded hover:bg-emerald-50">
            Jobs
          </NuxtLink>
          <NuxtLink to="/companies" class="text-gray-700 hover:text-emerald-600 font-medium transition px-2 py-1 rounded hover:bg-emerald-50">
            Companies
          </NuxtLink>
          <NuxtLink to="/about" class="text-gray-700 hover:text-emerald-600 font-medium transition px-2 py-1 rounded hover:bg-emerald-50">
            About
          </NuxtLink>
          <div class="flex flex-col space-y-2 pt-4 border-t border-emerald-200">
            <NuxtLink to="/login" class="px-4 py-2 text-center text-emerald-600 hover:text-emerald-700 font-medium transition border border-emerald-500 rounded-xl">
              Login
            </NuxtLink>
            <NuxtLink to="/register" class="px-4 py-2 text-center bg-gradient-to-r from-emerald-500 to-teal-500 text-white rounded-xl hover:from-emerald-600 hover:to-teal-600 transition">
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
