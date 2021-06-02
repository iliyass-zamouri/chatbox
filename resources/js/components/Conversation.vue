<template>
    <div class="conversation">
        <h1>{{ contact ? contact.name : '' }}</h1>
        <MessagesFeed :contact="contact" :messages="messages" @pull="deleteMessage" />
        <MessageComposer @send="sendMessage" />
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
            sendMessage(text) {
                if (!this.contact) {
                    return;
                }

                axios.post('/conversation/send', {
                    contact_id: this.contact.id,
                    text: text
                }).then((response) => {
                    this.$emit('new', response.data);
                })
            },
          
            deleteMessage(message){
                    axios.post('/conversation/delete', {
                    id: message.id,
                }).then((response) => {
                    console.log(response.data + "hello");
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