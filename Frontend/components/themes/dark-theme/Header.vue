<template>
  <header class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 shadow-2xl sticky top-0 z-50">
    <nav class="container mx-auto px-4 py-4">
      <div class="flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex items-center justify-center shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
          </div>
          <NuxtLink to="/" class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent hover:from-purple-300 hover:to-pink-300 transition">
            {{ company?.name || 'Job Portal' }}
          </NuxtLink>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center space-x-8">
          <NuxtLink to="/" class="text-gray-300 hover:text-purple-400 font-medium transition-all duration-300 hover:scale-110">
            Home
          </NuxtLink>
          <NuxtLink to="/jobs" class="text-gray-300 hover:text-purple-400 font-medium transition-all duration-300 hover:scale-110">
            Jobs
          </NuxtLink>
          <NuxtLink to="/companies" class="text-gray-300 hover:text-purple-400 font-medium transition-all duration-300 hover:scale-110">
            Companies
          </NuxtLink>
          <NuxtLink to="/about" class="text-gray-300 hover:text-purple-400 font-medium transition-all duration-300 hover:scale-110">
            About
          </NuxtLink>
        </div>

        <!-- Auth Buttons -->
        <div class="hidden md:flex items-center space-x-4">
          <NuxtLink to="/login" class="px-4 py-2 text-purple-400 hover:text-purple-300 font-medium transition">
            Login
          </NuxtLink>
          <NuxtLink to="/register" class="px-6 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg hover:from-purple-500 hover:to-pink-500 transition transform hover:scale-105 shadow-lg hover:shadow-purple-500/50">
            Sign Up
          </NuxtLink>
        </div>

        <!-- Mobile Menu Button -->
        <button @click="toggleMenu" class="md:hidden text-gray-300 hover:text-purple-400">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path v-if="!isMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Mobile Menu -->
      <div v-if="isMenuOpen" class="md:hidden mt-4 pb-4 border-t border-gray-700 pt-4">
        <div class="flex flex-col space-y-4">
          <NuxtLink to="/" class="text-gray-300 hover:text-purple-400 font-medium transition">
            Home
          </NuxtLink>
          <NuxtLink to="/jobs" class="text-gray-300 hover:text-purple-400 font-medium transition">
            Jobs
          </NuxtLink>
          <NuxtLink to="/companies" class="text-gray-300 hover:text-purple-400 font-medium transition">
            Companies
          </NuxtLink>
          <NuxtLink to="/about" class="text-gray-300 hover:text-purple-400 font-medium transition">
            About
          </NuxtLink>
          <div class="flex flex-col space-y-2 pt-4 border-t border-gray-700">
            <NuxtLink to="/login" class="px-4 py-2 text-center text-purple-400 hover:text-purple-300 font-medium transition border border-purple-600 rounded-lg">
              Login
            </NuxtLink>
            <NuxtLink to="/register" class="px-4 py-2 text-center bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg hover:from-purple-500 hover:to-pink-500 transition">
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
import { useThemeConfig } from '../../../composables/useThemeConfig';

const { company } = useThemeConfig();
const isMenuOpen = ref(false);

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value;
};
</script>
