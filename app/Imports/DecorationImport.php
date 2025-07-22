<?php

namespace App\Imports;

use App\Models\Decoration;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DecorationImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $existing = Decoration::where('name', $row['name'])->first();

        if ($existing) {
            // Jika sudah ada, tambahkan stok lama dengan stok baru
            $existing->stock += $row['stock'] ?? 0;
            $existing->price = $row['price']; // Jika mau update harga juga
            $existing->save();

            return null; // Tidak membuat instance baru
        }

        // Jika belum ada, buat baru
        return new Decoration([
            'name'  => $row['name'],
            'price' => $row['price'],
            'stock' => $row['stock'] ?? 0,
        ]);
    }
}
