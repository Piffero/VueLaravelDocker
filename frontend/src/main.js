import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

/* Font Awesome icon */
import "../node_modules/@fortawesome/fontawesome-free/css/all.css";

/* Bootstrap CSS, JS */
import "../node_modules/bootstrap/dist/css/bootstrap.css";
import "../node_modules/bootstrap/dist/js/bootstrap.bundle";

/* Main css Style */
import "./assets/css/styles.css";

createApp(App).use(router).mount('#app')
