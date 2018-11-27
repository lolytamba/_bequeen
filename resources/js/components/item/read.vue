<template>
<div class="container">
    <table class="table is-bordered view">
    <thead>
        <h1 class="title is-4">List Item</h1>
        <tr>
        <!-- <th><abbr title="Position">Customer Name</abbr></th> -->
        <th><abbr title="Played">Item Type</abbr></th>
        <th><abbr title="Won">Item Name</abbr></th>
        <th><abbr title="Drawn">Color Edition</abbr></th>
        <th><abbr title="Drawn">Price</abbr></th>
        </tr>
    </thead>
    
    <tbody>
        <!-- <div v-for="(item,index) in items" :key="index"> -->
        <tr>
        <th>{{item[$route.params.index].itemType}}</th>
        <th>{{item[$route.params.index].itemName}}</th>
        <th>{{item[$route.params.index].color}}</th>
        <th>{{item[$route.params.index].price}}</th>
        <!-- <th> -->
        <!-- <router-link :to="{name: 'EditItem', params: {id: $route.params.index}}">
        <button class="button is-warning editB" >
            Edit 
        </button>
        </router-link>

        <button class="button is-danger deleteB"  @click ="handleSubmit($route.params.index)">Delete</button></th> -->
        </tr>  
        <!-- </div>      -->
    </tbody>
    </table>
    </div>
</template>

<script>
export default {
    data(){
        return{
            item : [
                {
                    itemType: 'Cosmetic',
                    itemName: 'Avon', 
                    price: '90000',
                    color: 'pink'
                },
                {
                    itemType: 'Cosmetic',
                    itemName: 'Bioaqua', 
                    price: '150000',
                    color: 'pink'
                },
                {
                    itemType: 'Cosmetic',
                    itemName: 'Wardah Eyeshadow', 
                    price: '90000',
                    color: 'pink'
                },
                {
                    itemType: 'Cosmetic',
                    itemName: 'Make Over', 
                    price: '60000',
                    color: ''
                }
            ],
            id:''
        }
    },
    mounted(){
        // this.setDefaults()
        this.get()
    },
    methods:{
        get(){
            axios.get('api/items/'+this.id).then(response => this.items = response.data)
        },
        // setDefaults(){
        //     let user = JSON.parse(localStorage.getItem('beQueen.user'))
        //     this.name = user.name
        //     this.id = user.id
        // }, 
        handleSubmit(id){
            axios.delete("/api/items/delete/"+id).then(response => this.get())
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
