<template>
<body>
   <div class="content main" id="homeLayout">
        <img src="../img/home.png">
            <div class="notification two">
                <div class="columns">
                    <div class="column">
                        <img src="../img/welcome.jpg">
                    </div>
                    <div class="column">
                        <h1 class="title is-2" style="color:rgb(0, 140, 255)">WELCOME TO BEQUEEN</h1>
                        <h1 class="title is-4" style="color:black">To BeQueen Experience Every Women is Queen</h1>
                    </div>
                </div>
            </div><br>

        <div class="container">
            <h1 class="title is-2" style="color:rgb(0, 140, 255)">Services</h1>
            <div class="columns is-mobile">
            <div class="column">
                <div class="card">
                <div class="card-image">
                    <figure class="image">
                    <img src="../img/hair.jpg">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="media">
                    <div class="media-content">
                        <p class="title is-4">Hair Styling</p>
                        <p class="subtitle is-6">BeQueen</p>
                    </div>
                    </div>

                    <div class="content">
                        A hairstyle, hairdo, or haircut refers to the styling of hair, 
                        usually on the human scalp. Sometimes, this could also mean an editing 
                        of facial or body hair. 
                    <br>
                    </div>
                    <router-link :to="{name: 'Book'}">
                    <button class="button detailButton">Book</button>
                    </router-link>
                </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                <div class="card-image">
                    <figure class="image">
                    <img src="../img/nail art.jpg" style="height: 225px">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="media">
                    <div class="media-content">
                        <p class="title is-4">Nail Art</p>
                        <p class="subtitle is-6">BeQueen</p>
                    </div>
                    </div>

                    <div class="content">
                        Nail art is a creative way to paint, decorate, enhance, 
                        and embellish the nails. It is a type of artwork that can be done on 
                        fingernails and toenails, usually after manicures or pedicures.
                    <br>
                    </div>
                    <router-link :to="{name: 'Book'}">
                    <button class="button detailButton">Book</button>
                    </router-link>
                </div>
                </div>
            </div>
            
            <div class="column">
                <div class="card">
                <div class="card-image">
                    <figure class="image">
                    <img src="../img/makeup.jpg" style="height: 225px">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="media">
                    <div class="media-content">
                        <p class="title is-4">Cosmetics</p>
                        <p class="subtitle is-6">BeQueen</p>
                    </div>
                    </div>

                    <div class="content">
                        Cosmetics (such as lipstick, mascara, and eye shadow) are substances or 
                        products used to enhance or alter the appearance of the face or fragrance 
                        and texture of the body.
                    <br>
                    </div>
                    <router-link :to="{name: 'Book'}">
                    <button class="button detailButton">Book</button>
                    </router-link>
                </div>
                </div>
            </div>            
            </div>
        </div>
    <br><br>

        <div class="notification two contact">
        <div class="columns">
            <div class="column">
                <h1 class="title is-2" style="color:rgb(0, 140, 255)">Contact</h1>
                <h1 class="title is-4" style="color:black">Email: bequeen@thekingcorp.org</h1>
                <h1 class="title is-4" style="color:black">Address : Jl. The King Number 4545, Yogyakarta</h1>
                <h1 class="title is-4" style="color:black">Phone : (0751) 561290</h1>
            </div>
            <div class="column">
                 <img src="../img/services.jpg">
            </div>
        </div>
        </div>

        <div class="notification style cek">    
        </div>
   </div>
</body>
</template>


<style>
.first{
    background: blue;
}

.style{
    background: lightblue;
}

.two{
    background: #cceeff;
}

.body{
    background: blue;
}
.card{
    width: 400px;
    height: 500px;
}

.detailButton{
    background: #33bbff;
    color: white;
    width: 300px;
    font-size: 20px;
    margin-left: 20px;
}
.main{
    background: #e6f2ff;
}

.title{
    font-size: 20px;
}
.subtitle{
    font-size: 12px;
}
</style>

<script>
    export default {
        data(){
            return{
               
            }
        }

    }
</script>
