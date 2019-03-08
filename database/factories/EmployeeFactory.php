<?php

use App\Employee;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    $phoneNumber = "09".mt_rand(100000000, 999999999);
    return [
        'user_id' => $faker->unique()->numberBetween(1, App\User::count()),
        'employee_fname' => $faker->firstName,
        'employee_lname' => $faker->lastName,
        'employee_address' => $faker->address,
        'employee_phone' => $faker->mobileNumber,
    ];
});
