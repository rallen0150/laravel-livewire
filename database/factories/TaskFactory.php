<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = ['finished', 'pending'];
        return [
            'user_id' => $this->faker->numberBetween(1, 50),
            'description' => $this->faker->sentence(5),
            'status' => $status[rand(0, sizeof($status)-1)]
        ];
    }
}
