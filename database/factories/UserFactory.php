<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $phoneNumber = $this->faker->unique()->e164PhoneNumber();
        $otp = strval(mt_rand(100000, 999999));

        return [
            'name' => $this->faker->firstName(),
            'surename' => $this->faker->lastName(),
            'phonenumber' => $this->faker->phoneNumber(),
            'otp' => null,
            'email' => $this->faker->unique()->safeEmail(),
            'coach_id' => null,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }

    /**
     * Configure the model factory to use a specific coach.
     *
     * @param int $coachId
     * @return static
     */
    public function asCoachUser(int $coachId = 1)
    {
        return $this->state(function (array $attributes) use ($coachId) {
            return [
                'coach_id' => $coachId,
            ];
        });
    }
}
