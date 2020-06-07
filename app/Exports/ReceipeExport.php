<?php

namespace App\Exports;

use App\Receipe;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReceipeExport implements FromCollection
{
    public function collection()
    {
        return Receipe::all();
    }
}