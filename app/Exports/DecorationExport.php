<?php

namespace App\Exports;

use App\Models\Decoration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DecorationExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Decoration::all(['id', 'name', 'price', 'stock']);
    }

    public function headings(): array
    {
        return ['ID', 'Name', 'Price', 'Stock'];
    }
}

