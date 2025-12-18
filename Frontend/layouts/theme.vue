<template>
  <div class="theme-wrapper" :class="`theme-${themeSlug}`">
    <!-- Loading State -->
    <div v-if="loading" class="loading-screen">
      <div class="loading-spinner"></div>
      <p class="mt-4 text-gray-600">Loading theme...</p>
    </div>

    <!-- Error State -->
    <div v-else-if="error" class="error-screen">
      <div class="error-content">
        <h1 class="text-2xl font-bold text-red-600 mb-4">
          Configuration Error
        </h1>
        <p class="text-gray-700 mb-4">{{ error }}</p>
        <button @click="retry" class="btn-retry">Retry</button>
      </div>
    </div>

    <!-- Theme Layout -->
    <div v-else-if="themeSlug" class="theme-layout">
      <!-- Dynamic Header -->
      <component :is="headerComponent" v-if="headerComponent" />

      <!-- Main Content -->
      <main class="main-content">
        <slot />
      </main>

      <!-- Dynamic Footer -->
      <component :is="footerComponent" v-if="footerComponent" />
    </div>

    <!-- Fallback -->
    <div v-else class="fallback-layout">
      <slot />
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed, defineAsyncComponent } from "vue";

const { themeSlug, loading, error, fetchThemeConfig, hasComponent } =
  useThemeConfig();

// Dynamic component loading based on theme
const headerComponent = computed(() => {
  if (!themeSlug.value || !hasComponent("header")) return null;

  try {
    return defineAsyncComponent(
      () =>
        import(`~/components/themes/${themeSlug.value}/Header.vue`).catch(
          () => import("~/components/themes/jobstock/Header.vue")
        ) // Fallback
    );
  } catch (e) {
    console.error("Failed to load header component:", e);
    return null;
  }
});

const footerComponent = computed(() => {
  if (!themeSlug.value || !hasComponent("footer")) return null;

  try {
    return defineAsyncComponent(
      () =>
        import(`~/components/themes/${themeSlug.value}/Footer.vue`).catch(
          () => import("~/components/themes/jobstock/Footer.vue")
        ) // Fallback
    );
  } catch (e) {
    console.error("Failed to load footer component:", e);
    return null;
  }
});

const retry = async () => {
  await fetchThemeConfig();
};
</script>

<style scoped>
.theme-wrapper {
  @apply min-h-screen flex flex-col;
}

.loading-screen {
  @apply flex flex-col items-center justify-center min-h-screen bg-gray-50;
}

.loading-spinner {
  @apply w-12 h-12 border-4 border-blue-600 border-t-transparent rounded-full animate-spin;
}

.error-screen {
  @apply flex items-center justify-center min-h-screen bg-gray-50 px-4;
}

.error-content {
  @apply bg-white p-8 rounded-lg shadow-lg text-center max-w-md;
}

.btn-retry {
  @apply bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200;
}

.theme-layout {
  @apply flex flex-col min-h-screen;
}

.main-content {
  @apply flex-grow;
}

.fallback-layout {
  @apply min-h-screen;
}
</style>
