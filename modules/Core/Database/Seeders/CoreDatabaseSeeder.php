<?php namespace KekecMed\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use KekecMed\Calendar\Database\Seeders\CalendarDatabaseSeeder;
use KekecMed\Insurance\Database\Seeders\InsuranceDatabaseSeeder;

class CoreDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		/**
		 * General Seeders
		 */
		$this->call(InsuranceDatabaseSeeder::class);
		$this->call(CalendarDatabaseSeeder::class);

		/**
		 * DevelopmentSeeder
		 */
		if (env('APP_DEBUG')) {
			$this->call(DevelopmentDatabaseSeeder::class);
		}
	}

}