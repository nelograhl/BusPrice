<template>
    <div class="container">
        <div class="row card">
            <div class="col-12 card-header">
                <div class="form-row" >
                    <div class="col">
                        <a  href="/buses" class="btn btn-info" ><i class="fas fa-angle-left"></i></a>     
                        <a> <h1 style="display:inline-block; vertical-align:middle;">Editar Omnibus</h1></a>                
                    </div>                                                       
                </div> 
            </div>
            <div class="col-12 card-body">
                <form @submit.prevent="actualizar">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="matricula" class="form-label">
                                    Matricula
                                </label>
                                <input type="text" v-model="bus.matricula" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="matricula" class="form-label">
                                    Fecha de inicio de operación
                                </label>
                                <input type="date" v-model="bus.fechaio" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="vidautil" class="form-label">
                                    Años de vida útil
                                </label>
                                <input type="numeric" v-model="bus.vidautil" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="matricula" class="form-label">
                                    Consumo / 100 Km
                                </label>
                                <input type="numeric" v-model="bus.consumo" class="form-control">
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
                bus: {
                    matricula: "",
                    fechaio: "",
                    vidautil: "",
                    consumo: ""
                }
            }
        },
        mounted(){
            this.load();
        },
        methods: {
            async load(){
                await this.axios.get(`/api/buses/${this.$route.params.id}`)
                    .then(response => {
                        const { matricula , fechaio , vidautil , consumo } = response.data;
                        this.bus.matricula = matricula;
                        this.bus.fechaio = fechaio;
                        this.bus.vidautil = vidautil;
                        this.bus.consumo = consumo;
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            },
            async actualizar(){
                await this.axios.put(`/api/buses/${this.$route.params.id}`, this.bus)
                    .then(response => {
                        this.$router.push({name:"buses"})
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            }
        }
    }
</script>