<?php

namespace Database\Factories;

use App\Models\Community;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Community>
 */
class CommunityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Community::class;

    public function definition(): array
    {
        return [
            'mobile_user_id' => $this->faker->numberBetween(1, 3),
            'roadmap_id' => $this->faker->numberBetween(1, 12),
            'message' => $this->faker->text,
        ];
    }
}
