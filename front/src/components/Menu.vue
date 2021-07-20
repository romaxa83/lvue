<template>
  <nav class="bg-gray-50 border-r border-gray-200 pt-5 pb-4 flex flex-col flex-grow overflow-y-auto">
    <div class="flex-shrink-0 px-4 flex items-center">
      <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/easywire-logo-purple-600-mark-gray-900-text.svg" alt="Easywire">
    </div>
    <div class="flex-grow mt-5 flex flex-col">
      <div class="flex-1 space-y-1">

        <router-link
            to="/dashboard"
            active-class="bg-purple-50 border-purple-600 text-purple-600"
            class="border-transparent text-gray-600 hover:text-gray-900 hover:bg-gray-50 group border-l-4 py-2 px-3 flex items-center text-sm font-medium"
        >
          Dashboard
        </router-link>

        <router-link
            to="/users"
            active-class="bg-purple-50 border-purple-600 text-purple-600"
            class="border-transparent text-gray-600 hover:text-gray-900 hover:bg-gray-50 group border-l-4 py-2 px-3 flex items-center text-sm font-medium"
        >
          Users
        </router-link>

        <router-link
            to="/roles"
            active-class="bg-purple-50 border-purple-600 text-purple-600"
            class="border-transparent text-gray-600 hover:text-gray-900 hover:bg-gray-50 group border-l-4 py-2 px-3 flex items-center text-sm font-medium"
        >
          Roles
        </router-link>

        <router-link
            to="/products"
            active-class="bg-purple-50 border-purple-600 text-purple-600"
            class="border-transparent text-gray-600 hover:text-gray-900 hover:bg-gray-50 group border-l-4 py-2 px-3 flex items-center text-sm font-medium"
        >
          Products
        </router-link>



<!--        <a href="#" class="bg-purple-50 border-purple-600 text-purple-600 group border-l-4 py-2 px-3 flex items-center text-sm font-medium">-->
<!--          &lt;!&ndash; Heroicon name: outline/cog &ndash;&gt;-->
<!--&lt;!&ndash;          <svg class="text-purple-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">&ndash;&gt;-->
<!--&lt;!&ndash;            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />&ndash;&gt;-->
<!--&lt;!&ndash;            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />&ndash;&gt;-->
<!--&lt;!&ndash;          </svg>&ndash;&gt;-->
<!--          Settings-->
<!--        </a>-->
      </div>
    </div>
    <div class="flex-shrink-0 block w-full">
      <a href="#" class="group border-l-4 border-transparent py-2 px-3 flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50">
        <!-- Heroicon name: outline/question-mark-circle -->
        <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Help
      </a>

      <a href="#" class="group border-l-4 border-transparent py-2 px-3 flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50">
        <!-- Heroicon name: outline/cog -->
        <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        Logout
      </a>
    </div>
  </nav>
</template>

<script>
export default {
name: "Menu"
}
</script>

