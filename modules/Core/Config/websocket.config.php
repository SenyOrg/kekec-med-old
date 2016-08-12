<?php

/**
 * Configuration: Websocket
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @see     http://thruway.readthedocs.io/en/latest/api/Client/
 * @version 1.0
 */

return [
    /**
     * IP / Host address of Websocket Server
     *
     * @type string
     */
    'ip'                  => '192.168.10.10',

    /**
     * Port of Websocket Server
     *
     * @type integer
     */
    'port'                => 9090,

    /**
     * Realm
     *
     * @type string
     */
    'realm'               => 'kekecmed',

    /**
     * Enable / Disable reconnects
     *
     * @type bool
     */
    'reconnects'          => true,

    /**
     * The number of retry attempts to make
     *
     * @type float
     */
    'max_retries'         => 2,

    /**
     * Seconds before first retry
     *
     * @type float
     */
    'initial_retry_delay' => 1.5,

    /**
     * Maximum delay in seconds
     *
     * @type float
     */
    'max_retry_delay'     => 300,

    /**
     * Multiplier on subsequent retries
     *
     * @type float
     */
    'retry_delay_growth'  => 0,

    /**
     * This option is not implemented yet
     *
     * @see http://thruway.readthedocs.io/en/latest/api/Client/
     * @type float
     */
    'retry_delay_jitter'  => 0.1
];