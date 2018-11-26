<template>
    <!-- SHOP -->
        <div class="container">
            <br>
            <h1 class="title is-2" style="color: rgb(255, 105, 130)" v-bind="itemType" value="Cosmetic">Cosmetic</h1>
            <div class="columns is-mobile">
            <div class="column">
                <div class="box">
                    <p style="text-align:center" v-bind="itemName" value="Avon"><strong>Avon</strong></p>
                    <figure class="image is-256x256">
                        <img src="../img/cosmetic/1.jpg">
                        <p style="text-align:center" v-bind="price" value="90000"><strong>Rp. 90.000</strong></p>
                    </figure>
                    <button class="button buyC" @click="handleSubmit">Buy</button>
                </div>
            </div>

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
            name:'',
            itemName:'',
            itemType:'',
            price:''
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
        handleSubmit(e){
            e.preventDefault
            let name = this.name
            let itemName = this.itemName
            let itemType = this.itemType
            let price = this.price

            axios.post('api/storeItem', {name,itemName,itemType, price}).then((response) => {
            let data = response.data
            localStorage.setItem('beQueen.item', JSON.stringify(data.item))
            // localStorage.setItem('beKing.jwt', data.token)
            
            //     if (localStorage.getItem('beKing.jwt') != null) {
            //         let nextUrl = this.$route.params.nextUrl
                 //   this.$router.push('/login')
                    return alert('Success')
                //}
            }).catch((err) => {
                return alert('Failed')
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
