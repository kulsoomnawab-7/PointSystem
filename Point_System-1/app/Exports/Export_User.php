<?php

namespace App\Exports;

use App\Models\std_nt_fill_fd;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
    
class Export_User implements FromCollection ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('std_nt_fill_fd')
        ->select('Batch',
        'Std_Name',
        'Std_id',
       
         )
         ->get();

        // return std_nt_fill_fd::all();
    }

    public function headings():array{
        return[
            'Batch' ,  
            'Student Name' ,
            'Student Id',
           
        ];
    }
}
