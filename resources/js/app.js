
import '../css/app.css';

import { createApp, h } from 'vue';
import { RouterView } from 'vue-router';

import router from './router';
import vuetify from './plugins/vuetify';

const app = createApp({
    render: () => h(RouterView),
});

app.use(vuetify);
app.use(router);

app.mount('#app');






//
// import '../css/app.css';
//
// import { createApp } from 'vue';
//
// import vuetify from './plugins/vuetify';
//
// import PruebaVuetify from './Pages/Inicio.vue';
//
// createApp(PruebaVuetify)
//     .use(vuetify)
//     .mount('#app');
//
