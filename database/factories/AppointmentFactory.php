<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->sentence,
            "start" => $this->faker->dateTimeThisMonth,
            "time" => $this->faker->randomElement(Appointment::$times),
            "end" => null,
            "patient_id" => $this->faker->randomElement(User::where('type', 'patient')->get("id")->pluck("id")->toArray()),
            "doctor_id" => $this->faker->randomElement(User::where('type', 'doctor')->get("id")->pluck("id")->toArray()),
            "status" => "pending",
        ];
    }
}
