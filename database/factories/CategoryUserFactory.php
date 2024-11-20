<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            $categories = Category::all();

            factory(App\Models\User::class, 5)
                ->create()
                ->each(function (App\Novel $user) use ($categories) {
                    $ran = rand(1, 25);

                    $user->categories()->attach(
                        $categories->random($ran)->pluck('category_id')->toArray(),
                    );
                });
        ];
    }
}
