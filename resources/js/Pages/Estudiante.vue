
<script setup>
import { onMounted, ref } from 'vue';
import api from '../plugins/axios';


const estudiantes = ref([]);
const cargando = ref(false);
const error = ref(null);

// vamos a consultar los estudiantes
const obtenerEstudiantes = async () => {

    cargando.value = true; // lo vamos a usar solo para que se nos muestre una barra de carga para los estudiantes
    error.value = null;

    try {

        const respuesta = await api.get('/students');//esta es la ruta que nosostros hicimos en api.php
        estudiantes.value = respuesta.data;

    } catch (e) {

        error.value = 'No fue posible cargar los estudiantes.';

        console.error(e);

    } finally {

        cargando.value = false;

    }
};


onMounted(() => {
    obtenerEstudiantes();
});
</script>

<template>

    <v-container>

        <v-card>

            <v-card-title>
                Listado de estudiantes
            </v-card-title>

            <v-card-text>

                <v-alert
                    v-if="error"
                    type="error"
                    class="mb-4"
                >
                    {{ error }}
                </v-alert>

                <v-progress-linear
                    v-if="cargando"
                    indeterminate
                />

                <v-table v-else>

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                    </tr>
                    </thead>

                    <tbody>

                    <tr
                        v-for="estudiante in estudiantes"
                        :key="estudiante.id"
                    >
                        <td>{{ estudiante.id }}</td>
                        <td>{{ estudiante.name }}</td>
                        <td>{{ estudiante.email }}</td>
                    </tr>

                    </tbody>

                </v-table>

            </v-card-text>

        </v-card>

    </v-container>

</template>
