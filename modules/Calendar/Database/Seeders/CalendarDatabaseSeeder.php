<?php namespace KekecMed\Calendar\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use KekecMed\Event\Entities\EventStatus;
use KekecMed\Event\Entities\EventType;

/**
 * Class CalendarDatabaseSeeder
 * -----------------------------
 *
 * -----------------------------
 * @package KekecMed\Calendar\Database\Seeders
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 */
class CalendarDatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        /** @var \Faker\Generator $faker */
        $faker = app('Faker\Generator');

        EventType::create([
            'title'       => 'Sprechstunde',
            'color'       => $faker->hexColor,
            'description' => 'Sprechstunde',
        ]);

        EventType::create([
            'title'       => 'Blutabnahme',
            'color'       => $faker->hexColor,
            'description' => 'Blutabnahme',
        ]);

        EventType::create([
            'title'       => 'Impfung',
            'color'       => $faker->hexColor,
            'description' => 'Impfung',
        ]);

        EventType::create([
            'title'       => 'Überweisung',
            'color'       => $faker->hexColor,
            'description' => 'Überweisung',
        ]);

        EventStatus::create([
            'title' => 'Geplant',
            'color' => $faker->hexColor,
        ]);

        EventStatus::create([
            'title' => 'Ausführend',
            'color' => $faker->hexColor,
        ]);

        EventStatus::create([
            'title' => 'Verschoben',
            'color' => $faker->hexColor,
        ]);

        EventStatus::create([
            'title' => 'Verworfen',
            'color' => $faker->hexColor,
        ]);

        EventStatus::create([
            'title' => 'Beendet',
            'color' => $faker->hexColor,
        ]);
    }

}