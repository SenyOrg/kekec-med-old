<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/**
 * @todo: Implement factory methods
 */

/**
 * User-Factory
 */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        //'image' => $faker->image('storage')
    ];
});

/**
 * Patient-Factory
 */
$factory->define(\KekecMed\Patient\Entities\Patient::class, function (Faker\Generator $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'gender' => 'm',
        'phone' => $faker->phoneNumber,
        'mobile' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'street' => $faker->streetName,
        'no' => $faker->numberBetween(1, 9999),
        'zipcode' => $faker->postcode,
        'birthdate' => $faker->dateTimeBetween('-40 years', '-20 years'),
        'insurance_type' => $faker->randomElement(['gkv', 'private']),
        'insurance_id' => $faker->numberBetween(1, 40),
        'insurance_no' => $faker->uuid
    ];
});

/**
 * Task-Factory
 */
$factory->define(\KekecMed\Task\Entities\Task::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->realText(),
        'description' => $faker->realText(400),
        'deadline' => $faker->dateTimeBetween('-2 days', '+30 days'),
        'done' => $faker->boolean(),
        'creator_id' => $faker->numberBetween(1, 10),
        'assignee_id' => $faker->numberBetween(1, 10),
        'object_id' => $faker->numberBetween(1, 10),
    ];
});
