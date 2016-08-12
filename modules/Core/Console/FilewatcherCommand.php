<?php namespace KekecMed\Core\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class FilewatcherCommand
 *
 * This command syncs module assets with
 * their corresponding appearance in public directory.
 * You have to set up a file watcher in PHPStorm:
 *
 * Name: Module Assets
 * Description: This Watcher will copy modified module assets automatically to public folder
 * Show Console: Error
 * Immediatly file syncronisation: Checked
 * Trigger wacher regardless of syntax errors: Checked
 * File type: Any
 * Scope: Module Assets
 * Program: /user/bin/php
 * Arguments: artisan kekecmed:filewatcher $FilePathRelativeToProjectRoot$
 * Working directory: $ProjectFileDir$
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Console
 */
class FilewatcherCommand extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'kekecmed:filewatcher';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command syncs module related assets with their corresponding version in public folder';

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
        // Root directory
        $rootDirectory = getcwd() . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'modules';

        // Relative path to changed file in assets folder
        $sourceFilePath = $this->argument('source');

        // Split relative path into parts
        $pathParts = explode(DIRECTORY_SEPARATOR, $sourceFilePath);
        $destinationFilePath = $rootDirectory . DIRECTORY_SEPARATOR . strtolower($pathParts[1]) . DIRECTORY_SEPARATOR . explode('Assets/',
                $sourceFilePath)[1];

        copy(getcwd() . DIRECTORY_SEPARATOR . $sourceFilePath, $destinationFilePath);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['source', InputArgument::REQUIRED, 'Path to source file.']
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
