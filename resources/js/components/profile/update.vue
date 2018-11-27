<template>
<div class="container is-fullhd register">
    <div class="notification register">
        <div class="title is-8" style="color:lightblue">Edit Profile</div>
        <form @submit.prevent="update()">
            <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" id="name" type="string" placeholder="Name" v-model="user.name">
            </div>
            </div>

            <div class="field">
            <label class="label">Phone Number</label>
            <div class="control">
                <input class="input" type="number" placeholder="Phone Number" v-model="user.phone">
            </div>
            </div>


            <div class="field">
                <label class="label">Email</label>
                <input class="input" id ="email" type="email" placeholder="Email" v-model="email" disabled> 
            </div>

            <div class="container">
                <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Send</button>
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
  data () {
    return {
        email: '',
        user:{
            name:'',
            phone:''
        },
        id: '',
    }
  },
  mounted(){
        axios.get('/api/users/detail/'+this.$route.params.id).then(response => this.user = response.data)    
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
        update(){    
             axios.patch('/api/users/update/'+this.$route.params.id,{
                name  : this.user.name,
                phone : this.user.phone
            })
            .then(response =>{
                this.$router.push({name: 'Profile'})
            })
            .catch(response => {
                alert("Error");
            })
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
