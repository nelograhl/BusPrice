<template>
    <div class="container">
        <div class="row card">
            <div class="card-header text-left">
                <h1>Tasas e Impuestos (Gs/veh/año)</h1>                
            </div>
            <div class="col-12 card-body">
                <form @submit.prevent="actualizar">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="descrpicion" class="form-label">
                                    Tasa de Desinfección 
                                </label>
                                <input type="number"  v-model="registro.desinfeccion" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="descrpicion" class="form-label">
                                    Canon
                                </label>
                                <input type="number" v-model="registro.canon" class="form-control">
                            </div>       
                            <div class="form-group">
                                <label for="descrpicion" class="form-label">
                                    Inspección Técnica
                                </label>
                                <input type="number"  v-model="registro.inspeccion" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="descrpicion" class="form-label">
                                    Patente Municipal
                                </label>
                                <input type="number "  v-model="registro.patentemunicipal" class="form-control">
                            </div>      
                            <div class="form-group">
                                <label for="descrpicion" class="form-label">
                                    Patente Comercial
                                </label>
                                <input type="number"  v-model="registro.patentecomercial" class="form-control">
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
        name: "tasasimpuestos",
        data(){
            return {
               registro: {
                    desinfeccion: "",
                    canon: "",
                    inspeccion: "",
                    patentemunicipal: "",
                    patentecomercial: ""
                }
            }
        },
        mounted(){
            this.load();
        },
        methods: {
            async load(){
                await this.axios.get(`/api/tasasimpuestos`)
                    .then(response => {
                        const {desinfeccion, canon, inspeccion, patentemunicipal, patentecomercial} = response.data;
                        this.registro.desinfeccion = desinfeccion;
                        this.registro.canon = canon;
                        this.registro.inspeccion = inspeccion;
                        this.registro.patentemunicipal = patentemunicipal;
                        this.registro.patentecomercial = patentecomercial;
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            },
            async actualizar(){
                await this.axios.put(`/api/tasasimpuestos/1`, this.registro)
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