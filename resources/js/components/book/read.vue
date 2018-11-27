<template>
<div class="container">
    <table class="table is-bordered view">
    <thead>
        <h1 class="title is-4">List Book</h1>
        <tr>
        <th><abbr title="Position">Customer Name</abbr></th>
        <th>Type of Service</th>
        <th><abbr title="Played">Paket</abbr></th>
        <th><abbr title="Won">Book Date</abbr></th>
        <th><abbr title="Drawn">Arrival Date</abbr></th>
        <th><abbr title="Drawn">Action</abbr></th>
        </tr>
    </thead>
    
    <tbody>
        <tr v-for="(product,index) in products" :key="index">
        <th>{{product.name}}</th>
        <th>{{product.type}}</th>
        <th >{{product.paket}}</th>
        <th >{{product.bookDate}}</th>
        <th>{{product.arrivalDate}}</th>
        
        <th>
        <router-link :to="{name: 'EditBook', params: {id: product.id}}">
        <button class="button is-warning editB" >
            Edit 
        </button>
        </router-link>

        <button class="button is-danger deleteB"  @click ="handleSubmit(product.id)">Delete</button></th>
        </tr>   
    </tbody>
    </table>

    </div>
</template>

<script>
export default {
    data(){
        return{
            products: [],
            name: '',
            bookDate: '',
            arrivalDate: '',
            type: '',
            paket: '',
            id:'',
            name:''
        }
    },
    mounted(){
        this.setDefaults()
        this.get()
    },
    methods:{
        get(){
            axios.get('api/products/'+this.id).then(response => this.products = response.data)
        },
        setDefaults(){
            let user = JSON.parse(localStorage.getItem('beQueen.user'))
            this.name = user.name
            this.id = user.id
        }, 
        handleSubmit(id){
            axios.delete("/api/products/delete/"+id).then(response => this.get())
            alert('Deleted');
        } 
    }
}
</script>

<style>
.view{
    width: 600px;
}
.editB{
    width: 90px;
    margin-left: 10px;
    margin-top: 5px;
}
.deleteB{
    width: 90px;
    margin-left: 10px;
    margin-top: 5px;
}
</style>
