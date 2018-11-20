<template>
   <div class="content" id="homeLayout">
        <nav class="navbar style" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu" :class="{'is-active': active}">
            <div class="navbar-start">
            <router-link :to="{name:'HomeLayout'}" class="navbar-item" :class="{'is-black': active}">
                Home
            </router-link>

                <!-- <router-link :to="{name:'Service'}"  class="navbar-item" :class="{'is-black': active}">
                    Services
                </router-link>  -->

            <router-link :to="{name:'Book'}" class='navbar-item' :class="{'is-black' : active}">
                Book
            </router-link>

            <router-link :to="{name:'Feedback'}"  class='navbar-item' :class="{'is-black' : active}">
                Feedback
            </router-link>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                Shop
                </a>

                <div class="navbar-dropdown">
                <a class="navbar-item">
                    <router-link :to="{name:'Cosmetic'}"  class='navbar-item' :class="{'is-black' : active}">
                        Cosmetic
                     </router-link>
                </a>
                <a class="navbar-item">
                    <router-link :to="{name:'Body'}"  class='navbar-item' :class="{'is-black' : active}">
                        Body Treatment
                     </router-link>
                </a>
                <a class="navbar-item">
                    <router-link :to="{name:'Hair'}"  class='navbar-item' :class="{'is-black' : active}">
                        Hair Treatment
                    </router-link>
                </a>
                </div>

                <router-link :to="{name:''}" class='navbar-item' :class="{'is-black' : active}">
                  Contact
                </router-link>

            </div>
        </div>

            <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                <a class="button is-link is-outlined">
                    <router-link :to="{name:'Register'}" class="" :class="{'is-black': active}">
                         <strong>Register</strong>
                    </router-link>
                </a>

                <a class="button is-info is-outlined">
                    <router-link :to="{name: 'LogIn'}" class="" :class="{'is-black': active}">
                        <strong>Log in</strong>
                    </router-link>
                </a>
                </div>
            </div>
            </div>
        </div>
        </nav>

         <div id="appPage">
            <main class="pageContent">
            <transition name="fade">
                <router-view></router-view>
            </transition>
            </main>
        </div>
   </div>
</template>


<style>
.first{
    background: blue;
}

.style{
    background: lightblue;
}
</style>


<script>
    export default {
        data(){
            return{
                active: false,
            }
        },
        methods:{
            activeBurger(){
                if(this.active == false){
                    this.active = true;
                }else{
                    this.active = false;
                }
            }
        }

    }
</script>
