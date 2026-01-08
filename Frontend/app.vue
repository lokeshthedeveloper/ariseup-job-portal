<template>
  <div>
    <!-- Global Loader - Shows until theme config is loaded -->
    <div v-if="isLoading" class="fixed inset-0 z-[9999] flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-purple-50">
      <div class="text-center">
        <!-- Animated Logo/Spinner -->
        <div class="relative mb-8">
          <div class="w-24 h-24 mx-auto">
            <!-- Outer rotating ring -->
            <div class="absolute inset-0 border-4 border-blue-200 rounded-full animate-spin border-t-blue-600"></div>
            <!-- Inner pulsing circle -->
            <div class="absolute inset-3 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full animate-pulse flex items-center justify-center">
              <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
          </div>
        </div>
        
        <!-- Loading Text -->
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Loading Your Experience</h2>
        <p class="text-gray-600 animate-pulse">Preparing your personalized job portal...</p>
        
        <!-- Progress Dots -->
        <div class="flex justify-center space-x-2 mt-6">
          <div class="w-3 h-3 bg-blue-600 rounded-full animate-bounce" style="animation-delay: 0ms"></div>
          <div class="w-3 h-3 bg-purple-600 rounded-full animate-bounce" style="animation-delay: 150ms"></div>
          <div class="w-3 h-3 bg-blue-600 rounded-full animate-bounce" style="animation-delay: 300ms"></div>
        </div>
      </div>
    </div>

    <!-- Error State -->
    <div v-else-if="loadError" class="fixed inset-0 z-[9999] flex items-center justify-center bg-gradient-to-br from-red-50 to-orange-50">
      <div class="text-center max-w-md mx-auto px-4">
        <div class="w-20 h-20 mx-auto mb-6 bg-red-100 rounded-full flex items-center justify-center">
          <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-3">Configuration Error</h2>
        <p class="text-gray-600 mb-6">{{ loadError }}</p>
        <button 
          @click="retry" 
          class="px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition transform hover:scale-105 shadow-lg"
        >
          Retry Loading
        </button>
      </div>
    </div>

    <!-- Main App Content - Only shows after theme is loaded -->
    <div v-else>
      <NuxtLayout>
        <NuxtPage />
      </NuxtLayout>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';

const { fetchThemeConfig, error } = useThemeConfig();
const isLoading = ref(true);
const loadError = ref<string | null>(null);

// Global app setup
useHead({
  titleTemplate: (title) => (title ? `${title} - Job Portal` : "Job Portal"),
});

// Fetch theme config on mount
onMounted(async () => {
  try {
    await fetchThemeConfig();
    loadError.value = error.value;
  } catch (err: any) {
    loadError.value = err.message || 'Failed to load configuration';
  } finally {
    isLoading.value = false;
  }
});

// Retry function for error state
const retry = async () => {
  isLoading.value = true;
  loadError.value = null;
  try {
    await fetchThemeConfig();
    loadError.value = error.value;
  } catch (err: any) {
    loadError.value = err.message || 'Failed to load configuration';
  } finally {
    isLoading.value = false;
  }
};
</script>

<style>
/* Custom animation for smoother bounce */
@keyframes bounce {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
}

.animate-bounce {
  animation: bounce 1s infinite;
}
</style>
