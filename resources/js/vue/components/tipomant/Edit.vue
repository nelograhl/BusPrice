<template>
    <div class="container">
        <div class="row card">
            <div class="col-12 card-header">
                <h1>Editar Registro</h1>
            </div>
            <div class="col-12 card-body">
                <form @submit.prevent="actualizar">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="descrpicion" class="form-label">
                                    Descripción del mantenimiento
                                </label>
                                <input type="text" v-model="registro.descripcion" class="form-control">
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
        name: "Create",
        data(){
            return {
               registro: {
                    descripcion: ""
                }
            }
        },
        mounted(){
            this.load();
        },
        methods: {
            async load(){
                await this.axios.get(`/api/tipomantenimientos/${this.$route.params.id}`)
                    .then(response => {
                        const { descripcion} = response.data;
                        this.registro.descripcion = descripcion;
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            },
            async actualizar(){
                await this.axios.put(`/api/tipomantenimientos/${this.$route.params.id}`, this.registro)
                    .then(response => {
                        this.$router.push({name:"tipomant"})
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            }
        }
    }
</script>