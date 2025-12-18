<template>
  <footer class="jobstock-footer">
    <div class="container mx-auto px-4 py-12">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Company Info -->
        <div class="col-span-1">
          <div class="mb-4">
            <img
              v-if="company?.logo"
              :src="company.logo"
              :alt="company.name"
              class="h-10 w-auto mb-4"
            />
            <h3 v-else class="text-xl font-bold text-white">
              {{ company?.name || "JobStock" }}
            </h3>
          </div>
          <p class="text-gray-300 text-sm">
            Your trusted job portal for finding the perfect career opportunity.
          </p>
        </div>

        <!-- Quick Links -->
        <div>
          <h4 class="text-white font-semibold mb-4">Quick Links</h4>
          <ul class="space-y-2">
            <li><NuxtLink to="/" class="footer-link">Home</NuxtLink></li>
            <li v-if="hasComponent('jobs-listing')">
              <NuxtLink to="/jobs" class="footer-link">Browse Jobs</NuxtLink>
            </li>
            <li>
              <NuxtLink to="/about" class="footer-link">About Us</NuxtLink>
            </li>
            <li>
              <NuxtLink to="/contact" class="footer-link">Contact</NuxtLink>
            </li>
          </ul>
        </div>

        <!-- For Employers -->
        <div>
          <h4 class="text-white font-semibold mb-4">For Employers</h4>
          <ul class="space-y-2">
            <li>
              <NuxtLink to="/post-job" class="footer-link">Post a Job</NuxtLink>
            </li>
            <li>
              <NuxtLink to="/pricing" class="footer-link">Pricing</NuxtLink>
            </li>
            <li>
              <NuxtLink to="/employer-faq" class="footer-link">FAQ</NuxtLink>
            </li>
          </ul>
        </div>

        <!-- Contact Info -->
        <div>
          <h4 class="text-white font-semibold mb-4">Contact</h4>
          <ul class="space-y-2 text-gray-300 text-sm">
            <li v-if="company?.website">
              <a :href="`https://${company.website}`" class="footer-link">
                {{ company.website }}
              </a>
            </li>
            <li v-if="company?.company_email">
              <a :href="`mailto:${company.company_email}`" class="footer-link">
                {{ company.company_email }}
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Copyright -->
      <div class="border-t border-gray-700 mt-8 pt-8 text-center">
        <p class="text-gray-400 text-sm">
          © {{ currentYear }} {{ company?.name || "JobStock" }}. All rights
          reserved.
        </p>
      </div>
    </div>
  </footer>
</template>

<script setup lang="ts">
const { company, hasComponent } = useThemeConfig();
const currentYear = new Date().getFullYear();
</script>

<style scoped>
.jobstock-footer {
  @apply bg-gray-900;
}

.footer-link {
  @apply text-gray-300 hover:text-white transition-colors duration-200 text-sm;
}
</style>
