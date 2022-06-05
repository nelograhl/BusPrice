<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Nuevo Coeficiente</h1>
            </div>
            <div class="card-body">
                <form @submit.prevent="guardar">
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
                        <div class="col-12 text-center">
                            <input type="submit" class="btn btn-outline-success text-center" value="Guardar">
                        </div>                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        name: "registro",
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
            //this.cargar();
        },
        methods: {
            async guardar(){
                await this.axios.post('/api/coeficientes', this.registro)
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