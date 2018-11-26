<template>
<div class="container is-fullhd booking"><br>
    <div class="notification">
        <div class="title is-8" style="color:green">Edit Booking</div>
            <form @submit.prevent="update()">
                <div class="field">
                <label class="label">Name</label>
                <div class="control">
                    <input class="input" id="name" type="string" placeholder="Name" v-model="name" disabled> 
                </div>
                </div>

                <div class="field">
                <label class="label">Type of Service</label>
                <div class="control">
                    <input class="input" id="type" type="string" placeholder="Type of Service" v-model="product.type" disabled>
                </div>
                </div>

                <div class="control">
                    <label class="label">Paket</label>
                    <input class="input" type="string" placeholder="Paket" v-model="product.paket" disabled>
                </div>

                <div class="control">
                    <label class="label">Arrival Date</label>
                    <input class="input" type="date" placeholder="Arrival Date" v-model="product.arrivalDate">
                </div>

                <div class="control">
                    <label class="label">Booking Date</label>
                    <input class="input" type="date" placeholder="Booking Date" v-model="product.bookDate">
                </div>

                <br>
                <div class="field">
                    <p class="control">
                        <button class="button is-success" type="submit">
                        Send
                        </button>
                    </p>

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
            product: {
                type: '',
                paket: '',
                arrivalDate: '',
                bookDate: '',

            },
            id: '',
        }
    },
    mounted(){
        this.setDefaults()
        axios.get('/api/products/detail/'+this.$route.params.id).then(response => this.product = response.data)    
    },
    methods:{
        setDefaults(){
            let user = JSON.parse(localStorage.getItem('beQueen.user'))
            this.name = user.name
            this.id = user.id
        },
        update() {
            
            axios.patch('/api/products/update/'+this.$route.params.id,{
                name  : this.product.name,
                type : this.product.type,
                paket : this.product.price,
                arrivalDate : this.product.arrivalDate,
                bookDate: this.product.bookDate
            })
            .then(response =>{
                this.$router.push({name: 'ListBook'})
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
</style>
