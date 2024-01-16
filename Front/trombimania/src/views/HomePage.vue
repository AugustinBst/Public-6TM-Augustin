User
<!-- Navbar.vue -->
<template>
  <nav class="bg-gray-800 p-4 flex items-center justify-between">
    <!-- Logo à gauche (avec une taille plus grande sur les tablettes et plus) -->
    <img src="../assets/logo.png" alt="Logo" class="h-12 lg:h-16 w-auto mr-2">

    <!-- Titre au milieu -->
    <h1 class="text-white lg:text-4xl md:text-3xl text-2xl font-semibold ">Trombimania</h1>

    <!-- Menu hamburger pour les tailles d'écran plus petites -->
    <button @click="toggleMenu" class=" lg:hidden text-white focus:outline-none">
      <svg class="h-6 w-6" fill="none" stroke="currentColor"
           xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16m-7 6h7"></path>
      </svg>
    </button>

<!-- Liens à droite (affichés pour les tailles d'écran plus grandes) -->
    <div class="hidden lg:flex items-center space-x-4">
      <router-link to="/" class="text-white hover:text-gray-300 text-lg">Accueil</router-link>
      <router-link to="/page1" class="text-white hover:text-gray-300 text-lg">Page 1</router-link>
      <router-link to="/page2" class="text-white hover:text-gray-300 text-lg">Page 2</router-link>
    </div>


    <!-- Menu hamburger pour les tailles d'écran plus petites -->
    <div v-if="showMenu" class="lg:hidden absolute top-0 left-0 right-0 bg-gray-800 p-4 flex flex-col items-center">
      <button @click="toggleMenu" class="lg:hidden text-white focus:outline-none ml-auto">
      <svg class="h-6 w-6" fill="none" stroke="currentColor"
         xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16m-7 6h7"></path>
      </svg>
      </button>
      <router-link to="/" class="text-white hover:text-gray-300 mb-2">Accueil</router-link>
      <router-link to="/page1" class="text-white hover:text-gray-300 mb-2">Trombinoscope</router-link>
      <router-link to="/page2" class="text-white hover:text-gray-300 mb-2">Admin</router-link>
    </div>
  </nav>
</template>


<script>
export default {
  name: 'NavBar',
  data() {
    return {
      showMenu: false,
    };
  },
  methods: {
    toggleMenu() {
      this.showMenu = !this.showMenu;
    },
  },
};
</script>
