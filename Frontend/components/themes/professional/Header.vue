<template>
  <header class="professional-header">
    <div class="top-bar">
      <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-10 text-sm">
          <div class="flex items-center space-x-6 text-gray-600">
            <span v-if="company?.company_email">
              <i class="mr-1">📧</i> {{ company.company_email }}
            </span>
            <span v-if="company?.website">
              <i class="mr-1">🌐</i> {{ company.website }}
            </span>
          </div>
          <div class="flex items-center space-x-4">
            <NuxtLink to="/login" class="text-gray-600 hover:text-gray-900"
              >Login</NuxtLink
            >
            <NuxtLink to="/register" class="text-gray-600 hover:text-gray-900"
              >Register</NuxtLink
            >
          </div>
        </div>
      </div>
    </div>

    <div class="main-header">
      <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-24">
          <!-- Logo -->
          <div class="logo">
            <NuxtLink to="/" class="flex items-center space-x-3">
              <img
                v-if="company?.logo"
                :src="company.logo"
                :alt="company.name"
                class="h-12 w-auto"
              />
              <span v-else class="text-3xl font-bold text-gray-900">
                {{ company?.name || "Professional" }}
              </span>
            </NuxtLink>
          </div>

          <!-- Navigation -->
          <nav class="hidden lg:flex items-center space-x-10">
            <NuxtLink to="/" class="nav-link">Home</NuxtLink>
            <NuxtLink
              v-if="hasComponent('jobs-listing')"
              to="/jobs"
              class="nav-link"
            >
              Find Jobs
            </NuxtLink>
            <NuxtLink to="/employers" class="nav-link">Employers</NuxtLink>
            <NuxtLink v-if="hasComponent('blog')" to="/blog" class="nav-link">
              Resources
            </NuxtLink>
            <NuxtLink to="/contact" class="nav-link">Contact</NuxtLink>
          </nav>

          <!-- Actions -->
          <div class="hidden lg:flex items-center space-x-4">
            <NuxtLink to="/post-job" class="btn-outline"> Post Job </NuxtLink>
            <NuxtLink to="/submit-resume" class="btn-solid">
              Submit Resume
            </NuxtLink>
          </div>

          <!-- Mobile Menu Button -->
          <button
            @click="mobileMenuOpen = !mobileMenuOpen"
            class="lg:hidden p-2"
          >
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
                :d="
                  mobileMenuOpen
                    ? 'M6 18L18 6M6 6l12 12'
                    : 'M4 6h16M4 12h16M4 18h16'
                "
              />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div v-show="mobileMenuOpen" class="mobile-menu lg:hidden">
      <div class="container mx-auto px-4 py-6">
        <nav class="flex flex-col space-y-4">
          <NuxtLink to="/" class="nav-link-mobile">Home</NuxtLink>
          <NuxtLink
            v-if="hasComponent('jobs-listing')"
            to="/jobs"
            class="nav-link-mobile"
          >
            Find Jobs
          </NuxtLink>
          <NuxtLink to="/employers" class="nav-link-mobile">Employers</NuxtLink>
          <NuxtLink
            v-if="hasComponent('blog')"
            to="/blog"
            class="nav-link-mobile"
          >
            Resources
          </NuxtLink>
          <NuxtLink to="/contact" class="nav-link-mobile">Contact</NuxtLink>
          <div class="flex flex-col space-y-3 pt-4 border-t">
            <NuxtLink to="/post-job" class="btn-outline text-center">
              Post Job
            </NuxtLink>
            <NuxtLink to="/submit-resume" class="btn-solid text-center">
              Submit Resume
            </NuxtLink>
          </div>
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
.professional-header {
  @apply bg-white shadow sticky top-0 z-50;
}

.top-bar {
  @apply bg-gray-50 border-b border-gray-200;
}

.main-header {
  @apply bg-white;
}

.nav-link {
  @apply text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-200 text-base;
}

.nav-link-mobile {
  @apply text-gray-700 hover:text-indigo-600 font-medium py-3;
}

.btn-outline {
  @apply border-2 border-indigo-600 text-indigo-600 px-6 py-2.5 rounded-md hover:bg-indigo-50 transition-all duration-200 font-medium;
}

.btn-solid {
  @apply bg-indigo-600 text-white px-6 py-2.5 rounded-md hover:bg-indigo-700 transition-colors duration-200 font-medium shadow-md;
}

.mobile-menu {
  @apply bg-white border-t shadow-lg;
}
</style>
