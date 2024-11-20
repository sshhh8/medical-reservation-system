<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;

class CategoryUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        User::factory()->count(5)->create()->each(function (User $user) use ($categories) {
                $ran = rand(1, 3);
                $user->categories()->attach(
                    $categories->random($ran)->pluck('id')->toArray(),
                );
            });
    }
}
