<template>
  <section class="hero-section">
    <div class="container mx-auto px-4 py-20">
      <div class="text-center max-w-4xl mx-auto">
        <h1 class="hero-title">Find Your Dream Job Today</h1>
        <p class="hero-subtitle">
          Discover thousands of job opportunities from top companies around the
          world
        </p>

        <!-- Search Bar -->
        <div class="search-container">
          <div class="search-wrapper">
            <div class="search-input-group">
              <svg
                class="search-icon"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                />
              </svg>
              <input
                v-model="searchQuery"
                type="text"
                placeholder="Job title, keywords, or company"
                class="search-input"
              />
            </div>

            <div class="search-input-group">
              <svg
                class="search-icon"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                />
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                />
              </svg>
              <input
                v-model="location"
                type="text"
                placeholder="City or state"
                class="search-input"
              />
            </div>

            <button @click="handleSearch" class="search-btn">
              Search Jobs
            </button>
          </div>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
          <div class="stat-item">
            <div class="stat-number">{{ stats.jobs }}+</div>
            <div class="stat-label">Active Jobs</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">{{ stats.companies }}+</div>
            <div class="stat-label">Companies</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">{{ stats.candidates }}+</div>
            <div class="stat-label">Candidates</div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
const searchQuery = ref("");
const location = ref("");

const stats = {
  jobs: "10,000",
  companies: "5,000",
  candidates: "50,000",
};

const handleSearch = () => {
  navigateTo({
    path: "/jobs",
    query: {
      q: searchQuery.value,
      location: location.value,
    },
  });
};
</script>

<style scoped>
.hero-section {
  @apply bg-gradient-to-br from-blue-50 via-white to-purple-50;
}

.hero-title {
  @apply text-5xl md:text-6xl font-bold text-gray-900 mb-6;
}

.hero-subtitle {
  @apply text-xl text-gray-600 mb-12;
}

.search-container {
  @apply mb-12;
}

.search-wrapper {
  @apply bg-white rounded-2xl shadow-xl p-4 flex flex-col md:flex-row gap-4;
}

.search-input-group {
  @apply flex-1 relative;
}

.search-icon {
  @apply absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400;
}

.search-input {
  @apply w-full pl-12 pr-4 py-4 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent;
}

.search-btn {
  @apply bg-blue-600 text-white px-8 py-4 rounded-lg hover:bg-blue-700 transition-colors duration-200 font-semibold whitespace-nowrap;
}

.stats-grid {
  @apply grid grid-cols-1 md:grid-cols-3 gap-8 max-w-3xl mx-auto;
}

.stat-item {
  @apply text-center;
}

.stat-number {
  @apply text-3xl font-bold text-blue-600 mb-2;
}

.stat-label {
  @apply text-gray-600;
}
</style>
