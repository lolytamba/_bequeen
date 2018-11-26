<template>
<div class="container is-fullhd booking"><br>
    <div class="notification">
        <div class="title is-8" style="color:green">Booking</div>
            
            <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" id="name" type="string" placeholder="Name" v-model="name" disabled>
            </div>
            </div>

            <!-- <div class="field">
            <label class="label">Cek baby cek {{name}}</label>
            <div class="control">
                <input type="text" id="name"  placeholder="Name" v-model="name">
            </div>
            </div> -->

            <div class="field">
            <p class="control has-icons-left">
                <label class="label">Choose Type of Service</label>
                <span class="select">
                <select name="type" v-model="type">
                    <option selected>--Type of Service--</option>
                    <option>Hair Cut</option>
                    <option>Nail Art</option>
                    <option>Makeup</option>
                </select>
                </span>
            </p>
            </div>

            <div class="field">
            <div class="control">
                <label class="radio">
                <label class="label" >Paket</label>
                <input type="radio" name="question" v-model="paket" value="Exclusive">
                Exclusive
                </label>
                <label class="radio">
                <input type="radio" name="question" v-model="paket" value="Normal">
                Normal
                </label>
            </div>
            </div>

            <div class="control">
                <label class="label">Booking Date</label>
                <input class="input" type="date" placeholder="Booking Date" v-model="bookDate">
            </div>

            <div class="control">
                <label class="label">Arrival Date</label>
                <input class="input" type="date" placeholder="Arrival Date" v-model="arrivalDate"> 
            </div>
            <br>
            <div class="field">
                <p class="control">
                    <button class="button is-success" @click="handleSubmit">
                    Book
                    </button>

                    <router-link :to="{name: 'ListBook'}">
                    <button class="button is-info">
                    View 
                    </button>
                    </router-link>
                </p>

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
            type: '',
            paket: '',
            arrivalDate: '',
            bookDate: '',
            name: '',
            products: [],
            id: '',
        }
    },
    mounted(){
        this.setDefaults()
    },
    methods:{
        setDefaults(){
            let user = JSON.parse(localStorage.getItem('beQueen.user'))
            this.name = user.name
            this.id = user.id
        },
        handleSubmit(e){
            e.preventDefault()
            let type = this.type
            let paket = this.paket
            let arrivalDate = this.arrivalDate
            let bookDate = this.bookDate
            let name = this.name
            
            axios.post('api/store/'+this.id,{name,type,paket,arrivalDate,bookDate}).then((response) => {
                let data = response.data
                localStorage.setItem('service',JSON.stringify(data.product))
                localStorage.setItem('service.jwt', data.name)
                return alert('Book created');
            }).catch((err) => {
                return alert('Book Failed')
            })
        }
    }
}
</script>


<style>
.booking{
    width: 800px;
}
</style>
