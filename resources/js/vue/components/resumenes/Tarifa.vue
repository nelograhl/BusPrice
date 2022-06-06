<template>
    <div class="container">
        <div class="row card">
            <div class="col-12 card-header">
                <h1>Calculo de Tarifa</h1>
            </div>
            <div class="col-12 card-body">
                <form @submit.prevent="actualizar">
                    <div class="col-6">
                        <div class="row"><h1>Costo Estimado</h1></div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="valorvehiculo" class="form-label">
                                        Costos Operacionales Diario
                                    </label>
                                    <input :value="money(totalCostoDiario)" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-4"></div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="combustible" class="form-label">
                                        Beneficio Empresarial Diario
                                    </label>
                                    <input :value="money(beneficioDiario)"  class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="valorvehiculo" class="form-label">
                                        Total Pasajeros
                                    </label>
                                    <input :value="totalPasajeros" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="valorvehiculo" class="form-label">
                                        Pasaje completo
                                    </label>
                                    <input :value="pasajeComp" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="combustible" class="form-label">
                                        Pasaje diferenciado
                                    </label>
                                    <input :value="pasajeDif"  class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row"><h1>Costo Ideal</h1></div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="valorvehiculo" class="form-label">
                                        Total Pasajeros
                                    </label>
                                    <input :value="totalPasajerosI" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="valorvehiculo" class="form-label">
                                        Pasaje completo
                                    </label>
                                    <input :value="pasajeCompI" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="combustible" class="form-label">
                                        Pasaje diferenciado
                                    </label>
                                    <input :value="pasajeDifI"  class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-8">
                           
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="combustible" class="form-label fw-bold">
                                        Costo Pasaje
                                    </label>
                                    <input :value="money(costoPasajeI)"  class="form-control fw-bold" readonly>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <hr/>
                    <div class="row">
                            <div class="col-12">
                                <Pie
                                    :chart-options="chartOptions"
                                    :chart-data="chartData"
                                    :chart-id="chartId"
                                    :dataset-id-key="datasetIdKey"
                                    :plugins="plugins"
                                    :css-classes="cssClasses"
                                    :styles="styles"
                                    :width="width"
                                    :height="height"
                                />
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</template>

