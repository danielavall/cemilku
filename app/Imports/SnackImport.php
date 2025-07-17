<?php

namespace App\Imports;

use App\Models\Snack;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SnackImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $snack = Snack::where('name', $row['name'])->first();

        if ($snack) {
            // Tambahkan stock baru ke stock lama
            $snack->stock += $row['stock'] ?? 0;
            // Update price jika perlu
            $snack->price = $row['price'];
            $snack->save();

            // Return null supaya tidak buat data baru
            return null;
        }

        // Jika snack belum ada, buat baru
        return new Snack([
            'name' => $row['name'],
            'price' => $row['price'],
            'stock' => $row['stock'] ?? 0,
        ]);
    }
}
