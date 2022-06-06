<template>
    <div class="container">
        <div class="row card">
            <div class="col-12 card-header">
                <h1>Resumen de Costos</h1>
            </div>
            <div class="col-12 card-body">
                <form @submit.prevent="actualizar">
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label for="valorvehiculo" class="form-label">
                                    Total Km Ida
                                </label>
                                <input :value="totalKm" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="combustible" class="form-label">
                                    Total km/día
                                </label>
                                <input type="numeric" :value="totalKm * 108"  class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="neumaticos" class="form-label">
                                    Lts Combustible/día
                                </label>
                                <input :value="litrosCombustible"  class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="neumaticos" class="form-label">
                                    Costo Combustible/día
                                </label>
                                <input :value="money(costoCombustible)"  class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-2">
                            <div class="form-group">
                                <label for="valorvehiculo" class="form-label">
                                    Cantidad Vehiculos
                                </label>
                                <input :value="50" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="combustible" class="form-label">
                                    Recorrido por Vehiculo/día
                                </label>
                                <input :value="recorridoPorVehiculo"  class="form-control" readonly>
                            </div>
                        </div>
                        
                        <div class="col-2"></div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="lubricante" class="form-label">
                                    Lts Lubricante/día
                                </label>
                                <input :value="litrosLubricante"  class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="lubricante" class="form-label">
                                    Costo Lubricante/día
                                </label>
                                <input :value="money(costoLubricante)"  class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="lubricante" class="form-label">
                                    Remuneración diaria/chofer
                                </label>
                                <input :value="remuneracionDiaria"  class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="lubricante" class="form-label">
                                    Total Remuneración/día
                                </label>
                                <input :value="money(totalRemuneracion)"  class="form-control" readonly>
                            </div>
                        </div>
                    </div>
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
                return Number(this.config.sueldobasico * 1.39 / 30).toLocaleString() + " Gs"
            },
            totalRemuneracion(){
                return this.config.sueldobasico * 1.39 / 30 * 50
            },
            chartData() {
                    return {
                        labels: [ 'Combustible', 'Lubricantes', 'Remuneraciones' ],
                        datasets: [ { 
                            backgroundColor: ['#41B883', '#E46651', '#00D8FF'/*, '#DD1B16'*/],
                            data: [this.costoCombustible, this.costoLubricante, this.totalRemuneracion] } 
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

            }
        }
    }
</script>