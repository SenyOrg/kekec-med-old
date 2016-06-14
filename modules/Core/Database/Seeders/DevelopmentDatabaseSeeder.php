<?php namespace KekecMed\Core\Database\Seeders;

use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use KekecMed\Calendar\Entities\Calendar;
use KekecMed\Event\Entities\Event;
use KekecMed\Event\Entities\EventParticipant;
use KekecMed\Patient\Entities\Patient;
use KekecMed\Task\Entities\Task;

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
class DevelopmentDatabaseSeeder extends Seeder {

	/**
	 * Some configuration constants
	 * which are not needed to be described
	 */
	const USERS_COUNT = 10;
	const PATIENTS_COUNT = 10;
	const TASKS_COUNT = 100;
	const CALENDARS_COUNT = 5;
    const EVENTS_COUNT = 200;
    const EVENT_PARTICIPANTS_COUNT = 500;
	const DOWNLOAD_IMAGES = true;

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Remove old image data
		\Storage::delete(\Storage::files('public'));

		/**
		 * Create some users
		 */
		\DB::table('users')->insert([
			'firstname' => 'Admin',
			'email' => 'admin@kekecmed.com',
			'password' => bcrypt('admin'),
			'image' => $this->generateImage()
		]);

		\DB::table('users')->insert([
			'firstname' => 'Doctor',
			'email' => 'doctor@kekecmed.com',
			'password' => bcrypt('doctor'),
			'image' => $this->generateImage()
		]);


		/**
		 * Create dummy users
		 */
		factory(\App\User::class, self::USERS_COUNT)->create()->each(function($u) {
			$u->update(['password' => bcrypt('password'), 'image' => $this->generateImage()]);
		});

		/**
		 * Create some patients
		 */
		factory(Patient::class, self::PATIENTS_COUNT)->create()->each(function($u) {
			$u->update(['image' => $this->generateImage()]);
		});

        /** @var \Faker\Generator $faker */
		$faker = app('Faker\Generator');

		/**
		 * Create Tasks
		 */
		factory(Task::class, self::TASKS_COUNT)->create()->each(function($u) use($faker) {
			$u->update([
                'object_id' =>   $faker->numberBetween(1, self::PATIENTS_COUNT),
				'creator_id' =>  $faker->numberBetween(1, self::USERS_COUNT+2),
				'assignee_id' => $faker->numberBetween(1, self::USERS_COUNT+2),
            ]);
		});

		/**
		 * Create Calendars
		 */
		factory(Calendar::class, self::CALENDARS_COUNT)->create()->each(function($u) use($faker) {
			$u->update([
				'creator_id' => $faker->numberBetween(1, self::USERS_COUNT+2),
                'scopes' => json_encode([
                    Carbon::MONDAY => [
                        'start' => $faker->time(),
                        'end' => $faker->time()
                    ],
                    Carbon::TUESDAY => [
                        'start' => $faker->time(),
                        'end' => $faker->time()
                    ],
                    Carbon::WEDNESDAY => [
                        'start' => $faker->time(),
                        'end' => $faker->time()
                    ],
                    Carbon::THURSDAY => [
                        'start' => $faker->time(),
                        'end' => $faker->time()
                    ],
                    Carbon::FRIDAY => [
                        'start' => $faker->time(),
                        'end' => $faker->time()
                    ]
                ]),
			]);
		});

        /**
         * Create Events
         */
        factory(Event::class, self::EVENTS_COUNT)->create()->each(function($u) use($faker) {
            $u->update([
                'creator_id' => $faker->numberBetween(1, self::USERS_COUNT+2),
                'calendar_id' => $faker->numberBetween(1, self::CALENDARS_COUNT),
                'patient_id' => $faker->numberBetween(1, self::PATIENTS_COUNT),
            ]);
        });

        /**
         * Create Participants for events
         */
        factory(EventParticipant::class, self::EVENT_PARTICIPANTS_COUNT)->create()->each(function($u) use($faker) {
            $u->update([
                'event_id' => $faker->numberBetween(1, self::EVENTS_COUNT),
                'participant_id' => $faker->numberBetween(1, self::USERS_COUNT+2),
            ]);
        });
	}

	/**
	 * Generate image
	 *
	 * @return string
	 */
	protected function generateImage() {
		if (self::DOWNLOAD_IMAGES) {
			$filename = 'public/'.md5(microtime()).'.jpg';

			\Storage::put(
				$filename,
				file_get_contents('https://robohash.org/'.$filename)
			);

			return str_replace('public/', '', $filename);
		} else {
			return 'placeholder.jpg';
        }
	}

}