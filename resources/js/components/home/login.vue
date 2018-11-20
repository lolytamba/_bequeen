<template>
    <div class="container login"><br>
        <img src="../img/logo.png"> 
        <h1>Sign in to BeQueen</h1>
        <div class="notification is-fullhd border">
            <div class="field">
            <label class="label">Username</label>
                <input class="input" type="text" placeholder="Username">
            <!-- <p class="help is-success">This username is available</p> -->
            </div>

            <div class="field">
            <label class="label">Password</label>
            <div class="control">
                <input class="input" type="text" placeholder="Password">
            </div>
            </div>

            <div class="control">
                <button class="button is-link loginB">Login</button>
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
