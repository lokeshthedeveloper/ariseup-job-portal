<template>
  <header class="jobstock-header">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between h-20">
        <!-- Logo -->
        <div class="logo">
          <NuxtLink to="/" class="flex items-center space-x-3">
            <img
              v-if="company?.logo"
              :src="company.logo"
              :alt="company.name"
              class="h-10 w-auto"
            />
            <span v-else class="text-2xl font-bold text-blue-600">
              {{ company?.name || "JobStock" }}
            </span>
          </NuxtLink>
        </div>

        <!-- Navigation -->
        <nav class="hidden md:flex items-center space-x-8">
          <NuxtLink to="/" class="nav-link">Home</NuxtLink>
          <NuxtLink
            v-if="hasComponent('jobs-listing')"
            to="/jobs"
            class="nav-link"
          >
            Jobs
          </NuxtLink>
          <NuxtLink v-if="hasComponent('blog')" to="/blog" class="nav-link">
            Blog
          </NuxtLink>
          <NuxtLink to="/about" class="nav-link">About</NuxtLink>
          <NuxtLink to="/contact" class="nav-link">Contact</NuxtLink>
        </nav>

        <!-- CTA Button -->
        <div class="hidden md:block">
          <NuxtLink to="/post-job" class="btn-primary"> Post a Job </NuxtLink>
        </div>

        <!-- Mobile Menu Button -->
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2">
          <svg
            class="w-6 h-6"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"
            />
          </svg>
        </button>
      </div>

      <!-- Mobile Menu -->
      <div v-show="mobileMenuOpen" class="md:hidden py-4">
        <nav class="flex flex-col space-y-4">
          <NuxtLink to="/" class="nav-link-mobile">Home</NuxtLink>
          <NuxtLink
            v-if="hasComponent('jobs-listing')"
            to="/jobs"
            class="nav-link-mobile"
          >
            Jobs
          </NuxtLink>
          <NuxtLink
            v-if="hasComponent('blog')"
            to="/blog"
            class="nav-link-mobile"
          >
            Blog
          </NuxtLink>
          <NuxtLink to="/about" class="nav-link-mobile">About</NuxtLink>
          <NuxtLink to="/contact" class="nav-link-mobile">Contact</NuxtLink>
          <NuxtLink to="/post-job" class="btn-primary mt-4 text-center">
            Post a Job
          </NuxtLink>
        </nav>
      </div>
    </div>
  </header>
</template>

<script setup lang="ts">
const { company, hasComponent } = useThemeConfig();
const mobileMenuOpen = ref(false);
</script>

<style scoped>
.jobstock-header {
  @apply bg-white shadow-md sticky top-0 z-50;
}

.nav-link {
  @apply text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200;
}

.nav-link-mobile {
  @apply text-gray-700 hover:text-blue-600 font-medium py-2;
}

.btn-primary {
  @apply bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200;
}
</style>
