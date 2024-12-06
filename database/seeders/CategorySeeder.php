<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            'پوشاک' => [
                'slug' => 'clothing',
            ],
            'لوازم خانه' => [
                'slug' => 'home-appliance',
            ],
            'قاب موبایل' => [
                'slug' => 'mobile-frame',
            ],
            'اکسسوری' => [
                'slug' => 'accessory',
            ],
            'مدرسه و اداره' => [
                'slug' => 'school-affice',
            ],
            'کارت پوستر' => [
                'slug' => 'poster-cart',
            ],
            'جشن مهمانی' => [
                'slug' => 'party-celebration',
            ]
        ];

        foreach ($categories as $categoryName => $details) {
            Category::create([
                'name' => $categoryName,
                'slug' => $details['slug'],
            ]);

        }
    }

}
