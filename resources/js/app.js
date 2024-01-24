import { createApp } from 'vue/dist/vue.esm-bundler';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap/dist/js/bootstrap.js';
import Random from './components/Random.vue';
import Favorites from './components/Favorites.vue';

const app = createApp({});
app.component('Random', Random);
app.component('Favorites', Favorites);
app.mount("#app");