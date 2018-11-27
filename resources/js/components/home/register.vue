<template>
<div class="container is-fullhd register">
    <div class="notification register">
        <div class="title is-8" style="color:lightblue">Join BeQueen Salon</div>
        <!-- <div class="field">
        <label class="label">First Name</label>
        <div class="control">
            <input class="input" type="string" placeholder="First Name" v-model="user.firstName" >
        </div>
        </div>

        <div class="field">
        <label class="label">Last Name</label>
        <div class="control">
            <input class="input" type="string" placeholder="Last Name" v-model="user.lastName">
        </div>
        </div> -->

        <div class="field">
        <label class="label">Name</label>
        <div class="control">
            <input class="input" id="name" type="string" placeholder="Name" v-model="name">
        </div>
        </div>

        <div class="field">
        <label class="label">Phone Number</label>
        <div class="control">
            <input class="input" type="number" v-model="phone"  placeholder="Phone Number">
        </div>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <input class="input" id ="email" type="email" v-model="email" placeholder="Email" value="">
            <!-- <p class="help is-danger">This email is invalid</p> -->
        </div>

        <div class="field">
        <label class="label">Password</label>
        <div class="control">
            <input class="input" id="password" type="password" v-model="password" placeholder="Password">
        </div>
        </div>

        <div class="field">
        <label class="label">Confirm Password</label>
        <div class="control">
            <input class="input" type="password" id="password_confirm" v-model="password_confirm" placeholder="Password">
        </div>
        </div>

        <div class="container">
            <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit" @click="handleSubmit">Create an account</button>
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
        name: '',
        phone: '',
        email: '',
        password: '',
        password_confirm: '',
    }
  },
  methods: {
    handleSubmit(e){
        e.preventDefault()
        if(this.name == '' | this.email=='' | this.password=='', this.password_confirm=='', this.phone==''){
            return alert('The field is required')
        }
        if(this.password != this.password_confirm | this.password.length <= 0)
        {
            this.password = '',
            this.password_confirm= ''
            return alert('Password do not match');
        }if(this.password.length !=8 ){
            return alert('Password must eight digit');
        }

        let name = this.name
        let phone = this.phone
        let email = this.email
        let password = this.password
        let c_password = this.password_confirm
       
        axios.post('api/register', {name, phone,email, password, c_password}).then((response) => {
            let data = response.data
            localStorage.setItem('beQueen.user', JSON.stringify(data.user))
            localStorage.setItem('beKing.jwt', data.token)
            
                if (localStorage.getItem('beKing.jwt') != null) {
                    let nextUrl = this.$route.params.nextUrl
                    this.$router.push('/login')
                    return alert('Register Success')
                }
            }).catch((err) => {
                return alert('Email Sudah Terdaftar')
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
