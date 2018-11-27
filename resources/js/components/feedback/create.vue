<template>
<div class="container is-fullhd booking"><br>
    <div class="notification">
        <div class="title is-8" style="color:blue">Feedback</div>
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

            <div class="field">
            <div class="control">
                <label class="radio">
                <label class="label" >Rate Service</label>
                <input type="radio" name="question" v-model="service" value="Good">
                Good
                </label>
                <label class="radio">
                <input type="radio" name="question" v-model="service" value="Bad">
                Bad
                </label>
            </div>
            </div>

            <div class="field">
            <label class="label">Message</label>
            <div class="control">
                <textarea class="textarea is-success" placeholder="Message" v-model="message"></textarea>
            </div>
            </div>

            <br>
            <div class="field">
                <button class="button feedback" @click="handleSubmit">Send</button>
                <router-link :to="{name: 'ViewFeedback'}">
                    <button class="button feedback">View</button>
                </router-link>
            </div>
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
            message: '',
            service: '',
            id: ''
        }
    },
    mounted(){
        this.setDefaults()
    },
    methods:{
        setDefaults(){
            let user = JSON.parse(localStorage.getItem('beQueen.user'))
            this.name = user.name
            this.email = user.email
            this.id = user.id
        },
        handleSubmit(e){
            e.preventDefault()
            let message = this.message
            let email = this.email
            let name = this.name
            let service = this.service
            
            axios.post('api/storeFeedback/'+this.id,{name,email,service,message}).then((response) => {
                let data = response.data
                localStorage.setItem('service',JSON.stringify(data.product))
                localStorage.setItem('service.jwt', data.name)
                return alert('Thanks for your feedback :)');
                this.$router.push();
            }).catch((err) => {
                return alert('Feedback Failed')
            })
            // this.message = null,
            // this.service = null
        }
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
