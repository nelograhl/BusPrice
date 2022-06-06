<template>
    <div class="container">
        <div class="row card">
            <div class="col-12 card-header">
                <h1>Costos de variables</h1>
            </div>
            <div class="col-12 card-body">
                <form @submit.prevent="actualizar">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="valorvehiculo" class="form-label">
                                    Valor de vehiculo
                                </label>
                                <input type="numeric" v-model="costo.valorvehiculo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="combustible" class="form-label">
                                    Precio Combustible
                                </label>
                                <input type="numeric" v-model="costo.combustible" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="neumaticos" class="form-label">
                                    Neumaticos
                                </label>
                                <input type="numeric" v-model="costo.neumaticos" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="lubricante" class="form-label">
                                    Lubricante
                                </label>
                                <input type="numeric" v-model="costo.lubricante" class="form-control">
                            </div>
                            <hr/>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <input type="submit" class="btn btn-outline-success text-center" value="Guardar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        name: "Create",
        data(){
            return {
                costo: {
                    valorvehiculo: "",
                    combustible: "",
                    neumaticos: "",
                    lubricante: ""
                }
            }
        },
        mounted(){
            this.load();
        },
        methods: {
            async load(){
                await this.axios.get('/api/costos')
                    .then(response => {
                        const { valorvehiculo , combustible , neumaticos , lubricante } = response.data;
                        this.costo.valorvehiculo = valorvehiculo;
                        this.costo.combustible = combustible;
                        this.costo.neumaticos = neumaticos;
                        this.costo.lubricante = lubricante;
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            },
            async actualizar(){
                await this.axios.put(`/api/costos/1`, this.costo)
                    .then(response => {
                        this.$router.push({name:"home"})
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            }
        }
    }
</script>