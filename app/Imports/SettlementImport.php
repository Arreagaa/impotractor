<?php

namespace App\Imports;

use App\Models\Settlement;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class SettlementImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $partNumber = $row['d'];

        $existingSettlement = Settlement::where('partNumber', $partNumber)->first();

        if ($existingSettlement) {
            return null;
        }

        return new Settlement([
            'partNumber' => $partNumber,
            'description' => $row['Descripción'],
        ]);
    }
}
