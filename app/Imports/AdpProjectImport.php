<?php

namespace App\Imports;

use App\AdpProject;
use Maatwebsite\Excel\Concerns\ToModel;

class AdpProjectImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AdpProject([
          'scheme_no' => $row[0],
          'lonumcap' => $row[1],
          'lonumrev' => $row[2],
          'old GSNO' => $row[3],
          'gs_no' => $row[4],
          'name_of_scheme' => $row[5],
          'district' => $row[6],
          'tehsil' => $row[7],
          'total_cost' => $row[11],
          'Major Targets' => $row[12],
          'exp_upto_june_2017' => $row[13],
          'Local-Capital' => $row[16],
          'Local-Rev' => $row[17],
          'FAid-Cap' => $row[18],
          'FAid-Rev' => $row[19],
          'type_of_project' => $row[26],
          'sub_type' => $row[27],
          'sec_id' => $row[29],
          'financial_year' => '2018-19',
        ]);
    }
}
