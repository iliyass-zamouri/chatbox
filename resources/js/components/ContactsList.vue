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
                     <h5>{{ contact.name }}<span class="unread" v-if="contact.unread">{{ contact.unread }}</span><span class="chat_date">Dec 25</span></h5>
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
.unread {
    background-color: seagreen;
    margin-left: 5px;
    color: white;
    border-radius: 5px;
    padding-left: 2px;
    padding-right: 2px;
}
</style>