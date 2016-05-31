<?php

use Illuminate\Database\Seeder;

/**
 * Class DevelopmentSeeder
 * -----------------------------
 * This seeder is created for development
 * environments. It will create some dummy
 * data to quickly work with and start
 * active development without additional work.
 * -----------------------------
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'Admin',
            'email' => 'admin@kekecmed.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
