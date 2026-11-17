// este archivo probablemente no lo tengan y aunque lo creen deben instalar tambien con npm install vue-router  o  npm install vue-router@4
import { createRouter, createWebHistory } from 'vue-router';

const paginas = import.meta.glob('./Pages/**/*.vue');

const rutas = Object.entries(paginas).map(([archivo, componente]) => {

    let ruta = archivo
        .replace('./Pages', '')//Pages debe coincidir con la carpeta que contiene los archivos .vue como Estudiante.vue
        .replace(/\.vue$/, '');

    ruta = ruta.replace(/\/index$/, '') || '/';

    return {
        path: ruta,
        component: componente,
    };
});

const router = createRouter({
    history: createWebHistory(),
    routes: rutas,
});

export default router;
