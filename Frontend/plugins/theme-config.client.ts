export default defineNuxtPlugin(async (nuxtApp) => {
  // Only run on client-side initial load
  if (process.client) {
    const { fetchThemeConfig } = useThemeConfig()
    
    // Fetch theme configuration based on current hostname
    try {
      await fetchThemeConfig()
    } catch (error) {
      console.error('Failed to load theme configuration:', error)
    }
  }
})
