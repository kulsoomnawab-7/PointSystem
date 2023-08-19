<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cummulative extends Model
{
    protected $fillable = [
        'batch',
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
        'gpa'

        

    ];
    use HasFactory;

    public function AllDataExport()
    {
     $result = DB::table('cummulative')->select('batch','faculty_name','total_student','total_feedback_std','percent','date','punctuality','course_coverage','technical_support','clearing_doubt','exam_assignment','book_utilization' ,'student_appraisal','computer_uptime','gpa')->get()->toArray();
     return $result ;
    }
}
