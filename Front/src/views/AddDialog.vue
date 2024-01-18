<template>
  <div v-show="dialog" class="fixed inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-gray-50 px-4 py-5 sm:p-6">
          <h3 class="text-lg leading-6 font-medium text-gray-900">Create your character!</h3>
          <form>
            <div class="mb-4">
              <input v-model="nom" type="text" class="w-full p-2 border rounded" placeholder="Nom">
            </div>
            <div class="mb-4">
              <input v-model="prenom" type="text" class="w-full p-2 border rounded" placeholder="Prenom">
            </div>
            <div class="mb-4">
              <input v-model="poste" type="text" class="w-full p-2 border rounded" placeholder="Poste">
            </div>
            <div class="mb-4">
              <input v-model="equipe" type="text" class="w-full p-2 border rounded" placeholder="Equipe">
            </div>
            <div class="mb-4">
              <input v-model="agence" type="text" class="w-full p-2 border rounded" placeholder="Agence">
            </div>
            <div class="mb-4">
              <input v-model="photo_pro" type="text" class="w-full p-2 border rounded" placeholder="Photo Pro (laisser vide pour la photo par défaut)">
            </div>
            <div class="mb-4">
              <input v-model="photo_fun" type="text" class="w-full p-2 border rounded" placeholder="Photo Fun (laisser vide pour la photo par défaut)">
            </div>
          </form>
        </div>

        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button @click="save" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300 sm:ml-3 sm:w-auto sm:text-sm">
            Save
          </button>
          <button @click="close" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring focus:border-blue-300 sm:mt-0 sm:w-auto sm:text-sm">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      dialog: false,
      nom: '',
      prenom: '',
      poste: '',
      equipe: '',
      agence: '',
      photo_pro: '',
      photo_fun: '',
    };
  },
  computed: {
    full_name() {
      return this.nom + ' ' + this.prenom;
    },
  },
  methods: {
    save() {
      this.$emit('save', {
        nom: this.nom,
        prenom: this.prenom,
        poste: this.poste,
        equipe: this.equipe,
        agence: this.agence,
        photo_pro: this.photo_pro,
        photo_fun: this.photo_fun,
        nom_prenom: this.full_name,
      });
      this.close();
    },
    close() {
      this.dialog = false;
    },
  },
};
</script>
