<template>
<div class="container is-fullhd register">
    <div class="notification register">
        <div class="title is-8" style="color:lightblue">My Profile</div>
        <div class="field">
        <label class="label">Name</label>
        <div class="control">
            <input class="input" id="name" type="string" placeholder="Name" v-model="name" disabled>
        </div>
        </div>

        <div class="field">
        <label class="label">Phone Number</label>
        <div class="control">
            <input class="input" type="number" placeholder="Phone Number" v-model="phone" disabled>
        </div>
        </div>


        <div class="field">
            <label class="label">Email</label>
            <input class="input" id ="email" type="email" placeholder="Email" v-model="email" disabled> 
        </div>

        <div class="container">
            <div class="field is-grouped">
            <div class="control">
                <router-link :to="{name: 'updateProfile', params: {id: id}}">
                    <button class="button is-info">Edit Profile</button>
                </router-link>
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
  data () {
    return {
        email: '',
        name:'',
        phone:'',
        id: '',
        user: {
            id: '',
            name: '',
            phone: '',
            email: '',
        }
    }
  },
  mounted(){
        this.setDefaults()
         
        this.get()
    },
    methods:{
        setDefaults(){
        let data = JSON.parse(localStorage.getItem('beQueen.user'))

             axios.get('/api/users/detail/'+data.id).then(response => {
            this.user = response.data  
            this.id = this.user.id
            this.name = this.user.name
            this.phone = this.user.phone
            this.email = this.user.email
            })    
        
    },
    get(){
        axios.get('api/users/'+this.id).then(response => this.user = response.data)
    }
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
