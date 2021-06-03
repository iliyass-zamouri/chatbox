<template>
<div class="contact-section">
     <div class="headind_srch">
            <div class="recent_heading">
                <h4>Contacts List</h4>
            </div>
        </div> 
        <div class="inbox">
        
        <div v-for="contact in sortedContacts" 
             :key="contact.id" @click="selectContact(contact)" 
             :class="`${contact == selected ? 'chat_list active_chat' : 'chat_list'}`">
             <div class="contact-div">
                 <div class="contact-image"> 
                     <img class="avatar" :src="contact.profile_image" :alt="contact.name"> 
                 </div>
                 <div class="contact-infos">
                     <h5>{{ contact.name }}<span class="unread" v-if="contact.unread">{{ contact.unread }}</span></h5>
                     <p>{{ contact.email }}</p>
                 </div>
            </div>
        </div>
    </div>
</div>
   
</template>

<script>
export default {
    props:{
        contacts:{
            type:Array,
            default:[]
        }
    },
    data(){
        return {
            selected: this.contacts.length ? this.contacts[0] : null
        };
    },
    methods:{
        selectContact(contact){
            this.selected = contact;
            this.$emit('selected',contact);
        }
    },
        computed: {
            sortedContacts() {
                return _.sortBy(this.contacts, [(contact) => {
                    if (contact == this.selected) {
                        return Infinity;
                    }

                    return contact.unread;
                }]).reverse();
            }
        }
}
</script>

<style scoped>

.headind_srch { 
    padding:10px 29px 10px 20px; 
    overflow:hidden;
    border-bottom:1px solid #D2D2D2; 
    background-color: #fff; 
}
.recent_heading h4 {
    color: #4B7BEC;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 21px;
    margin: auto;
}  

.contact-image {
    width: 10%;
    height: 10%;
}

.avatar {
    vertical-align: middle;
    width: 40px;
    height: 40px;
    border-radius: 100px;
}

.contact-infos {
    width: 90%;
    padding: 0 0 0 15px;
}
.contact-infos h5{ 
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size:15px; 
    color:#464646; 
    margin:0 0 8px 0;
}
.contact-infos p{ 
    font-family: 'Poppins', sans-serif;
    font-size:14px; 
    color:#989898; 
    margin:auto}

.active_chat{
    background-image: linear-gradient(to left, rgba(255,0,0,0), rgba(75, 123, 236,0.1));
}

.chat_list {
    border-bottom:1px solid #D2D2D2; 
    padding: 18px 16px 10px;
    cursor: pointer;
}

.inbox { height: 550px; overflow-y: scroll;}

.inbox::-webkit-scrollbar {display: none;}

.contact-section {
    display: flex;
    flex-direction: column;
}
.contact-div{ 
    overflow:hidden; 
    clear:both; 
    display: flex;
    flex-direction: row;
}
.unread {
    font-family: 'Poppins', sans-serif;
    background-color: seagreen;
    margin-left: 5px;
    color: white;
    border-radius: 5px;
    padding-left: 2px;
    padding-right: 2px;
    margin:0 0 8px 0;
    float:right;
}

@media only screen and (max-width: 768px) {
    .contact-infos {
        display: none;
    }
    .headind_srch {
        display: none;
    }
    .avatar {
        vertical-align: middle;
        width: 100%;
        height:100%;
        border-radius: 100px;
    }
    .contact-image {
        width: 100%;
        height: 100%;
    }
}

</style>