<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollectionSnackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collection_snack = [
            // CHINESE NEW YEAR (CNY)
            // Collection 1 - Tower
            ['collection_id' => 1, 'snack_id' => 2, 'quantity' => 10],
            ['collection_id' => 1, 'snack_id' => 5, 'quantity' => 12],
            ['collection_id' => 1, 'snack_id' => 27, 'quantity' => 10],
            ['collection_id' => 1, 'snack_id' => 38, 'quantity' => 8],

            // Collection 2 - Tower
            ['collection_id' => 2, 'snack_id' => 1, 'quantity' => 10],
            ['collection_id' => 2, 'snack_id' => 13, 'quantity' => 12],
            ['collection_id' => 2, 'snack_id' => 26, 'quantity' => 10],
            ['collection_id' => 2, 'snack_id' => 35, 'quantity' => 8],

            // Collection 3 - Bouquet
            ['collection_id' => 3, 'snack_id' => 1, 'quantity' => 5],
            ['collection_id' => 3, 'snack_id' => 14, 'quantity' => 5],
            ['collection_id' => 3, 'snack_id' => 13, 'quantity' => 5],
            ['collection_id' => 3, 'snack_id' => 33, 'quantity' => 3],

            // Collection 4 - Bouquet
            ['collection_id' => 4, 'snack_id' => 8, 'quantity' => 5],
            ['collection_id' => 4, 'snack_id' => 13, 'quantity' => 5],
            ['collection_id' => 4, 'snack_id' => 15, 'quantity' => 5],
            ['collection_id' => 4, 'snack_id' => 37, 'quantity' => 3],

            // VALENTINE
            // Collection 5 - Tower
            ['collection_id' => 5, 'snack_id' => 6, 'quantity' => 10],
            ['collection_id' => 5, 'snack_id' => 13, 'quantity' => 12],
            ['collection_id' => 5, 'snack_id' => 29, 'quantity' => 10],
            ['collection_id' => 5, 'snack_id' => 32, 'quantity' => 8],

            // Collection 6 - Tower
            ['collection_id' => 6, 'snack_id' => 1, 'quantity' => 10],
            ['collection_id' => 6, 'snack_id' => 11, 'quantity' => 12],
            ['collection_id' => 6, 'snack_id' => 26, 'quantity' => 10],
            ['collection_id' => 6, 'snack_id' => 33, 'quantity' => 8],

            // Collection 7 - Bouquet
            ['collection_id' => 7, 'snack_id' => 1, 'quantity' => 5],
            ['collection_id' => 7, 'snack_id' => 13, 'quantity' => 5],
            ['collection_id' => 7, 'snack_id' => 18, 'quantity' => 5],
            ['collection_id' => 7, 'snack_id' => 40, 'quantity' => 3],

            // Collection 8 - Bouquet
            ['collection_id' => 8, 'snack_id' => 8, 'quantity' => 5],
            ['collection_id' => 8, 'snack_id' => 17, 'quantity' => 5],
            ['collection_id' => 8, 'snack_id' => 13, 'quantity' => 5],
            ['collection_id' => 8, 'snack_id' => 32, 'quantity' => 3],

            // RAMADHAN
            // Collection 9 - Tower
            ['collection_id' => 9, 'snack_id' => 8, 'quantity' => 10],
            ['collection_id' => 9, 'snack_id' => 13, 'quantity' => 12],
            ['collection_id' => 9, 'snack_id' => 24, 'quantity' => 10],
            ['collection_id' => 9, 'snack_id' => 39, 'quantity' => 8],

            // Collection 10 - Tower
            ['collection_id' => 10, 'snack_id' => 1, 'quantity' => 10],
            ['collection_id' => 10, 'snack_id' => 15, 'quantity' => 12],
            ['collection_id' => 10, 'snack_id' => 22, 'quantity' => 10],
            ['collection_id' => 10, 'snack_id' => 36, 'quantity' => 8],

            // Collection 11 - Bouquet
            ['collection_id' => 11, 'snack_id' => 7, 'quantity' => 5],
            ['collection_id' => 11, 'snack_id' => 14, 'quantity' => 5],
            ['collection_id' => 11, 'snack_id' => 15, 'quantity' => 5],
            ['collection_id' => 11, 'snack_id' => 39, 'quantity' => 3],

            // Collection 12 - Bouquet
            ['collection_id' => 12, 'snack_id' => 3, 'quantity' => 5],
            ['collection_id' => 12, 'snack_id' => 18, 'quantity' => 5],
            ['collection_id' => 12, 'snack_id' => 16, 'quantity' => 5],
            ['collection_id' => 12, 'snack_id' => 36, 'quantity' => 3],

            // CHRISTMAS
            // Collection 13 - Tower
            ['collection_id' => 13, 'snack_id' => 7, 'quantity' => 10],
            ['collection_id' => 13, 'snack_id' => 14, 'quantity' => 12],
            ['collection_id' => 13, 'snack_id' => 24, 'quantity' => 10],
            ['collection_id' => 13, 'snack_id' => 36, 'quantity' => 8],

            // Collection 14 - Tower
            ['collection_id' => 14, 'snack_id' => 2, 'quantity' => 10],
            ['collection_id' => 14, 'snack_id' => 11, 'quantity' => 12],
            ['collection_id' => 14, 'snack_id' => 30, 'quantity' => 10],
            ['collection_id' => 14, 'snack_id' => 38, 'quantity' => 8],

            // Collection 15 - Bouquet
            ['collection_id' => 15, 'snack_id' => 6, 'quantity' => 5],
            ['collection_id' => 15, 'snack_id' => 14, 'quantity' => 5],
            ['collection_id' => 15, 'snack_id' => 5, 'quantity' => 5],
            ['collection_id' => 15, 'snack_id' => 39, 'quantity' => 3],

            // Collection 16 - Bouquet
            ['collection_id' => 16, 'snack_id' => 10, 'quantity' => 5],
            ['collection_id' => 16, 'snack_id' => 18, 'quantity' => 5],
            ['collection_id' => 16, 'snack_id' => 14, 'quantity' => 5],
            ['collection_id' => 16, 'snack_id' => 38, 'quantity' => 3],

            // BIRTHDAY
            // Collection 17 - Tower
            ['collection_id' => 17, 'snack_id' => 1, 'quantity' => 10],
            ['collection_id' => 17, 'snack_id' => 13, 'quantity' => 12],
            ['collection_id' => 17, 'snack_id' => 29, 'quantity' => 10],
            ['collection_id' => 17, 'snack_id' => 40, 'quantity' => 8],

            // Collection 18 - Tower
            ['collection_id' => 18, 'snack_id' => 8, 'quantity' => 10],
            ['collection_id' => 18, 'snack_id' => 15, 'quantity' => 12],
            ['collection_id' => 18, 'snack_id' => 22, 'quantity' => 10],
            ['collection_id' => 18, 'snack_id' => 37, 'quantity' => 8],

            // Collection 19 - Bouquet
            ['collection_id' => 19, 'snack_id' => 1, 'quantity' => 5],
            ['collection_id' => 19, 'snack_id' => 13, 'quantity' => 5],
            ['collection_id' => 19, 'snack_id' => 19, 'quantity' => 5],
            ['collection_id' => 19, 'snack_id' => 40, 'quantity' => 3],

            // Collection 20 - Bouquet
            ['collection_id' => 20, 'snack_id' => 8, 'quantity' => 5],
            ['collection_id' => 20, 'snack_id' => 19, 'quantity' => 5],
            ['collection_id' => 20, 'snack_id' => 15, 'quantity' => 5],
            ['collection_id' => 20, 'snack_id' => 37, 'quantity' => 3],

            // GRADUATION
            // Collection 21 - Tower
            ['collection_id' => 21, 'snack_id' => 12, 'quantity' => 10],
            ['collection_id' => 21, 'snack_id' => 13, 'quantity' => 12],
            ['collection_id' => 21, 'snack_id' => 29, 'quantity' => 10],
            ['collection_id' => 21, 'snack_id' => 33, 'quantity' => 8],

            // Collection 22 - Tower
            ['collection_id' => 22, 'snack_id' => 10, 'quantity' => 10],
            ['collection_id' => 22, 'snack_id' => 17, 'quantity' => 12],
            ['collection_id' => 22, 'snack_id' => 23, 'quantity' => 10],
            ['collection_id' => 22, 'snack_id' => 31, 'quantity' => 8],

            // Collection 23 - Bouquet
            ['collection_id' => 23, 'snack_id' => 6, 'quantity' => 5],
            ['collection_id' => 23, 'snack_id' => 18, 'quantity' => 5],
            ['collection_id' => 23, 'snack_id' => 13, 'quantity' => 5],
            ['collection_id' => 23, 'snack_id' => 33, 'quantity' => 3],

            // Collection 24 - Bouquet
            ['collection_id' => 24, 'snack_id' => 9, 'quantity' => 5],
            ['collection_id' => 24, 'snack_id' => 11, 'quantity' => 5],
            ['collection_id' => 24, 'snack_id' => 17, 'quantity' => 5],
            ['collection_id' => 24, 'snack_id' => 34, 'quantity' => 3],
        ];

        DB::table('collection_snacks')->insert($collection_snack);
    }
}
