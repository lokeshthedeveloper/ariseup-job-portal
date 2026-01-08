<template>
  <footer class="bg-gradient-to-b from-emerald-50 to-teal-50 border-t border-emerald-100 py-12">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
        <!-- Company Info -->
        <div class="col-span-1 md:col-span-2">
          <div class="flex items-center space-x-3 mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-xl flex items-center justify-center shadow-md">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
            </div>
            <h3 class="text-2xl font-bold text-emerald-700">{{ company?.name || 'Job Portal' }}</h3>
          </div>
          <p class="text-gray-600 mb-6 max-w-md leading-relaxed">
            Illuminating career paths and connecting bright talent with forward-thinking companies. Your success story begins here.
          </p>
          <div class="flex space-x-3">
            <a href="#" class="w-11 h-11 bg-white rounded-xl flex items-center justify-center text-emerald-600 hover:bg-emerald-500 hover:text-white transition-all duration-300 shadow-sm hover:shadow-md transform hover:scale-110">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
              </svg>
            </a>
            <a href="#" class="w-11 h-11 bg-white rounded-xl flex items-center justify-center text-emerald-600 hover:bg-emerald-500 hover:text-white transition-all duration-300 shadow-sm hover:shadow-md transform hover:scale-110">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
              </svg>
            </a>
            <a href="#" class="w-11 h-11 bg-white rounded-xl flex items-center justify-center text-emerald-600 hover:bg-emerald-500 hover:text-white transition-all duration-300 shadow-sm hover:shadow-md transform hover:scale-110">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
              </svg>
            </a>
            <a href="#" class="w-11 h-11 bg-white rounded-xl flex items-center justify-center text-emerald-600 hover:bg-emerald-500 hover:text-white transition-all duration-300 shadow-sm hover:shadow-md transform hover:scale-110">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
              </svg>
            </a>
          </div>
        </div>

        <!-- Quick Links -->
        <div>
          <h4 class="text-lg font-semibold text-emerald-700 mb-4 flex items-center">
            <span class="w-1.5 h-6 bg-gradient-to-b from-emerald-400 to-teal-500 mr-2 rounded-full"></span>
            Quick Links
          </h4>
          <ul class="space-y-2.5">
            <li><NuxtLink to="/jobs" class="text-gray-600 hover:text-emerald-600 transition-colors duration-200 flex items-center group">
              <svg class="w-4 h-4 mr-2 text-emerald-400 opacity-0 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
              Browse Jobs
            </NuxtLink></li>
            <li><NuxtLink to="/companies" class="text-gray-600 hover:text-emerald-600 transition-colors duration-200 flex items-center group">
              <svg class="w-4 h-4 mr-2 text-emerald-400 opacity-0 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
              Companies
            </NuxtLink></li>
            <li><NuxtLink to="/about" class="text-gray-600 hover:text-emerald-600 transition-colors duration-200 flex items-center group">
              <svg class="w-4 h-4 mr-2 text-emerald-400 opacity-0 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
              About Us
            </NuxtLink></li>
            <li><NuxtLink to="/contact" class="text-gray-600 hover:text-emerald-600 transition-colors duration-200 flex items-center group">
              <svg class="w-4 h-4 mr-2 text-emerald-400 opacity-0 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
              Contact
            </NuxtLink></li>
          </ul>
        </div>

        <!-- For Employers -->
        <div>
          <h4 class="text-lg font-semibold text-emerald-700 mb-4 flex items-center">
            <span class="w-1.5 h-6 bg-gradient-to-b from-emerald-400 to-teal-500 mr-2 rounded-full"></span>
            For Employers
          </h4>
          <ul class="space-y-2.5">
            <li><NuxtLink to="/post-job" class="text-gray-600 hover:text-emerald-600 transition-colors duration-200 flex items-center group">
              <svg class="w-4 h-4 mr-2 text-emerald-400 opacity-0 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
              Post a Job
            </NuxtLink></li>
            <li><NuxtLink to="/pricing" class="text-gray-600 hover:text-emerald-600 transition-colors duration-200 flex items-center group">
              <svg class="w-4 h-4 mr-2 text-emerald-400 opacity-0 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
              Pricing
            </NuxtLink></li>
            <li><NuxtLink to="/resources" class="text-gray-600 hover:text-emerald-600 transition-colors duration-200 flex items-center group">
              <svg class="w-4 h-4 mr-2 text-emerald-400 opacity-0 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
              Resources
            </NuxtLink></li>
            <li><NuxtLink to="/support" class="text-gray-600 hover:text-emerald-600 transition-colors duration-200 flex items-center group">
              <svg class="w-4 h-4 mr-2 text-emerald-400 opacity-0 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
              Support
            </NuxtLink></li>
          </ul>
        </div>
      </div>

      <!-- Bottom Bar -->
      <div class="pt-8 border-t border-emerald-200 flex flex-col md:flex-row justify-between items-center">
        <p class="text-gray-600 text-sm">
          © {{ new Date().getFullYear() }} {{ company?.name || 'Job Portal' }}. All rights reserved.
        </p>
        <div class="flex space-x-6 mt-4 md:mt-0">
          <NuxtLink to="/privacy" class="text-gray-600 hover:text-emerald-600 text-sm transition">Privacy Policy</NuxtLink>
          <NuxtLink to="/terms" class="text-gray-600 hover:text-emerald-600 text-sm transition">Terms of Service</NuxtLink>
          <NuxtLink to="/cookies" class="text-gray-600 hover:text-emerald-600 text-sm transition">Cookie Policy</NuxtLink>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup lang="ts">
const { company } = useThemeConfig();
</script>
