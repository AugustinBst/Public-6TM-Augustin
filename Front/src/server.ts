import axios from 'axios';

const express = require('express')
const app = express()
const apiUrl = 'http://localhost:8000';

// main.js

axios.defaults.baseURL = 'http://localhost:8000';

// Exemple de requête GET vers le backend Symfony
async function fetchDataFromSymfony() {
  try {
    const response = await axios.get(`${apiUrl}/users`);
    console.log("VOILA JUL" + response.data)
    return response.data;
  } catch (error) {
    console.error('Erreur lors de la récupération des données depuis Symfony:', error);
    throw error;
  }
}

// Exemple de requête POST vers le backend Symfony
async function postDataToSymfony(data: any) {
  try {
    const response = await axios.post(`${apiUrl}/votre-endpoint`, data);
    return response.data;
  } catch (error) {
    console.error('Erreur lors de l\'envoi des données à Symfony:', error);
    throw error;
  }
}

export { fetchDataFromSymfony, postDataToSymfony };
