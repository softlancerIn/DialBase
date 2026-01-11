import './bootstrap';
import { createApp } from 'vue';
import Scraper from './components/Scraper.vue';

const app = createApp({});
app.component('scraper-component', Scraper);
app.mount('#app');
