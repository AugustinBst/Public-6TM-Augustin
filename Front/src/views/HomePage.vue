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
      <router-link to="/admin" class="text-white hover:text-gray-300 text-lg">Admin</router-link>
      <router-link to="/admin" class="text-white hover:text-gray-300 text-lg">Contact</router-link>
    </div>


    <div v-if="showMenu" class="lg:hidden absolute top-0 left-0 right-0 bg-gray-800 p-4 flex flex-col items-center">
      <button @click="toggleMenu" class="lg:hidden text-white focus:outline-none ml-auto">
      <svg class="h-6 w-6" fill="none" stroke="currentColor"
         xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16m-7 6h7"></path>
      </svg>
      </button>
      <router-link to="/" class="text-white hover:text-gray-300 mb-2">Accueil</router-link>
      <router-link to="/admin" class="text-white hover:text-gray-300 mb-2">Admin</router-link>
      <router-link to="/page2" class="text-white hover:text-gray-300 mb-2">Contact</router-link>
    </div>
  </nav>



  <div class="flex justify-center items-center">
  <div class="p-6  grid  grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    <div v-for="item in items" :key="item.id" class="bg-green-200 p-7 shadow-md rounded-md">
      <img :src="item.hovered ? (item.photo_fun || '../assets/anonymous.png') : (item.photo_pro)"
        @mouseover="handleMouseOver(item)"
        @mouseleave="handleMouseLeave(item)" alt="Pas de photos" class="bg-white w-65 h-45 object-cover mb-2 rounded-md">
        <h2 class="text-lg font-semibold">{{item.prenom + " " + item.nom}}</h2>
        <p>{{"Infos: " + item.poste + "  " + item.agence + " Equipe: " + item.equipe}}</p>
    </div>
  </div>
  </div>
  </template>
<script>
import axios from 'axios';
export default {

  mounted() {
    axios.get("http://localhost:8000/")
    .then(response => {
        this.items = response.data;
      })
  },
  name: 'NavBar',
  data() {
    return {

      isButtonClicked: false,
      items: [],
      showMenu: false,
    };
  },
  methods: {
    handleButtonClick(button) {
      Object.keys(this.buttonStates).forEach(key => {
        this.buttonStates[key] = false;
      });
      this.buttonStates[button] = true;
      setTimeout(() => {
        this.buttonStates[button] = false;
      }, 150);
    },
    toggleMenu() {
      this.showMenu = !this.showMenu;
    },
    handleMouseOver(item) {
      item.hovered = true;
    },
    handleMouseLeave(item) {
      item.hovered = false;
    },
    ajouter() {
    },
    supprimer() {
    },
    modifier() {

    },
  },
};
</script>
