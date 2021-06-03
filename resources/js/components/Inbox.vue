<template>
    <div class="messaging">
        <div class="primary-inbox">
            <div class="side-contacts">
                <ContactsList :contacts="contacts" @selected="startConversation" />
            </div>
                <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage" @deleted="deleteMessage" />
        </div>
    </div>
</template>

<script>
import Conversation from './Conversation';
import ContactsList from './ContactsList';
    export default {
        props:{
            user:Object,
            required:true
        },
        data(){
          return {
              selectedContact : null,
              messages : [],
              contacts : [],
          };
        },
        mounted() {
            window.Echo.private("messages." + this.user.id)
            .listen('NewMessage', (e) => {
                console.log(e.message);
                this.handleIncoming(e.message);
            });



            // $http.get('api/user').then(response => {
            // console.log(response.body);
            // })

            // window.Echo.private("messages." + this.user.id)
            // .listen('NewMessage', (e) => {
            //     console.log(e.message);
            //     this.handleIncoming(e.message,'new');
            // });

            axios.get('/contacts').then((response)=>{
                this.contacts = response.data;
            });
        },
        methods:{
            handleIncoming(message) {

                    if (this.selectedContact && message.from == this.selectedContact.id) {
                        console.log(message);
                        this.saveNewMessage(message);
                        return;
                    }
                this.updateCount(message.from_contact, false);
            },
            updateCount(contact, reset) {
                this.contacts = this.contacts.map((single) => {
                    if (single.id !== contact.id) {
                        return single;
                    }

                    if (reset)
                        single.unread = 0;
                    else
                        single.unread += 1;

                    return single;
                });
            },
            startConversation(contact){
                this.updateCount(contact,true);
                axios.get(`/conversation/${contact.id}`).then((response)=>{
                    this.messages = response.data;
                    this.selectedContact = contact;
                })
            },
            saveNewMessage(message){
                this.messages.push(message);
            },
            deleteMessage(message){
                console.log(message);
                this.messages.splice(this.indexOfMessage(message),1);
            },
            indexOfMessage(response){
                for (let i = 0; i < this.messages.length; i++) {
                    if (response.id == this.messages[i].id) {
                        console.log('methode');
                        console.log(this.messages[i].id);
                        return i;
                    }
                }
            },
            
        },
        components:{
            Conversation,
            ContactsList
        }
    }
</script>

<style>
.side-contacts {
    background: #f8f8f8 none repeat scroll 0 0;
    border:1px solid #D2D2D2; 
    overflow: hidden;
    width: 40%;
}

@media only screen and (max-width: 768px) {

    .side-contacts {
        width: 15%;
    }
}
</style>


