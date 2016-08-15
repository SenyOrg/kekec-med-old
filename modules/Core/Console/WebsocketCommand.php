<?php namespace KekecMed\Core\Console;

use Illuminate\Console\Command;
use Thruway\Peer\Router;
use Thruway\Transport\RatchetTransportProvider;

/**
 * Class WebsocketCommand
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Console
 */
class WebsocketCommand extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'kekecmed:websocket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will run the websocket';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $this->info('
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@,,,,,,@@@@@@@@@@@@@,,,,,,@@@@@@@
@@@,,,,,,,,,,,,,@@@@@@@,,,,,,,,,,,,,@@@
@,,,,,,,,,,,,,,,,,,@,,,,,,,,,,,,,,,,,,@
,,,,,,,,,,,,,,@@,,,,,,,,,,,,,,,,,,,,,,,
,,,,,,,,,,,,,@@@@,,,,,,,,,,,,,,,,,,,,,,
,,,,,,,,,,,,,@@@@@,,,,,,,,,,,,,,,,,,,,,
,,,,,,,,,,,,@@@@@@,,,,,,@@@,,,,,,,,,,,,
,,,,,,,,,,,,@@@,@@@,,,,@@@@@,,,,,,,,,,,
@,,,,,,,,,,@@@,,@@@,,,,@@@@@@,,,,,,,,,@
@@@@@@@@@@@@@@,,,@@@,,@@@,@@@@@@@@@@@@@
@@@@@,,,,,,,,,,,,@@@,@@@,,,,,,,,,,@@@@@
@@@@@@@,,,,,,,,,,,@@@@@@,,,,,,,,@@@@@@@
@@@@@@@@@,,,,,,,,,,@@@@,,,,,,,@@@@@@@@@
@@@@@@@@@@@,,,,,,,,@@@@,,,,,@@@@@@@@@@@
@@@@@@@@@@@@@,,,,,,,@@,,,,@@@@@@@@@@@@@
@@@@@@@@@@@@@@@,,,,,,,,,@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@,,,,,@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
');
        $this->info('Starting websocket for Kekec-Med...');
        //passthru('php vendor/voryx/thruway/Examples/SimpleWsRouter.php 2>&1');

        $router = new Router();

        $transportProvider = new RatchetTransportProvider("192.168.10.10", 9090);

        $router->addTransportProvider($transportProvider);

        $router->start();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            //['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            //['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }

}
