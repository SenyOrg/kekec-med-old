kekecmed.websocket._config.host = '192.168.10.10';
kekecmed.websocket._config.realm = 'kekecmed';
kekecmed.developmentMode(true);

kekecmed.websocket.subscribe('kekecmed.queue.item.created', function (payload) {
    dataStore.events.$remove(
        dataStore.events.filter(function (item) {
            if (item.id == payload.event_id) {
                return true;
            }
        })[0]
    );

    dataStore.items.push(payload);
});

kekecmed.websocket.subscribe('kekecmed.queue.item.deleted', function (payload) {
    console.log(payload);
    dataStore.items.$remove(
        dataStore.items.filter(function (item) {
            if (item.id == payload.queueItemId) {
                return true;
            }
        })[0]
    );

    dataStore.events.push(payload);
});

kekecmed.websocket.subscribe('kekecmed.queue.item.moved', function (payload) {
    var item = dataStore.items.filter(function (item) {
        if (item.id == payload.id) {
            return true;
        }
    })[0];

    var index = dataStore.items.indexOf(item);

    item.queue_id = payload.queue_id;

    dataStore.items.$set(index, item);
});

kekecmed.vue.component('ingoing-queue', {
    template: '#ingoing-queue',
    props: [
        'queue',
        'items'
    ],
    data: function () {
        return {};
    },
    methods: {
        queueFilter: function (item, index, items) {
            if (item.queue_id == this.queue.id)
                return true;
        }
    }
});

kekecmed.vue.component('outgoing-queue', {
    template: '#outgoing-queue',
    props: [
        'queue',
        'items'
    ],
    data: function () {
        return {};
    },
    methods: {
        queueFilter: function (item, index, items) {
            if (item.queue_id == this.queue.id)
                return true;
        }
    }
});

/**
 * Component: Single Queue
 */
kekecmed.vue.component('single-queue', {
    template: '#single-queue',
    props: [
        'queue',
        'items'
    ],
    created: function () {

    },
    data: function () {
        return {};
    },
    methods: {
        queueFilter: function (item, index, items) {
            if (item.queue_id == this.queue.id)
                return true;
        }
    }
});

/**
 * Component: Single Queue
 */
kekecmed.vue.component('multiple-queue', {
    template: '#multiple-queue',
    props: [
        'queue',
        'items'
    ],
    created: function () {
    },
    data: function () {
        return {};
    },
    methods: {
        queueFilter: function (item, index, items) {
            if (item.queue_id == this.queue.id)
                return true;
        }
    }
});

/**
 * Component: Queue item
 */
kekecmed.vue.component('queue-item', {
    template: '#queue-item',
    props: [
        'item',
        'ingoing'
    ],
    data: function () {
        return {
            selectedQueue: 0
        };
    },
    methods: {
        delete: function () {
            //this.$root.items.$remove(this.item);
            kekecmed.ajax.request('queue/delete/' + this.item.id, {
                success: function () {

                }
            });
        },
        moveToQueue: function () {
            //this.item.queue_id = this.selectedQueue;
            //this.$root.updateItem(this.item);

            kekecmed.ajax.request('queue/move/' + this.item.id + '/' + this.selectedQueue, {
                success: function () {

                }
            });
        }
    }
});

/**
 * Component: Queue item
 */
kekecmed.vue.component('event-queue', {
    template: '#event-queue',
    props: [
        'events'
    ],
    data: function () {
        return {};
    },
    methods: {}
});

/**
 * Component: Queue item
 */
kekecmed.vue.component('event-item', {
    template: '#event-item',
    props: [
        'item'
    ],
    data: function () {
        return {};
    },
    methods: {
        delete: function () {
            this.$root.events.$remove(this.item);
        },
        moveToIngoing: function () {
            var self = this;
            kekecmed.ajax.request('queue/create/' + this.item.id, {
                success: function () {

                }
            });
        }
    }
});


/**
 * Create vue instance
 *
 * @type {vuejs.VueStatic}
 */
var parent = kekecmed.vue.createInstance({
    el: '#queue-app',
    data: dataStore,
    events: {
        'child-msg': function (msg) {
            // `this` in event callbacks are automatically bound
            // to the instance that registered it
            this.messages.push(msg)
        }
    },
    methods: {
        updateItem: function (item) {
            this.items.$set(this.items.indexOf(item), item);
        }
    }
});