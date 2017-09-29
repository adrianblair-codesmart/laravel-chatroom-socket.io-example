// resources/assets/js/components/App.vue

<template>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <chatrooms-dropdown v-on:changechatroom="changeChatroom" :currentchatroom='chatroom' :chatrooms="chatrooms"></chatrooms-dropdown>
                </div>
                <div class="panel-body">
                    <chat-messages :messages="messages"></chat-messages>
                </div>
                <div class="panel-footer">
                    <chat-form v-on:messagesent="addMessage" :user="user"></chat-form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: 'app',
        
        data: function() { return {
            messages: [],
            chatrooms: [],
            currentChatroom: this.chatroom
        }},
        
        props: {
            user: {
                type: Object,
                required: true,
            },
            chatroom: {
                type: Object,
                required: true,
            }
        },

        mounted() {
            this.fetchChatrooms();
            this.fetchMessages();

            Echo.private('chatroom.' + this.currentChatroom.id)
            .listen('MessageSent', (e) => {
              this.messages.push({
                message: e.message.message,
                user: e.user
              });
            });
        },

        methods: {
            fetchChatrooms() {
                axios.get('/chatrooms').then(response => {
                    this.chatrooms = response.data;
                });
            },
            changeChatroom(chatroom) {
                Echo.leave('chatroom.' + this.currentChatroom.id);
                this.currentChatroom = chatroom;
                
                axios.post('/change-chatroom', {'chatroom': chatroom} ).then(response => {
                    this.fetchMessages();
                    Echo.private('chatroom.' + chatroom.id)
                    .listen('MessageSent', (e) => {
                      this.messages.push({
                        message: e.message.message,
                        user: e.user
                      });
                    });
                });
            },
            fetchMessages() {
                axios.get('/messages').then(response => {
                    this.messages = response.data;
                });
            },

            addMessage(message) {
                this.messages.push(message);

                axios.post('/messages', message).then(response => {
                  console.log(response.data);
                });
            }
        }
    }
</script>