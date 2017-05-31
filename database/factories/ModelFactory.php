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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Agency::class, function(Faker\Generator $faker) {
	return [
		'name' => $faker->company,
		'contact' => $faker->unique()->safeEmail
	];
});

$factory->define(App\Skill::class, function(Faker\Generator $faker) {
	return [
		'name' => $faker->word
	];
});

$factory->define(App\Student::class, function(Faker\Generator $faker){
	return [
		'first_name' => $faker->firstName,
		'last_name' => $faker->lastName,
		'email' => $faker->email,
		'preferred_rate' => $faker->randomFloat(2,2.5,10)
	];
});

$factory->define(App\WorkCategory::class, function(Faker\Generator $faker){
	return [
		'name' => $faker->word
	];
});

$factory->define(App\Work::class, function(Faker\Generator $faker) {
	$startingDate = $faker->dateTimeBetween('this week', '+6 days');
	$endingDate   = $faker->dateTimeBetween($startingDate, strtotime('+6 days'));

	return [
		'title' => $faker->jobTitle,
		'description' => $faker->paragraph,
		'pay' => $faker->randomFloat(2,1,100),
		'employer' => $faker->company,
		'starts_at' => $startingDate,
		'ends_at' => $endingDate,
		'work_category_id' => rand(1,5),
		'agency_id' => factory(\App\Agency::class)->create()->id,
		'agency_provision' => $faker->randomFloat(2,0.1,10),
		'is_active' => 1
	];
});

