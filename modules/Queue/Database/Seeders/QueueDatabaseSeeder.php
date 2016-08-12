<?php namespace KekecMed\Queue\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use KekecMed\Queue\Entities\Queue;

/**
 * Class QueueDatabaseSeeder
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Queue\Database\Seeders
 */
class QueueDatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Queue::create([
            'title'       => 'Ingoing',
            'multiple'    => 1,
            'calendars'   => '{}',
            'event_types' => '{}'
        ]);

        Queue::create([
            'title'       => 'Outgoing',
            'multiple'    => 1,
            'calendars'   => '{}',
            'event_types' => '{}'
        ]);

        $this->call(QueueDevelopmentDatabaseSeeder::class);
    }

}