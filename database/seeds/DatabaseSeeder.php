<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 * -----------------------------
 *
 * -----------------------------
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
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
         * General Seeders
         */
        $this->call(InsuranceSeeder::class);

        /**
         * DevelopmentSeeder
         */
        if (App::environment('local')) {
            $this->call(DevelopmentSeeder::class);
        }
    }
}
