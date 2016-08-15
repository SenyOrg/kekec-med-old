<?php namespace KekecMed\Core\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use TeamTNT\TNTSearch\Facades\TNTSearch;

/**
 * Class SearchIndexingCommand
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Console
 */
class SearchIndexingCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'kekecmed:index';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'This command will run some indexing jobs for better search performance';

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
		// Index ICD Rubrics
		$indexer = TNTSearch::createIndex('icd_rubrics.index');
		$indexer->query('SELECT id, content FROM icd_rubrics;');
		$indexer->run();

		// Index ICD Rubrics
		$indexer = TNTSearch::createIndex('icd_metas.index');
		$indexer->query('SELECT id, value FROM icd_metas;');
		$indexer->run();
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
