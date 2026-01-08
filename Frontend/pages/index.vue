<template>
  <NuxtLayout name="theme">
    <div>
      <!-- Hero Section -->
      <section class="bg-gradient-to-br from-blue-50 to-purple-50 py-20">
        <div class="container-custom">
          <div class="text-center max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">
              Find Your Dream Job Today
            </h1>
            <p class="text-xl text-gray-600 mb-8">
              Connect with top employers and discover opportunities that match
              your skills and aspirations
            </p>

            <!-- Search Bar -->
            <div class="bg-white rounded-2xl shadow-2xl p-6 max-w-3xl mx-auto">
              <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <input
                  type="text"
                  placeholder="Job title or keyword"
                  class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none"
                />
                <input
                  type="text"
                  placeholder="Location"
                  class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none"
                />
                <button class="btn-primary w-full">Search Jobs</button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Features Section -->
      <section class="py-16">
        <div class="container-custom">
          <h2 class="text-4xl font-bold text-center text-gray-900 mb-12">
            Why Choose Us?
          </h2>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="card text-center">
              <div
                class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4"
              >
                <svg
                  class="w-8 h-8 text-blue-600"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                  />
                </svg>
              </div>
              <h3 class="text-xl font-semibold text-gray-900 mb-3">
                Thousands of Jobs
              </h3>
              <p class="text-gray-600">
                Access a vast database of job opportunities from top companies
                worldwide
              </p>
            </div>

            <div class="card text-center">
              <div
                class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4"
              >
                <svg
                  class="w-8 h-8 text-purple-600"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                  />
                </svg>
              </div>
              <h3 class="text-xl font-semibold text-gray-900 mb-3">
                Easy Application
              </h3>
              <p class="text-gray-600">
                Apply to multiple jobs with just one click using your profile
              </p>
            </div>

            <div class="card text-center">
              <div
                class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4"
              >
                <svg
                  class="w-8 h-8 text-green-600"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                  />
                </svg>
              </div>
              <h3 class="text-xl font-semibold text-gray-900 mb-3">
                Verified Companies
              </h3>
              <p class="text-gray-600">
                All companies on our platform are verified and trusted employers
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- CTA Section -->
      <section class="bg-gradient-to-r from-blue-600 to-purple-600 py-16">
        <div class="container-custom text-center">
          <h2 class="text-4xl font-bold text-white mb-6">
            Ready to Get Started?
          </h2>
          <p class="text-xl text-blue-100 mb-8">
            Join thousands of job seekers and find your perfect match today
          </p>
          <div class="flex justify-center space-x-4">
            <NuxtLink
              to="/register"
              class="bg-white text-blue-600 font-semibold py-3 px-8 rounded-lg hover:bg-gray-100 transition transform hover:scale-105"
            >
              Create Free Account
            </NuxtLink>
            <NuxtLink
              to="/jobs"
              class="bg-transparent border-2 border-white text-white font-semibold py-3 px-8 rounded-lg hover:bg-white hover:text-blue-600 transition transform hover:scale-105"
            >
              Browse Jobs
            </NuxtLink>
          </div>
        </div>
      </section>
    </div>
  </NuxtLayout>
</template>

<script setup lang="ts">
// Set page meta
definePageMeta({
  layout: false,
});

useHead({
  title: "Home",
  meta: [
    {
      name: "description",
      content: "Find your dream job with our multi-tenant job portal",
    },
  ],
});
</script>
