// This plugin is now simplified - the actual loading is handled in app.vue
export default defineNuxtPlugin(() => {
  // Plugin runs but doesn't block
  // The app.vue component will handle the theme loading
})
