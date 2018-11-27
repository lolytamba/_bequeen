<template>
<div class="container is-fullhd booking"><br>
    <div class="notification">
        <div class="title is-8" style="color:rgb(255, 105, 130)">Edit Item</div>
        <form @submit.prevent="update()">
            <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" type="text" placeholder="Name" v-model="name" disabled>
            </div>
            </div>

            <label class="label">Item Type</label>
            <div class="control">
                <input class="input" type="string" placeholder="Item Type" disabled> 
                {{item[id].itemType}}
            </div><br>
            
            <label class="label">Item Name</label>
            <div class="control">
                <input class="input" type="string" placeholder="Item Name" disabled>
            </div><br>

             <div class="field">
            <div class="control">
                <label class="radio">
                <label class="label" >Color Edition</label>
                <input type="radio" name="question" v-model="color" value="Exclusive">
                Pink
                </label>
                <label class="radio">
                <input type="radio" name="question" v-model="color" value="Normal">
                Red
                </label>
                <label class="radio">
                <input type="radio" name="question" v-model="color" value="Normal">
                Brown
                </label>
            </div>
            </div>

            <label class="label">Price</label>
            <div class="control">
                <input class="input" type="number" placeholder="Price" disabled>
            </div><br>

            <br>
            <div class="field">
                <button class="button feedback" type="submit">Send</button>
            </div>
        </form>
    </div>

    <div class="notification style">
    </div>
    
</div>
</template>

<script>
export default {
    data(){
        return{
            name:'',
            item : [
                {
                    itemType: 'Cosmetic',
                    itemName: 'Avon', 
                    price: '90000',
                    color: 'pink'
                },
                {
                    itemType: 'Cosmetic',
                    itemName: 'Bioaqua', 
                    price: '150000',
                    color: 'pink'
                },
                {
                    itemType: 'Cosmetic',
                    itemName: 'Wardah Eyeshadow', 
                    price: '90000',
                    color: 'pink'
                },
                {
                    itemType: 'Cosmetic',
                    itemName: 'Make Over', 
                    price: '60000',
                    color: ''
                
                }
            ],
            id:''
        }
    },
    mounted(){
        this.setDefaults()
        axios.get('/api/feedbacks/detail/'+this.$route.params.id).then(response => this.feedback = response.data)    
    },
    methods:{
        setDefaults(){
            let user = JSON.parse(localStorage.getItem('beQueen.user'))
            this.name = user.name
            this.email = user.email
        },
        update() { 
            axios.patch('/api/feedbacks/update/'+this.$route.params.id,{
                message  : this.feedback.message
            })
            .then(response =>{
                this.$router.push({name: 'ViewFeedback'})
            })
            .catch(response => {
                alert("error");
            })
        },
    }
}
</script>

<style>
.booking{
    width: 800px;   
}
.feedback{
    background:rgb(255, 105, 130);
    width: 100px;
    color: white;
    font-size: 15px;
}
</style>
