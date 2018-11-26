<template>
<div class="container is-fullhd register">
    <div class="notification register">
        <div class="title is-8" style="color:lightblue">My Profile</div>
    

        <div class="field">
        <label class="label">Name</label>
        <div class="control">
            <input class="input" id="name" type="string" placeholder="Name" v-model="name">
        </div>
        </div>

        <div class="field">
        <label class="label">Phone Number</label>
        <div class="control">
            <input class="input" type="number" placeholder="Phone Number" v-model="phone">
        </div>
        </div>


        <div class="field">
            <label class="label">Email</label>
            <input class="input" id ="email" type="email" placeholder="Email" disabled> {{email}}
            <!-- <p class="help is-danger">This email is invalid</p> -->
        </div>

        <div class="container">
            <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit" @click="handleSubmit">Edit Profile</button>
            </div>
            </div>
        </div>
    </div>

    <div class="notification style">
    </div>

</div>
</template>

<script>
export default {
  props : ['nextUrl'],
  data () {
    return {
        email: '',
        name:'',
        phone:'',
        id: '',
    }
  },
  mounted(){
        //axios.get('api/users').then(response => this.users = response.data)
        this.setDefaults()
    },
    methods:{
        setDefaults(){
        let user = JSON.parse(localStorage.getItem('beQueen.user'))
        this.id = user.id
        this.name = user.name
        this.phone = user.phone
        this.email = user.email
    },
    handleSubmit(e){
        e.preventDefault()
        let user_data = JSON.parse(localStorage.getItem('beQueen.user'))
        let id = this.id
        let name = this.name
        let phone = this.phone
        let email = this.email
        let payload = {
            name: name,
            phone: phone
        }
        axios.patch(`/api/users/${user_data.id}`, payload).then((response) => {
            let user = JSON.parse(localStorage.getItem('beQueen.user'))
            let name = user.name
            let phone = user.phone
            console.log("Updated")
            this.$forceUpdate()
        })
        //localStorage.removeItem('beQueen.user')
       // localStorage.setItem('beQueen.user', JSON.stringify(user))
        //this.change()
        //localStorage.setItem('beQueen.user', JSON.stringify(data.user))
    },
    beforeMount() {
        // axios.interceptors.request.use((config) => {
        //     const newConfig = config;
        //     newConfig.headers.Authorization = `Bearer ${localStorage.getItem('jajanpasar.jwt')}`;

        //     return newConfig;
        // });  
        axios.get('api/users').then(response => this.users = response.data)
    },
  }
}
</script>


<style>
.register{
    width: 600px;
    height: 600px;
    margin-top: 5px;
}
.titleB{
   color: lightblue;
}
</style>
