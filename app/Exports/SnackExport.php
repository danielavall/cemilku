<?php

namespace App\Exports;

use App\Models\Snack;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SnackExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Snack::all(['id', 'name', 'price', 'stock']);
    }

    public function headings(): array
    {
        return ['ID', 'Name', 'Price', 'Stock'];
    }
}
