<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentcontroller;
use App\Http\Controllers\webcontroller;

use App\Models\user;
use App\Models\student;
use App\Models\temp_verfy;
use App\Models\LabSystem;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
    // Route::get('/dashboard', function () {
    //     if(Auth::user()->id)
    //     {
    //         return view('companydashboard');
    //     }
    //     else
    //     {            
    //         // return view('dashboard');
    //     }
     //Route::get("/dashboard", [studentcontroller::class,'get'])->name('login');

    // })->name('dashboard');
// });


Route::get('/jobinsert',[studentcontroller::class,'job_insert']);
Route::post('/jobinsert_',[studentcontroller::class,'job_insert_post']);


Route::post("/register_insert", [studentcontroller::class,'reg_insert']);
Route::get("/admin_login", [studentcontroller::class,'loginget']);
Route::get("/register", [studentcontroller::class,'registerget']);
Route::post("/register", [studentcontroller::class,'registerpost']);
Route::get("/login", [studentcontroller::class,'adminget']);
Route::post("/login", [studentcontroller::class,'loginadminpost']);
// Route::get("/labs", [studentcontroller::class,'labs']);
Route::get("/lab_systems", [studentcontroller::class,'lab_systems_']);
Route::get("/code_match", [studentcontroller::class,'code_match']);
Route::post("/code_match_", [studentcontroller::class,'code_match_']);
Route::get("/dashboard_", [studentcontroller::class,'dashboard_']);

Route::post("/get_batch",[studentcontroller::class,'get_batch']);
Route::post("/gety",[studentcontroller::class,'gety']);
Route::get('/std_portal', [studentcontroller::class , 'stdportal']);
Route::post("/filter_batch", [studentcontroller::class,'filter_batch']);

Route::get('/export_std',[studentcontroller::class,'export_std'])->name('export_std');

Route::get('/export_users',[studentcontroller::class,'export_Users'])->name('export_users');

// ______________________email verfication page______________________________________________
Route::get("/student", [studentcontroller::class,'get_email']);
Route::post("/input", [studentcontroller::class,'input']);

// __________________Lab System________________________________________________________________
Route::post('/interviewinvite1' , [studentcontroller::class ,'interviewinvite1']);
Route::post('/interviewinvite2' , [studentcontroller::class ,'interviewinvite2']); 

Route::get("/register_complains", [studentcontroller::class,'register_complains']);
// Route::post("/register_complains", [studentcontroller::class,'register_complains_']);

Route::get("/lab_systems/{id}",[studentcontroller::class,'getcity']);

Route::post("/get",[studentcontroller::class,'get']);
Route::post('/getdataevent', [studentcontroller::class , 'get_data']);
Route::post('/getdataevent_', [studentcontroller::class , 'get_data_']);
Route::post('/getdatmodal', [studentcontroller::class , 'getdatmodal']);
Route::post('/hardwareissue', [studentcontroller::class , 'hardwareissue']);

Route::post('/softwareissue', [studentcontroller::class , 'softwareissue']);
Route::post('/networkissue', [studentcontroller::class , 'networkissue']);
Route::post('/otherissue', [studentcontroller::class , 'otherissue']);
Route::post('/batch', [studentcontroller::class , 'batch']);

Route::post('/updateevent', [studentcontroller::class , 'updaterecord']);
Route::post('/fetchname', [studentcontroller::class , 'fetchname']);
Route::post('/lab', [studentcontroller::class , 'lab']);
Route::post('/temp_comp/{id}', [studentcontroller::class , 'temp_comp']);
Route::post("/hardwareissue", [studentcontroller::class,'hardwareissue']);
Route::get("/register_form", [studentcontroller::class,'register_']);

// _______________________________________________________________________________

Route::get("/view_complains", [studentcontroller::class,'view_complains']);
Route::post('/updatestatuscompany1' , [studentcontroller::class ,'update_status_company1']);
Route::post('/updatestatuscompany0' , [studentcontroller::class ,'update_status_company0']);
Route::get('/forgetpassword' , [studentcontroller::class ,'forgetpassword']);
Route::post('/forgetpassword' , [studentcontroller::class ,'forgetpassword_']);
Route::get("/logout", [studentcontroller::class,'logout']);
Route::get("/admin_logout", [studentcontroller::class,'admin_logout']);

// ________________________________________________________________________________________________
Route::get("/lab_insert", [studentcontroller::class,'labs']);
Route::post("/labsinst_", [studentcontroller::class,'labsinst_']);
Route::get("/lab_system", [studentcontroller::class,'labsystem']);
Route::post("/lab_system_", [studentcontroller::class,'labsystem_']);

Route::get("/faculty", [studentcontroller::class,'facultylogin']);
Route::get("/facultyregister", [studentcontroller::class,'facultyregister']);

Route::post("/facultyget", [studentcontroller::class,'facultyget']);
Route::post("/regpost_", [studentcontroller::class,'regpost_']);

Route::get("/Complain_views_admin", [studentcontroller::class,'Complain_views_admin']);
// _______________________________________________________________________________4

Route::get("/hardware_compalins", [studentcontroller::class,'hardware_compalins']);
Route::get("/software_compalins", [studentcontroller::class,'software_compalins']);
Route::get("/network_compalins", [studentcontroller::class,'network_compalins']);
Route::get("/other_complains", [studentcontroller::class,'other_complains']);

Route::post('/updatstatus1' , [studentcontroller::class ,'updatstatus_1']);
Route::post('/updatstatus0' , [studentcontroller::class ,'updatstatus_0']);

