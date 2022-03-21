import { createApp } from 'vue';
import router from './router';
import menuFix from './utils/menu-fix';

// Import the root component App from a single-file component.
import App from './App.vue';

const app = createApp(App);

app.use(router);

// Mounting the vue app to the DOM.
app.mount('#wp-plugin-skeleton');

// Fix menu by passing the menu slug
menuFix( 'wp-skeleton' );
