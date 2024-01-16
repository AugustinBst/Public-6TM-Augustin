import { createApp } from 'vue'
import App from './App.vue'

const app = createApp(App)

app.mount('#app')

app.config.globalProperties.fetchData = function() {
    fetch('http://127.0.0.1:8000/my-route', {
        method: 'GET',
        mode: 'cors', // Add this line
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error(error));
}
