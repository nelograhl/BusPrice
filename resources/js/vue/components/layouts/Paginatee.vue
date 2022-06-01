<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" @click="previous" href="#" aria-label="Anterior">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item" ><a class="page-link" href="#">{{ payload.page }}</a></li>
            <li class="page-item">
                <a class="page-link" @click="next" aria-label="Siguiente" href="#">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        name: "Paginatee",
        data(){
            return {
                payload: {
                    query: "",
                    page: 0,
                    pageCount: 0
                }
            }
        },
        mounted(){
            //this.cargar();
        },
        methods: {
            previous(){
                if(this.payload.page > 1) this.payload.page--;
            },
            next(){
                if(this.payload.page < this.payload.pageCount) this.payload.page++;
            },
            async guardar(){
                await this.axios.post('/api/buses', this.bus)
                    .then(response => {
                        this.$router.push({name:"buses"})
                    })
                    .catch(error =>{
                        console.log(error)
                    })

            }
        }
    }
</script>