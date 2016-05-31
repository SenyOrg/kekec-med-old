<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * DevelopmentSeeder
         */
        if (App::environment('local')) {
            $this->call(DevelopmentSeeder::class);
        }
    }
}
