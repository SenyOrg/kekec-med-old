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
     * Count of records
     *
     * @var int
     */
    private $count = 10;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create some users
         */
        DB::table('users')->insert([
            'firstname' => 'Admin',
            'email' => 'admin@kekecmed.com',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'firstname' => 'Doctor',
            'email' => 'doctor@kekecmed.com',
            'password' => bcrypt('doctor'),
        ]);


        /**
         * Create dummy users
         */
        factory(App\User::class, $this->count)->create()->each(function($u) {
            $filename = 'public/'.md5(time().$u->password).'.jpg';

            Storage::put(
                $filename,
                file_get_contents('https://robohash.org/'.$filename)
            );

            $u->update(['password' => bcrypt('password'), 'image' => str_replace('public/', '', $filename)]);
        });

        /**
         * Create some patients
         */
        /**
         * Create dummy users
         */
        factory(App\Patient::class, $this->count)->create()->each(function($u) {
            $filename = 'public/'.md5(time().$u->password).'.jpg';

            Storage::put(
                $filename,
                file_get_contents('https://robohash.org/'.$filename)
            );

            $u->update(['image' => str_replace('public/', '', $filename)]);
        });
    }
}
