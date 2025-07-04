<?php

namespace Database\Seeders;

use App\Models\Snack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SnackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $snack = [
            ['name' => 'Marshmallow Youka', 'price' => 1000, 'stock' => 100, 'image' => 'marshmallow_youka.png', 'created_at' => now()],
            ['name' => 'Biskuat Coklat Small', 'price' => 1500, 'stock' => 100, 'image' => 'biskuat_coklat_small.png', 'created_at' => now()],
            ['name' => 'Oreo Soft Cake', 'price' => 2500, 'stock' => 100, 'image' => 'oreo_softcake.png', 'created_at' => now()],
            ['name' => 'Biskuat Original Small', 'price' => 1500, 'stock' => 100, 'image' => 'biskuat_original_small.png', 'created_at' => now()],
            ['name' => 'Biskuat Original Medium', 'price' => 3000, 'stock' => 100, 'image' => 'biskuat_original_medium.png', 'created_at' => now()],
            ['name' => 'Top Stroberi', 'price' => 1500, 'stock' => 100, 'image' => 'top_stroberi.png', 'created_at' => now()],
            ['name' => 'Kraft Keju Cake', 'price' => 2500, 'stock' => 100, 'image' => 'kraft_keju_cake.png', 'created_at' => now()],
            ['name' => 'Dilan Small Pack', 'price' => 1500, 'stock' => 100, 'image' => 'dilan_small_pack.png', 'created_at' => now()],
            ['name' => 'Top Chocolate', 'price' => 1500, 'stock' => 100, 'image' => 'top_chocolate.png', 'created_at' => now()],
            ['name' => 'Beng Beng Small', 'price' => 2300, 'stock' => 100, 'image' => 'bengbeng_small.png', 'created_at' => now()],
            ['name' => 'Beng Beng Medium', 'price' => 3000, 'stock' => 100, 'image' => 'bengbeng_medium.png', 'created_at' => now()],
            ['name' => 'Top Triple Choco', 'price' => 1500, 'stock' => 100, 'image' => 'top_triple.png', 'created_at' => now()],
            ['name' => 'Nextar Stroberi', 'price' => 2500, 'stock' => 100, 'image' => 'nextar_stroberi.png', 'created_at' => now()],
            ['name' => 'Nextar Pineapple', 'price' => 2500, 'stock' => 100, 'image' => 'nextar_pineapple.png', 'created_at' => now()],
            ['name' => 'Tango Vanilla', 'price' => 2500, 'stock' => 100, 'image' => 'tango_vanilla.png', 'created_at' => now()],
            ['name' => 'Kalpa', 'price' => 3000, 'stock' => 100, 'image' => 'kalpa.png', 'created_at' => now()],
            ['name' => 'Tango Chocolate', 'price' => 2500, 'stock' => 100, 'image' => 'tango_chocolate.png', 'created_at' => now()],
            ['name' => 'Good Time', 'price' => 2500, 'stock' => 100, 'image' => 'good_time.png', 'created_at' => now()],
            ['name' => 'Oreo Vanilla', 'price' => 3000, 'stock' => 100, 'image' => 'oreo_vanilla.png', 'created_at' => now()],
            ['name' => 'Oreo Chocolate', 'price' => 3000, 'stock' => 100, 'image' => 'oreo_chocolate.png', 'created_at' => now()],
            ['name' => 'Ultra Milk Stroberi 125ml', 'price' => 4500, 'stock' => 100, 'image' => 'ultra_stroberi.png', 'created_at' => now()],
            ['name' => 'Ultra Milk Full Cream 125ml', 'price' => 4500, 'stock' => 100, 'image' => 'ultra_full_cream.png', 'created_at' => now()],
            ['name' => 'Ultra Milk Chocolate 125ml', 'price' => 4500, 'stock' => 100, 'image' => 'ultra_chocolate.png', 'created_at' => now()],
            ['name' => 'Ultra Milk Sari Kacang Hijau 125ml', 'price' => 4500, 'stock' => 100, 'image' => 'ultra_sari_kacang.png', 'created_at' => now()],
            ['name' => 'Buavita Jeruk 125ml', 'price' => 4500, 'stock' => 100, 'image' => 'buavita_jeruk.png', 'created_at' => now()],
            ['name' => 'Buavita Jambu 125ml', 'price' => 4500, 'stock' => 100, 'image' => 'buavita_jambu.png', 'created_at' => now()],
            ['name' => 'Buavita Appple 125ml', 'price' => 4500, 'stock' => 100, 'image' => 'buavita_apple.png', 'created_at' => now()],
            ['name' => 'Greenfields Full Cream 105ml', 'price' => 5000, 'stock' => 100, 'image' => 'greenfields_full_cream.png', 'created_at' => now()],
            ['name' => 'Greenfields Stroberi 105ml', 'price' => 5000, 'stock' => 100, 'image' => 'greenfields_stroberi.png', 'created_at' => now()],
            ['name' => 'Greenfields Chocolate 105ml', 'price' => 5000, 'stock' => 100, 'image' => 'greenfields_chocolate.png', 'created_at' => now()],
            ['name' => 'Piattos Sapi Panggang', 'price' => 14500, 'stock' => 100, 'image' => 'piattos_sapi_panggang.png', 'created_at' => now()],
            ['name' => 'Chiki Balls', 'price' => 18000, 'stock' => 100, 'image' => 'chiki_balls.png', 'created_at' => now()],
            ['name' => 'Piattos Sambal Matah', 'price' => 14500, 'stock' => 100, 'image' => 'piattos_matah.png', 'created_at' => now()],
            ['name' => 'Chitato Sapi Panggang', 'price' => 16000, 'stock' => 100, 'image' => 'chitato_sapi_panggang.png', 'created_at' => now()],
            ['name' => 'Chitato Keju', 'price' => 16000, 'stock' => 100, 'image' => 'chitato_keju.png', 'created_at' => now()],
            ['name' => 'Cheetos Jagung Bakar Keju', 'price' => 18000, 'stock' => 100, 'image' => 'cheetos_jagung_bakar_keju.png', 'created_at' => now()],
            ['name' => 'Cheetos Cheddar Cheese', 'price' => 18000, 'stock' => 100, 'image' => 'cheetos_cheddar_cheese.png', 'created_at' => now()],
            ['name' => 'Qtela Barbeque', 'price' => 16000, 'stock' => 100, 'image' => 'qtela_barbeque.png', 'created_at' => now()],
            ['name' => 'Lays Rumput Laut', 'price' => 15000, 'stock' => 100, 'image' => 'lays_rumput_laut.png', 'created_at' => now()],
            ['name' => 'Jetz Choco Fies', 'price' => 12000, 'stock' => 100, 'image' => 'jetz_choco_fies.png', 'created_at' => now()],
        ];

        Snack::insert($snack);
    }
}
