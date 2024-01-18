<template>
  <div>
    <div v-if="dialog" class="fixed inset-0 overflow-y-auto">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
          <div class="bg-gray-50 px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Delete your character!</h3>
            <form>
              <div class="mb-4">
                <input v-model="nom" type="text" class="w-full p-2 border rounded" placeholder="Nom">
              </div>
              <div class="mb-4">
                <input v-model="prenom" type="text" class="w-full p-2 border rounded" placeholder="Prenom">
              </div>
            </form>
          </div>

          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button @click="openConfirmationDialog" type="button" class="w-full inline-flex justify-center rounded-md border border-red-500 shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring focus:border-red-300 sm:ml-3 sm:w-auto sm:text-sm">
              Delete
            </button>
            <button @click="close" type="button" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring focus:border-blue-300 sm:ml-3 sm:w-auto sm:text-sm">
              Cancel
            </button>
          </div>
        </div>
      </div>
    </div>

    <div v-if="confirmationDialog" class="fixed inset-0 overflow-y-auto">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
          <div class="bg-gray-50 px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Confirmer la suppression</h3>
            <p class="text-gray-700">êtes vour sur de vouloir supprimer {{ nom_prenom }}?</p>
          </div>

          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button @click="confirmDelete" type="button" class="w-full inline-flex justify-center rounded-md border border-red-500 shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring focus:border-red-300 sm:ml-3 sm:w-auto sm:text-sm">
              Delete
            </button>
            <button @click="closeConfirmationDialog" type="button" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring focus:border-blue-300 sm:ml-3 sm:w-auto sm:text-sm">
              Cancel
            </button>
          </div>
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
      confirmationDialog: false,
      nom: '',
      prenom: '',
      nom_prenom: '',
    };
  },
  methods: {
    openConfirmationDialog() {
      this.nom_prenom = this.nom + ' ' + this.prenom;
      this.confirmationDialog = true;
    },
    confirmDelete() {
      this.$emit('save', {
        nom_prenom: this.nom_prenom,
      });
      this.close();
      this.closeConfirmationDialog();
    },
    closeConfirmationDialog() {
      this.confirmationDialog = false;
    },
    close() {
      this.dialog = false;
    },
  },
};
</script>
