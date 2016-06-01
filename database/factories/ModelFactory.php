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

$factory->define(App\Patient::class, function (Faker\Generator $faker) {
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
