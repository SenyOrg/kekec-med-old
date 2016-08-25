/**
 * messenger.js
 *
 * This file takes care of all messenger related tasks in frontend
 *
 * @author Selcuk Kekec <senycorp@googmail.com>
 */

/**
 * 1. Set up the Store by retrieving data from the backend
 */
var chatStore = {
    chats: [],
    chat: null
};

/**
 * 2. Subscribe to the right channels
 */
kekecmed.websocket.subscribe('kekecmed.messenger.chat.message.created', function (data) {
    if (chatStore.chat && chatStore.chat['chat.id'] == data.chat_id) {
        /**
         * Mark chat as read
         */
        if (data.author.id != kekecmed.user.id) {
            kekecmed.api.messenger.markAsRead(data.chat_id)
        }

        chatStore.chat.messages.push({
            "author.id": data.author.id,
            "author.firstname": data.author.firstname,
            "author.lastname": data.author.lastname,
            "author.image": data.author.image,
            "message": data.message,
            "sent": data.created_at
        });

        setTimeout(function () {
            kekecmed.query('.direct-chat-messages').scrollTop(1E10)
        }, 200);
    } else {
        chatStore.chats.forEach(function(item, index) {
           if (item['chat.id'] == data.chat_id) {
               item.unread_messages++;
           }
        });
    }
});

/**
 * 3. Create necessary vue components
 */

/**
 * Component: chats
 */
kekecmed.vue.component('chats', {
    template: '#chats',
    props: [
        'items',
        'chat'
    ],
    data: function () {
        return {};
    },
    methods: {}
});

/**
 * Component: chat-item
 */
kekecmed.vue.component('chat-item', {
    template: '#chat-item',
    props: [
        'item',
        'index'
    ],
    data: function () {
        return {};
    },
    methods: {
        loadChat: function () {
            var self = this;

            kekecmed.api.messenger.getChat(this.item['chat.id'], function (response) {
                self.$root.chat = response;
                self.item.unread_messages = 0;
                self.$root.chats.$set(self.index, self.item);
            });
        }
    },
    computed: {
        imageUrl: function () {
            return kekecmed.location.getStorageUrl(this.item['participant.image']);
        }
    }
});

/**
 * Component: chat
 */
kekecmed.vue.component('chat', {
    template: '#chat',
    props: [
        'item'
    ],
    data: function () {
        return {
            message: ''
        };
    },
    methods: {
        sendMessage: function () {
            var self = this;
            kekecmed.api.messenger.sendMessage(
                this.item['chat.id'],
                this.message, function (response) {
                    self.message = '';
                });
        },
        dismiss: function () {
            chatStore.chat = null;
        }
    }
});

/**
 * Component: chat-message
 */
kekecmed.vue.component('chat-message', {
    template: '#chat-message',
    props: [
        'item',
        'index'
    ],
    data: function () {
        return {};
    },
    methods: {
        user: function () {
            return (kekecmed.user.id == this.item['author.id']);
        }
    },
    computed: {
        imageUrl: function () {
            return kekecmed.location.getStorageUrl(this.item['author.image']);
        }
    }
});

/**
 * 4. Start Vue
 */

/**
 * Create vue instance
 *
 * @type {vuejs.VueStatic}
 */
var parent = kekecmed.vue.createInstance({
    el: '#control-sidebar-messenger-tab',
    data: chatStore,
    created: function () {
        var self = this;

        kekecmed.api.messenger.getChats(function (response) {
            self.chats = response;
        });
    }
});


