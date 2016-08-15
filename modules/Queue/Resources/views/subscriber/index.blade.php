@extends('theme::hero')

@section('header')
    <div style="position: absolute ;width: 300px; top:10px;">
        <span>Select a Queue:</span>
        {{\KekecMed\Core\Views\Elements\Select::factory([
        'name' => 'queueSelector',
        'id' => 'queueSelector',
        'model' => \KekecMed\Queue\Entities\Queue::class,
        'value' => 0,
        'onChange' => 'dataStore.selectedQueue=this.value'
    ])->render('edit')}}
    </div>
@endsection

@section('content')
    <div id="queue-app">
        <div id="queue-information">
            <template v-if="queueMeta">
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> Subscription successfull!</h4>
                    Subscribed to Queue !! queueMeta.title !!
                    <button v-if="frame.show" class="btn" v-on:click="switchView">Switch</button>
                </div>
                <div id="queue-item-information" v-if="queueInformation.show">
                    <template v-if="queueItems.length">
                        <div class="callout callout-info" v-for="(index, item) in queueItems">
                            <h4>New Queue Item!</h4>
                            Current Patient:
                            <h1>!! item.patient.firstname !! !! item.patient.lastname !!</h1>
                            <h5><a v-bind:href="linkToPatient(index)" target="_blank">Show</a></h5>

                            <button class="btn" v-on:click="startConsultation(index)">Start consultation</button>
                            <button class="btn" v-on:click="moveToIngoing(index)">Move to Ingoing</button>
                            <button class="btn" v-on:click="moveToOutgoing(index)">Move to Outgoing</button>
                            <button class="btn" v-on:click="moveToQueue(index)">Move to another Queue</button>
                            <button class="btn" v-on:click="abort(index)">Abort</button>
                        </div>
                    </template>
                    <template v-else>
                        Queue is empty at this moment
                    </template>
                </div>
                <template v-if="frame.show">
                    <iframe id="consultation-frame" v-bind:src="frame.url"></iframe>
                </template>
            </template>
            <template v-else>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> No Queue selected!</h4>
                    Please select a queue from the uper left corner.
                </div>
            </template>
        </div>
    </div>

    <style type="text/css">
        html, body {
            height: 100% !important;
            width: 100% !important;
            min-height: 100% !important;
            min-width: 100% !important;
        }

        div#queue-app {
            height: 100% !important;
            width: 100% !important;
            min-height: 100% !important;
            min-width: 100% !important;
            padding: 20px;
        }

        div#queue-app > * {
            height: 100% !important;
            width: 100% !important;
            min-height: 100% !important;
            min-width: 100% !important;
        }

        iframe {
            height: 100% !important;
            width: 100% !important;
        }
    </style>
@stop

@section('end-content')
    <script type="text/javascript">
        /**
         * Some configuration issues
         *
         * @type {string}
         */
        kekecmed.websocket._config.host = '192.168.10.10';
        kekecmed.websocket._config.realm = 'kekecmed';
        kekecmed.developmentMode(true);

        /**
         * The central data store used by the websocket and vue
         *
         * @type selectedQueue: boolean, queueMeta: boolean, queueItem: boolean
         */
        var dataStore = {
            selectedQueue: false,
            queueMeta: false,
            queueItems: [],
            frame: {
                show: false,
                url: ''
            },
            queueInformation: {
                show: true
            }
        };

        /**
         * Subscribe to channel
         */
        kekecmed.websocket.subscribe('kekecmed.queue.item.moved', function (payload) {
            if (dataStore.selectedQueue && dataStore.selectedQueue == payload.queue_id) {
                dataStore.queueItems.push(payload);
            } else {
                if (dataStore.queueItems != false) {
                    dataStore.queueItems.forEach(function (item, index, array) {
                        if (item.id == payload.id && payload.queue_id != dataStore.selectedQueue) {
                            dataStore.queueItems.$remove(item);
                        }
                    });
                }
            }
        });

        kekecmed.websocket.subscribe('kekecmed.queue.item.deleted', function (payload) {
            if (dataStore.queueItems != false) {
                dataStore.queueItems.forEach(function (item, index, array) {
                    if (item.id == payload.queueItemId) {
                        dataStore.queueItems.$remove(item);

                    }
                });
            }
        });

        /**
         * Vue
         */
        var vue = kekecmed.vue.createInstance({
            el: '#queue-app',
            data: dataStore,
            created: function () {
                var self = this;

                kekecmed.query('#queueSelector').change(function () {
                    self.selectedQueue = $(this).val();

                    kekecmed.ajax.request('queue/meta' + '/' + self.selectedQueue, {
                        dataType: 'json',
                        success: function (response) {
                            self.queueMeta = response.queueMeta;
                            self.queueItems = response.queueItems;
                        }
                    })
                })
            },
            computed: {},
            methods: {
                linkToPatient: function (index) {
                    return '{{url('patient/')}}/' + this.queueItems[index].patient_id;
                },
                startConsultation: function (index) {
                    kekecmed.logger.log('startConsultation');
                    this.frame.url = '{{url('patient/')}}/' + this.queueItems[index].patient_id;
                    this.queueInformation.show = false;
                    this.frame.show = true;
                },
                moveToOutgoing: function (index) {
                    kekecmed.logger.log('moveToOutgoing');
                    kekecmed.ajax.request('queue/outgoing/' + this.queueItems[index].id, {
                        success: function () {

                        },
                        error: function () {

                        }
                    })
                },
                moveToIngoing: function (index) {
                    kekecmed.logger.log('moveToIngoing');
                    kekecmed.ajax.request('queue/ingoing/' + this.queueItems[index].id, {
                        success: function () {

                        },
                        error: function () {

                        }
                    })
                },
                moveToQueue: function () {
                    kekecmed.logger.log('moveToQueue');
                },
                abort: function (index) {
                    kekecmed.logger.log('abort');
                    kekecmed.ajax.request('queue/delete/' + this.queueItems[index].id, {});
                },
                switchView: function () {
                    this.queueInformation.show = true;
                    this.frame.show = false;
                }
            }
        });
    </script>
@endsection
