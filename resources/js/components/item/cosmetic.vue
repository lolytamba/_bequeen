<template>
    <!-- SHOP -->
        <div class="container">
            <br>
            <h1 class="title is-2" style="color: rgb(255, 105, 130)">Cosmetic</h1>
            <div class="columns is-mobile">
            <form @submit.prevent="buy()">
                <div class="column">
                    <div class="box">
                        <p style="text-align:center" v-bind="itemName" value="Avon"><strong>Avon</strong></p>
                        <figure class="image is-256x256">
                            <img src="../img/cosmetic/1.jpg">
                            <p style="text-align:center" v-bind="price" value="90000"><strong>Rp. 90.000</strong></p>
                        </figure>
                        <button class="button buyC">Buy</button>
                    </div>
                </div>
            </form>


            <div class="column">
                <div class="box">
                    <p style="text-align:center"><strong>Bioaqua</strong></p>
                    <figure class="image is-256x256">
                        <img src="../img/cosmetic/2.jpg">
                        <p style="text-align:center"><strong>Rp. 150.000</strong></p>
                    </figure>
                    <button class="button buyC">Buy</button>
                </div>
            </div>

            <div class="column">
                <div class="box">
                    <p style="text-align:center"><strong>Wardah's Eyeshadow</strong></p>
                    <figure class="image is-256x256">
                        <img src="../img/cosmetic/3.jpg">
                        <p style="text-align:center"><strong>Rp. 160.000</strong></p>
                    </figure>
                    <button class="button buyC">Buy</button>
                </div>
            </div>

            <div class="column">
                <div class="box">
                    <p style="text-align:center"><strong>Make Over</strong></p>
                    <figure class="image is-256x256">
                        <img src="../img/cosmetic/4.jpg">
                        <p style="text-align:center"><strong>Rp. 60.000</strong></p>
                    </figure>
                    <button class="button buyC">Buy</button>
                </div>
            </div>
        </div>
    </div>    
</template>

<script>
export default {
     data(){
        return{
            itemName:'',
            itemType:'',
            price:'',
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
        },
        buy(){
            let itemName = this.itemName
            let itemType = this.itemType
            let arrivalDate = this.arrivalDate
            let price = this.price
            
            axios.post('api/store/'+this.id,{name,type,paket,arrivalDate,bookDate}).then((response) => {
                let data = response.data
                localStorage.setItem('service',JSON.stringify(data.product))
                localStorage.setItem('service.jwt', data.name)
                alert('Book created');
            }).catch((err) => {
                alert('Book Failed')
            })
        }
    }
}
</script>

<style>
.buyC{
    background: rgb(255, 105, 130);
    color: white;
    width: 100px;
    font-size: 20px;
    margin-left: 85px;
}
</style>
