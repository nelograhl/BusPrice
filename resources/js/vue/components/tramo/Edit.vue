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
                                    Descripción del recorrido
                                </label>
                                <input type="text" v-model="registro.descripcion" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="descrpicion" class="form-label">
                                    Distancia recorrida
                                </label>
                                <input type="number" v-model="registro.recorridokm" class="form-control">
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
                    descripcion: "",
                    recorridokm: ""
                }
            }
        },
        mounted(){
            this.load();
        },
        methods: {
            async load(){
                await this.axios.get(`/api/tramos/${this.$route.params.id}`)
                    .then(response => {
                        const {descripcion, recorridokm, estado} = response.data;
                        this.registro.descripcion = descripcion;
                        this.registro.recorridokm = recorridokm;
                        this.registro.estado = estado;
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            },
            async actualizar(){
                await this.axios.put(`/api/tramos/${this.$route.params.id}`, this.registro)
                    .then(response => {
                        this.$router.push({name:"tramos"})
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            }
        }
    }
</script>