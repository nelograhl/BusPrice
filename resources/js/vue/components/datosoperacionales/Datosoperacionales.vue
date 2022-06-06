<template>
    <div class="container">
        <div class="row card">
            <div class="card-header text-left">
                <h1>Datos Operacionales</h1>                
            </div>
            <div class="col-12 card-body" >
                <form @submit.prevent="actualizar">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="descrpicion" class="form-label">
                                    Población Total
                                </label>
                                <input type="number"  v-model="registro.totalhabitantes" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="descrpicion" class="form-label">
                                    Total de Pasajeros (38% pob. total)
                                </label>
                                <input type="number" v-model="registro.totalpasajeros" class="form-control">
                            </div>       
                            <div class="form-group" style="display:none;">
                                <label for="descrpicion" class="form-label">
                                    Flota Total
                                </label>
                                <input type="number"  v-model="registro.totalflota" class="form-control">
                            </div>
                            <div class="form-group" style="display:none;">
                                <label for="descrpicion" class="form-label">
                                    Kilometraje diario
                                </label>
                                <input type="number "  v-model="registro.kilometrajediario" class="form-control">
                            </div>      
                            <div class="form-group" style="display:none;">
                                <label for="descrpicion" class="form-label">
                                    Recorrido de vehiculo por día (R.P.D. - km/veh/día)
                                </label>
                                <input type="number"  v-model="registro.rpd" class="form-control">
                            </div>  
                            <div class="form-group" style="display:none;">
                                <label for="descrpicion" class="form-label">
                                    Recorrido de vehiculo por mes (R.P.M. - km/veh/mes)
                                </label>
                                <input type="number"  v-model="registro.rpd" class="form-control">
                            </div>  
                             <div class="form-group" style="display:none;">
                                <label for="descrpicion" class="form-label">
                                    Indice de Pasajeros por KM (I.P.K. - pasajeros/km)
                                </label>
                                <input type="number"  v-model="registro.rpd" class="form-control">
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
        name: "datosoperacionales",
        data(){
            return {
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
        mounted(){
            this.load();
        },
        methods: {
            async load(){
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