<template>
  <footer class="professional-footer">
    <!-- Main Footer -->
    <div class="footer-main">
      <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          <!-- Company Info -->
          <div>
            <div class="mb-6">
              <img
                v-if="company?.logo"
                :src="company.logo"
                :alt="company.name"
                class="h-12 w-auto mb-4"
              />
              <h3 v-else class="text-2xl font-bold text-gray-900">
                {{ company?.name || "Professional" }}
              </h3>
            </div>
            <p class="text-gray-600 text-sm mb-4">
              Building careers, connecting talent with opportunity.
            </p>
            <div
              v-if="company?.website || company?.company_email"
              class="space-y-2 text-sm"
            >
              <div
                v-if="company.website"
                class="flex items-center text-gray-600"
              >
                <svg
                  class="w-4 h-4 mr-2"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"
                  />
                </svg>
                <a
                  :href="`https://${company.website}`"
                  class="hover:text-indigo-600"
                >
                  {{ company.website }}
                </a>
              </div>
              <div
                v-if="company.company_email"
                class="flex items-center text-gray-600"
              >
                <svg
                  class="w-4 h-4 mr-2"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                  />
                </svg>
                <a
                  :href="`mailto:${company.company_email}`"
                  class="hover:text-indigo-600"
                >
                  {{ company.company_email }}
                </a>
              </div>
            </div>
          </div>

          <!-- For Job Seekers -->
          <div>
            <h4 class="footer-heading">For Job Seekers</h4>
            <ul class="footer-links">
              <li><NuxtLink to="/jobs">Browse Jobs</NuxtLink></li>
              <li><NuxtLink to="/companies">Browse Companies</NuxtLink></li>
              <li><NuxtLink to="/career-advice">Career Advice</NuxtLink></li>
              <li><NuxtLink to="/resume-builder">Resume Builder</NuxtLink></li>
              <li><NuxtLink to="/salary-guide">Salary Guide</NuxtLink></li>
            </ul>
          </div>

          <!-- For Employers -->
          <div>
            <h4 class="footer-heading">For Employers</h4>
            <ul class="footer-links">
              <li><NuxtLink to="/post-job">Post a Job</NuxtLink></li>
              <li><NuxtLink to="/pricing">Pricing Plans</NuxtLink></li>
              <li><NuxtLink to="/employer-resources">Resources</NuxtLink></li>
              <li>
                <NuxtLink to="/recruit-solutions"
                  >Recruitment Solutions</NuxtLink
                >
              </li>
              <li><NuxtLink to="/advertise">Advertise With Us</NuxtLink></li>
            </ul>
          </div>

          <!-- Company -->
          <div>
            <h4 class="footer-heading">Company</h4>
            <ul class="footer-links">
              <li><NuxtLink to="/about">About Us</NuxtLink></li>
              <li><NuxtLink to="/contact">Contact Us</NuxtLink></li>
              <li v-if="hasComponent('blog')">
                <NuxtLink to="/blog">Blog</NuxtLink>
              </li>
              <li><NuxtLink to="/privacy">Privacy Policy</NuxtLink></li>
              <li><NuxtLink to="/terms">Terms of Service</NuxtLink></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Bar -->
    <div class="footer-bottom">
      <div class="container mx-auto px-4 py-6">
        <div
          class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0"
        >
          <p class="text-sm text-gray-500">
            © {{ currentYear }}
            {{ company?.name || "Professional Job Portal" }}. All rights
            reserved.
          </p>
          <div class="flex space-x-6">
            <a href="#" class="social-link" aria-label="Facebook">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
                />
              </svg>
            </a>
            <a href="#" class="social-link" aria-label="Twitter">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"
                />
              </svg>
            </a>
            <a href="#" class="social-link" aria-label="LinkedIn">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"
                />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup lang="ts">
const { company, hasComponent } = useThemeConfig();
const currentYear = new Date().getFullYear();
</script>

<style scoped>
.professional-footer {
  @apply bg-white border-t border-gray-200;
}

.footer-main {
  @apply bg-gray-50;
}

.footer-heading {
  @apply text-gray-900 font-semibold text-lg mb-4;
}

.footer-links {
  @apply space-y-3;
}

.footer-links a {
  @apply text-gray-600 hover:text-indigo-600 text-sm transition-colors duration-200 block;
}

.footer-bottom {
  @apply bg-white border-t border-gray-100;
}

.social-link {
  @apply text-gray-400 hover:text-indigo-600 transition-colors duration-200;
}
</style>
