<template>
<div class="container">
    <table class="table is-bordered view">
    <thead>
        <h1 class="title is-4">List Feedback</h1>
        <tr>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Service</th>
        <th>Message</th>
        </tr>
    </thead>
    
    <tbody>
        <!-- <input class="" id="name" type="string" placeholder="Name" v-model="name" disabled> -->
        <div v-for="(feedback,index) in feedbacks" :key="index">
        <tr>
        <th>{{feedback.name}}</th>
        <th>{{feedback.email}}</th>
        <th >{{feedback.service}}</th>
        <th >{{feedback.message}}</th>
        
        <th>
        <router-link :to="{name: 'EditFeedback'}">
        <button class="button is-warning editB">
            Edit 
        </button>
        </router-link>

        <button class="button is-danger deleteB"  @click ="handleDelete">Delete</button></th>
        </tr>  
        </div>     
    </tbody>
     
    </table>
    </div>
</template>

<script>
export default {
    data(){
        return{
            feedbacks: [],
            // name: '',
            // email:'',
            // message:'',
            // service:''
        }
    },
    mounted(){
        axios.get("api/feedbacks/").then(response => this.feedbacks = response.data)
    },
    methods:{
        setDefaults(){
        }, 
        handleDelete(e){
            e.preventDefault()
            axios.delete("api/deleteFeedback").then(response => this.feedbacks = response.data)
            return alert('Deleted')
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
