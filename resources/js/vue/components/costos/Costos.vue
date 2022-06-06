<template>
    <div class="container">
        <div class="row card">
            <div class="col-12 card-header">
                <h1>Costos de variables</h1>
            </div>
            <div class="col-12 card-body">
                <form @submit.prevent="actualizar">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="valorvehiculo" class="form-label">
                                   Combustible (Gs/km)
                                </label>
                                <input type="numeric" :value="round(combustible)" class="form-control"  readonly>
                            </div>
                            <div class="form-group">
                                <label for="combustible" class="form-label">
                                   Lubricantes (Gs/km)
                                </label>
                                <input type="numeric" :value="round(lubricantes)" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="neumaticos" class="form-label">
                                    Neumaticos (Gs/km)
                                </label>
                                <input type="numeric" :value="round(neumaticos)" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="lubricante" class="form-label">
                                    Repuestos y accesorios (Gs/km de la flota)
                                </label>
                                <input type="numeric" :value="round(repuestos)" class="form-control" readonly>
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
                costo: {
                    combustible: "",
                    lubricantes: "",
                    neumaticos: "",
                    repuestos: ""
                },
                coeficientes: {
                    combustible: "",
                    lubricante: "",
                    neumaticos: "",
                    repuestos: "",
                    depreciacionvehiculo: ""
                },
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
        computed: {
            combustible(){
                 return Number(this.coeficientes.combustible) * Number(this.insumo.combustible)
            },
            lubricantes(){
                 return Number(this.coeficientes.lubricante) * Number(this.insumo.combustible)
            },
            neumaticos(){
                 return Number(this.insumo.neumaticos)/Number(this.coeficientes.neumaticos)
            },
            repuestos(){
                 return (Number(this.insumo.chasis)+Number(this.insumo.carroceria))*Number(this.coeficientes.repuestos)
            }
        },
        mounted(){
            this.load();
        },
        methods: {
            round(value){
                return Number(value).toLocaleString()
            },
            async load(){
                await this.axios.get('/api/costos')
                    .then(response => {
                        const { combustible , lubricantes , neumaticos , repuestos } = response.data;
                        this.costo.combustible = combustible;
                        this.costo.lubricantes = lubricantes;
                        this.costo.neumaticos = neumaticos;
                        this.costo.repuestos = repuestos;
                    })
                    .catch(error =>{
                        console.log(error)
                    })
                
                await this.axios.get('/api/insumos')
                    .then(response => {
                        const { dolar , combustible , neumaticos , cubiertas , camaras , 
                        protectores , vidautil , recapado , norecap , chasis , carroceria , 
                        salariochofer , salariofiscal , salariojefe , segurop , segurov } = response.data;
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
                
                await this.axios.get(`/api/coeficientes`)
                    .then(response => {
                        const {combustible, lubricante, neumaticos, repuestos, depreciacionvehiculo} = response.data;
                        this.coeficientes.combustible = combustible;
                        this.coeficientes.lubricante = lubricante;
                        this.coeficientes.neumaticos = neumaticos;
                        this.coeficientes.repuestos = repuestos;
                        this.coeficientes.depreciacionvehiculo = depreciacionvehiculo;
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            },
            async actualizar(){
                await this.axios.put(`/api/costos/1`, this.costo)
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