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
            'name' => '鈴木花子',
            'email' => 'hanako@example.com',
            'category_id' => 1,
            'password' => 'password',
        ]);
    }
}
