<?php

namespace App\Imports;

use App\Models\Number;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvNumber implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Number([
            'group_id' => 1,
            'number' => $row['number']
        ]);
    }
}
