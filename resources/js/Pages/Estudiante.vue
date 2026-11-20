
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
        console.log(respuesta);
        estudiantes.value = respuesta.data;

    } catch (e) {

        error.value = 'No fue posible cargar los estudiantes.';

        console.error(e);



    } finally {

        cargando.value = false;

    }
};





//para mostrar las matriculas y estudiantes
const matriculas = ref([]);
const cargandoMatriculas = ref(false);
const errorMatriculas = ref(null);


const obtenerMatriculas = async () => {

    cargandoMatriculas.value = true;
    errorMatriculas.value = null;

    try {
        const respuesta = await api.get('/enrollments');

        matriculas.value = respuesta.data;

        console.log('Matrículas:', respuesta.data);

    } catch (e) {
        errorMatriculas.value = 'No fue posible cargar las matrículas.';
        console.error(e);

    } finally {
        cargandoMatriculas.value = false;
    }
};



onMounted(() => {
    obtenerEstudiantes();
    obtenerMatriculas();
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


        <v-card>

            <v-card-title>
                Listado de matrículas
            </v-card-title>

            <v-card-text>

                <v-alert
                    v-if="errorMatriculas"
                    type="error"
                    class="mb-4"
                >
                    {{ errorMatriculas }}
                </v-alert>

                <v-progress-linear
                    v-else-if="cargandoMatriculas"
                    indeterminate
                />

                <v-table v-else-if="matriculas.length > 0">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Estudiante</th>
                        <th>Correo</th>
                        <th>Curso</th>
                        <th>Fecha de matrícula</th>
                        <th>Período</th>
                    </tr>
                    </thead>

                    <tbody>

                    <template
                        v-for="estudiante in matriculas"
                        :key="estudiante.id"
                    >
                        <tr
                            v-for="matricula in estudiante.enrollments"
                            :key="matricula.id"
                        >
                            <td>{{ matricula.id }}</td>
                            <td>
                                {{ estudiante.name }}
                            </td>
                            <td>
                                {{ estudiante.email }}
                            </td>
                            <td>
                                {{ matricula.course_name }}
                            </td>

                            <td>
                                {{ matricula.enrollment_date }}
                            </td>

                            <td>
                                {{ matricula.period }}
                            </td>
                        </tr>

                    </template>

                    </tbody>

                </v-table>

                <v-alert v-else type="info">
                    No existen matrículas registradas.
                </v-alert>

            </v-card-text>
        </v-card>

    </v-container>

</template>
