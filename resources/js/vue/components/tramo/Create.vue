<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="form-row" >
                    <div class="col">
                        <a  href="/tramos" class="btn btn-info" ><i class="fas fa-angle-left"></i></a>     
                        <a> <h1 style="display:inline-block; vertical-align:middle;">Nuevo Tramo</h1></a>                
                    </div>                                                       
                </div>                   
            </div>
            <div class="card-body">
                <form @submit.prevent="guardar">
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
                    descripcion: "",
                    recorridokm: "",
                    estado: "Activo"
                }
            }
        },
        mounted(){
            //this.cargar();
        },
        methods: {
            async guardar(){
                await this.axios.post('/api/tramos', this.registro)
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