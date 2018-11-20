<template>
<div class="container is-fullhd booking"><br>
    <div class="notification">
        <div class="title is-8" style="color:green">Booking</div>
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
            <p class="control has-icons-left">
                <span class="select">
                <select>
                    <option selected>Hair</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
                </span>
            </p>
            </div>

            <div class="control">
                <label class="label">Booking Date</label>
                <input class="input" type="date" placeholder="Booking Date">
            </div>

            <div class="control">
                <label class="label">Arrival Date</label>
                <input class="input" type="date" placeholder="Arrival Date">
            </div>
            <br>
            <div class="field">
            <p class="control">
                <button class="button is-success">
                Booking
                </button>
            </p>
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
</style>
