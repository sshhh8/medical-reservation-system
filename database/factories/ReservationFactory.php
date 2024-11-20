<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Reservation;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'category_id' => function (array $attributes) {
                $user = User::find($attributes['user_id']); // ユーザーを取得
                return $user->categories()->pluck('id')->random(); // リレーションからカテゴリIDをランダム取得
            },
            'date' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+1 week'),
        ];
    }
}
