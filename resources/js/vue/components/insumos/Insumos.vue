<template>
    <div class="container">
        <div class="row card">
            <div class="col-12 card-header">
                <h1>Insumos Básicos</h1>
            </div>
            <div class="col-12 card-body">
                <form @submit.prevent="actualizar">
                    <div class="row" style="justify-content:center;">
                        <div class="col-2">
                            <h4>Datos Básicos y Utilidad</h4>
                            <div class="form-group">
                                <label for="dolar" class="col-form-label">
                                    Precio Dolar (Gs/dolar)
                                </label>
                                <input type="numeric" v-model="insumo.dolar" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="combustible" class="form-label">
                                    Precio Combustible (Gs/litro)
                                </label>
                                <input type="numeric" v-model="insumo.combustible" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="descrpicion" class="form-label">
                                    Población Total
                                </label>
                                <input type="numeric"  v-model="registro.totalhabitantes" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="descrpicion" class="form-label">
                                    Total de Pasajeros
                                </label>
                                <input type="numeric" :value="pasajeros" class="form-control" readonly>
                            </div>   
                            <div class="form-group">
                                <label for="combustible" class="form-label">
                                    Beneficio Empresarial (%)
                                </label>
                                <input type="number" step="0.01" v-model="config.utilidad" class="form-control">
                            </div>
                        </div>
                        <div class ="col-2">
                            <h4>Neumáticos</h4>
                            <div class="form-group">
                                <label for="neumaticos" class="form-label">
                                    Precio de Neumaticos (Gs/unidad)
                                </label>
                                <input type="numeric" :value="neumaticos" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="cubiertas" class="form-label">
                                    Precio de Cubiertas (Gs.)
                                </label>
                                <input type="numeric" v-model="insumo.cubiertas" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="camaras" class="form-label">
                                    Precio de Cámaras (Gs.)
                                </label>
                                <input type="numeric" v-model="insumo.camaras" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="protectores" class="form-label">
                                    Precio de Protectores (Gs.)
                                </label>
                                <input type="numeric" v-model="insumo.protectores" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="vidautil" class="form-label">
                                    Vida útil (Km)
                                </label>
                                <input type="numeric" v-model="insumo.vidautil" class="form-control">
                            </div>
                            <div class="form-group" style="display:none;">
                                <label for="recapado" class="form-label">
                                    Precio de Recapado (Gs.)
                                </label>
                                <input type="numeric" v-model="insumo.recapado " class="form-control">
                            </div>
                            <div class="form-group" style="display:none;">
                                <label for="norecp" class="form-label">
                                    Nro. Recapados
                                </label>
                                <input type="numeric" v-model="insumo.norecap" class="form-control">
                            </div>
                        </div>
                        <div class="col-2">         
                            <h4>Vehículo (Gs/unidad)</h4>     
                            <div class="form-group">
                                <label for="chasis" class="form-label">
                                    Cantidad de Buses
                                </label>
                                <input type="numeric" v-model="config.cantidad" class="form-control">
                            </div>              
                            <div class="form-group">
                                <label for="chasis" class="form-label">
                                    Precio Chasis (Gs.)
                                </label>
                                <input type="numeric" v-model="insumo.chasis" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="carroceria" class="form-label">
                                    Precio de Carroceria (Gs.)
                                </label>
                                <input type="numeric" v-model="insumo.carroceria" class="form-control">
                            </div>
                        </div>
                        <div class="col-2">
                            <h4>Gastos varios (Gs/año)</h4>
                            <div class="form-group">
                                <label for="segurop" class="form-label">
                                    Seguro Pasajeros (Gs.)
                                </label>
                                <input type="numeric" v-model="insumo.segurop" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="segurov" class="form-label">
                                    Seguro del Vehículo (Gs.)
                                </label>
                                <input type="numeric" v-model="insumo.segurov" class="form-control">
                            </div>                            
                        </div>
                        <div class ="col-2">
                            <h4>Salario básico (Gs/mes)</h4>
                            <div class="form-group">
                                <label for="salariochofer" class="form-label">
                                    Salario Chofer (Gs.)
                                </label>
                                <input type="numeric" v-model="insumo.salariochofer" class="form-control">
                            </div>
                            <div class="form-group" style="display:none;">
                                <label for="salariofiscal" class="form-label">
                                    Salario Fiscal (Gs.)
                                </label>
                                <input type="numeric" v-model="insumo.salariofiscal" class="form-control">
                            </div>
                            <div class="form-group"  style="display:none;" >
                                <label for="salariojefe" class="form-label">
                                    Salario Jefe de Taller (Gs.)
                                </label>
                                <input type="numeric" v-model="insumo.salariojefe" class="form-control">
                            </div>
                        </div>                  
                        <hr/>
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
                },
                config: {
                    cantidad: "",
                    precionb: "",
                    precioub: "",
                    utilidad: "",
                    sueldobasico: ""
                },
                registro: {
                    totalhabitantes: "",
                    totalpasajeros: "",
                    totalflota: "",
                    kilometrajediario: "",
                    rpd: "",
                    rpm: "",
                    ipk: ""
                }
            }
        },
        computed: {
            neumaticos(){
                 return Number(this.insumo.cubiertas)  + Number(this.insumo.camaras) + Number(this.insumo.protectores)
            },
            pasajeros(){
                 return (Number(this.registro.totalhabitantes)  * 0.38).toFixed(0)
            }              
        },
        mounted(){
            this.load();
        },
        methods: {
            money(value){
                return Number(value).toLocaleString() + " Gs"
            },
            round(value){
                return Number(value).toLocaleString()
            },
            async load(){
                await this.axios.get('/api/insumos')
                    .then(response => {
                        //console.log(response);
                        const { dolar , combustible ,  cubiertas , camaras , 
                        protectores , vidautil , recapado , norecap , chasis , carroceria , 
                        salariochofer , salariofiscal , salariojefe , segurop , segurov } = response.data;
                        //console.log(" dolar", dolar);
                        this.insumo.dolar = dolar;
                        this.insumo.combustible = combustible;
                        this.insumo.neumaticos = cubiertas*6 + (camaras + protectores)*12;
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

                await this.axios.get('/api/config')
                    .then(response => {
                        const { cantidad, precionb , precioub , utilidad , sueldobasico } = response.data;
                        this.config.cantidad = cantidad;
                        this.config.precionb = precionb;
                        this.config.precioub = precioub;
                        this.config.utilidad = utilidad;
                        this.config.sueldobasico = sueldobasico;
                    })
                    .catch(error =>{
                        console.log(error)
                    })
                await this.axios.get(`/api/datosoperacionales`)
                    .then(response => {
                        const {totalhabitantes, totalpasajeros, totalflota, kilometrajediario, rpd, rpm, ipk} = response.data;
                        this.registro.totalhabitantes = totalhabitantes;
                        this.registro.totalpasajeros = totalpasajeros;
                        this.registro.totalflota = totalflota;
                        this.registro.kilometrajediario = kilometrajediario;
                        this.registro.rpd = rpd;
                        this.registro.rpm = rpm;
                        this.registro.ipk = ipk;
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

                await this.axios.put(`/api/config/1`, this.config)
                    .then(response => {
                        this.$router.push({name:"home"})
                    })
                    .catch(error =>{
                        console.log(error)
                    })

                await this.axios.put(`/api/datosoperacionales/1`, this.registro)
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