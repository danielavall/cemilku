<?php

namespace Database\Seeders;

use App\Models\LayerSnack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LayerSnackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layer_snack = [
            ['layer' => 1, 'id_snack' => 1, 'created_at' => now()],
            ['layer' => 1, 'id_snack' => 2, 'created_at' => now()],
            ['layer' => 1, 'id_snack' => 3, 'created_at' => now()],
            ['layer' => 1, 'id_snack' => 4, 'created_at' => now()],
            ['layer' => 1, 'id_snack' => 6, 'created_at' => now()],
            ['layer' => 1, 'id_snack' => 7, 'created_at' => now()],
            ['layer' => 1, 'id_snack' => 8, 'created_at' => now()],
            ['layer' => 1, 'id_snack' => 9, 'created_at' => now()],
            ['layer' => 1, 'id_snack' => 10, 'created_at' => now()],
            ['layer' => 1, 'id_snack' => 12, 'created_at' => now()],
            ['layer' => 2, 'id_snack' => 5, 'created_at' => now()],
            ['layer' => 2, 'id_snack' => 11, 'created_at' => now()],
            ['layer' => 2, 'id_snack' => 13, 'created_at' => now()],
            ['layer' => 2, 'id_snack' => 14, 'created_at' => now()],
            ['layer' => 2, 'id_snack' => 15, 'created_at' => now()],
            ['layer' => 2, 'id_snack' => 16, 'created_at' => now()],
            ['layer' => 2, 'id_snack' => 17, 'created_at' => now()],
            ['layer' => 2, 'id_snack' => 18, 'created_at' => now()],
            ['layer' => 2, 'id_snack' => 19, 'created_at' => now()],
            ['layer' => 2, 'id_snack' => 20, 'created_at' => now()],
            ['layer' => 3, 'id_snack' => 21, 'created_at' => now()],
            ['layer' => 3, 'id_snack' => 22, 'created_at' => now()],
            ['layer' => 3, 'id_snack' => 23, 'created_at' => now()],
            ['layer' => 3, 'id_snack' => 24, 'created_at' => now()],
            ['layer' => 3, 'id_snack' => 25, 'created_at' => now()],
            ['layer' => 3, 'id_snack' => 26, 'created_at' => now()],
            ['layer' => 3, 'id_snack' => 27, 'created_at' => now()],
            ['layer' => 3, 'id_snack' => 28, 'created_at' => now()],
            ['layer' => 3, 'id_snack' => 29, 'created_at' => now()],
            ['layer' => 3, 'id_snack' => 30, 'created_at' => now()],
            ['layer' => 4, 'id_snack' => 31, 'created_at' => now()],
            ['layer' => 4, 'id_snack' => 32, 'created_at' => now()],
            ['layer' => 4, 'id_snack' => 33, 'created_at' => now()],
            ['layer' => 4, 'id_snack' => 34, 'created_at' => now()],
            ['layer' => 4, 'id_snack' => 35, 'created_at' => now()],
            ['layer' => 4, 'id_snack' => 36, 'created_at' => now()],
            ['layer' => 4, 'id_snack' => 37, 'created_at' => now()],
            ['layer' => 4, 'id_snack' => 38, 'created_at' => now()],
            ['layer' => 4, 'id_snack' => 39, 'created_at' => now()],
            ['layer' => 4, 'id_snack' => 40, 'created_at' => now()],
        ];

        LayerSnack::insert($layer_snack);
    }
}
