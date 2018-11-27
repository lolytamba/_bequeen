<template>
<div class="container is-fullhd register">
    <div class="notification register">
        <div class="title is-8" style="color:lightblue">BeQueen Salon Requirements</div>

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
        <label class="label">Age</label>
        <div class="control">
            <input class="input" type="number" v-model="age"  placeholder="Age">
        </div>
        </div>

        <div class="field">
            <p class="control has-icons-left">
                <label class="label">Position</label>
                <span class="select">
                <select name="type" v-model="position">
                    <option selected>--Join Us As--</option>
                    <option>Hair Stylist</option>
                    <option>Nail Art apa</option>
                    <option>Makeup apa</option>
                </select>
                </span>
            </p>
            </div>

        <div class="field">
            <label class="label">Experience</label>
            <div class="control">
                <textarea class="textarea is-success" placeholder="Experience" v-model="experience"></textarea>
            </div>
            </div>

        <div class="container">
            <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit" @click="handleSubmit">Submit</button>
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
        position: '',
        age: '',
        experience: '',
    }
  },
  methods: {
    handleSubmit(e){
        e.preventDefault()
        if(this.name == '' | this.position=='', this.age=='', this.phone=='', this.experience==''){
            alert('The field is required')
        }
        if(this.age.length >= 30)
        {
            alert('Maaf kamu terlalu tua');
        }
        let name = this.name
        let phone = this.phone
        let age = this.age
        let experience = this.experience
        let position = this.position
       
        axios.post('api/storeJob', {name, phone, position, age, experience}).then((response) => {
            let data = response.data
                alert('Submit Success')
            }).catch((err) => {
                alert('Submit Failed')
            })

            // this.name = null,
            // this.phone = null,
            // this.age = null,
            // this.experience = null,
            // this.position = null
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
