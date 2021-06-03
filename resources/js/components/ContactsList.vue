<template>
    <div class="inbox">
        <div v-for="contact in sortedContacts" 
                :key="contact.id" @click="selectContact(contact)" 
                :class="`${contact == selected ? 'chat_list active_chat' : 'chat_list'}`">
                <div class="contact-div">
                        <span class="unread" v-if="contact.unread">{{ contact.unread }}</span>
                    <div class="contact-image"> 
                        <img class="avatar" :src="contact.profile_image" :alt="contact.name"> 
                    </div>
                    <div class="contact-infos">
                        <h5>{{ contact.name }}</h5>
                        <p>{{ contact.email }}</p>
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
    width: 20%;
    height: 20%;
}

.contact-image img {
    object-fit: scale-down;
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
    margin:auto
}

.active_chat{
    background-image: linear-gradient(to left, rgba(255,0,0,0), rgba(75, 123, 236,0.2));
}

.chat_list {
    border-bottom:1px solid #D2D2D2; 
    padding: 16px;
    cursor: pointer;
}

.inbox {
    display: flex;
    flex-direction: column;
    height: calc( 100vh - 70px );
    overflow-y: scroll;
    scrollbar-width: thin;          /* "auto" or "thin" */
    scrollbar-color: #2564FF transparent; 
}

*::-webkit-scrollbar {
  width: 10px;
}

*::-webkit-scrollbar-track {
  background: transparent;
}

*::-webkit-scrollbar-thumb {
  background-color: #D2D2D2;
  border-radius: 20px; 
}

.contact-div{
    overflow:hidden;
    clear:both;
    display: flex;
    position: relative;
    flex-direction: row;
}
.unread {
    position: absolute;
    right: 2px;
    font-family: 'Poppins', sans-serif;
    background-color: seagreen;
    margin-left: 5px;
    color: white;
    border-radius: 40%;
    padding-left: 5px;
    padding-right: 5px;
    margin: 0; 
    width: 5px;
    height: 5px;
    font-size: 12px;
    float: right;
}
.active_chat .contact-div .contact-infos h5 {
    font-weight: 700; 
    color:#000; 
}

@media only screen and (max-width: 768px) {
    .contact-infos {
        display: none;
    }
    .headind_srch {
        display: none;
    }
    .chat_list {
        border-bottom:1px solid #D2D2D2; 
        padding: 5px;
        cursor: pointer;
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
    .active_chat .avatar{
        border: #4B7BEC solid 2px;
    }
    .inbox::-webkit-scrollbar {display: none;}
}

</style>