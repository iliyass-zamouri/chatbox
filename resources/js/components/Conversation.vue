<template>
  <div class="conversation">      
        <h1 v-if="contact">{{ contact ? contact.name : '' }}</h1>
        <div class="discussion">
            <MessagesFeed :contact="contact" :messages="messages" @pull="deleteMessage" />
            <MessageComposer v-if="contact" @send="sendMessage" />
        </div>
    </div>
</template>

<script>
import MessageComposer from './MessageComposer';
import MessagesFeed from './MessagesFeed';
export default {
    props:{
        contact: {
            type:Object,
            default:null
        },
        messages:{
            type:Array,
            default:[]
        }
    },
    methods:{
            sendMessage(message) {
                if (!this.contact) {
                    return;
                }
                axios.post('/conversation/send', {
                    contact_id: this.contact.id,
                    message: message
                }).then((response) => {
                    this.$emit('new', response.data);
                })
            },
          
            deleteMessage(message){
                    axios.post('/conversation/delete', {
                    id: message.id,
                }).then((response) => {
                 this.$emit('deleted', message);
                })
            },
    },
    components:{
        MessageComposer,
        MessagesFeed
    }
}
</script>

<style>
.discussion {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 0px 10px 0px;
}
.discussion p {
    width: 100%;
    height: 100%;
    display: block;
    clear: both;
}

.conversation  { 
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: stretch;
    width: 70%;
}
.conversation h1 {
    border-bottom:1px solid #D2D2D2; 
    padding: 10px;
    box-shadow: rgb(149 157 165 / 20%) 0px 8px 24px;
    text-align: left;
    font-family: 'Poppins', sans-serif;
    background-color: transparent;
    font-weight: 600;
    color: #2564FF;
    font-size: 20px;
    margin: 0;
}
@media only screen and (max-width: 768px) {
    .conversation {
        width: 85%;
    }
}

</style>