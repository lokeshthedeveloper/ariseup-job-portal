// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2024-12-01',
  devtools: { enabled: true },
  
  // Server-side rendering configuration
  ssr: true,
  
  // Runtime config for environment variables
  runtimeConfig: {
    // Private keys (server-side only)
    dbHost: process.env.DB_HOST || 'localhost',
    dbPort: process.env.DB_PORT || '3306',
    dbDatabase: process.env.DB_DATABASE || 'job-portal',
    dbUsername: process.env.DB_USERNAME || 'root',
    dbPassword: process.env.DB_PASSWORD || 'root',
    
    // Public keys (exposed to client)
    public: {
      apiUrl: process.env.API_URL || 'http://localhost:8000',
    }
  },
  
  // Modules
  modules: [
    '@nuxtjs/tailwindcss',
    '@pinia/nuxt',
  ],
  
  // CSS
  css: [
    '~/assets/css/main.css',
  ],
  
  // App configuration
  app: {
    head: {
      title: 'Job Portal',
      meta: [
        { charset: 'utf-8' },
        { name: 'viewport', content: 'width=device-width, initial-scale=1' },
        { name: 'description', content: 'Multi-tenant Job Portal with White-label Support' }
      ],
      link: [
        { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
      ]
    }
  },
  
  // Development server configuration
  devServer: {
    host: '0.0.0.0',
    port: 3000
  },
  
  // Vite configuration for multi-tenant virtual hosts
  vite: {
    server: {
      hmr: {
        clientPort: 3000,
      },
      allowedHosts: [
        'localhost',
        '127.0.0.1',
        'abc.local',
        'xyz.local',
        'pqr.local',
        '.local', // Allow all .local domains
      ],
    },
  },
})