Route::post('/updatestatuscompany_11' , [studentcontroller::class ,'update_status_company_11']);
Route::post('/updatestatuscompany_00' , [studentcontroller::class ,'update_status_company_00']);

Route::post('/updatstatuscompany1' , [studentcontroller::class ,'updatstatuscompany_1']);
Route::post('/updatstatuscompany0' , [studentcontroller::class ,'updatstatuscompany0']);

Route::get('/all_lab', [studentcontroller::class , 'all_lab']);
Route::get('/lab_issues', [studentcontroller::class , 'lab_issues']);

Route::get('/lab_s', [studentcontroller::class , 'lab_s']);
Route::post('/lab_s_', [studentcontroller::class , 'lab_s_']);

Route::get('/resolve', [studentcontroller::class , 'resolve']);
// ____________________________________________________________________
Route::post('/getdata', [studentcontroller::class , 'get_data_d']);
Route::post('/updaterecords', [studentcontroller::class , 'updaterecords']);

Route::post('/getdata_', [studentcontroller::class , 'get_data_d_']);
Route::post('/updaterecords_', [studentcontroller::class , 'updaterecords_']);

Route::get('/software_insert', [studentcontroller::class , 'software_insert']);
Route::post('/software_insert_', [studentcontroller::class , 'software_insert_']);

Route::get('/hardware_insert', [studentcontroller::class , 'hardware_insert']);
Route::post('/hardware_insert_', [studentcontroller::class , 'hardware_insert_']);

Route::get('/network_insert', [studentcontroller::class , 'network_insert']);
Route::post('/network_insert_', [studentcontroller::class , 'network_insert_']);

Route::post('/_getdata_', [studentcontroller::class , '_getdata_']);
Route::post('/update_records_', [studentcontroller::class , 'update_records_']);

Route::post('/_get_data_', [studentcontroller::class , '_get_data_']);
Route::post('/_update_records_', [studentcontroller::class , '_update_records_']);

Route::post('/_get_data_net', [studentcontroller::class , '_get_data_net']);
Route::post('/net_update_records_', [studentcontroller::class , 'net_update_records_']);

Route::post('/updatstatuscompany2' , [studentcontroller::class ,'updatstatuscompany2']);
Route::post('/updatstatuscompany3' , [studentcontroller::class ,'updatstatuscompany3']);

Route::post("/filter", [studentcontroller::class,'filter']);
Route::post("/month_year", [studentcontroller::class,'month_year']);
Route::post("/month_year_f", [studentcontroller::class,'month_year_f']);


Route::post('/getdatare_', [studentcontroller::class , 'getdatare_']);
Route::post('/updaterecords_res', [studentcontroller::class , 'updaterecords_res']);

Route::get('/feedback_form', [studentcontroller::class , 'feedback_form']);
Route::post('/feedback', [studentcontroller::class , 'feedback']);

Route::get('/form_fetch', [studentcontroller::class , 'form_fetch']);
Route::post("/filter_", [studentcontroller::class,'filter_']);

// exam fetch work
Route::get("/examfetch", [studentcontroller::class,'Fetch_Exam']);
// announcement work
Route::get("/announcement", [studentcontroller::class,'announcement']);
//  attendances work
Route::get("/attendances", [studentcontroller::class,'attendances']);

Route::get("/student_dashboard", [studentcontroller::class,'student_dashboard']);
Route::get("/student_profile", [studentcontroller::class,'student_profile']);
//

Route::get("/gpa_calculates", [studentcontroller::class,'gpa_calculates']);
Route::post("/gpa_calculates_get", [studentcontroller::class,'gpa_calculates_get']);


Route::get("/faculty_feedback", [studentcontroller::class,'faculty_feedback']);
Route::get("/cummulative", [studentcontroller::class,'cummulative']);
Route::get("/std_view", [studentcontroller::class,'std_view']);



// Aptech website route start
Route::get("/", [webcontroller::class,'indexget']);
Route::get("/about", [webcontroller::class,'aboutget']);
Route::get("/contact", [webcontroller::class,'contactget']);
Route::get("/event", [webcontroller::class,'eventget']);
Route::get("/onlinevarsity", [webcontroller::class,'onlinevarsityget']);
Route::get("/careercourse", [webcontroller::class,'careercourseget']);
Route::get("/shortcourse", [webcontroller::class,'shortcourseget']);

// Aptech website route end


// admin dashboard end for aptech website
Route::get("/adminindex", [webcontroller::class,'adminindex']);
Route::get("/admincarousel", [webcontroller::class,'admincarousel']);
Route::post("/admincarousel", [webcontroller::class,'admincarouselpost']);
Route::get("/deletecarousel/{id}", [webcontroller::class,'deletecarousel']);
Route::post("/editcarousel", [webcontroller::class,'editcarousel']);
Route::post("/updatecarousel", [webcontroller::class,'updatecarousel']);
Route::get("/admincareercourses", [webcontroller::class,'admincareercourses']);
Route::post("/admincareercourse", [webcontroller::class,'admincareercoursepost']);
Route::get("/deletecareercourse/{id}", [webcontroller::class,'deletecareercourse']);
Route::post("/editcareercourses", [webcontroller::class,'editcareercourses']);
Route::post("/updatecareercourses", [webcontroller::class,'updatecareercourses']);
Route::get("/adminshortcourses", [webcontroller::class,'adminshortcourses']);
Route::post("/adminshortcourses", [webcontroller::class,'adminshortcoursepost']);
Route::get("/deleteshortcourse/{id}", [webcontroller::class,'deleteshortcourse']);
Route::post("/editshortcourses", [webcontroller::class,'editshortcourses']);
Route::post("/updateshortcourses", [webcontroller::class,'updateshortcourses']);
