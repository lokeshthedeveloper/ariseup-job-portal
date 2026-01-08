<template>
  <div class="theme-wrapper" :class="`theme-${themeSlug}`">
    <!-- Theme Layout -->
    <div class="theme-layout">
      <!-- Dynamic Header -->
      <component :is="headerComponent" v-if="headerComponent" />

      <!-- Dynamic Navigation (if separate from header) -->
      <component :is="navComponent" v-if="navComponent" />

      <!-- Main Content -->
      <main class="main-content">
        <slot />
      </main>

      <!-- Dynamic Footer -->
      <component :is="footerComponent" v-if="footerComponent" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed, defineAsyncComponent } from "vue";

const { themeSlug, hasComponent, getComponentTheme } = useThemeConfig();

// Dynamic component loading based on component-specific theme
const headerComponent = computed(() => {
  if (!hasComponent("header")) return null;
  const compTheme = getComponentTheme("header");
  if (!compTheme) return null;

  return defineAsyncComponent(
    () =>
      import(`~/components/themes/${compTheme}/Header.vue`).catch(
        () => import("~/components/themes/default-theme/Header.vue")
      )
  );
});

const navComponent = computed(() => {
  if (!hasComponent("navigation")) return null;
  const compTheme = getComponentTheme("navigation");
  if (!compTheme) return null;

  return defineAsyncComponent(
    () =>
      import(`~/components/themes/${compTheme}/Navigation.vue`).catch(
        () => null // Navigation is optional
      )
  );
});

const footerComponent = computed(() => {
  if (!hasComponent("footer")) return null;
  const compTheme = getComponentTheme("footer");
  if (!compTheme) return null;

  return defineAsyncComponent(
    () =>
      import(`~/components/themes/${compTheme}/Footer.vue`).catch(
        () => import("~/components/themes/default-theme/Footer.vue")
      )
  );
});
</script>

<style scoped>
.theme-wrapper {
  @apply min-h-screen flex flex-col;
}

.theme-layout {
  @apply flex flex-col min-h-screen;
}

.main-content {
  @apply flex-grow;
}
</style>
