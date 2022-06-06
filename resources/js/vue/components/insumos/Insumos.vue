<template>
    <div class="container">
        <div class="row card">
            <div class="col-12 card-header">
                <h1>Insumo Básicos</h1>
            </div>
            <div class="col-12 card-body">
                <form @submit.prevent="actualizar">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="dolar" class="col-form-label">
                                    Precio dolar
                                </label>
                                <input type="numeric" v-model="insumo.dolar" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="combustible" class="form-label">
                                    Precio combustible
                                </label>
                                <input type="numeric" v-model="insumo.combustible" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="neumaticos" class="form-label">
                                    Precio de neumaticos
                                </label>
                                <input type="numeric" v-model="insumo.neumaticos" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cubiertas" class="form-label">
                                    Precio cubiertas
                                </label>
                                <input type="numeric" v-model="insumo.cubiertas" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="camaras" class="form-label">
                                    Precio cámaras
                                </label>
                                <input type="numeric" v-model="insumo.camaras" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="protectores" class="form-label">
                                    Precio protectores
                                </label>
                                <input type="numeric" v-model="insumo.protectores" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="vidautil" class="form-label">
                                    Vida útil
                                </label>
                                <input type="numeric" v-model="insumo.vidautil" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="recapado" class="form-label">
                                    Precio recapado
                                </label>
                                <input type="numeric" v-model="insumo.recapado " class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="norecp" class="form-label">
                                    Precio no recapado
                                </label>
                                <input type="numeric" v-model="insumo.norecap" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="chasis" class="form-label">
                                    Precio chasis
                                </label>
                                <input type="numeric" v-model="insumo.chasis" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="carroceria" class="form-label">
                                    Precio carroceria
                                </label>
                                <input type="numeric" v-model="insumo.carroceria" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="salariochofer" class="form-label">
                                    Salario Chofer
                                </label>
                                <input type="numeric" v-model="insumo.salariochofer" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="salariofiscal" class="form-label">
                                    Salario Fiscal
                                </label>
                                <input type="numeric" v-model="insumo.salariofiscal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="salariojefe" class="form-label">
                                    Salario Jefe de taller
                                </label>
                                <input type="numeric" v-model="insumo.salariojefe" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="segurop" class="form-label">
                                    Seguro Pasajeros
                                </label>
                                <input type="numeric" v-model="insumo.segurop" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="segurov" class="form-label">
                                    Seguro del vehículo
                                </label>
                                <input type="numeric" v-model="insumo.segurov" class="form-control">
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
                insumo: {
                    dolar: "",
                    combustible: "",
                    neumaticos: "",
                    cubiertas: "",
                    camaras: "",
                    protectores: "",
                    vidautil: "",
                    recapado: "",
                    norecap: "",
                    chasis: "",
                    carroceria: "",
                    salariochofer: "",
                    salariofiscal: "",
                    salariojefe: "",
                    segurop: "",
                    segurov: ""
                }
            }
        },
        mounted(){
            this.load();
        },
        methods: {
            async load(){
                await this.axios.get('/api/insumos')
                    .then(response => {
                        console.log(response);
                        const { dolar , combustible , neumaticos , cubiertas , camaras , 
                        protectores , vidautil , recapado , norecap , chasis , carroceria , 
                        salariochofer , salariofiscal , salariojefe , segurop , segurov } = response.data;
                        console.log(" dolar", dolar);
                        this.insumo.dolar = dolar;
                        this.insumo.combustible = combustible;
                        this.insumo.neumaticos = neumaticos;
                        this.insumo.cubiertas = cubiertas;
                        this.insumo.camaras = camaras;
                        this.insumo.protectores = protectores;
                        this.insumo.vidautil = vidautil;
                        this.insumo.recapado = recapado;
                        this.insumo.norecap = norecap;
                        this.insumo.chasis = chasis;
                        this.insumo.carroceria = carroceria;
                        this.insumo.salariochofer = salariochofer;
                        this.insumo.salariofiscal = salariofiscal;
                        this.insumo.salariojefe = salariojefe;
                        this.insumo.segurop = segurop;
                        this.insumo.segurov = segurov;
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            },
            async actualizar(){
                await this.axios.put(`/api/insumos/1`, this.insumo)
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