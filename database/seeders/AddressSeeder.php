<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $address = [
            [
                'user_id' => 1,
                'label' => 'Rumah Utama',
                'provinsi' => 'Jawa Barat',
                'kota_kabupaten' => 'Bandung',
                'kecamatan' => 'Coblong',
                'kelurahan_desa' => 'Dago',
                'rt' => '01',
                'rw' => '02',
                'kode_pos' => '40135',
                'address' => 'Jl. Cemara No. 1',
            ],
            [
                'user_id' => 2,
                'label' => 'Kantor',
                'provinsi' => 'DKI Jakarta',
                'kota_kabupaten' => 'Jakarta Selatan',
                'kecamatan' => 'Setiabudi',
                'kelurahan_desa' => 'Karet',
                'rt' => '03',
                'rw' => '05',
                'kode_pos' => '12920',
                'address' => 'Jl. Sudirman No. 2',
            ]
        ];

        Address::insert($address);
    }
}
