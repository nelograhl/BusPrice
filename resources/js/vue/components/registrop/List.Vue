<template>
    <div class="container">
        <div class="row card">
            <div class="card-header">
                <h4>Registro de pasajeros</h4>
            </div>
            <div class="col-12 card-body">
                <p>
                    <router-link class="btn btn-info" :to="{ name: 'crearRegistro' }"><span
                            class="fas fa-plus-circle"></span>Nuevo</router-link>
                </p>
                <input class="form-control" onkeyup="registros.fnFilter(this.value)" />
                <table class="table table-bordered" id="tabla">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th style="width: 10%">C&oacute;digo</th>
                            <th style="width: 25%">Fecha</th>
                            <th style="width: 25%">Cantidad total</th>
                            <th style="width: 25%">Cantidad diferenciada</th>
                            <th style="text-align: center; width: 10%">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="r in registros" :key="r.id">
                            <td>
                                {{ r.id }}
                            </td>
                            <td>
                                {{ r.fecha }}
                            </td>
                            <td>
                                {{ r.cantidadt }}
                            </td>
                            <td>
                                {{ r.cantidadd }}
                            </td>
                            <td class="text-center">
                                <router-link :to="{
                                    name: 'editarRegistro',
                                    params: { id: r.id },
                                }"><span title="Modificar" class="fas fa-edit"></span></router-link>
                                &nbsp;
                                <a @click="eliminar(r.id)"><span title="Eliminar"
                                        class="fas fa-trash text-primary"></span></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 card-footer text-right"></div>
        </div>
    </div>
</template>

<script>
    export default {
    name: "registros",
    data() {
        return {
            registros: [],
            payload: {
                query: "",
                page: 1,
                pageCount: 1,
            },
        };
    },
    mounted() {
        this.cargar();
    },
    methods: {
        cargar() {
            this.axios
                .get("/api/registrosp")
                .then((response) => {
                    this.registros = response.data;
                })
                .catch((error) => {
                    this.registros = [];
                });
        },
        eliminar(id) {
            if (confirm("¿Estás seguro que quieres eliminar este registro?")) {
                this.axios
                    .delete(`/api/buses/${id}`)
                    .then((response) => {
                        this.cargar();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    },
    };
</script>
