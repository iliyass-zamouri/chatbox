<template>
  <div v-if="contact" class="feed" ref="feed">
    <div v-for="message in messages" :v-if="message.deleted_at === null" :key="message.id" :class="`${message.to == contact.id ? 'outgoing_msg' : 'incoming_msg'}`">
      <div :class="`${message.to == contact.id ? 'sent_msg' : 'received_msg'}`">
          <p>{{ message.text }}</p>
          <span class="time_date"> {{ message.updated_at | formatDate }} <a v-if="!(contact.id==message.from)">|</a> <a v-if="!(contact.id==message.from)" @click="deleteMessageTrigger(message)"><i class="fa fa-trash" aria-hidden="true"></i></a> </span>
      </div>
    </div>
  </div>
</template>

<script>
import moment from 'moment';
Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('MM/DD/YYYY - hh:mm')
    }
});
export default {
    props:{
        contact:{
            type: Object
        },
        messages:{
            type:Array,
            required:true
        }
    },        
    methods: {
      scrollToBottom() {
        setTimeout(() => {
                    this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
                }, 50);
            },
            deleteMessageTrigger(message){
              this.$emit('pull', message);
            }
        },
                watch: {
            contact(contact) {
                this.scrollToBottom();
            },
            messages(messages) {
                this.scrollToBottom();
            }
        }
}
</script>

<style>
.feed {
  flex: 1 1 auto;
  height: 100%;
  max-height: calc( 100vh - 200px );
  padding: 4px;
  overflow: scroll;
  flex-direction: column;
}
.outgoing_msg{ 
  overflow:hidden; 
  margin:20px 0 20px;
}
.incoming_msg{ overflow:hidden; 
  margin:20px 0 20px;
}
.feed::-webkit-scrollbar {display: none;}
a {
  cursor: pointer;
}
.received_msg {
  width: fit-content;
}
.received_msg p {
  font-family: 'Poppins', sans-serif;
  background: #F0F0F0 none repeat scroll 0 0;
  border-radius: 20px;
  color: #383838;
  font-size: 14px;
  margin: 0;
  padding: 7px 10px 7px 12px;
  width: 100%;
}
.sent_msg p {
  font-family: 'Poppins', sans-serif;
  background: #2564FF  none repeat scroll 0 0;
  border-radius: 20px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 7px 10px 7px 12px;
  width:100%;
}

.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}

.sent_msg {
  float: right;
  width: fit-content;
}
</style>