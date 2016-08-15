<?php namespace KekecMed\Queue\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use KekecMed\Queue\Entities\Queue;

/**
 * Class QueueDevelopmentDatabaseSeeder
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Queue\Database\Seeders
 */
class QueueDevelopmentDatabaseSeeder extends Seeder
{
    /**
     * Number of dummy queues
     */
    const QUEUE_COUNT = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        /**
         * Create some queues
         */
        factory(Queue::class, self::QUEUE_COUNT)->create()->each(function ($u) {
            $u->update([
                'title'       => 'Queue ' . $u->id,
                'multiple'    => '0',
                'calendars'   => '{}',
                'event_types' => '{}'
            ]);
        });
    }

}