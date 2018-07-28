<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExpert implements FromCollection
{
    public function collection()
    {
        $url = 'tsconfig.json';
        $data = file_get_contents($url);
//        $elements = json_decode($data, true);
        $elements = collect(json_decode($data, true));

        return $elements;
    }
}