<script>

    import { Pie } from 'vue-chartjs'
    import { Chart as ChartJS, Title, Tooltip, Legend, ArcElement, CategoryScale, Plugin } from 'chart.js'

    ChartJS.register(Title, Tooltip, Legend, ArcElement, CategoryScale)

    export default {
        name: "Create",
        components: { Pie },
        props: {
            chartId: {
            type: String,
            default: 'pie-chart'
            },
            datasetIdKey: {
            type: String,
            default: 'label'
            },
            width: {
            type: Number,
            default: 400
            },
            height: {
            type: Number,
            default: 400
            },
            cssClasses: {
            default: '',
            type: String
            },
            styles: {
            type: Object,
            default: () => {}
            },
            plugins: {
            type: Array,
            default: () => []
            }
        },
        data(){
            return {
                

                tramos: [],
                costo: {
                    valorvehiculo: "",
                    combustible: "",
                    neumaticos: "",
                    lubricante: ""
                },
                coeficientes: {
                    combustible: "",
                    lubricante: "",
                    neumaticos: "",
                    repuestos: "",
                    depreciacionvehiculo: ""
                },
                config: {
                    precionb: "",
                    precioub: "",
                    utilidad: "",
                    sueldobasico: ""
                },
                impuestos: {
                    desinfeccion: "",
                    canon: "",
                    inspeccion: "",
                    patentemunicipal: "",
                    patentecomercial: ""
                },
                insumos: {
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
            totalKm(){
                return this.tramos.reduce((suma, a) => suma + a.recorridokm * 1, 0);
            },
            litrosCombustible(){
                return Number(this.totalKm * 108 * this.coeficientes.combustible).toLocaleString()
            },
            costoCombustible(){
                return this.totalKm * 108 * this.coeficientes.combustible * this.costo.combustible
            },
            litrosLubricante(){
                return Number(this.totalKm * 108 * this.coeficientes.lubricante).toLocaleString()
            },
            costoLubricante(){
                return this.totalKm * 108 * this.coeficientes.lubricante * this.costo.lubricante
            },
            recorridoPorVehiculo(){
                return Number(this.totalKm * 108 / 50).toLocaleString() + " Km"
            },
            remuneracionDiaria(){
                return Number(2 * this.config.sueldobasico * 1.39 / 30).toLocaleString() + " Gs"
            },
            totalRemuneracion(){
                return 2 * this.config.sueldobasico * 1.39 / 30 * 50
            },
            neumaticoDiaria(){
                return Number(7 * this.totalKm * 108 / this.coeficientes.neumaticos).toLocaleString() + " Un"
            },
            costoNeumaticoDiario(){
                return 7 * this.totalKm * 108 * this.costo.neumaticos / this.coeficientes.neumaticos
            },
            vehiculoDiaria(){
                return Number(50 * this.coeficientes.depreciacionvehiculo).toLocaleString() + " Un"
            },
            costoVehiculoDiario(){
                return 50 * this.costo.valorvehiculo * this.coeficientes.depreciacionvehiculo
            },
            impuestoDiario(){
                const { desinfeccion, canon , inspeccion, patentemunicipal, patentecomercial } = this.impuestos;
                return 50 * (desinfeccion + canon + inspeccion + patentemunicipal + patentecomercial ) / 365;
                    
            },
            seguroDiario(){
                const { segurop, segurov  } = this.insumos;
                return 12 * 50 * (segurop + segurov ) / 365;
                    
            },
            repuestoDiario(){
                return this.totalKm * 108 * this.coeficientes.repuestos * this.costo.valorvehiculo / ((this.totalKm * 108 /50) * 30);
            },
            totalCostoDiario(){
                return this.costoCombustible
                                + this.costoLubricante
                                + this.totalRemuneracion
                                + this.costoNeumaticoDiario
                                + this.costoVehiculoDiario
                                + this.impuestoDiario
                                + this.seguroDiario
                                + this.repuestoDiario
            },
            beneficioDiario(){
                const totalCosto = this.totalCostoDiario * 100 / (100 - this.config.utilidad)
                return totalCosto * this.config.utilidad / 100;
                    
            },
            totalPasajeros(){
                return this.registro.totalpasajeros;
                    
            },
            pasajeComp(){
                return (this.registro.totalpasajeros * 0.89) * 1;
            },
            pasajeDif(){
                return (this.registro.totalpasajeros * 0.11) * 1;
            },
            costoPasaje(){
                return (this.totalCostoDiario + this.beneficioDiario) / (this.pasajeComp +  (this.pasajeDif/2));
            },
            totalPasajerosI(){
                return (108 * 7 * 70) * 1;
                    
            },
            pasajeCompI(){
                return (this.totalPasajerosI * 0.89) * 1;
            },
            pasajeDifI(){
                return (this.totalPasajerosI * 0.11) * 1;
            },
            costoPasajeI(){
                return (this.totalCostoDiario + this.beneficioDiario) / (this.pasajeCompI +  (this.pasajeDifI/2));
            },
            
            chartData() {
                    return {
                        labels: [ 'Costos Pasaje Estimado', 'Costos Pasaje Ideal' ],
                        datasets: [ { 
                            backgroundColor: ['#F9E79F', '#00FF00'],
                            data: [
                                this.costoPasaje,
                                this.costoPasajeI
                            ] } 
                        ]
                    }
            },
            chartOptions() {
                return {
                    responsive: true,
                    maintainAspectRatio: false
                }
            },

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
                await this.axios.get('/api/costos')
                    .then(response => {
                        console.log(response);
                        const { valorvehiculo , combustible , neumaticos , lubricante } = response.data;
                        this.costo.valorvehiculo = valorvehiculo;
                        this.costo.combustible = combustible;
                        this.costo.neumaticos = neumaticos;
                        this.costo.lubricante = lubricante;
                    })
                    .catch(error =>{
                        console.log(error)
                    });

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
                    });
                
                this.axios.get('/api/tramos')
                    .then(response => {
                        this.tramos = response.data;
                    })
                    .catch(error =>{
                        this.tramos = []
                    });
                await this.axios.get('/api/config')
                    .then(response => {
                        console.log(response);
                        const { precionb , precioub , utilidad , sueldobasico } = response.data;
                        console.log(" precio", precionb);
                        this.config.precionb = precionb;
                        this.config.precioub = precioub;
                        this.config.utilidad = utilidad;
                        this.config.sueldobasico = sueldobasico;
                    })
                    .catch(error =>{
                        console.log(error)
                    });
                await this.axios.get(`/api/tasasimpuestos`)
                    .then(response => {
                        this.impuestos = response.data;
                    })
                    .catch(error =>{
                        console.log(error)
                    });
                    
                await this.axios.get('/api/insumos')
                    .then(response => {
                        this.insumos = response.data;
                    })
                    .catch(error =>{
                        console.log(error)
                    })

                await this.axios.get(`/api/datosoperacionales`)
                    .then(response => {
                        this.registro = response.data;
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            }
        }
    }
</script>