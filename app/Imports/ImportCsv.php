<?php

namespace App\Imports;

use App\Models\ImportData;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportCsv implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        return new ImportData([
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'gender' => $row['gender'],
            'date_of_birth' => Carbon::parse($row['date_of_birth']),
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
