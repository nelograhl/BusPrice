<template>
    <div class="container">
        <div class="row card">
            <div class="col-12 card-header">
                <h1>Configuración</h1>
            </div>
            <div class="col-12 card-body">
                <form @submit.prevent="actualizar">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="cantidad" class="form-label">
                                    Cantidad buses
                                </label>
                                <input type="text" v-model="config.cantidad" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="precionb" class="form-label">
                                    Precio buses nuevos
                                </label>
                                <input type="text" v-model="config.precionb" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="matricula" class="form-label">
                                    Precio buses usados
                                </label>
                                <input type="numeric" v-model="config.precioub" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="vidautil" class="form-label">
                                    Porcentaje de utilidad
                                </label>
                                <input type="numeric" v-model="config.utilidad" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="matricula" class="form-label">
                                    Salario básico
                                </label>
                                <input type="numeric" v-model="config.sueldobasico" class="form-control">
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
                config: {
                    cantidad: "",
                    precionb: "",
                    precioub: "",
                    utilidad: "",
                    sueldobasico: ""
                }
            }
        },
        mounted(){
            this.load();
        },
        methods: {
            async load(){
                await this.axios.get('/api/config')
                    .then(response => {
                        console.log(response);
                        const { cantidad, precionb , precioub , utilidad , sueldobasico } = response.data;
                        console.log(" precio", precionb);
                        this.config.cantidad = cantidad;
                        this.config.precionb = precionb;
                        this.config.precioub = precioub;
                        this.config.utilidad = utilidad;
                        this.config.sueldobasico = sueldobasico;
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            },
            async actualizar(){
                await this.axios.put(`/api/config/1`, this.config)
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