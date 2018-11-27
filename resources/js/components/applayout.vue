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

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
            <router-link :to="{name:'HomeLayout'}" class="navbar-item">
                Home
            </router-link>

            <router-link :to="{name:'Job'}" class="navbar-item" v-if="!isLoggedIn">
                !New Job
            </router-link>

            <router-link :to="{name:'ViewJob'}" class="navbar-item" v-if="!isLoggedIn">
                !List Requirements
            </router-link>

            <router-link :to="{name:'Book'}" class='navbar-item' v-if="isLoggedIn">
                Book
            </router-link>

            <router-link :to="{name:'Feedback'}"  class='navbar-item' v-if="isLoggedIn">
                Feedback
            </router-link>

            <div class="navbar-item has-dropdown is-hoverable" v-if="isLoggedIn">
                <a class="navbar-link">
                Shop
                </a>

                <div class="navbar-dropdown">
                <a class="navbar-item">
                    <router-link :to="{name:'Item'}"  class='navbar-item'>
                        Cosmetic
                     </router-link>
                </a>
                <a class="navbar-item">
                    <router-link :to="{name:'Body'}"  class='navbar-item'>
                        Body Treatment
                     </router-link>
                </a>
                <a class="navbar-item">
                    <router-link :to="{name:'Hair'}"  class='navbar-item'>
                        Hair Treatment
                    </router-link>
                </a>
                </div>

                <router-link :to="{name:'Contact'}" class='navbar-item' v-if="isLoggedIn">
                  Contact
                </router-link>

            </div>
        </div>

            <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                <a class="button is-link is-outlined" v-if="!isLoggedIn">
                    <router-link :to="{name:'Register'}" class="" v-if="!isLoggedIn">
                         <strong>Register</strong>
                    </router-link>
                </a>

                <a class="button is-info is-outlined" v-if="!isLoggedIn">
                    <router-link :to="{name: 'LogIn' }" class="" v-if="!isLoggedIn">
                        <strong>Log in</strong>
                    </router-link>
                </a>

                
                <a class="button is-info is-outlined">
                <span v-if="isLoggedIn">
                    <router-link :to="{name: 'Profile'}" class="nav-link" v-if="user_type == 0">
                        <strong>Welcome, {{name}}!</strong>
                    </router-link>
                </span>
                </a>

                <a class="button is-info is-outlined" @click="logout" v-if="isLoggedIn">
                    <router-link :to="{name:''}" class="" v-if="isLoggedIn">
                        <strong>Log out</strong>
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
                <router-view @loggedIn="change"></router-view>
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
                name: null,
                user_type: 0,
                isLoggedIn: localStorage.getItem('beKing.jwt') != null
            }
        },
        mounted(){
            this.setDefaults()    
        },
        methods:{
            setDefaults(){
                if(this.isLoggedIn){
                    let user = JSON.parse(localStorage.getItem('beQueen.user'))
                    this.name = user.name
                    this.user_type = user.is_admin
                }
            },
            change(){
                this.isLoggedIn = localStorage.getItem('beKing.jwt') != null
                this.setDefaults()
            },
            logout(){
                localStorage.removeItem('beKing.jwt')
                localStorage.removeItem('beQueen.user')
                this.change()
                this.$router.push('/')
            }
        }

    }
</script>
