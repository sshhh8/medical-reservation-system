<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class adminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'id' => 1,
            'name' => 'hanako',
            'email' => 'hanako@hana.hana',
            'category_id' => 1,
            'password' => 'hanakohana',
        ]);
    }
}
