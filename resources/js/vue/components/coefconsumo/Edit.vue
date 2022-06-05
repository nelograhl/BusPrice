<template>
    <div class="container">
        <div class="row card">
            <div class="col-12 card-header">
                <h1>Editar Tramo</h1>
            </div>
            <div class="col-12 card-body">
                <form @submit.prevent="actualizar">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="descrpicion" class="form-label">
                                    Coef. de Combustible
                                </label>
                                <input type="number" step="0.01" v-model="registro.combustible" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="descrpicion" class="form-label">
                                    Coef. de Lubricantes
                                </label>
                                <input type="number" step="0.01" v-model="registro.lubricante" class="form-control">
                            </div>       
                            <div class="form-group">
                                <label for="descrpicion" class="form-label">
                                    Coef. de Neumaticos
                                </label>
                                <input type="number" step="0.01" v-model="registro.neumaticos" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="descrpicion" class="form-label">
                                    Coef. de Repuestos
                                </label>
                                <input type="number " step="0.01" v-model="registro.repuestos" class="form-control">
                            </div>      
                            <div class="form-group">
                                <label for="descrpicion" class="form-label">
                                    Coef. de Depreciacion de Vehiculo
                                </label>
                                <input type="number" step="0.01" v-model="registro.depreciacionvehiculo" class="form-control">
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <input type="submit" class="btn btn-outline-success text-center" value="Actualizar">
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
        name: "Edit",
        data(){
            return {
               registro: {
                    combustible: "",
                    lubricante: "",
                    neumaticos: "",
                    repuestos: "",
                    depreciacionvehiculo: ""
                }
            }
        },
        mounted(){
            this.load();
        },
        methods: {
            async load(){
                await this.axios.get(`/api/coeficientes/${this.$route.params.id}`)
                    .then(response => {
                        const {combustible, lubricante, neumaticos, repuestos, depreciacionvehiculo} = response.data;
                        this.registro.combustible = combustible;
                        this.registro.lubricante = lubricante;
                        this.registro.neumaticos = neumaticos;
                        this.registro.repuestos = repuestos;
                        this.registro.depreciacionvehiculo = depreciacionvehiculo;
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            },
            async actualizar(){
                await this.axios.put(`/api/coeficientes/${this.$route.params.id}`, this.registro)
                    .then(response => {
                        this.$router.push({name:"coeficientes"})
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            }
        }
    }
</script>