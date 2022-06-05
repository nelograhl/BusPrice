<template>
    <div class="container">
        <div class="row card">
            <div class="col-12 card-header">
                <div class="form-row" >
                    <div class="col">
                        <a  href="/registrosp" class="btn btn-info" ><i class="fas fa-angle-left"></i></a>     
                        <a> <h1 style="display:inline-block; vertical-align:middle;">Editar Registro</h1></a>                
                    </div>                                                       
                </div> 
            </div>
            <div class="col-12 card-body">
                <form @submit.prevent="actualizar">
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
        name: "Create",
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
            this.load();
        },
        methods: {
            async load(){
                await this.axios.get(`/api/registrosp/${this.$route.params.id}`)
                    .then(response => {
                        const { fecha , cantidadt , cantidadd } = response.data;
                        this.registro.fecha = fecha;
                        this.registro.cantidadt = cantidadt;
                        this.registro.cantidadd = cantidadd;
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            },
            async actualizar(){
                await this.axios.put(`/api/registrosp/${this.$route.params.id}`, this.registro)
                    .then(response => {
                        this.$router.push({name:"registrop"})
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            }
        }
    }
</script>