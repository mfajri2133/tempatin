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
            'Ruang Meeting',
            'Co-Working Space',
            'Gedung Serbaguna',
            'Ruang Training',
            'Tempat Acara',
            'Lapangan Futsal',
            'Lapangan Badminton',
            'Lapangan Basket',
            'Lapangan Tenis',
            'Studio Yoga & Dance',
            'Gym / Fitness Studio',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate([
                'name' => $name,
            ]);
        }
    }
}
