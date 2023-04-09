<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            $users = Student::factory()
                            ->count(10)
                            ->state(new Sequence(
                                ['admin' => 'Y'],
                                ['admin' => 'N'],
                            ))
                            ->create()
        ];
    }
}
