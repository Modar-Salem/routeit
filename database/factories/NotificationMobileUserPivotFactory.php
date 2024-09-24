<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NotificationMobileUserPivot>
 */
class NotificationMobileUserPivotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mobile_user_id' => $this->faker->numberBetween(1, 3),
            'notification_id' => $this->faker->numberBetween(1, 50),
        ];
    }
}
