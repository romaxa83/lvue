<template>
  <nav class="flex space-x-10">
    <div>
      <button type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
        <span>Solutions</span>
        <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>
    <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
      Pricing
    </a>
    <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
      Docs
    </a>
    <div>
      <router-view />
    </div>
  </nav>
</template>

<script>
export default {
name: "Nav"
}
</script>

<style scoped>

</style>