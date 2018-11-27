<template>
    <!-- SHOP -->
        <div class="container">
            <br>
            <h1 class="title is-2" style="color: rgb(255, 105, 130)">Cosmetic</h1>
            <div class="columns is-mobile">
         
                <div class="column">
                    <div class="box">
                        <p style="text-align:center" value="Avon"><strong>Avon</strong></p>
                        <figure class="image is-256x256">
                            <img src="../img/cosmetic/1.jpg">
                            <p style="text-align:center" value="90000"><strong>Rp. 90.000</strong></p>
                        </figure>
                        <router-link :to="{name: 'BuyItem', params: {index: 0}} "  class="button buyC">
                           Buy
                        </router-link>  
                    </div>
                </div>
         
            <div class="column">
                <div class="box">
                    <p style="text-align:center"><strong>Bioaqua</strong></p>
                    <figure class="image is-256x256">
                        <img src="../img/cosmetic/2.jpg">
                        <p style="text-align:center"><strong>Rp. 150.000</strong></p>
                    </figure>
                    <router-link :to="{name: 'BuyItem', params: {index: 1}} "  class="button buyC">
                        Buy
                    </router-link>   
                </div>
            </div>

            <div class="column">
                <div class="box">
                    <p style="text-align:center"><strong>Wardah's Eyeshadow</strong></p>
                    <figure class="image is-256x256">
                        <img src="../img/cosmetic/3.jpg">
                        <p style="text-align:center"><strong>Rp. 160.000</strong></p>
                    </figure>
                    <router-link :to="{name: 'BuyItem', params: {index: 2}} "  class="button buyC">
                        Buy
                    </router-link>  
                </div>
            </div>

            <div class="column">
                <div class="box">
                    <p style="text-align:center"><strong>Make Over</strong></p>
                    <figure class="image is-256x256">
                        <img src="../img/cosmetic/4.jpg">
                        <p style="text-align:center"><strong>Rp. 60.000</strong></p>
                    </figure>
                    <router-link :to="{name: 'BuyItem', params: {index: 3}} "  class="button buyC">
                        Buy
                    </router-link>  
                </div>
            </div>
        </div>
    </div>    
</template>

<script>
export default {
    data(){
        return{
            item : [
                {
                    itemName: 'Avon', 
                    price: '90000',
                    color: 'pink'
                },
                {
                    itemName: 'Bioaqua', 
                    price: '150000',
                    color: 'pink'
                },
                {
                    itemName: 'Wardah Eyeshadow', 
                    price: '90000',
                    color: 'pink'
                },
                {
                    itemName: 'Make Over', 
                    price: '60000',
                    color: 'pink'
                }

            ],
            id: '',
            name: ''
        }
    },
    mounted(){
        this.setDefaults()
    },
    methods:{
        setDefaults(){
            let user = JSON.parse(localStorage.getItem('beQueen.user'))
            this.name = user.name
        },
        handleSubmit(e){
            e.preventDefault()
            let name = this.name
            let itemName = this.itemName
            let itemType = this.itemType
            let price = this.price
            let color = this.color

            axios.post('api/storeItem/'+this.id,{name,itemName,itemType,color,price}).then((response) => {
                let data = response.data
                alert('Udah dibeli ya');
            }).catch((err) => {
                alert('Error')
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
    /* margin-left: 60px; */
    margin-top: 50px;
}
</style>
