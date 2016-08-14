/**
 * KekecMed
 *
 * This is the javascript core file which includes all
 * necessary routines and components of KekecMed.
 *
 * Please do not change any parts of this file
 * without checking its dependencies.
 *
 * @author Selcuk Kekec <senycorp@googlemail.com
 */
var kekecmed = {
    /**
     * User specific data
     */
    user: {
        /**
         * This will be setted by bootCore.blade.php in Theme Views
         */
    },

    /**
     * Session specific data
     */
    session: {
        /**
         * This will be setted by bootCore.blade.php in Theme Views
         */
    },

    /**
     * Location
     */
    location: {
        /**
         * This will be setted by bootCore.blade.php in Theme Views
         */
    },

    /**
     * Configuration
     */
    config: {
        log: function (status) {
            kekecmed.logger._log = status;
        },
        debug: function (status) {
            kekecmed.logger._debug = status;
        }
    },

    /**
     * Enable / Disable Development Mode
     * @param status
     */
    developmentMode: function (status) {
        Vue.config.debug = status;
        Vue.config.devtools = status;
        kekecmed.logger.enableLogger(status);
    },

    /**
     * Logger Component
     */
    logger: {
        /**
         * Configuration parameter
         */
        _log: true,
        _debug: true,
        _warn: true,
        _error: true,
        _info: true,

        /**
         * Enable / Disable Logger
         *
         * @param status
         */
        enableLogger: function (status) {
            this._log = this._debug = this._warn = this._error = this._info = status;
        },

        /**
         * Generic Logger
         *
         * @private
         * @param type
         * @param args
         */
        _genericLogger: function (type, args) {
            console[type].apply(console, args);
        },

        log: function (/* arguments */) {
            if (this._log) {
                this._genericLogger('log', arguments);
            }
        },
        debug: function (/* arguments */) {
            if (this._debug) {
                this._genericLogger('debug', arguments);
            }
        },
        info: function (/* arguments */) {
            if (this._info) {
                this._genericLogger('info', arguments);
            }
        },
        warn: function (/* arguments */) {
            if (this._warn) {
                this._genericLogger('warn', arguments);
            }
        },
        error: function (/* arguments */) {
            if (this._error) {
                this._genericLogger('error', arguments);
            }
        }
    },

    /**
     * WebSocket Component
     */
    websocket: {
        _connection: null,
        _config: {
            host: '127.0.0.1',
            port: '9090',
            realm: 'realm'
        },
        _subscriptionHandler: {
            _errorHandler: function (error, callback) {
                kekecmed.logger.error('Websocket: Unable to connect to topic!', [error]);

                if (typeof callback === "function") {
                    kekecmed.logger.log('Executing callback function for error...');
                    callback(error);
                }
            },
            _successHandler: function (success, callback) {
                kekecmed.logger.info('Successfully subscribed to topic: ' + success.topic, [success]);

                if (typeof callback === "function") {
                    kekecmed.logger.log('Executing callback function for success...');
                    callback(success);
                }
            },
            _messageHandler: function (arrayData, objectData, detailsObject, callback) {
                kekecmed.logger.info('New message for topic \'' + detailsObject.topic + '\'', arguments);

                // Handle data
                var data = objectData;
                if (arrayData.length) {
                    data = arrayData;
                }

                callback(data, detailsObject);
            }
        },
        _publicationHandler: {
            _errorHandler: function (error, callback) {
                kekecmed.logger.error('Websocket: Unable to publish to topic', [error]);

                if (typeof callback === "function") {
                    kekecmed.logger.log('Executing callback function for error...');
                    callback(error);
                }
            },
            _successHandler: function (publication, callback) {
                kekecmed.logger.info('Successfully published to topic: ' + publication.id, [publication]);

                if (typeof callback === "function") {
                    kekecmed.logger.log('Executing callback function for success...');
                    callback(publication);
                }
            }
        },
        _initialize: function () {
            this._connect(function () {
            });
        },
        _connect: function (callback) {
            if (this._connection && this._connection.isConnected && this._connection.session.isOpen) {
                kekecmed.logger.debug('Websocket connection exists.');

                // Execute callback
                return callback(this._connection.session);
            } else {
                kekecmed.logger.debug('Create new websocket connection...');

                // Create new connection object
                this._connection = new autobahn.Connection({
                    url: 'ws://' + this._config.host + ':' + this._config.port + '/', realm: this._config.realm
                });

                // Register onOpen Callback
                this._connection.onopen = function (session) {
                    // Execute callback
                    kekecmed.logger.info('Websocket connection established successfully');
                    return callback(session);
                };

                // Connect
                kekecmed.logger.debug('Trying to connect to websocket...');
                this._connection.open();
            }
        },

        /**
         * Subscribe to a topic
         *
         * @param topic
         * @param callback
         * @param success
         * @param error
         */
        subscribe: function (topic, callback, success, error) {
            kekecmed.logger.debug('Subscribing to topic \'' + topic + '\'!');

            this._connect(function (session) {
                // Subscribe to topic
                session.subscribe(topic, function (arrayData, objectData, detailsObject) {
                    kekecmed.websocket._subscriptionHandler._messageHandler(arrayData, objectData, detailsObject, callback)
                }).then(
                    function (subscriptionObject) {
                        // subscription succeeded, subscription is an instance of autobahn.Subscription
                        kekecmed.websocket._subscriptionHandler._successHandler(subscriptionObject, success);
                    },
                    function (errorObject) {
                        // subscription failed, error is an instance of autobahn.Error
                        kekecmed.websocket._subscriptionHandler._errorHandler(errorObject, error);
                    }
                );
            });
        },

        /**
         * Publish to a topic
         *
         * @param topic
         * @param data
         * @param success
         * @param error
         */
        publish: function (topic, data, success, error) {
            kekecmed.logger.debug('Publishing to topic \'' + topic + '\'!');

            // Handling data
            var dataObject = {};
            if (kekecmed.helper.typeOf(data) == '[object Object]') {
                dataObject = data;
                data = [];
            }

            this._connect(function (session) {
                session.publish(topic, data, dataObject, {
                    exclude_me: false,
                    acknowledge: true
                }).then(
                    function (publicationObject) {
                        // subscription succeeded, subscription is an instance of autobahn.Subscription
                        kekecmed.websocket._publicationHandler._successHandler(publicationObject, success);
                    },
                    function (errorObject) {
                        // subscription failed, error is an instance of autobahn.Error
                        kekecmed.websocket._publicationHandler._errorHandler(errorObject, error);
                    }
                );
            });
        }
    },

    /**
     * Helper functions
     */
    helper: {
        /**
         * Returns type of variable
         *
         *
         * @param variable
         * @returns {string} e.g [object Array], [object Number], [object Object]
         */
        typeOf: function (variable) {
            return Object.prototype.toString.call(variable);
        }
    },

    /**
     * Ajax related stuff
     */
    ajax: {
        _configuration: {
            _default: {},
            _setup: {
                async: true,
                cache: false,
                dataType: 'text',
                global: true,
                method: 'GET',
                type: 'GET',
                statusCode: {
                    404: function () {
                        alert('Unable to find Page');
                    },
                    420: function () {
                        kekecmed.logger.error('An ajax specific error occured: ' + arguments[0].responseJSON.error, arguments);
                    }
                },
                timeout: 5000
            }
        },
        _globalHandler: {
            _start: function () {
                kekecmed.logger.info('Ajax call started!');
            },
            _stop: function () {
                kekecmed.logger.info('Ajax call stopped!');
            },
            _complete: function (event, jqXHR, settings) {
                kekecmed.logger.info('Ajax call completed!', arguments);
            },
            _error: function (event, jqXHR, settings, errorMessage) {
                kekecmed.logger.error('Ajax call error: ' + errorMessage, [event, jqXHR, settings]);
            },
            _success: function (event, jqXHR, settings, data) {
                kekecmed.logger.info('Ajax call succeeded!', [arguments]);
            },
            _send: function (event, jqXHR, settings) {
                kekecmed.logger.info('Ajax call send!', [arguments]);
            }
        },
        _initialize: function () {
            // Setup ajax
            $.ajaxSetup(this._configuration._setup);

            // Register global handler
            kekecmed.query(document).ajaxStart(kekecmed.ajax._globalHandler._start);
            kekecmed.query(document).ajaxStop(kekecmed.ajax._globalHandler._stop);
            kekecmed.query(document).ajaxComplete(kekecmed.ajax._globalHandler._complete);
            kekecmed.query(document).ajaxError(kekecmed.ajax._globalHandler._error);
            kekecmed.query(document).ajaxSuccess(kekecmed.ajax._globalHandler._success);
            kekecmed.query(document).ajaxSend(kekecmed.ajax._globalHandler._send);
        },
        _request: function (url, settings) {
            if (url.indexOf('http://') === -1) {
                url = window.location.origin + '/' + url;
            }

            return $.ajax(url, settings);
        },
        request: function (url, settings) {
            return this._request(url, settings);
        },
        post: function (url, settings) {
            settings.type = 'POST';
            settings.method = 'POST';

            return this._request(url, settings);
        },
        json: function (url, settings) {
            if (!settings.type && !settings.method) {
                settings.type = 'GET';
                settings.method = 'GET';
            }

            settings.dataType = 'json';

            return this._request(url, settings);
        }
    },

    /**
     * Find element in DOM
     *
     * @returns {*|jQuery|HTMLElement}
     */
    query: function (/* arguments */) {
        return $.apply(null, arguments);
    },

    /**
     * Vue related methods
     */
    vue: {
        _config: {
            delimiters: ['!!', '!!'],
        },
        _initialize: function () {
            this.instance().config.unsafeDelimiters = this._config.delimiters;
        },
        instance: function () {
            return Vue;
        },
        component: function () {
            this.instance().component.apply(this.instance(), arguments);
        },
        createInstance: function () {
            var instanceConstructor = Object.create(Vue.prototype);
            Vue.apply(instanceConstructor, arguments);

            return instanceConstructor;
        }
    },

    dialog: {
        _config: {
            primary: 'modal-primary',
            info: 'modal-info',
            error: 'modal-danger',
            warning: 'modal-warning',
            success: 'modal-success',

            settings: {
                /**
                 * @optional String
                 * @default: en
                 * which locale settings to use to translate the three
                 * standard button labels: OK, CONFIRM, CANCEL
                 */
                locale: "en",

                /**
                 * @optional Boolean
                 * @default: true
                 * whether the dialog should be shown immediately
                 */
                show: false,

                /**
                 * @optional Boolean
                 * @default: true
                 * whether the dialog should be have a backdrop or not
                 */
                backdrop: true,

                /**
                 * @optional Boolean
                 * @default: true
                 * show a close button
                 */
                closeButton: true,

                /**
                 * @optional Boolean
                 * @default: true
                 * animate the dialog in and out (not supported in < IE 10)
                 */
                animate: true,

                /**
                 * @optional String
                 * @default: null
                 * an additional class to apply to the dialog wrapper
                 */
                className: "modal"

            }
        },

        /**
         * Initialize the dialog component
         *
         * @private
         */
        _initialize: function () {
            bootbox.setDefaults(this._config.settings);
        }
        /**
         * @todo
         */
    },

    /**
     * Initialize KekecMed and
     * its components
     */
    initialize: function () {
        this.ajax._initialize();
        this.vue._initialize();
        //this.websocket._initialize();
    }
};

kekecmed.initialize();
