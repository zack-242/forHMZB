<?php

namespace App\Exports;

use App\Persone;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;

class PersoneExport implements FromCollection
{
    private $persones;

    public function __construct($persones)
    {
        $this->persones = $persones;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->persones;
    }

}
