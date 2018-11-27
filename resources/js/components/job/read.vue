<template>
<div class="container">
    <table class="table is-bordered view">
    <thead>
        <h1 class="title is-4">Requirements</h1>
        <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Phone Number</th>
        <th>Position</th>
        <th>Experience</th>
        <th>Action</th>
        </tr>
    </thead>
    
    <tbody>
        <tr v-for="(job,index) in jobs" :key="index">
        <th>{{job.name}}</th>
        <th>{{job.age}}</th>
        <th >{{job.phone}}</th>
        <th >{{job.position}}</th>
        <th >{{job.experience}}</th>
        <th>
        <router-link :to="{name: 'UpdateJob', params: {id: job.id}}">
        <button class="button is-warning editB">
            Edit 
        </button>
        </router-link>

        <button class="button is-danger deleteB"  @click ="handleSubmit(job.id)">Delete</button></th>
        </tr>     
    </tbody>
     
    </table>
    </div>
</template>

<script>
export default {
    data(){
        return{
            jobs: [],
            name:'',
            phone:'',
            age:'',
            position:'',
            experience:'',
            id:''
        }
    },
    mounted(){
        this.get()
    },
    methods:{
        get(){
            axios.get("api/jobs/"+this.id).then(response => this.jobs = response.data)
        },
        handleSubmit(id){
            axios.delete("/api/jobs/delete/"+id).then(response => this.get())
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
