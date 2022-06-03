<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Nuevo Registro</h1>
            </div>
            <div class="card-body">
                <form @submit.prevent="guardar">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="fecha" class="form-label">
                                    Fecha
                                </label>
                                <input type="date" v-model="registro.fecha" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cantidadt" class="form-label">
                                    Cantidad Pasajeros (total)
                                </label>
                                <input type="numeric" v-model="registro.cantidadt" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cantidadd" class="form-label">
                                    Cantidad Pasajeros (diferenciada)
                                </label>
                                <input type="numeric" v-model="registro.cantidadd" class="form-control">
                            </div>
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
        name: "registro",
        data(){
            return {
                registro: {
                    fecha: "",
                    cantidadt: "",
                    cantidadd: ""
                }
            }
        },
        mounted(){
            //this.cargar();
        },
        methods: {
            async guardar(){
                await this.axios.post('/api/registrosp', this.registro)
                    .then(response => {
                        this.$router.push({name:"registrosp"})
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            }
        }
    }
</script>