<?php namespace KekecMed\Core\Console;

use Illuminate\Console\Command;
use KekecMed\Calendar\Entities\Calendar;
use KekecMed\Queue\Entities\Queue;

/**
 * Class IdeHelperCommand
 *
 * This command will create all necessary files
 * for a better development expirience within IDEs.
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Console
 */
class IdeHelperCommand extends Command
{
    /**
     * List of models to ignore
     *
     * @var array
     */
    private $ignoreList = [
        Calendar::class,
        Queue::class
    ];

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'kekecmed:idehelper';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will create files for auto-completion in IDEs.';

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
        $parameterList = '';

        foreach(\Module::all() AS $index => $item) {
           $parameterList .= '--dir="'.str_replace('/home/vagrant/kekec-med/', './',$item->getExtraPath('Entities')).'" ';
        }

        foreach ($this->ignoreList AS $model) {
            $parameterList .= '--ignore="'.$model.'"';
        }

        $this->call('ide-helper:generate');
        $this->call('ide-helper:meta');
        exec('php artisan ide-helper:models ' . $parameterList . ' --nowrite');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
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
