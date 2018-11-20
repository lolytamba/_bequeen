<template>
<div class="container is-fullhd register">
    <div class="notification">
        <div class="title is-8" style="color:lightblue">Join BeQueen Salon</div>
        <div class="field">
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
        </div>

        <div class="field">
        <label class="label">Phone Number</label>
        <div class="control">
            <input class="input" type="text" v-model="user.phone"  placeholder="Phone Number">
        </div>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <input class="input" type="email" v-model="user.email" placeholder="Email" value="">
            <!-- <p class="help is-danger">This email is invalid</p> -->
        </div>

         <div class="field">
          <label class="label">Username</label>
          <div class="control">
           <input class="input" type="string" v-model="user.username" v-validate="'required'" placeholder="Username" value="">
            <!-- <p class="help is-success">This username is available</p> -->
            </div>
        </div>

        <div class="field">
        <label class="label">Password</label>
        <div class="control">
            <input class="input" type="password" v-model="user.password" placeholder="Password">
        </div>
        </div>

        <div class="container">
            <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Create an account</button>
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
  name: 'app',
  data () {
    return {
        user:{
            firstName: '',
            lastName: '',
            phone: '',
            username: '',
            email: '',
            password: '',
            jenis: ''
        }
       // submitted: false
    }
  }
//   methods: {
//     register(){

//     ...mapActions('account', ['register']),
//       handleSubmit(e){
//           this.submitted = true;
//           this.$validator.validate().then(valid => {
//               if(valid){
//                   this.register(this.user);
//               }
//           });
//       }
//     }
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
