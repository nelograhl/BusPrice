<template>
    <div class="container">
        <div class="row card">
            <div class="card-header">
                <h4>Omnibus</h4>
            </div>
            <div class="col-12 card-body">
                <p>
                    <router-link class="btn btn-info" :to='{name:"createBus"}'><span class="fas fa-plus-circle"></span> Nuevo</router-link>
                </p>
                <input class="form-control" onkeyup="registros.fnFilter(this.value)" />
                <table class="table table-bordered" id="tabla">
                    <thead class="bg-primary text-light">
                        <tr >
                            <th style="width: 10%;">
                                C&oacute;digo
                            </th>
                            <th style="width: 30%;">
                                Matricula
                            </th>
                            <th style="width: 30%;">
                                Fecha de Inicio
                            </th>
                            <th style="width: 10%;">
                                Vida Útil
                            </th>
                            <th style="width: 10%;">
                                Consumo
                            </th>
                            <th style="text-align: center; width: 10%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <tr v-for="bus in buses" :key="bus.id">
                                <td>
                                    {{ bus.id }}
                                </td>
                                <td>
                                    {{ bus.matricula }}
                                </td>
                                <td>
                                    {{ bus.fechaio }}
                                </td>
                                <td>
                                    {{ bus.vidautil }} años
                                </td>
                                <td>
                                    {{ bus.consumo }} Lts / 100 Km
                                </td>
                                <td class="text-center">
                                    <router-link :to="{name: 'editBus', params: {id: bus.id}}"><span title="Modificar" class="fas fa-edit"></span></router-link>
                                    &nbsp;
                                    <a @click="eliminar(bus.id)"><span title="Eliminar" class="fas fa-trash text-primary"></span></a>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 card-footer text-right">
                
            </div>
        </div>
    </div>
</template>
<script>

    import Paginate from '../layouts/Paginatee'
    export default {
        components:{
            Paginate
        },
        name: "buses",
        data(){
            return {
                buses: [],
                payload: {
                    query: "",
                    page: 1,
                    pageCount: 1
                }
            }
        },
        mounted(){
            this.cargar();
        },
        methods: {
            cargar(){
                this.axios.get('/api/buses')
                    .then(response => {
                        this.buses = response.data;
                    })
                    .catch(error =>{
                        this.buses = []
                    })
            },
            eliminar(id){
                if(confirm('¿Estás seguro que quieres eliminar este registro?')){
                    this.axios.delete(`/api/buses/${id}`)
                    .then(response => {
                        this.cargar();
                    }).catch(error =>{
                        console.log(error);
                    });
                }
                
            }
        }
    }
</script>