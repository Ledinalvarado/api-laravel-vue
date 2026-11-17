
<template>
    <v-app>
        <v-app-bar color="primary">
            <v-app-bar-title>
                Proyecto de clase
            </v-app-bar-title>
        </v-app-bar>

        <v-main>
            <v-container class="mt-5">

                <h1 class="text-h4 mb-4">
                    Bienvenidos mis mejores elementos
                </h1>

                <v-card max-width="500" class="pa-4">

                    <v-card-title>
                        Configuración exitosa
                    </v-card-title>

                    <v-card-text>
                        Vue 3,  Vuetify
                        están funcionando correctamente.
                    </v-card-text>

                    <v-card-actions>
                        <v-btn color="success">
                            <v-icon start>mdi-check</v-icon>
                            Correcto
                        </v-btn>
                    </v-card-actions>

                </v-card>

            </v-container>
        </v-main>
    </v-app>
</template>
