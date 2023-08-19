<?php

namespace App\Exports;

use App\Models\cummulative;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Illuminate\Support\Carbon;

use Maatwebsite\Excel\Concerns\WithHeadings;    

class ExportUser implements FromCollection ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $date = Carbon::now();
            $monthName = $date->format('F');
    
            $month = Carbon::now()->format('o');
            $dates = Carbon::now()->subMonth()->format('F');

        if(now()->format('d') == 10)
        {
            return DB::table('cummulative')
        ->select
        ('batch',
        'faculty_name',
        'total_student',
        'total_feedback_std',
        'percent',
        'date',
        'punctuality',
        'course_coverage',
        'technical_support',
        'clearing_doubt',
        'exam_assignment',
        'book_utilization',
        'student_appraisal',
        'computer_uptime',
        'gpa')
        ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)->get();

        }
        else{
            return DB::table('cummulative')
        ->select
        ('batch',
        'faculty_name',
        'total_student',
        'total_feedback_std',
        'percent',
        'date',
        'punctuality',
        'course_coverage',
        'technical_support',
        'clearing_doubt',
        'exam_assignment',
        'book_utilization',
        'student_appraisal',
        'computer_uptime',
        'gpa')
        ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)->get();

        }
    //     // Use the `map()` method to format numerical values to two decimal places
    // $formattedData = $data->map(function ($item) {
    //     return [
    //         'percent' => round($item->percent, 2),
    //         'punctuality' => number_format($item->punctuality, 2),
    //         'course_coverage' => number_format($item->course_coverage, 2),
    //         'technical_support' => number_format($item->technical_support, 2),
    //         'clearing_doubt' => number_format($item->clearing_doubt, 2),
    //         'exam_assignment' => number_format($item->exam_assignment, 2),
    //         'book_utilization' => number_format($item->book_utilization, 2),
    //         'student_appraisal' => number_format($item->student_appraisal, 2),
    //         'computer_uptime' => number_format($item->computer_uptime, 2),
    //         'gpa' => number_format($item->gpa, 2),
    //     ];
    // });

    // return $formattedData;

        // return cummulative::all();
    }

    public function headings():array{
        return[
            'Batch' ,  
            'Faculty' ,
            'Total Student',
            'Total Student Feedback',
            'Percentage',
            'Date of Feedback',
            'Punctuality',
            'Course Coverage',
            'Technical Support',
            'Clearing Doubt',
            'Exams & Assignment',  
            'Book Utilization',
            'Student Appraisal',
            'Computer Uptime',
            'GPA',  
        ];
    }
}
