<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Nilai;

class NilaiImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Nilai([
            'karyawans_id' => $row[1],
            'kriterias_id' => $row[2],
            'nilai' => $row[3],
        ]);
    }
}
