<template>
<div class="container is-fullhd booking"><br>
    <div class="notification">
        <div class="title is-8" style="color:blue">Feedback</div>
            <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" type="text" placeholder="Name">
            </div>
            </div>

            <label class="label">Email</label>
            <div class="control">
                <input class="input" type="email" placeholder="Email">
            </div><br>

            <div class="field">
            <label class="label">Message</label>
            <div class="control">
                <textarea class="textarea is-success" placeholder="Message"></textarea>
            </div>
            </div>

            <br>
            <div class="field">
                <button class="button feedback">Send</button>
            </div>
    </div>

    <div class="notification style">
    </div>
    
</div>
</template>

<style>
.booking{
    width: 800px;   
}
.feedback{
    background: blue;
    width: 100px;
    color: white;
    font-size: 15px;
}
</style>
