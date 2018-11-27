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
        <div v-for="(feedback,index) in feedbacks" :key="index">
        <tr>
        <th>{{feedback.name}}</th>
        <th>{{feedback.email}}</th>
        <th >{{feedback.service}}</th>
        <th >{{feedback.message}}</th>
        
        <th>
        <router-link :to="{name: 'EditFeedback', params: {id: feedback.id}}">
        <button class="button is-warning editB">
            Edit 
        </button>
        </router-link>

        <button class="button is-danger deleteB"  @click ="handleSubmit(feedback.id)">Delete</button></th>
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
            email:'',
            message:'',
            service:'',
            id:''
        }
    },
    mounted(){
        this.get()
    },
    methods:{
        get(){
            axios.get("api/feedbacks/"+this.id).then(response => this.feedbacks = response.data)
        },
        handleSubmit(id){
            axios.delete("/api/feedbacks/deleteFeedback/"+id).then(response => this.this.get())
            alert('Deleted')
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
