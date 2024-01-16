<!-- App.vue -->
<template>
  <div>
    <h1>Vue Frontend</h1>
    <button @click="fetchAndDisplayData">Fetch Data</button>
    <modal v-if="showModal" @close="showModal = false">
      <h2>Data from API</h2>
      <p>{{ apiData.message }}</p>
      <p>Timestamp: {{ apiData.timestamp }}</p>
    </modal>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      showModal: false,
      apiData: {}
    };
  },
  methods: {
    async fetchAndDisplayData() {
      try {
        // Make the API call
        const response = await axios.get('http://127.0.0.1:8000/my-route');
        this.apiData = response.data;

        // Show the modal
        this.showModal = true;
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    }
  }
};
</script>

<style>
/* Add your styles here if needed */
</style>
