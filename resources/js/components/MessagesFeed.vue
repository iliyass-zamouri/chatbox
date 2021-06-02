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
a {
  cursor: pointer;
}
</style>