<?php namespace KekecMed\Core\Websocket;

use Thruway\ClientSession;
use Thruway\Peer\Client as ThruwayClient;
use Thruway\Transport\PawlTransportProvider;

/**
 * Class Client
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Websocket
 */
class Client extends ThruwayClient
{
    /**
     * Constructor
     *
     * @param string        $realm
     * @param string        $ip
     * @param               $port
     *
     * @throws \Exception
     */
    public function __construct($realm, $ip, $port)
    {
        ob_start();
        parent::__construct($realm);
        ob_end_clean();

        /**
         * Set transport provider
         */
        $this->addTransportProvider(new PawlTransportProvider('ws://' . $ip . ':' . $port . '/'));

        /**
         * Enable / Disable reconnects
         */
        $this->setAttemptRetry(config('websocket.reconnects'));

        /**
         * Set reconnect options
         */
        $this->setReconnectOptions([
            'max_retries'         => config('websocket.max_retries'),
            'initial_retry_delay' => config('websocket.initial_retry_delay'),
            'max_retry_delay'     => config('websocket.max_retry_delay'),
            'retry_delay_growth'  => config('websocket.retry_delay_growth'),
            'retry_delay_jitter'  => config('websocket.retry_delay_jitter')
        ]);
    }

    /**
     * Publish data to a specific websocket topic
     *
     * @param          $topic
     * @param          $data
     * @param callable $success
     * @param callable $error
     * @param array    $options
     *
     * @throws \Exception
     */
    public function send($topic, $data, Callable $success, Callable $error, $options = ["acknowledge" => true])
    {

        ob_start();

        // onOpen() - Listener
        $this->on('open', function (ClientSession $session) use ($topic, $data, $options, $success, $error) {
            // Publish data to a topic
            $session->publish($topic, [], $data, $options)->then(
            // Callback: Success
                function () use ($session, $success) {
                    // Call provided callback
                    $success($session);

                    // Stop websocket loop
                    $session->getLoop()->stop();
                },

                // Callback: Error
                function ($errorData) use ($session, $error) {
                    // Call provided callback
                    $error($session, $errorData);

                    // Stop websocket loop
                    $session->getLoop()->stop();
                }
            );
        });

        // Start the connection
        $this->start();

        ob_end_clean();
    }
}