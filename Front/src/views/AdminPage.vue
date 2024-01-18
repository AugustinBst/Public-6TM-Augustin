<template>
  <nav class="bg-gray-800 p-4 flex items-center justify-between">
    <img src="../assets/logo.png" alt="Logo" class="h-12 lg:h-16 w-auto mr-2">
    <h1 class="text-white lg:text-4xl md:text-3xl text-2xl font-semibold ">Trombimania</h1>

    <button @click="toggleMenu" class=" lg:hidden text-white focus:outline-none">
      <svg class="h-6 w-6" fill="none" stroke="currentColor"
           xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16m-7 6h7"></path>
      </svg>
    </button>

    <div class="hidden lg:flex items-center space-x-4">
      <router-link to="/" class="text-white hover:text-gray-300 text-lg">Accueil</router-link>
      <router-link to="/admin" class="text-white hover:text-gray-300 text-lg">Admin</router-link>
      <router-link to="/public" class="text-white hover:text-gray-300 text-lg">Contact</router-link>
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


  <div className="flex justify-center">
        <button @click="handleButtonClick('ajouter')" :class="{'bg-slate-400': buttonStates['ajouter'], 'custom-blueGrey': !buttonStates['ajouter'], 'scale-90': buttonStates['ajouter']}" class="rounded-lg p-2 m-2 font-semibold shadow-lg text-white">
          Ajouter
        </button>
        <button @click="handleButtonClick('modifier')" :class="{'bg-slate-400': buttonStates['modifier'], 'custom-blueGrey': !buttonStates['modifier'], 'scale-90': buttonStates['modifier']}" class="rounded-lg p-2 m-2 font-semibold shadow-lg text-white">
          Modifier
        </button>
        <button @click="handleButtonClick('supprimer')" :class="{'bg-slate-400': buttonStates['supprimer'], 'custom-blueGrey': !buttonStates['supprimer'], 'scale-90': buttonStates['supprimer']}" class="rounded-lg p-2 m-2 font-semibold shadow-lg text-white">
          Supprimer
        </button>
  </div>
  <div class="flex justify-center items-center">
  <div class="p-6  grid  grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <!-- Utilisez v-for pour générer les cartes -->
    <div v-for="item in items" :key="item.id" class="bg-green-200 p-7 shadow-md rounded-md">
      <!-- Image de la carte -->
      <img :src="item.hovered ? item.imageUrl2 : item.imageUrl"
        @mouseover="handleMouseOver(item)"
        @mouseleave="handleMouseLeave(item)" alt="Image de la carte" class="bg-white w-full h-32 object-cover mb-2 rounded-md">
      <h2 class="text-lg font-semibold">{{item.title}}</h2>
      <p>{{item.description}}</p>
    </div>
  </div>
  </div>



  </template>



<script>

export default {

  name: 'NavBar',
  data() {
    return {
    buttonStates: {
        ajouter: false,
        modifier: false,
        supprimer: false
      },
      isButtonClicked: false,
      items: [
        {
          id: 1,
          title: "Item 1",
          description: "Description de l'item 1",
          imageUrl: require("../assets/logo.png"),
          imageUrl2: require("../assets/car.png"),
        },
        {
          id: 2,
          title: "Item 2",
          description: "Description de l'item 2",
          imageUrl: require("../assets/logo.png"),
          imageUrl2: require("../assets/car.png"),
        },
        {
          id: 3,
          title: "Item 3",
          description: "Description de l'item 3",
          imageUrl: require("../assets/logo.png"),
          imageUrl2: require("../assets/car.png")
        },
        {
          id: 4,
          title: "Item 4",
          description: "Description de l'item 4",
          imageUrl: require("../assets/logo.png"),
          imageUrl2: require("../assets/car.png")
        },
        {
          id: 1,
          title: "Item 1",
          description: "Description de l'item 1",
          imageUrl: require("../assets/logo.png"),
          imageUrl2: require("../assets/car.png")
        },
        {
          id: 2,
          title: "Item 2",
          description: "Description de l'item 2",
          imageUrl: require("../assets/logo.png")
        },
        {
          id: 3,
          title: "Item 3",
          description: "Description de l'item 3",
          imageUrl: require("../assets/logo.png")
        },
        {
          id: 4,
          title: "Item 4",
          description: "Description de l'item 4",
          imageUrl: require("../assets/logo.png")
        },
      ],
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