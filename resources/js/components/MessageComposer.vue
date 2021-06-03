<template>
    <div class="composer">
        <textarea v-model="message" @keydown.enter="send" placeholder="Type something..."></textarea>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: ''
            };
        },
        methods: {
            send(e) {
                e.preventDefault();
                
                if (this.message == '') {
                    return;
                }
                this.$emit('send', this.message);
                this.message = '';
            }
        }
    }
</script>

<style>
.composer textarea {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: 2px solid #4B7BEC;
    border-radius: 50px;
    resize: none;
    outline: none;
    margin: 10px;
    margin-left: 0;
    padding: 6px;
    color: #4c4c4c;
    font-size: 15px;
    min-height: 48px;
    width: 100%;
}


</style>
