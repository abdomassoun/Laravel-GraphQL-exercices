<?php

namespace Database\Factories;

use App\Enums\NotificationCategoryEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text,
            'description' => $this->faker->text,
            'is_read' => false,
            'notification_category' => $this->faker->randomElement(NotificationCategoryEnum::values()),
            // 'user_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
