<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Nuevo Omnibus</h1>
            </div>
            <div class="card-body">
                <form @submit.prevent="guardar">
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
            //this.cargar();
        },
        methods: {
            async guardar(){
                await this.axios.post('/api/buses', this.bus)
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