<template>
<div class="container is-fullhd register">
    <div class="notification register">
        <div class="title is-8" style="color:lightblue">Edit BeQueen Salon Requirements</div>
        <form @submit.prevent="update()">
        <div class="field">
        <label class="label">Name</label>
        <div class="control">
            <input class="input" id="name" type="string" placeholder="Name" v-model="job.name" disabled>
        </div>
        </div>

        <div class="field">
        <label class="label">Phone Number</label>
        <div class="control">
            <input class="input" type="number" v-model="job.phone"  placeholder="Phone Number" disabled>
        </div>
        </div>

        <div class="field">
        <label class="label">Age</label>
        <div class="control">
            <input class="input" type="number" v-model="job.age" placeholder="Age">
        </div>
        </div>

        <div class="field">
        <label class="label">Position</label>
        <div class="control">
            <input class="input" type="string" v-model="job.position" placeholder="Position" disabled>
        </div>
        </div>

        <div class="field">
            <label class="label">Experience</label>
            <div class="control">
                <textarea class="textarea is-success" placeholder="Experience" v-model="job.experience"></textarea>
            </div>
            </div>

        <div class="container">
            <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Submit</button>
            </div>
            </div>
        </div>
        </form>
    </div>

    <div class="notification style">
    </div>

</div>
</template>

<script>
export default {
    data(){
        return{
            job: {
                experience: '',
                phone: '',
                name: '',
                age: '',
                postion: '',
            },
            id:''
        }
    },
    mounted(){
        this.setDefaults()
        axios.get('/api/jobs/detail/'+this.$route.params.id).then(response => this.job = response.data)    
    },
    methods:{
        setDefaults(){
        },
        update() { 
            axios.patch('/api/jobs/update/'+this.$route.params.id,{
                experience  : this.job.experience,
                age  : this.job.age
            })
            .then(response =>{
                this.$router.push({name: 'ViewJob'})
            })
            .catch(response => {
                alert("Error");
            })
        },
    }
}
</script>

<style>
.booking{
    width: 800px;   
}
.feedback{
    background: blue;
    width: 100px;
    color: white;
    font-size: 15px;
}
</style>

