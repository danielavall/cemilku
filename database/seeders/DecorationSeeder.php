<?php

namespace Database\Seeders;

use App\Models\Decoration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DecorationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $decoration = [
            ['name' => 'Golden Star', 'price' => 10000, 'stock' => 100, 'image' => 'golden_star.png'],
            ['name' => 'Flower', 'price' => 15000, 'stock' => 100, 'image' => 'flower.png'],
            ['name' => 'Ring + Luxury Box', 'price' => 50000, 'stock' => 100, 'image' => 'ring.png'],
            ['name' => 'Happy Anniversary', 'price' => 13000, 'stock' => 100, 'image' => 'anniversary.png'],
            ['name' => 'Happy Birthday', 'price' => 13000, 'stock' => 100, 'image' => 'birthday.png'],
            ['name' => 'Happy Graduation', 'price' => 13000, 'stock' => 100, 'image' => 'graduation.png'],
            ['name' => 'Red Love', 'price' => 10000, 'stock' => 100, 'image' => 'red_love.png'],
            ['name' => 'Blue Ribbon', 'price' => 8000, 'stock' => 100, 'image' => 'blue_ribbon.png'],
            ['name' => 'Golden Ribbon', 'price' => 8000, 'stock' => 100, 'image' => 'golden_ribbon.png'],
            ['name' => 'Red Ribbon', 'price' => 8000, 'stock' => 100, 'image' => 'red_ribbon.png'],
            ['name' => 'Notes', 'price' => 12000, 'stock' => 100, 'image' => 'notes.png'],
        ];

        Decoration::insert($decoration);
    }
}
