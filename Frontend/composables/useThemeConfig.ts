import { ref, computed } from 'vue'
import type { Ref } from 'vue'

export interface ThemeComponent {
  id: number
  name: string
  slug: string
  status: boolean
}

export interface ThemeConfig {
  company: {
    id: number
    name: string
    logo: string | null
    website: string | null
    subdomain: string | null
  }
  theme: {
    id: number
    name: string
    slug: string
  }
  components: Record<string, ThemeComponent>
  cached_at: string
}

export interface ThemeConfigResponse {
  success: boolean
  message: string
  data: ThemeConfig | null
}

const themeConfig: Ref<ThemeConfig | null> = ref(null)
const loading = ref(false)
const error = ref<string | null>(null)

export const useThemeConfig = () => {
  const config = useRuntimeConfig()
  
  /**
   * Fetch theme configuration from API
   */
  const fetchThemeConfig = async (hostname?: string): Promise<ThemeConfig | null> => {
    loading.value = true
    error.value = null
    
    try {
      // Get hostname from window if not provided (client-side only)
      const currentHostname = hostname || (process.client ? window.location.hostname : 'localhost')
      
      const response = await $fetch<ThemeConfigResponse>(
        `${config.public.apiUrl}/api/frontend/theme-config`,
        {
          method: 'POST',
          body: {
            hostname: currentHostname
          }
        }
      )
      
      if (response.success && response.data) {
        themeConfig.value = response.data
        return response.data
      } else {
        error.value = response.message || 'Failed to load theme configuration'
        return null
      }
    } catch (err: any) {
      error.value = err.message || 'Error fetching theme configuration'
      console.error('Theme config error:', err)
      return null
    } finally {
      loading.value = false
    }
  }

  /**
   * Clear theme cache on the server
   */
  const clearThemeCache = async (hostname?: string): Promise<boolean> => {
    try {
      const currentHostname = hostname || (process.client ? window.location.hostname : 'localhost')
      
      const response = await $fetch<{ success: boolean }>(
        `${config.public.apiUrl}/api/frontend/theme-config/clear-cache`,
        {
          method: 'POST',
          body: {
            hostname: currentHostname
          }
        }
      )
      
      if (response.success) {
        // Refetch after clearing cache
        await fetchThemeConfig(hostname)
      }
      
      return response.success
    } catch (err) {
      console.error('Error clearing theme cache:', err)
      return false
    }
  }

  /**
   * Check if a component is enabled for the current theme
   */
  const hasComponent = (componentSlug: string): boolean => {
    if (!themeConfig.value) return false
    return componentSlug in themeConfig.value.components
  }

  /**
   * Get component by slug
   */
  const getComponent = (componentSlug: string): ThemeComponent | null => {
    if (!themeConfig.value) return null
    return themeConfig.value.components[componentSlug] || null
  }

  /**
   * Get theme slug
   */
  const themeSlug = computed(() => themeConfig.value?.theme.slug || null)

  /**
   * Get company info
   */
  const company = computed(() => themeConfig.value?.company || null)

  /**
   * Get all enabled components
   */
  const enabledComponents = computed(() => {
    if (!themeConfig.value) return []
    return Object.values(themeConfig.value.components)
  })

  return {
    themeConfig,
    loading,
    error,
    fetchThemeConfig,
    clearThemeCache,
    hasComponent,
    getComponent,
    themeSlug,
    company,
    enabledComponents
  }
}
