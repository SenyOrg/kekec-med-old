<?php namespace KekecMed\Messenger\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MessengerDatabaseSeeder
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Messenger\Database\Seeders
 */
class MessengerDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		/**
		 * Development Mode
		 */
		if (debuggingMode()) {
			$this->call(MessengerDevelopmentDatabaseSeeder::class);
		}
	}

}