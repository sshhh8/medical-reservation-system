<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'id' => 1,
            'name' => '内科',
        ]);

        Category::create([
            'id' => 2,
            'name' => '糖尿病・代謝・腎臓内科',
        ]);

        Category::create([
            'id' => 3,
            'name' => '循環器内科',
        ]);

        Category::create([
            'id' => 4,
            'name' => '神経内科',
        ]);

        Category::create([
            'id' => 5,
            'name' => '消化器内科',
        ]);

        Category::create([
            'id' => 6,
            'name' => '腫瘍血液内科',
        ]);

        Category::create([
            'id' => 7,
            'name' => '呼吸器内科',
        ]);

        Category::create([
            'id' => 8,
            'name' => '膠原病内科',
        ]);

        Category::create([
            'id' => 9,
            'name' => '外科',
        ]);

        Category::create([
            'id' => 10,
            'name' => '泌尿器科',
        ]);

        Category::create([
            'id' => 11,
            'name' => '整形外科',
        ]);

        Category::create([
            'id' => 12,
            'name' => '婦人科',
        ]);

        Category::create([
            'id' => 13,
            'name' => '心臓血管外科',
        ]);

        Category::create([
            'id' => 14,
            'name' => '形成外科',
        ]);

        Category::create([
            'id' => 15,
            'name' => 'スポーツ医学科',
        ]);

        Category::create([
            'id' => 16,
            'name' => '乳腺外科',
        ]);

        Category::create([
            'id' => 17,
            'name' => '脳神経外科',
        ]);

        Category::create([
            'id' => 18,
            'name' => '呼吸器外科',
        ]);

        Category::create([
            'id' => 19,
            'name' => '皮膚科',
        ]);

        Category::create([
            'id' => 20,
            'name' => '耳鼻咽頭科',
        ]);

        Category::create([
            'id' => 21,
            'name' => '放射線科',
        ]);

        Category::create([
            'id' => 22,
            'name' => '眼科',
        ]);

        Category::create([
            'id' => 23,
            'name' => 'リハビリ科',
        ]);

        Category::create([
            'id' => 24,
            'name' => '薬剤科',
        ]);

        Category::create([
            'id' => 25,
            'name' => '検査科',
        ]);
    }
}
