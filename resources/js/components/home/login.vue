<template>
    <div class="container login"><br>
        <img src="../img/logo.png">
        <h1>Sign in to BeQueen</h1>
        <div class="notification is-fullhd border">
            <div class="field">
            <label class="label">Email</label>
                <input class="input" type="email" placeholder="Email" v-model="email">
            <!-- <p class="help is-success">This username is available</p> -->
            </div>

            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input class="input" type="password" placeholder="Password" v-model="password">
                </div>
            </div>

            <div class="control">
                <button class="button is-link loginB" @click="handleSubmit">Login</button>
            </div>
        </div>
    </div>
</template>

<style>
.login{
    margin-top: 5px;
    width: 450px;
    height: 450px;
}
.login.h1{
    text-align: center;
    color: lightblue;
}
.loginB{
    width: 390px;
}
.border{
    background: ghostwhite;
}
</style>

<script>
export default {
    data() {
        return {
            email: '',
            password: ''
        }
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault()
            if (this.password.length > 0) {
                let email = this.email
                let password = this.password

                axios.post('api/login', {email, password}).then(response => {
                    let user = response.data.user
                    let is_admin = user.is_admin

                    localStorage.setItem('beQueen.user', JSON.stringify(user))
                    localStorage.setItem('beKing.jwt', response.data.token)

                    if (localStorage.getItem('beKing.jwt') != null) {
                        this.$emit('loggedIn')
                        if (this.$route.params.nextUrl != null) {
                            this.$router.push(this.$route.params.nextUrl)
                        } else {
                            this.$router.push((is_admin == 1 ? 'admin' : 'dashboard'))
                        }
                    }
                });
            }
        }
    }
}
</script>
