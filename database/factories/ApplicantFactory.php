<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Models\Applicant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
     protected $model = Applicant::class;

    public function definition()
    {
        $array_campus = ['MC', 'SCC', 'VC', 'HC', 'MPC', 'SC', 'IC', 'CC'];
        $array_strand = ['BAM', 'HESS', 'STEM'];

        return [
        'admission_id' => $this->faker->unique()->numberBetween(20210000, 20229999),
        'fname' => $this->faker->firstName,
        'lname' => $this->faker->lastName,
        'mname' => $this->faker->lastName,
        'contact' => $this->faker->numberBetween(00000000000, 99999999999),
        'email' => Str::random(10).'@gmail.com',
        'age' => rand(20,60),
        'year' => rand(2023, 2027),
        'campus' => Arr::random($array_campus),
        'strand' => Arr::random($array_strand),
        ];
    }
}
