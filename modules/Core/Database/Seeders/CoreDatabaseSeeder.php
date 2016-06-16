<?php namespace KekecMed\Core\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CoreDatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        /**
         * DevelopmentSeeder
         */
        if (env('APP_DEBUG')) {
            $this->call(DevelopmentDatabaseSeeder::class);
        }
    }

}