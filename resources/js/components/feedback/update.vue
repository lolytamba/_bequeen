<template>
<div class="container is-fullhd booking"><br>
    <div class="notification">
        <div class="title is-8" style="color:blue">Edit Feedback</div>
        <form @submit.prevent="update()">
            <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" type="text" placeholder="Name" v-model="name" disabled>
            </div>
            </div>

            <label class="label">Email</label>
            <div class="control">
                <input class="input" type="email" placeholder="Email" v-model="email" disabled>
            </div><br>

            <label class="label">Rate Service</label>
            <div class="control">
                <input class="input" type="email" placeholder="Rate Service" v-model="feedback.service" disabled>
            </div><br>

            <div class="field">
            <label class="label">Message</label>
            <div class="control">
                <textarea class="textarea is-success" placeholder="Message" v-model="feedback.message"></textarea>
            </div>
            </div>

            <br>
            <div class="field">
                <button class="button feedback" type="submit">Send</button>
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
            name: '',
            email: '',
            feedback: {
                message: '',
                service: ''
            },
            id:''
        }
    },
    mounted(){
        this.setDefaults()
        axios.get('/api/feedbacks/detail/'+this.$route.params.id).then(response => this.feedback = response.data)    
    },
    methods:{
        setDefaults(){
            let user = JSON.parse(localStorage.getItem('beQueen.user'))
            this.name = user.name
            this.email = user.email
        },
        update() { 
            axios.patch('/api/feedbacks/update/'+this.$route.params.id,{
                message  : this.feedback.message
            })
            .then(response =>{
                this.$router.push({name: 'ViewFeedback'})
            })
            .catch(response => {
                alert("error");
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
