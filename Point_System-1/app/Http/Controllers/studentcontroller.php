<?php

namespace App\Http\Controllers;
use App\Models\Labs;
use App\Models\hardware_complain;
use App\Models\software_complain;
use App\Models\network_issue;
use App\Models\other_issue;
use App\Models\facultyreg;
use App\Models\faculties;
use App\Models\batches;
use App\Models\gpa_calculate;
use App\Models\jobs_models;
 use App\Exports\Export_User;

use Illuminate\Console\Scheduling\Schedule;

use Illuminate\Support\Carbon;

use App\Models\user;
use App\Models\usermodels;
use App\Models\temp_verfy;
use App\Models\student;
use App\Models\temp_comp;
use App\Models\feedback_form;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportUser;
use App\Models\cummulative;

use Mail;
use App\Models\LabSystem;
use App\Models\Complain_Master;
use DB;                                                                                             
use Illuminate\Http\Request;

class studentcontroller extends Controller
{
    public function get_email()
    {
        return view("/code_match_");
    }

    public function code_match()
    {
        //$user =DB::table("usermodels")->where("email", session('sessionuseremail'))->first();
        $fetch = temp_verfy::all();
        return view("/code_match" , compact ('fetch'));
    }

    public function input(Request $res)
    {
        //taking input
        $get_Email = $res->emailinput;

        //checking from aptech user data
        $studcheck =DB::table("students")->where("Student_email", $get_Email)->first();
		$email_match1=temp_verfy::where("email", $get_Email)->first();  
        if(isset($studcheck))
        {
            $v_code = $this->generateUniqueCode();
            $user =DB::table("usermodels")->where("email", $get_Email)->first();
            $email_match =DB::table("students")->where("Student_email", $get_Email)->first();
    
            if(isset($user))
            {
                echo "<script>alert('Email Already Exists.')
                window.location.href='/login'
                </script>";
            }
            else
            {
				if($email_match1)
              {
                $studcheck = temp_verfy::where("email", $get_Email)->first();  
					
                $studcheck->code = $v_code;
                $studcheck->update();

                try
                {
                    $data= ['name'=> $studcheck->name ,'data'=> $studcheck->email , 'code'=>$studcheck ->code ]; 
                    //$data= Auth::User()->name;
                    $user ['to'] = $studcheck->email;    
                    Mail::send('email_user',$data ,function($messages) use ($user)
                    {
                        $messages->to($user ['to']);
                        $messages->subject('Registration Code for Lab Complain');
                    });

                    session(['sessionuseremail'=>$get_Email]);

                    return redirect("/code_match");
            
                }
                catch(Exception $ex)
                {
                    echo $ex->getMessage();
                    die;
                }
              
              }
              else{
                $studcheck = new temp_verfy();
                $studcheck->email = $get_Email;
                $studcheck->code = $v_code;
                $studcheck->save();
                
                try
                {
                    $data= ['name'=> $studcheck->name ,'data'=> $studcheck->email , 'code'=>$studcheck ->code ]; 
                    //$data= Auth::User()->name;
                    $user ['to'] = $studcheck->email;    
                    Mail::send('email_user',$data ,function($messages) use ($user)
                    {
                        $messages->to($user ['to']);
							$messages->subject('Registration Code for Lab Complain');
                    });

                    session(['sessionuseremail'=>$get_Email]);

                    return redirect("/code_match");
            
                }
                catch(Exception $ex)
                {
                    echo $ex->getMessage();
                    die;
                }
              }
            }
                
        }else{
            echo 
            "<script>alert('Record Not Found.')
            window.location.href='/student'
            </script>";
        }
        
    }


    public function logout()

    {
        session()->forget("sessionuseremail");
        return redirect("/login");
    }
	
	
	    public function admin_logout()

    {
        session()->forget("sessionuseremail");
        return redirect("/login");
    }


    public function code_match_(Request $req)
    {   
        $email =$req->emailinput;
        $codes =$req->code0;
        $codes =$codes.$req->code1;
        $codes =$codes.$req->code2;
        $codes =$codes.$req->code3;
        $codes =$codes.$req->code4;
        $codes =$codes.$req->code5;

        //$studcheck =DB::table("students")->where("Student_email", $email)->first();
        //$req->emailinput;

        $login = temp_verfy::where("email", $email)->first();
        $code_check = $req->code;
        $user =DB::table("usermodels")->where("email", $email)->first();
        $login2 =DB::table("students")->where("Student_email", $email)->first();
        $pass =$req->passwordinput;
        $conpass =$req->coninput;

        if(isset($codes))
        { 
            if($codes   ==  $login->code)                    
            {
				 session(['sessionuseremail'=>$email]);

                $fetch = temp_verfy::all();
                echo "<script>alert('Verfication Code Match.')
                window.location.href='/register'
                </script>";
            }
            else
            {
                echo "<script>alert('Wrong Verfication Code.')
                window.location.href='/code_match'
                </script>";
            }
        }
        else
        {
            echo "<script>alert('Please enter code and try again.')
            window.location.href='code_match'
            </script>";
        }
            
    }
    public function registerget()
    {
        $fetch = temp_verfy::all();
        $lab = Labs::all();
        $hardware = hardware_complain::all();
        $software = software_complain::all();
        $Network = network_issue::all();
        return view ("/register" ,compact('fetch','hardware','software','Network'));
    }
	


    public function registerpost(Request $req)
    {
        $email = $req->emailinput;
        $studcheck =DB::table("students")->where("student_email", $email)->first();
        $user = usermodels::where("email", $email)->first();  

        $login = temp_verfy::where("email", $email)->first();
        $login2 =DB::table("students")->where("Student_email", $email)->first();
        $pass =$req->passwordinput;
        $conpass =$req->coninput;

         if(strlen($pass) < 8)
        {
            echo "<script>alert('Woops! Password cannot be less the 8 characters.')
            window.location.href=''
            </script>";
            return;
        } 
        else
        { 
            if($pass == $conpass)
            {   
                session(["sessionuseremail"=>$email]);
                session(["sessionusername"=>$login2->Std_Name]);
    
                //forgot 
                if($login->status ==8)
                { 

                    $user = usermodels::where("email", $email)->first();  
                    $user->password = $req->passwordinput;
                    $user->update();
                }
                else
                { 
                    // .....

                    $user = usermodels::where("email", $email)->first();  
                    // echo $systemcheck;
        
                    if(isset($user))
                    {
                        ;
                    }
                    else
                    {
                        $user = new usermodels();
                        $user->email = $req->emailinput;    
                        $user->password = $req->passwordinput;
                        $user->Std_id = $studcheck->Std_id;
                        $user->role = 1;
                        $user->save();

                         // echo "Registerd";
                        $data= ['Std_Name'=> $login2->Std_Name ,'data'=> $login->email]; 
                        $user ['to'] = $login->email;  

                        Mail::send('email_register',$data ,function($messages) use ($user)
                        {
                            $messages->to($user ['to']);
                            $messages->subject('User Registration Completed!');
                        }); 
                    }


                }
                //$userid = $email;

                $systemcheck =temp_comp::where('email' , $email)->first();
    
                if(isset($systemcheck))
                {
                    // echo "Email ALready Registerd";
                }
                else
                {
                    $systemcheck = new temp_comp();
                    $systemcheck->email = $email;
                    $systemcheck->save();
                }

                $fetch = temp_verfy::all();
                $fetch = LabSystem::all();
                $lab = Labs::whereNotIn('lab_number' , ['seminar'])->get();
                $hardware = hardware_complain::all();
                $software = software_complain::all();
                $Network = network_issue::all();

                if(isset($login['0']->id))
                {
                    $data=usermodels::where('id',$login['0']->id)->first();
                    session()->put('user',$data);
                    session(["sessionid"=>$us->std_id]);
                    session(["sessionusername"=>$us->name]);
                    session(["user"=>$data->std_id]);
                    // echo session('user');

                    $user = usermodels::where("email", $email)->first();  
                    $email = $req->emailinput;
                    $user =DB::table("usermodels")->where(["email"=>$email])->first();

                    session(["std_id"=>$user->std_id]);

                    // echo session("std_id");

                    session(["sessionid"=>$login->id]);
                    session(["sessionuseremail"=>$login->email]);
                    session(["sessionusername"=>$studcheck->Std_Name]);
              
                  
               $studcheck =DB::table("usermodels")->where('email', session('sessionuseremail'))->first();
                $examcheck =DB::table("internalexams")->orderBy('id','desc')->limit(1)->get();
                $announcement = DB::table('announcements')->orderBy('id','desc')->limit(1)->get();
                $attendances = DB::table('attendances')->where('Std_ID',$studcheck->std_id)->orderBy('id','desc')->limit(1)->get();
                $student_data = DB::table('examsubjectmasters')
                ->join('usermodels','usermodels.Std_ID','examsubjectmasters.std_id');
                // ->orderBy('examsubjectmasters.id','desc')->limit(1)
                // ->where('examsubjectmasters.Std_ID',$studcheck->std_id)
                // ->get();
                                       
$jobs = DB::table('jobs')->where('status', '1')->orderBy('id','desc')->limit(1)->get();

                    return view('student_dashboard',compact('announcement','attendances','student_data','examcheck','jobs'));
                }

               $studcheck =DB::table("usermodels")->where('email', session('sessionuseremail'))->first();
                $examcheck =DB::table("internalexams")->orderBy('id','desc')->limit(1)->get();
                $announcement = DB::table('announcements')->orderBy('id','desc')->limit(1)->get();
                $attendances = DB::table('attendances')->where('Std_ID',$studcheck->std_id)->orderBy('id','desc')->limit(1)->get();
                $student_data = DB::table('examsubjectmasters')
                ->join('usermodels','usermodels.Std_ID','examsubjectmasters.std_id');
                // ->orderBy('examsubjectmasters.id','desc')->limit(1)
                // ->where('examsubjectmasters.Std_ID',$studcheck->std_id)
                // ->get();
$jobs = DB::table('jobs')->where('status', '1')->orderBy('id','desc')->limit(1)->get();
                
                return view("/student_dashboard" ,compact( 'fetch','lab','hardware','software','Network','announcement','attendances','student_data','examcheck','jobs'));

            }
            else
            {   
                echo 
                "<script>alert('Password and Confirm password does not match.')
                window.location.href='/register'
                </script>";
            }                
        } 

    }

    public function register_complains(Request $req)
    {
        if(isset($request->emailinput)){
            $email = $req->emailinput;
        }else{
            $email = session('sessionuseremail');
        }
        $fcheck =DB::table("facultyregs")->where('email' ,$email)->first();
        $schecm =DB::table("usermodels")->where('email' ,$email)->first();

        //to disguise between faculty & Student
        if(isset($fcheck))
        {
           $login =DB::table("facultyregs")->where('email' ,$email)->first();
        }elseif(isset($schecm)){
            $login =DB::table("usermodels")->where('email' ,$email)->first();
        }   

        if(isset($email))
        {
            $systemcheck = temp_comp::where('email' , $email)->first();
            if(isset($systemcheck))
            {
                $systemcheck = temp_comp::where('email' , $email)->first();
                $systemcheck->email= $email;
                $systemcheck->update();
            }
            else
            {
                $systemcheck = new temp_comp();
                $systemcheck->email= $email;
                $systemcheck->save();
            }

            $id = $req->inputuserid;
            $fetch = LabSystem::all();


            //role set

        //    echo  'HELLO'.$login->role;
           if($login->role==1)
           {
                $lab = Labs::whereNotIn('lab_number' , ['seminar', 'lab 1b'])->get();
           }
           else if($login->role==2)
           {
                $lab =  Labs::all();
           }
           
            $hardware = hardware_complain::all();
            $Software = software_complain::all();
            $Network = network_issue::all();
            // $Other = other_issue::all();
            $system = temp_comp::where('email' , $email)->get();

            $studcheck =DB::table("students")->where(["Student_email"=>session('sessionuseremail')])->first();

            $Complainhards = Complain_Master::join('hardware_complains','hardware_complains.id','complain__masters.Complain_Category')
            ->where('Regiystered_By', session('sessionuseremail'))
            ->where('role_type' ,'1')->get();

            $Complainsoft = Complain_Master::join('software_complains','software_complains.id','complain__masters.Complain_Category')
            ->where('Regiystered_By', session('sessionuseremail'))
            ->where('role_type' ,'2')->get();

            $Complainnetwork = Complain_Master::join('network_issues','network_issues.id','complain__masters.Complain_Category')
            ->where('Regiystered_By', session('sessionuseremail'))
            ->where('role_type' ,'3')->get();

            $Complainnetother = Complain_Master::where('role_type' ,'4')
				            ->where('Regiystered_By', session('sessionuseremail'))
->get();

            // $month = Carbon::now()->format('M');
            // echo $month;
            // $systemcheck = new temp_comp();
            // $systemcheck->email= $email;
            // $systemcheck->save();
            return view("/register_complains" ,compact('Complainnetother','Complainnetwork','Complainsoft','Complainhards','fetch','lab','system','hardware','Software','Network'));
        }
        else
        {
            // $email = $req->emailinput;

            // echo "j". $email = $req->emailinput;
            // echo "j".session('sessionuseremail');

            echo 
            "<script>alert('Please Login First.')
            window.location.href='/login'
            </script>";
        }
    }

    public function facultylogin()
    {
        return view("faculty_login");
    }

    public function facultyregister()
    {
        return view("faculty_register");
    }
    public function regpost_(Request $req)
    {
        $user = new facultyreg();
        $user->name = $req->nameinput;    
        $user->email = $req->emailinput;    
        $user->password = $req->passwordinput;
        $user->role = 2;
        $user->save();
        return redirect("/faculty")->with("success" , "company has been register");
       
    }
    public function facultyget(Request $req)
    {
        $email =$req->emailinput;
        $password= $req->passwordinput;
        $userid = session('sessionuseremail'); 

        $login =DB::table("facultyregs")->where(["email"=>$email , "password"=>$password])->first();
        // $studcheck =DB::table("students")->where(["Student_email"=>$email])->first();
        $userid = $req->emailinput;

        if($login!="")
        {
            if(isset($email))
            {
                $systemcheck =temp_comp::where('email' , $email)->first();
                // echo $systemcheck;
    
                if(isset($systemcheck))
                {
                    ;
                }
                else
                {
                    $systemcheck = new temp_comp();
                    $systemcheck->email=$req->emailinput;
                    $systemcheck->save();
                }
            }

            if($login->role=="2")
            {

                $systemcheck =temp_comp::where('email' , $email)->first();  
                session(["sessionid"=>$login->id]);
                session(["sessionuseremail"=>$login->email]);
                session(["sessionusername"=>$login->name]);
                $fetch = LabSystem::all();
                $lab = Labs::all();
                $hardware = hardware_complain::all();
                $software = software_complain::all();
                $Network = network_issue::all();
                // $other = other_issue::all();

                return view("/register_complains" ,compact( 'fetch','lab','hardware','software','Network'));

            }
           
        }

        else
        {
            return redirect()->back()->with("errormessage" , "Record Not Found");

        }
    }

    public function loginadminpost(Request $req)
    {
        $email =$req->emailinput;
        $password= $req->passwordinput;
        $userid = session('sessionuseremail');

        $login =DB::table("usermodels")->where(["email"=>$email , "password"=>$password])->first();
        $studcheck =DB::table("students")->where(["Student_email"=>$email])->first();
        $userid = session('sessionuseremail');

        if($login!="")
        {
            if(isset($email))
            {
              
                $systemcheck =temp_comp::where('email' , $email)->first();
         
                if(isset($systemcheck))
                {
                    ;
                }
                else
                {
                    $systemcheck = new temp_comp();
                    $systemcheck->email = $email;
                    $systemcheck->save();
                }
            }

            if($login->role=="1")
            {
                $email =$req->emailinput;
                $password= $req->passwordinput;
                $adm = usermodels::where(["email"=>$email , "password"=>$password])->get();
                $user = usermodels::where("email", $email)->first();  

                session(["sessionid"=>$login->id]);
                session(["sessionuseremail"=>$login->email]);
                session(["std_id"=>$login->std_id]);
                session(["sessionusername"=>$studcheck->Std_Name]);

                // echo session("std_id");
               
               $studcheck =DB::table("usermodels")->where('email', session('sessionuseremail'))->first();
                $examcheck =DB::table("internalexams")->orderBy('id','desc')->limit(1)->get();
                $announcement = DB::table('announcements')->orderBy('id','desc')->limit(1)->get();
                $attendances = DB::table('attendances')->where('Std_ID',$studcheck->std_id)->orderBy('id','desc')->limit(1)->get();
                $student_data = DB::table('examsubjectmasters')
                ->join('usermodels','usermodels.Std_ID','examsubjectmasters.std_id');
				                return redirect("/student_dashboard");

                // ->orderBy('examsubjectmasters.id','desc')->limit(1)
                // ->where('examsubjectmasters.Std_ID',$studcheck->std_id)
                // ->get();
               // return view('student_dashboard',compact('announcement','attendances','student_data','examcheck'));
            }
            else if($login->role=="0")
            {   
                session(["sessionid"=>$login->id]);
                session(["sessionuseremail"=>$login->email]);
                session(["sessionusername"=>$login->name]);


                $fetch = LabSystem::all();
                $lab = Labs::whereNotIn('id' , ['14' ,'19'])->get();
                $hardware = hardware_complain::all();
                $software = software_complain::all();
                $Network = network_issue::all();
                // $other = other_issue::all();

                $mytime = Carbon::now();
                $mytime->toDateTimeString();
                // echo $mytime;

                $countcomplain= Complain_Master::where('Status' ,'like', '%2%')->get();
                $count = $countcomplain->count();

                $countcomplains= Complain_Master::where('Status' ,'like', '%0%')->get();
                $count1 = $countcomplains->count();

                $fetchprevious = Complain_Master::whereDate('Date_of_Complain','<',$mytime)->get();
                // echo $fetchprevious;
                $fetchtoday = Complain_Master::orderBy('created_at', 'desc')->get();

                $fetch = Complain_Master::whereDate('Date_of_Complain','>',$mytime)->get();

                $Complain_Master = Complain_Master::all();

                $count_bat = DB::table("PROTAL_BAT_STUDENT_FEEDBACK_V")->get();
                return redirect("/dashboard_");

              //  return view("dashboard_" ,compact('count_bat','Complain_Master','count1','count','fetchprevious','fetch','software','Network' ,'fetchtoday'));
            }

        }
        else
        {
            return redirect()->back()->with("errormessage" , "Record Not Found");

        }
    }
    public function adminget()
    {
        return view("/student_login");
    }

	
	 public function gety(Request $req)
    {
		  $date = Carbon::now();
            $monthName = $date->format('F');
    
            $month = Carbon::now()->format('o');
        $id = $req->post("batch");
        $batch = DB::table("std_nt_fill_fd")

			->where("Batch",$id)->get();
        $fhtml = 
            '<table class="table text-center table-bordered table-hovere table-striped table-responsive">'
            .'<tr>'.'<th style="width:160px;">'.'Batch'. '</th>'.'<th style="width:200px;">'.'Student Name'.'</th>'.'<th style="width:160px;">'.'Student Id'.'</th>'.'<tr>'
        
            .'</table>';
        echo $fhtml;
        foreach($batch as $c)
        {
            $html = '<table class="table text-center table-bordered table-hovere table-striped table-responsive">'
            .'<tr>'.'<td>'.$c->Batch. '</td>'.'<td>'.$c->Std_Name.'</td>'.'<td>'.$c->Std_id.'</td>'.'<tr>'
            .'</table>';


            // $html = '<table>'.'<tr>'.'<td>'.$c->Batch. '</td>' .'<td>'.$c->Std_Name.'</td>'.'<tr>'.'</table>';

            echo $html;

            // $html = '<option>'.$c->Batch.'</option>';
            // $html1 = '<option>'.$c->Std_Name.'</option>';
            // echo $html , $html1;
        }

        // echo $countryid;
    }

    public function get_batch(Request $req)
     {
         $id = $req->post("userid");
         //echo $id;
         $record = DB::table('protal_bat_student_feedback_v')->where('Batch' ,$id)->get();
         foreach($record as $r)
         {
             $user =$r;
             echo json_encode($user);
         }
     }
	
    public function dashboard_()
    {
        session('sessionusername');

        $fetch = LabSystem::all();
        $lab = Labs::whereNotIn('id' , ['14' ,'19'])->get();
        $hardware = hardware_complain::all();
        $software = software_complain::all();
        $Network = network_issue::all();
        // $other = other_issue::all();

        $mytime = Carbon::now();
        $mytime->toDateTimeString();
        // echo $mytime;

        $countcomplain= Complain_Master::where('Status' ,'like', '%2%')->get();
        $count = $countcomplain->count();

        $countcomplains= Complain_Master::where('Status' ,'like', '%0%')->get();
        $count1 = $countcomplains->count();

        $fetchprevious = Complain_Master::orderBy('created_at', 'desc')->get();
        // echo $fetchprevious;
        $fetchtoday = Complain_Master::orderBy('created_at', 'desc')->get();

        $fetch = Complain_Master::whereDate('Date_of_Complain','>',$mytime)->get();

        $Complain_Master = Complain_Master::all();


       
        // $Complainhards = Complain_Master::join('hardware_complains','hardware_complains.id','complain__masters.Complain_Category')
        // ->where('role_type' ,'1')->get();

        $count_bat = DB::table("PROTAL_BAT_STUDENT_FEEDBACK_V")->get();
        // $count_bat = feedback_form::join('batches','batches.Batch','feedback_forms.batch')
        // ->orWhere('month' ,'like', '%january%')
        // ->orWhere('month' ,'like', '%february%')
        // ->where('month' ,'like', '%march%')
        // ->orWhere('month' ,'like', '%april%')
        // ->orWhere('month' ,'like', '%april%')
        // ->orWhere('month' ,'like', '%may%')
        // ->orWhere('month' ,'like', '%jun%')
        // ->orWhere('month' ,'like', '%july%')
        // ->orWhere('month' ,'like', '%august%')
        // ->orWhere('month' ,'like', '%september%')
        // ->orWhere('month' ,'like', '%octuber%')
        // ->orWhere('month' ,'like', '%november%')
        // ->orWhere('month' ,'like', '%december%')
        // ->get();

        return view("dashboard_" ,compact('count_bat','Complain_Master','count1','count','fetchprevious','fetchtoday','fetch','software','Network'));

    }
   
    
    public function generateUniqueCode()
    {
        // $code = random_int(1000000, 999999);
        $code = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        return  $code;
    }

    
    public function lab_systems_()
    {
        $user =DB::table("usermodels")->where("email", session('sessionuseremail'))->first();
        $fetch = LabSystem::all();
        return view("/lab_systems" , compact ('fetch')); 
    }
    

    public function lab(Request $req)
    {
        $labid = $req->post("userid");
        return view("/register_complains" , compact('fetch' ,'lab'));
    }

    public function lab_systems()
    {
        
        $lab = new LabSystem();
        $lab->Host_Name=$req->Host_Nameinput;
        $lab->Status=$req->Statusinput;
        $lab->save();
        return redirect()->back();
    }

    public function interviewinvite1(Request $res)
    {
        $developerid = $res->post("interid_");
        echo $developerid;

        $developer = LabSystem::find($developerid);
        $developer->Status="1";
        $developer->update();

        return redirect()->back();
    }    

    public function interviewinvite2(Request $res)
    {
        $developerid = $res->post("interid_1");
        echo $developerid;

        $developer = LabSystem::find($developerid);
        $developer->Status="0";
        $developer->update();

        return redirect()->back();
    }

    public function getcity($id)
    {
        $labid = $id;
        $lab_system = DB::table("lab_systems")->where("Lab_id",$labid)->get();        
        return view("labs_" ,compact('lab_system'));   
    }

    // _______________________________________________________________________________

    public function get_data(Request $req)
    {
        $id = $req->post("userid");
        $record = Labs::where('id' ,$id)->get();
        foreach($record as $r)
        {
            $user =$r;
            echo json_encode($user);
        }
    }
    // ____________________________________________________________________-

    public function get_data_(Request $req)
    {
        $id = $req->post("userid_");
        $record = temp_comp::where('id' ,$id)
        ->orderBy('created_at', 'desc')->get();
        foreach($record as $r)
        {
            $user =$r;
            echo json_encode($user);
        }
    }


    public function temp_comp(Request $request,$id)
    {

        if(isset($request->emailinput)){
            $userid = $request->emailinput;
        }else{
            $userid = session('sessionuseremail');
        }
        $name = LabSystem::where('id' ,$id)->first();
        $emailse=session('sessionuseremail');
        
        $system =temp_comp::where('email' , $userid)
        ->where('Host_Name',$name->Host_Name)->first();
      
            $userid = session('sessionuseremail');
            $systemcheck =temp_comp::where('email' , $userid)->first();
            $system =temp_comp::where('email' , $userid)->first();
            $system->Host_Name=$name->Host_Name;
            $system->email=session('sessionuseremail');
            $system->Lab_id=$name->Lab_id;
            $system->Pc_ip=$id;
            $system->Date_of_Complain = Date("y-m-d");
            $system->update();
        
            
			$fetch = LabSystem::all();
			$lab = Labs::all();
			$hardware = hardware_complain::all();
			$software = software_complain::all();
			$Network = network_issue::all();
			// $other = other_issue::all();

        // $systems = temp_comp::where('email' , $userid)->get();
        return view("/register_complains" ,compact( 'fetch','lab','hardware','software','Network'));
    }
    public function getdatmodal(Request $req)
    {
        $id = $req->post("userid_");
        //echo $id;
        $record = temp_comp::where('id' ,$id)->get();
        foreach($record as $r)
        {
            $user =$r;
            echo json_encode($user);
        }
    }


    public function hardwareissue(Request $req)
    {

        $user = usermodels::where('email',$req->emailinput)->first();
        // $login =DB::table("hardware_complains")->where('id' ,$req->id)->first();

        $hardware = $req->hardware;
        $other_issue = $req->other_issue;
		
		$req->validate([
           "other_issue"=>"required",
        ]);

        $status = $req->status;

        $userid = session('sessionuseremail');
        echo $userid;

        $studcheck =DB::table("students")->where(["Student_email"=>$userid])->first();

        $user = temp_comp::where('email',session('sessionuseremail'))->first();   
        $user->hardware_name = $hardware;
        $user->other_hardware_issue=$other_issue;
        // $user->Date_of_Complain = Date("y-m-d");
        $user->update();

        $complain = new Complain_Master();
        $complain->Complain_Category=$hardware;
        $complain->Complain_Description=$other_issue;
        // $complain->installation=$installation;
        // $complain->id_=$id;
        $complain->status_work=$status;
        $complain->Date_of_Complain = Date("y-m-d");
        $complain->Regiystered_By=session('sessionuseremail');
        $complain->Lab_id=$user->Lab_id;
        $complain->Pc_ip=$user->Pc_ip;
        $complain->role_type=$req->role1;
        $complain->save();

        $data= ['data'=>session('sessionuseremail')]; 
        //$data= Auth::User()->name;
        $user ['to'] = 'muhammadanasz786@gmail.com';    //admins email t0 send the email to the admin of the site 
        Mail::send('email',$data ,function($messages) use ($user)
        {
            $messages->to($user ['to']);
            $messages->subject('New Complain register by');
        }); 

        $delete = temp_comp::where('email',$userid);
        $delete->delete();

        echo "<script>alert('Complain Register Successfully.')
            window.location.href='/register_complains'
            </script>";

        // return redirect("register_complains")->with("updatedsuccess" , "Data has been updated");
    }


    public function softwareissue(Request $req)
    {
            $software = $req->software ;
            $other_issue = $req->other_issue;
            // $installation = $req->installation;
        $status = $req->status;

            $userid = session('sessionuseremail');
            $studcheck =DB::table("students")->where(["Student_email"=>$userid])->first();
            $user = temp_comp::where('email',$userid)->first();   
            echo "ddd".$userid;    

            $user->software_name = $software;
            $user->other_software_issue=$other_issue;
            // $user->Date_of_Complain = Date("y-m-d");
            $user->update();

            $complain = new Complain_Master();
            $complain->Complain_Category=$software;
            $complain->Complain_Description=$other_issue;
            // $complain->installation=$installation;
        $complain->status_work=$status;

            $complain->Date_of_Complain = Date("y-m-d");
            $complain->Regiystered_By=session('sessionuseremail');
            $complain->Lab_id=$user->Lab_id;
            $complain->Pc_ip=$user->Pc_ip;
            $complain->role_type=$req->role1;
            $complain->save();

            $data= ['data'=>session('sessionuseremail')]; 
            //$data= Auth::User()->name;
            $user ['to'] = 'muhammadanasz786@gmail.com';    //admins email t0 send the email to the admin of the site 
            Mail::send('email',$data ,function($messages) use ($user)
            {
                $messages->to($user ['to']);
                $messages->subject('New Complain register by');
            });

            $delete = temp_comp::where('email',$userid);
            $delete->delete();

            echo "<script>alert('Complain Register Successfully.')
            window.location.href='/register_complains'
            </script>";

            // return redirect("register_complains")->with("updatedsuccess" , "Data has been updated");
        }
    public function networkissue(Request $req)
    {
        $network = $req->network;
        $other_issue = $req->other_issue;
		        $status = $req->status;

        // $installation = $req->installation;

        $userid = session('sessionuseremail');
        $studcheck =DB::table("students")->where(["Student_email"=>$userid])->first();

        $user = temp_comp::where('email',$userid)->first();   
        echo "ddd".$userid;    
        $user->Network_issue = $network;
        $user->other_hardware_issue=$other_issue;

        // $user->Date_of_Complain = Date("y-m-d");
        $user->update();

        $complain = new Complain_Master();
        $complain->Complain_Category=$network;
        $complain->Complain_Description=$other_issue;
        // $complain->installation=$installation;
        $complain->status_work=$status;

        $complain->Date_of_Complain = Date("y-m-d");
        $complain->Regiystered_By=session('sessionuseremail');
        $complain->Lab_id=$user->Lab_id;
        $complain->Pc_ip=$user->Pc_ip;
        $complain->role_type=$req->role1;
        $complain->save();

        $data= ['data'=>session('sessionuseremail')]; 
        //$data= Auth::User()->name;
        $user ['to'] = 'muhammadanasz786@gmail.com';    //admins email t0 send the email to the admin of the site 
        Mail::send('email',$data ,function($messages) use ($user)
        {
            $messages->to($user ['to']);
            $messages->subject('New Complain register by');
        });

        $delete = temp_comp::where('email',$userid);
        $delete->delete();

        echo "<script>alert('Complain Register Successfully.')
        window.location.href='/register_complains'
        </script>";

        // return redirect("register_complains")->with("updatedsuccess" , "Data has been updated");
    }

    public function otherissue(Request $req)
    {
        $other = $req->other;
        // $installation = $req->installation;

        $userid = session('sessionuseremail');
        $studcheck =DB::table("students")->where(["Student_email"=>$userid])->first();

        $user = temp_comp::where('email',$userid)->first();   
        echo "ddd".$userid;   

        $user->other_issue = $other;
        // $user->Date_of_Complain = Date("y-m-d");
        $user->update();

        $complain = new Complain_Master();
        $complain->Complain_Category=1;
        $complain->Complain_Description=$other;
        // $complain->installation=$installation;
        $complain->Date_of_Complain = Date("y-m-d");
        $complain->Regiystered_By=session('sessionuseremail');
        $complain->Lab_id=$user->Lab_id;
        $complain->Pc_ip=$user->Pc_ip;
        $complain->role_type=$req->role1;
        $complain->save();

        $data= ['data'=>session('sessionuseremail')]; 
        //$data= Auth::User()->name;
        $user ['to'] = 'muhammadanasz786@gmail.com';    //admins email t0 send the email to the admin of the site 
        Mail::send('email',$data ,function($messages) use ($user)
        {
            $messages->to($user ['to']);
            $messages->subject('New Complain register by');
        });

        $delete = temp_comp::where('email',$userid);
        $delete->delete();
        
        echo "<script>alert('Complain Register Successfully.')
        window.location.href='/register_complains'
        </script>";
        // return redirect("register_complains")->with("updatedsuccess" , "Data has been updated");
    }

    public function register_()
    {
        $userid = session('sessionuseremail');
        $system = temp_comp::where('email' , $userid)->get();

        $hardware = hardware_complain::all();
        $software = software_complain::all();
        $Network = network_issue::all();
        // $others = other_issue::all();
        $fetch = LabSystem::all();

        return view("/complain_register" ,compact('system','fetch','hardware','software','Network'));
    }



    public function view_complains()
    {
        // $Complainhards = Complain_Master::join('hardware_complains','hardware_complains.id','complain__masters.Complain_Category')
        // ->where('Regiystered_By',session('sessionuseremail'))
        // ->where('role_type' ,'1')->get();

        // $Complainsoft = Complain_Master::join('software_complains','software_complains.id','complain__masters.Complain_Category')
        // ->where('Regiystered_By',session('sessionuseremail'))
        // ->where('role_type' ,'2')->get();

        // $Complainnetwork = Complain_Master::join('network_issues','network_issues.id','complain__masters.Complain_Category')
        // ->where('Regiystered_By',session('sessionuseremail'))
        // ->where('role_type' ,'3')->get();

        if(session('sessionuseremail'))
        {
            $studcheck =DB::table("students")->where(["Student_email"=>session('sessionuseremail')])->first();

            $Complainhards = Complain_Master::join('hardware_complains','hardware_complains.id','complain__masters.Complain_Category')
            ->where('Regiystered_By', session('sessionuseremail'))
            ->where('role_type' ,'1')->get();

            $Complainsoft = Complain_Master::join('software_complains','software_complains.id','complain__masters.Complain_Category')
            ->where('Regiystered_By', session('sessionuseremail'))
            ->where('role_type' ,'2')->get();

            $Complainnetwork = Complain_Master::join('network_issues','network_issues.id','complain__masters.Complain_Category')
            ->where('Regiystered_By', session('sessionuseremail'))
            ->where('role_type' ,'3')->get();

            $Complainnetother = Complain_Master::where('role_type' ,'4')
            ->where('Regiystered_By', session('sessionuseremail'))
				->get();

            // $view_compl =Complain_Master::where('Regiystered_By',session('sessionuseremail'))->get();
            return view("/view_complains",compact('Complainhards','Complainsoft','Complainnetwork','Complainnetother'));        

        }   
        else{
            echo 
            "<script>alert('Please Login First.')
            window.location.href='/login'
            </script>";
        }
    }
    // _________________________________________________________________________
    public function update_status_company1(Request $res)
    {           
        try{
            $companyid = $res->post("userid");
            echo $companyid;
    
            $company = LabSystem::find($companyid);
    
            if(is_null($company)){

                echo "Error";
                die;
            }

            $company->status="1";
            $company->update();
 
            return redirect()->back();

            }
            catch(Exception $ex){


                echo $ex->getMessage();
                die;
            }
    }    

    public function update_status_company0(Request $res)
    {
        $companyid = $res->post("userid1");
        echo $companyid;

        $company = LabSystem::find($companyid);
        $company->status="0";
        $company->update();

        return redirect()->back();

    }
    public function forgetpassword()
    {
        $fetch = temp_verfy::all();
        return view("/forgetpassword",compact('fetch'));
    }
    public function forgetpassword_(Request $req)
    {
        $v_code =  $this->generateUniqueCode();
        $user = usermodels::where('email',$req->emailinput)->first();
                session(["sessionuseremail"=>$user->email]);

       if(isset($req->emailinput))
       {
           if(isset($user))
           {
            $fetch = temp_verfy::all();

                 $data= ['data'=> $user->email , 'code'=>$v_code]; 
                //$data= Auth::User()->name;
                $user ['to'] = $user->email;    
                Mail::send('email_user_forg',$data ,function($messages) use ($user)
                {
                    $messages->to($user ['to']);
                    $messages->subject('Forgot Passwword Code for Lab Complain');
                });
                $fuser = temp_verfy::where('email',$req->emailinput)->first();
                $fuser->code = $v_code; 
                $fuser->status = 8;  
                $fuser->update();
                return view("/code_match",compact('fetch'));
            }else{
                echo "<script>alert('Invalid Email Address.')
                window.location.href='/forgetpassword'
                </script>";
            }
       }
       else{
        echo "<script>alert('Please Provide Email Addresss to Continue.')
            </script>";

       }
        
    }
    public function labs()
    {
        $lab = Labs::all();
        return view("/lab_insert",compact('lab'));
    }
    public function labsinst_(Request $req)
    {
        $lab = new Labs();
        $lab ->No_of_pcs=$req->intlab;
        $lab ->lab_number=$req->labnumb;
        $lab ->Utilization_status=$req->utlstatus;
        $lab->save();
        return redirect()->back();
    }

    public function labsinst(Request $req)
    {
        $lab = new Labs();
        $lab ->No_of_pcs=$req->intlab;
        $lab ->lab_number=$req->labnumb;
        $lab ->Utilization_status=$req->utlstatus;
        $lab->save();
        return redirect()->back();

    }

    public function labsystem()
    {
        $lab_sys = LabSystem::all();
        return view("lab_systemS",compact('lab_sys'));
    }
    public function labsystem_(Request $req)
    {
        $labs = new LabSystem();
        $labs ->Host_Name=$req->intlab;
        // $labs ->Status=$req->labnumb;
        $labs ->Lab_id=$req->utlstatus;

        $labs->save();
        return redirect()->back();

    }

    public function Complain_views_admin()
    {
        return view("Complain_views_admin");
    }


     // _________________________________________________________________________
     public function updatstatus_1(Request $res)
     {  
        $complainid = $res->post("id1");
        echo $complainid;
        $complain = Complain_Master::find($complainid);
        $complain->Status="1";
        $complain->update();
        return redirect()->back();
     }    
 
     public function updatstatus_0(Request $res)
     {
        $complainid = $res->post("id1");
        echo $complainid;
        $complain = Complain_Master::find($complainid);
        $complain->Status="0";
        $complain->update();
         return redirect()->back();
     }
     public function hardware_compalins()
     {
       
        $Complainhards = Complain_Master::join('hardware_complains','hardware_complains.id','complain__masters.Complain_Category')
        ->where('role_type' ,'1')->get(['complain__masters.*']);

        // $Complainhards =Complain_Master::all();
        return view("hardware_complains" ,compact('Complainhards'));
     }

     public function software_compalins()
     {
        $Complainsoft = Complain_Master::join('software_complains','software_complains.id','complain__masters.Complain_Category')
        ->where('role_type' ,'2')->get(['complain__masters.*']);
        // $Complainhar =Complain_Master::all();
        return view("software_complains" ,compact('Complainsoft'));
     }

     public function network_compalins()
     {
        $Complainnetwork = Complain_Master::join('network_issues','network_issues.id','complain__masters.Complain_Category')
        ->where('role_type' ,'3')->get(['complain__masters.*']);
        // $Complainhar =Complain_Master::all();
        return view("network_compalins" ,compact('Complainnetwork'));
     }

     public function other_complains()
     {

        $Complainnetother = Complain_Master::where('role_type' ,'4')->get();

        // $Complainhar =Complain_Master::all();
        return view("other_complains" ,compact('Complainnetother'));
     }

     public function Complain_Master(Request $request)
     {
        $mytime = Carbon::now();
        $mytime->toDateTimeString();

        $fetchprevious = Complain_Master::whereDate('date_of_reg','<',$mytime)->get();

        $fetchtoday = Complain_Master::orderBy('created_at', 'desc')->get();

        $fetch = Complain_Master::whereDate('date_of_reg','>',$mytime)->get();

        return view("dashboard_" ,compact('fetchprevious','fetchtoday','fetch'));

     }

    //  public function update_status_company_11(Request $res)
    //  {
        
        // $companyid = $res->post("id");
        //  echo $companyid;
 
        //  $company = Complain_Master::find($companyid);
        //  $company->Status="1";
        //  $company->update();
 
        //  return redirect()->back();
    //  }    
 
    //  public function update_status_company_00(Request $res)
    //  {
    //      $companyid = $res->post("id1");
    //      echo $companyid;
 
    //      $company = Complain_Master::find($companyid);
    //      $company->Status="0";
    //      $company->update();
 
    //      return redirect()->back();
 
    //  }

     public function updatstatuscompany_1(Request $res)
     {    
        try{
            $complainid = $res->post("comp_id");
            echo $complainid;
            $complain = Complain_Master::join('students','students.Student_email','complain__masters.Regiystered_By')
            ->where('id',$complainid)->first();
            // $complain = Complain_Master::find($complainid);

    
            if(is_null($complain)){

                echo "Error";
                die;
            }
            $complain->Status="1";
            $complain->update();

            $data= ['name'=> $complain->Std_Name,'data'=> $complain->Regiystered_By]; 
            //$data= Auth::User()->name;
            $user ['to'] = $complain->Regiystered_By;    //admins email t0 send the email to the admin of the site 
            Mail::send('resloved',$data ,function($messages) use ($user)
            {
                $messages->to($user ['to']);
                $messages->subject('Complain is been Resolved');
            }); 
            return redirect()->back();

            }
            catch(Exception $ex){


                echo $ex->getMessage();
                die;
            }
         return redirect()->back();

        // // try{
        //     $complainid = $res->post("comp_id");
        //     echo $complainid;
    
        //     $complain = Complain_Master::find($complainid);
        //     $complain->Status="1";
        //     $complain->update();
    
        //     // return redirect()->back();
     }    
 
     public function updatstatuscompany0(Request $res)
     {
        try{
            $complainid = $res->post("compid_1");
            echo $complainid;
            $complain = Complain_Master::join('students','students.Student_email','complain__masters.Regiystered_By')
            ->where('id',$complainid)->first();
            // $complain = Complain_Master::find($complainid);

    
            if(is_null($complain)){

                echo "Error";
                die;
            }
            $complain->Status="2";
            $complain->update();

            $data= ['name'=> $complain->Std_Name,'data'=> $complain->Regiystered_By]; 
            //$data= Auth::User()->name;
            $user ['to'] = $complain->Regiystered_By;    //admins email t0 send the email to the admin of the site 
            Mail::send('resloved',$data ,function($messages) use ($user)
            {
                $messages->to($user ['to']);
                $messages->subject('Complain is been Resolved');
            }); 
            return redirect()->back();

            }
            catch(Exception $ex){


                echo $ex->getMessage();
                die;
            }
         return redirect()->back();
 
     }

     public function all_lab()
     {
        $userid = session('sessionuseremail');
        $system =temp_comp::all();
        $lab = Labs::all();
        $software = software_complain::all();
        return view("/all_lab",compact('lab','software','system'));
     }
 

     public function lab_s_(Request $req)
     {
        $userid = session('sessionuseremail');
        $lab_id =$req->lab_id;
        $system =temp_comp::where('email' , $userid)->first();

        $system = new Complain_Master();
        $system->Lab_id=$req->select_lab;
        $system->Regiystered_By=$userid;
        $system->Complain_Category=$req->software;
        $system->Complain_Description=$req->other_install;
        $system->role_type=2;
        $system->Date_of_Complain = Date("y-m-d");
        $system->save();

        return redirect()->back();
        $userid = session('sessionuseremail');
        $system =temp_comp::all();
        $hardware = hardware_complain::all();
        $software = software_complain::all();
        $Network = network_issue::all();
        // $other = other_issue::all();
        $fetch = LabSystem::all();

        return view("/lab_issues",compact('hardware','software','Network','fetch','system'));

     }

     public function resolve()
     {
        // $a = Complain_Master::join('hardware_complains','hardware_complains.id','complain__masters.Complain_Category')
        // ->where('Status' , '2')->get();
        // $resolve = $a->merge($b);

        $Complainhards = Complain_Master::join('hardware_complains','hardware_complains.id','complain__masters.Complain_Category')
        ->where('role_type' ,'1')->get();

        $Complainsoft = Complain_Master::join('software_complains','software_complains.id','complain__masters.Complain_Category')
        ->where('role_type' ,'2')->get();

        $Complainnetwork = Complain_Master::join('network_issues','network_issues.id','complain__masters.Complain_Category')
        ->where('role_type' ,'3')->get();

        $Complainnetother = Complain_Master::where('role_type' ,'4')->get();
        return view("/resolve" ,compact('Complainhards','Complainsoft','Complainnetwork' ,'Complainnetother'));
     }


     public function get_data_d(Request $req)
     {
         $id = $req->post("labid_");
         //echo $id;
         $record = Labs::where('id' ,$id)->get();
         foreach($record as $r)
         {
             $user =$r;
             echo json_encode($user);
         }
     }
     public function updaterecords(Request $req)
     {
        $useri_d = $req->inputuserid;
        $inputnumberinput = $req->inputnumberinput;
        $inputlabnumberinput = $req->inputlabnumberinput;
        $inputUtilization_status = $req->inputUtilization_status;

        $user = Labs::find($useri_d);
        $user->No_of_pcs = $inputnumberinput;
        $user->lab_number = $inputlabnumberinput;
        $user->Utilization_status = $inputUtilization_status;
        $user->update();
         return redirect()->back()->with("updatedsuccess" , "Data has been updated");
     }

     public function get_data_d_(Request $req)
     {
         $id = $req->post("labid_");
         //echo $id;
         $record = LabSystem::where('id' ,$id)->get();
         foreach($record as $r)
         {
             $user =$r;
             echo json_encode($user);
         }
     }
     public function updaterecords_(Request $req)
     {
        $useri_d = $req->inputuserid;
        $inputnumberinput = $req->inputnumberinput;
        $inputlabnumberinput = $req->inputlabnumberinput;
        $inputUtilization_status = $req->inputUtilization_status;

        $user = LabSystem::find($useri_d);
        $user->Host_Name = $inputnumberinput;
        $user->Lab_id = $inputlabnumberinput;
        // $user->Utilization_status = $inputUtilization_status;
        $user->update();
         return redirect()->back()->with("updatedsuccess" , "Data has been updated");
     }

     public function software_insert()
     {
        $software=software_complain::all();
        return view("/software_insert" ,compact('software'));
     }

     public function software_insert_(Request $req)
     {
        $software = new software_complain();
        $software->software_name=$req->softwareinput;
        $software->save();

        return redirect()->back();

     }

     public function hardware_insert()
     {
        $hardware=hardware_complain::all();
        return view("/hardware_insert" ,compact('hardware'));
     }

     public function hardware_insert_(Request $req)
     {
        $hardware = new hardware_complain();
        $hardware->hardware_name=$req->hardwareinput;
        $hardware->save();

        return redirect()->back();

     }
 
     public function network_insert()
     {
        $network=network_issue::all();
        return view("/network_insert" ,compact('network'));
     }

     public function network_insert_(Request $req)
     {
        $network = new network_issue();
        $network->Network_issue=$req->network;
        $network->save();

        return redirect()->back();

     }

     public function _getdata_(Request $req)
     {
         $id = $req->post("labid_");
         //echo $id;
         $record = software_complain::where('id' ,$id)->get();
         foreach($record as $r)
         {
             $user =$r;
             echo json_encode($user);
         }
     }
     public function update_records_(Request $req)
     {
        $useri_d = $req->inputuserid;
        $inputnumberinput = $req->inputnumberinput;
        // $inputlabnumberinput = $req->inputlabnumberinput;
        // $inputUtilization_status = $req->inputUtilization_status;

        $user = software_complain::find($useri_d);
        $user->software_name = $inputnumberinput;
        // $user->Lab_id = $inputlabnumberinput;
        // $user->Utilization_status = $inputUtilization_status;
        $user->update();
         return redirect()->back()->with("updatedsuccess" , "Data has been updated");
     }

     public function _get_data_(Request $req)
     {
         $id = $req->post("labid_");
         //echo $id;
         $record = hardware_complain::where('id' ,$id)->get();
         foreach($record as $r)
         {
             $user =$r;
             echo json_encode($user);
         }
     }
     public function _update_records_(Request $req)
     {
        $useri_d = $req->inputuserid;
        $inputnumberinput = $req->inputnumberinput;
        // $inputlabnumberinput = $req->inputlabnumberinput;
        // $inputUtilization_status = $req->inputUtilization_status;

        $user = hardware_complain::find($useri_d);
        $user->hardware_name = $inputnumberinput;
        // $user->Lab_id = $inputlabnumberinput;
        // $user->Utilization_status = $inputUtilization_status;
        $user->update();
         return redirect()->back()->with("updatedsuccess" , "Data has been updated");
     }


     public function _get_data_net(Request $req)
     {
         $id = $req->post("labid_");
         //echo $id;
         $record = network_issue::where('id' ,$id)->get();
         foreach($record as $r)
         {
             $user =$r;
             echo json_encode($user);
         }
     }
     public function net_update_records_(Request $req)
     {
        $useri_d = $req->inputuserid;
        $inputnumberinput = $req->inputnumberinput;
        // $inputlabnumberinput = $req->inputlabnumberinput;
        // $inputUtilization_status = $req->inputUtilization_status;

        $user = network_issue::find($useri_d);
        $user->Network_issue = $inputnumberinput;
        // $user->Lab_id = $inputlabnumberinput;
        // $user->Utilization_status = $inputUtilization_status;
        $user->update();
         return redirect()->back()->with("updatedsuccess" , "Data has been updated");
     }
  
     public function updatstatuscompany2(Request $res)
     {    
        try{
            $complainid = $res->post("compid");
            echo $complainid;
            $complain = Complain_Master::join('students','students.Student_email','complain__masters.Regiystered_By')
            ->where('id',$complainid)->first();
    
            if(is_null($complain)){

                echo "Error";
                die;
            }

            $complain->Status="1";
            $complain->update();

            $data= ['name'=> $complain->Std_Name,'data'=> $complain->Student_email]; 
            //$data= Auth::User()->name;
            $user ['to'] = $complain->Student_email;    //admins email t0 send the email to the admin of the site 
            Mail::send('complain_resolve_email',$data ,function($messages) use ($user)
            {
                $messages->to($user ['to']);
                $messages->subject('Working on your Complain is been started');
            }); 
            return redirect()->back();

            }
            catch(Exception $ex){


                echo $ex->getMessage();
                die;
            }
  
         return redirect()->back();
     }    
 
     public function updatstatuscompany3(Request $res)
     {
        try{
            $complainid = $res->post("compid1");
            echo $complainid;
            $complain = Complain_Master::join('students','students.Student_email','complain__masters.Regiystered_By')
            ->where('id',$complainid)->first();
    
            if(is_null($complain)){

                echo "Error";
                die;
            }

            $complain->Status="2";
            $complain->update();

            $data= ['name'=> $complain->Std_Name,'data'=> $complain->Student_email]; 
            //$data= Auth::User()->name;
            $user ['to'] = $complain->Student_email ;    //admins email t0 send the email to the admin of the site 
            Mail::send('resloved',$data ,function($messages) use ($user)
            {
                $messages->to($user ['to']);
                $messages->subject('Complain is been Resolved');
            }); 
            return redirect()->back();

            }
            catch(Exception $ex){


                echo $ex->getMessage();
                die;
            }
 
         return redirect()->back();
 
     }
    public function filter(Request $res)
    {
        $from = $res->from;
        $to = $res->to;
		
		$date = Carbon::now();
        $monthName = $date->format('F');

        // $fetchtoday = Complain_Master::whereDate('date_of_reg','=',$mytime)->get();

        $fetchtoday = Complain_Master::whereBetween('Date_of_Complain',[$from,$to])->get();
        
        $Complain_Master =Complain_Master::all();
      
		 $countcomplain= Complain_Master::where('Status' ,'like', '%2%')
        ->where('Date_of_Complain' , '=' , $monthName)->get();
        $count = $countcomplain->count();

        $countcomplains= Complain_Master::where('Status' ,'like', '%0%')
        ->where('Date_of_Complain' , '=' , $monthName)->get();
        $count1 = $countcomplains->count();

        $count_bat =  DB::table("PROTAL_BAT_STUDENT_FEEDBACK_V")->get();
        
        return view("/dashboard_" ,compact('fetchtoday','Complain_Master' ,'count' ,'count1','count_bat'));

    }
    public function getdatare_(Request $req)
    {
        $id = $req->post("labid_");
        //echo $id;
        $record = Complain_Master::where('id' ,$id)->get();
        foreach($record as $r)
        {
            $user =$r;
            echo json_encode($user);
        }
    }
    public function updaterecords_res(Request $req)
    {
       $useri_d = $req->inputuserid;
       $inputnumberinput = $req->inputnumberinput;
       // $inputlabnumberinput = $req->inputlabnumberinput;
       // $inputUtilization_status = $req->inputUtilization_status;

       $user = Complain_Master::find($useri_d);
       $user->software_name = $inputnumberinput;
       // $user->Lab_id = $inputlabnumberinput;
       // $user->Utilization_status = $inputUtilization_status;
       $user->update();
        return redirect()->back()->with("updatedsuccess" , "Data has been updated");
    }

    public function feedback_form(Request $req)
    {
        $mytime = Carbon::now();
        $mytime->toDateTimeString();


        // $date =now()->format('d');
        
        //echo now()->format('d');
        // echo $mytime;

        // echo  $mytime;
        // echo now()->format('F');
        if(session('sessionuseremail'))
        {
           // if(now()->format('d') == 11)
           // {
                // $schedule =feedback_form::where('created_at', '<', now()->subDays(30))
                // ->update(['status' => 'n']);
                //echo now()->subDays(30);
                // $user =  feedback_form::where('status', 'y')->update(['status' => 'n']);
                // $studcheck =DB::table("feedback_forms")->where('std_name_id', session('std_id'))
                // ->where('month', now()->format('F'))->first();

                // // echo session('std_id');

                // echo "jkjk".$studcheck;
            
                // $studcheck =DB::table("usermodels")->where('email', session('sessionuseremail'))->first();

        // $student_da = DB::table('curr_skills')
        // ->join('batches','batches.id','curr_skills.Batch_ID')
        // ->join('skills','skills.id','curr_skills.Curr_Skill')
        // ->join('students','students.Batch_ID','batches.id')
        // // ->where('students.Std_id',session('std_id'))
        // ->first(); 

        // echo $student_da->id;
        // echo $studcheck->std_id;
                return view("/feedback_form");
           // }
            //else{
              //  echo "<script>alert('Feedbacks form not available yet wait for the month to complete!.')
                //window.location.href='/student_dashboard'
                //</script>";   
            //}
        }
        else{
            return view ("/student_login");
        }
    }
   

    public function feedback(Request $req)
    { 
        $date = Carbon::now();

          $monthyear = $date->format('Y');

      
        $studcheck =DB::table("feedback_forms")->where('std_name_id', $req->std_name_id)
        ->where('month', now()->format('F'))->first();
        if(isset($studcheck))
        {
            echo 
            "<script>alert('Your Feedback Response is been already been recorded.')
            window.location.href='/student_dashboard'
            </script>"; 
             
        }
        
        else{
            $feedback_insert = new feedback_form();
            $feedback_insert->month= $req->month;
            $feedback_insert->faculty = $req->faculty;
            $feedback_insert->batch = $req->batch;

            $feedback_insert->subject= $req->subject;
            $feedback_insert->std_name_id= $req->std_name_id;
            $feedback_insert->punctuality= $req->punctuality;
 
            $feedback_insert->course_coverage= $req->course_insert;
            $feedback_insert->course_coverage_r= $req->course_insert_r;

            $feedback_insert->technical_support= $req->technical;
            $feedback_insert->technical_support_r= $req->technical_r;

            $feedback_insert->clearing_doubt = $req->clearing;
            $feedback_insert->clearing_doubt_r = $req->clearing_r;

            $feedback_insert->exam_assignment= $req->exam;
            $feedback_insert->exam_assignment_r= $req->exam_r;

            
            $feedback_insert->book_utilization= $req->book;
            $feedback_insert->book_utilization_r= $req->book_r;
            
            $feedback_insert->student_appraisal= $req->student;
            $feedback_insert->student_appraisal_r= $req->student_r;
            
            $feedback_insert->computer_uptime= $req->computer;
            $feedback_insert->computer_uptime_r= $req->computer_r;

            $feedback_insert->remark= $req->remark;
            $feedback_insert->date = Date("y-m-d");
            $feedback_insert->year = $monthyear;


            $feedback_insert->save();

            echo 
            "<script>alert('Your Feedback Response is been successful Recorded thanks for the cooperating with us. .')
            window.location.href='/student_dashboard'
            </script>";
 
            
            // $feedback_insert['course_coverage'] = json_encode($req->course_insert);   
            // $feedback_insert['technical_support'] = json_encode($req->technical);   
            // $feedback_insert['clearing_doubt'] = json_encode($req->clearing);   
            // $feedback_insert['exam_assignment'] = json_encode($req->exam);   
            // $feedback_insert['book_utilization'] = json_encode($req->book);   
            // $feedback_insert['student_appraisal'] = json_encode($req->student); 
            // $feedback_insert['computer_uptime'] = json_encode($req->computer);  
            // $feedback_insert->date_signature = $req->date_signature;    
            // $feedback_insert->status = 'y';

          
        }
    }

    public function student_dashboard()
    {
        $studcheck =DB::table("usermodels")->where('email', session('sessionuseremail'))->first();

       if(session('sessionuseremail'))
       {
          		$studcheck =DB::table("usermodels")->where('email', session('sessionuseremail'))->first();
                $examcheck =DB::table("internalexams")->orderBy('id','desc')->limit(1)->get();
                $announcement = DB::table('announcements')->orderBy('id','desc')->limit(1)->get();
                $attendances = DB::table('attendances')->where('Std_ID',$studcheck->std_id)->orderBy('id','desc')->limit(1)->get();
                $student_data = DB::table('examsubjectmasters')
                ->join('usermodels','usermodels.Std_ID','examsubjectmasters.std_id');
                // ->orderBy('examsubjectmasters.id','desc')->limit(1)
                // ->where('examsubjectmasters.Std_ID',$studcheck->std_id)
                // ->get();
		   $jobs = DB::table('jobs')->where('status', '1')->orderBy('id','desc')->limit(1)->get();

            // echo $studcheck->std_id;
            // $student_data = DB::table('examsubjectmasters')->where('Std_ID' ,session("std_id"))->orderBy('id','desc')->limit(1)->get();
            return view('student_dashboard',compact('announcement','attendances','student_data','examcheck','jobs'));
       }
       else
       {
        echo 
        "<script>alert('Please Login First.')
        window.location.href='/login'
        </script>";
       }

    }

    public function form_fetch(Request $req)

    {
         $date = Carbon::now();
        $monthName = $date->format('F');
        $month = Carbon::now()->format('o');
		
		
		 $date =now()->format('d');
        
        // echo now()->format('d');

         $dates = Carbon::now()->subMonth()->format('F');


        if(now()->format('d') == 10)
        {
        	 $string = feedback_form::
        	where('month' ,'=' ,$monthName)        
        	->where('year' ,'=' ,$month)->get();
		}
		else
		{
		 $string = feedback_form::
        	where('month' ,'=' ,$dates)        
        	->where('year' ,'=' ,$month)->get();	
		}
        return view("/form_fetch" ,compact('string'));

    }

    public function filter_(Request $res)
    {
   
        $from = $res->from;
        $to = $res->to;

    $string = feedback_form::where('month' , 'LIKE' ,'%'.$from.'%')
    ->where('Batch' , 'LIKE' , '%'.$to.'%')->get();
    if(isset($string))
    {
    return view("/form_fetch" ,compact('string'));
    }
    }

        // exam fetch
        public function Fetch_Exam(Request $req)
        {
            $studcheck =DB::table("usermodels")->where('email', session('sessionuseremail'))->first();

            
            if(session('sessionuseremail'))
            {
                $session = session('std_id');
                //  echo $studcheck->std_id;
        
                $examfetch = DB::table('modulars')
                ->where('Sem_ID', '1')->where('Std_ID' ,$studcheck->std_id)
                ->orderBy('id','desc')->get();
        
                $examfetch2 = DB::table('modulars')
                ->where('Sem_ID', '2')->where('Std_ID' ,$studcheck->std_id)
                ->orderBy('id','desc')->get();
        
        
                $examfetch3 = DB::table('modulars')
                ->where('Sem_ID', '3')->where('Std_ID' ,$studcheck->std_id)
                ->orderBy('id','desc')->get();
        
        
                $examfetch4 = DB::table('modulars')
                ->where('Sem_ID', '4')->where('Std_ID' ,$studcheck->std_id)
                ->orderBy('id','desc')->get();
        
        
                $examfetch5 = DB::table('modulars')
                ->where('Sem_ID', '5')->where('Std_ID' ,$studcheck->std_id)
                ->orderBy('id','desc')->get();
        
        
                $examfetch6 = DB::table('modulars')
                ->where('Sem_ID', '6')->where('Std_ID' ,$studcheck->std_id)
                ->orderBy('id','desc')->get();
    
        
        
                return view('examfetch',compact('examfetch','examfetch2','examfetch3' ,'examfetch4','examfetch5','examfetch6')); 
    
            }
            else
            {
             echo 
             "<script>alert('Please Login First.')
             window.location.href='/login'
             </script>";
            }        
        }
        public function announcement()
        {
            if(session('sessionuseremail'))
          {
            $announcement = DB::table('announcements')->orderBy('id','desc')->get();
            return view('announcement',compact('announcement'));
          }
          else
          {
           echo 
           "<script>alert('Please Login First.')
           window.location.href='/login'
           </script>";
          }

          
        }
        public function attendances()
        {
            $studcheck =DB::table("usermodels")->where('email', session('sessionuseremail'))->first();

          if(session('sessionuseremail'))
          {
            $attendances = DB::table('attendances')->where('Std_ID' ,$studcheck->std_id)->orderBy('id','desc')->get();
            return view('attendances',compact('attendances'));
          }
          else
          {
           echo 
           "<script>alert('Please Login First.')
           window.location.href='/login'
           </script>";
          }
        }
        
        // data table
     public function student_profile()
     { 
        $studcheck =DB::table("usermodels")->where('email', session('sessionuseremail'))->first();

        if(session('sessionuseremail'))
        {

            $std_profile = DB::table('students')->where('Std_ID' ,$studcheck->std_id)->get();
            // echo session("std_id");
            return view("student_profile",compact("std_profile"));
        }
        else
        {
            echo 
            "<script>alert('Please Login First.')
            window.location.href='/login'
            </script>";
        }
     }

     
     public function gpa_calculates_get(){
        $gpa_calculates = DB::table('feedback_forms')->orderby('id','ASC')->get();
        echo $gpa_calculates;
        foreach($gpa_calculates as $fp)
        {
            
            $studcheck =DB::table("gpa_calculates")
            ->where('batch', $fp->batch)
            ->where('month', $fp->month)
            ->where('year', $fp->year)
            ->first();

            //if(isset($studcheck))
            //{;			  
            //echo "ok";
            //}
           // else
           // {
    
                DB::select('call test_proc(?,?,?)',array($fp->batch, $fp->month, $fp->year));
                DB::select('call faculty_feedback()');
            
            //}
        

        // return redirect("/gpa_calculates");

        }

        return redirect("/gpa_calculates");

    }
     public function gpa_calculates()
     {
                $gpa_calculates = DB::table('gpa_calculates')->orderby('id','ASC')->get();

        return view("gpa_calculates",compact('gpa_calculates'));
     }

     public function faculty_feedback()
     {
		 
        $date = Carbon::now();
        $monthName = $date->format('F');

        $month = Carbon::now()->format('o');
		 
		 
        $date = Carbon::now();
        $monthName = $date->format('F');

        $month = Carbon::now()->format('o');
		 
		 
          // $select = faculty_feedback_gpa::get();

          $date =now()->format('d');
        
          // echo now()->format('d');
  
          $dates = Carbon::now()->subMonth()->format('F');
  
  
        if(now()->format('d') == 10)
        {

                  // $select = faculty_feedback_gpa::get();
        $select = DB::table('faculty_feedback_gpas')
        ->where('month' ,'=' ,$monthName)
        	->where('year' ,'=' ,$month)
            ->orderby('id','ASC')->get();

        $faculty_feedback_gpas = DB::table("batch_gpa")
		  ->where('Month' ,'=' ,$monthName)
        	->where('Year' ,'=' ,$month)
			->get();
        
      
        $faculty_batch_1 = gpa_calculate::where('batch' , '=' ,'2010B')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();


        $faculty_batch_2 = gpa_calculate::where('batch' , '=' ,'2111F')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_3 = gpa_calculate::where('batch' , '=' ,'2204E')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_4 = gpa_calculate::where('batch' , '=' ,'2008F')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
		      $faculty_batch_u = gpa_calculate::where('batch' , '=' ,'2010F')
				     ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
		  $faculty_batch_um = gpa_calculate::where('batch' , '=' ,'2107E')
				     ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();



        $faculty_batch_5 = gpa_calculate::where('batch' , '=' ,'2101A')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_6 = gpa_calculate::where('batch' , '=' ,'2111A')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
 		$faculty_batch_t = gpa_calculate::where('batch' , '=' ,'2106B')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();


        $faculty_batch_7 = gpa_calculate::where('batch' , '=' ,'2103F')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();


        $faculty_batch_8 = gpa_calculate::where('batch' , '=' ,'2111C')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_9 = gpa_calculate::where('batch' , '=' ,'2202E')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_10 = gpa_calculate::where('batch' , '=' ,'2209E01')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
  		$faculty_batch_Z = gpa_calculate::where('batch' , '=' ,'2209E01')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();


        $faculty_batch_11 = gpa_calculate::where('batch' , '=' ,'2111B')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();


        $faculty_batch_12 = gpa_calculate::where('batch' , '=' ,'2107A')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_13 = gpa_calculate::where('batch' , '=' ,'2011A')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_14 = gpa_calculate::where('batch' , '=' ,'2209B')
        ->where('Month' ,'=' ,$monthName)
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

		  $faculty_batch_e = gpa_calculate::where('batch' , '=' )
          ->where('Month' ,'=' ,$monthName)
          ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_15 = gpa_calculate::where('batch' , '=' ,'2211F')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();


        $faculty_batch_16 = gpa_calculate::where('batch' , '=' ,'2210D')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_17 = gpa_calculate::where('batch' , '=' ,'2011C')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_18 = gpa_calculate::where('batch' , '=' ,'2112F')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_19 = gpa_calculate::where('batch' , '=' ,'2109d')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_20 = gpa_calculate::where('batch' , '=' ,'2109d')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();


        $faculty_batch_21 = gpa_calculate::where('batch' , '=' ,'2208E')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_22 = gpa_calculate::where('batch' , '=' ,'2212C')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_23 = gpa_calculate::where('batch' , '=' ,'2208E')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_24 = gpa_calculate::where('batch' , '=' ,'2109D01')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','Asc')->get();


       $faculty_batch_25 = gpa_calculate::where('batch' , '=' ,'2211B')
		      ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_26 = gpa_calculate::where('batch' , '=' ,'2206A')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_27 = gpa_calculate::where('batch' , '=' ,'2301A')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_28 = gpa_calculate::where('batch' , '=' ,'2203C')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();



        $faculty_batch_29 = gpa_calculate::where('batch' , '=' ,'2206D')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_30 = gpa_calculate::where('batch' , '=' ,'2210B')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_31 = gpa_calculate::where('batch' , '=' ,'2211A')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_32 = gpa_calculate::where('batch' , '=' ,'2212A')
        ->orderby('id','ASC')->get();

        $faculty_batch_33 = gpa_calculate::where('batch' , '=' ,'2208B')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
		    $faculty_batch_n = gpa_calculate::where('batch' , '=' ,'2109d')
				   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_34 = gpa_calculate::where('batch' , '=' ,'2209D')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_35 = gpa_calculate::where('batch' , '=' ,'2210E')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_36 = gpa_calculate::where('batch' , '=' ,'2210F')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_37 = gpa_calculate::where('batch' , '=' ,'2109d')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_38 = gpa_calculate::where('batch' , '=' ,'2301F')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_39 = gpa_calculate::where('batch' , '=' ,'2207E')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_40 = gpa_calculate::where('batch' , '=' ,'2109d')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_41 = gpa_calculate::where('batch' , '=' ,'2209A')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_42 = gpa_calculate::where('batch' , '=' ,'2301B')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_43 = gpa_calculate::where('batch' , '=' ,'2302A')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_44 = gpa_calculate::where('batch' , '=' ,'2109d')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 


        $faculty_batch_45 = gpa_calculate::where('batch' , '=' ,'2209E')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_46 = gpa_calculate::where('batch' , '=' ,'2301C')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_47 = gpa_calculate::where('batch' , '=' ,'2206F')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_48 = gpa_calculate::where('batch' , '=' ,'2207F')
			   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
    $faculty_batch_49 = gpa_calculate::where('batch' , '=' ,'2212D')
		   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
    $faculty_batch_50 = gpa_calculate::where('batch' , '=' ,'2303E')
		   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
   $faculty_batch_51 = gpa_calculate::where('batch' , '=' ,'2303F')   
	   ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
   $faculty_batch_52 = gpa_calculate::where('batch' , '=' ,'')
        ->orderby('id','ASC')->get();
			
			
			      $sum= $faculty_feedback_gpas->sum('batch_count');
        $average= $faculty_feedback_gpas->average('gpa');

        }

        else{

              // $select = faculty_feedback_gpa::get();
        $select = DB::table('faculty_feedback_gpas')
        ->where('month' ,'=' ,$dates)
        	->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_feedback_gpas = DB::table("batch_gpa")
			->where('Month' ,'=' ,$dates)
        	->where('Year' ,'=' ,$month)
			->get();
        
      
        $faculty_batch_1 = gpa_calculate::where('batch' , '=' ,'2010B')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();


        $faculty_batch_2 = gpa_calculate::where('batch' , '=' ,'2111F')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_3 = gpa_calculate::where('batch' , '=' ,'2204E')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_4 = gpa_calculate::where('batch' , '=' ,'2008F')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
		      $faculty_batch_u = gpa_calculate::where('batch' , '=' ,'2010F')
				     ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
		  $faculty_batch_um = gpa_calculate::where('batch' , '=' ,'2107E')
				     ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();



        $faculty_batch_5 = gpa_calculate::where('batch' , '=' ,'2101A')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_6 = gpa_calculate::where('batch' , '=' ,'2111A')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
 		$faculty_batch_t = gpa_calculate::where('batch' , '=' ,'2106B')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();


        $faculty_batch_7 = gpa_calculate::where('batch' , '=' ,'2103F')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();


        $faculty_batch_8 = gpa_calculate::where('batch' , '=' ,'2111C')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_9 = gpa_calculate::where('batch' , '=' ,'2202E')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_10 = gpa_calculate::where('batch' , '=' ,'2209E01')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
  		$faculty_batch_Z = gpa_calculate::where('batch' , '=' ,'2209E01')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();


        $faculty_batch_11 = gpa_calculate::where('batch' , '=' ,'2111B')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();


        $faculty_batch_12 = gpa_calculate::where('batch' , '=' ,'2107A')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_13 = gpa_calculate::where('batch' , '=' ,'2011A')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_14 = gpa_calculate::where('batch' , '=' ,'2209B')
        ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

		  $faculty_batch_e = gpa_calculate::where('batch' , '=' )
          ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_15 = gpa_calculate::where('batch' , '=' ,'2211F')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();


        $faculty_batch_16 = gpa_calculate::where('batch' , '=' ,'2210D')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_17 = gpa_calculate::where('batch' , '=' ,'2011C')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_18 = gpa_calculate::where('batch' , '=' ,'2112F')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_19 = gpa_calculate::where('batch' , '=' ,'2109d')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_20 = gpa_calculate::where('batch' , '=' ,'2109d')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();


        $faculty_batch_21 = gpa_calculate::where('batch' , '=' ,'2208E')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_22 = gpa_calculate::where('batch' , '=' ,'2212C')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_23 = gpa_calculate::where('batch' , '=' ,'2208E')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_24 = gpa_calculate::where('batch' , '=' ,'2109D01')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','Asc')->get();


       $faculty_batch_25 = gpa_calculate::where('batch' , '=' ,'2211B')
		      ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_26 = gpa_calculate::where('batch' , '=' ,'2206A')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_27 = gpa_calculate::where('batch' , '=' ,'2301A')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_28 = gpa_calculate::where('batch' , '=' ,'2203C')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();



        $faculty_batch_29 = gpa_calculate::where('batch' , '=' ,'2206D')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_30 = gpa_calculate::where('batch' , '=' ,'2210B')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_31 = gpa_calculate::where('batch' , '=' ,'2211A')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_32 = gpa_calculate::where('batch' , '=' ,'2212A')
        ->orderby('id','ASC')->get();

        $faculty_batch_33 = gpa_calculate::where('batch' , '=' ,'2208B')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
		    $faculty_batch_n = gpa_calculate::where('batch' , '=' ,'2109d')
				   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_34 = gpa_calculate::where('batch' , '=' ,'2209D')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_35 = gpa_calculate::where('batch' , '=' ,'2210E')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_36 = gpa_calculate::where('batch' , '=' ,'2210F')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_37 = gpa_calculate::where('batch' , '=' ,'2109d')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_38 = gpa_calculate::where('batch' , '=' ,'2301F')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_39 = gpa_calculate::where('batch' , '=' ,'2207E')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_40 = gpa_calculate::where('batch' , '=' ,'2109d')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_41 = gpa_calculate::where('batch' , '=' ,'2209A')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_42 = gpa_calculate::where('batch' , '=' ,'2301B')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_43 = gpa_calculate::where('batch' , '=' ,'2302A')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_44 = gpa_calculate::where('batch' , '=' ,'2109d')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 


        $faculty_batch_45 = gpa_calculate::where('batch' , '=' ,'2209E')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_46 = gpa_calculate::where('batch' , '=' ,'2301C')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_47 = gpa_calculate::where('batch' , '=' ,'2206F')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();

        $faculty_batch_48 = gpa_calculate::where('batch' , '=' ,'2207F')
			   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
    $faculty_batch_49 = gpa_calculate::where('batch' , '=' ,'2212D')
		   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
    $faculty_batch_50 = gpa_calculate::where('batch' , '=' ,'2303E')
		   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
   $faculty_batch_zam = gpa_calculate::where('batch' , '=' ,'2209E01')   
	   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
			
			 $faculty_batch_azh = gpa_calculate::where('batch' , '=' ,'2301D')   
	   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
			
			
			$faculty_batch_51 = gpa_calculate::where('batch' , '=' ,'2303F')   
	   ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
        ->orderby('id','ASC')->get();
		 
   $faculty_batch_52 = gpa_calculate::where('batch' , '=' ,'')
        ->orderby('id','ASC')->get();
			
			      $sum= $faculty_feedback_gpas->sum('batch_count');
        $average= $faculty_feedback_gpas->average('gpa');
        }
        

       // return view("faculty_feedback",compact('faculty_feedback_gpas','select','faculty_batch_1','faculty_batch_2','faculty_batch_3','faculty_batch_4','faculty_batch_5','faculty_batch_6','faculty_batch_7','faculty_batch_8','faculty_batch_9','faculty_batch_10','faculty_batch_11','faculty_batch_12','faculty_batch_13','faculty_batch_14'    ,'faculty_batch_15','faculty_batch_16','faculty_batch_17','faculty_batch_18','faculty_batch_19','faculty_batch_20','faculty_batch_21','faculty_batch_22','faculty_batch_23','faculty_batch_24','faculty_batch_25','faculty_batch_26','faculty_batch_27','faculty_batch_28','faculty_batch_29','faculty_batch_30','faculty_batch_31','faculty_batch_32','faculty_batch_33','faculty_batch_34','faculty_batch_35','faculty_batch_36','faculty_batch_37','faculty_batch_38','faculty_batch_39','faculty_batch_40','faculty_batch_41','faculty_batch_42','faculty_batch_43','faculty_batch_44','faculty_batch_45','faculty_batch_46','faculty_batch_47','faculty_batch_48','faculty_batch_t','faculty_batch_Z','faculty_batch_49','faculty_batch_50','faculty_batch_51','faculty_batch_52','faculty_batch_u','faculty_batch_n','faculty_batch_um','faculty_batch_e'));

        

        return view("faculty_feedback",compact('faculty_batch_azh','faculty_batch_zam','average','sum','faculty_feedback_gpas','select','faculty_batch_1','faculty_batch_2','faculty_batch_3','faculty_batch_4','faculty_batch_5','faculty_batch_6','faculty_batch_7','faculty_batch_8','faculty_batch_9','faculty_batch_10','faculty_batch_11','faculty_batch_12','faculty_batch_13','faculty_batch_14'    ,'faculty_batch_15','faculty_batch_16','faculty_batch_17','faculty_batch_18','faculty_batch_19','faculty_batch_20','faculty_batch_21','faculty_batch_22','faculty_batch_23','faculty_batch_24','faculty_batch_25','faculty_batch_26','faculty_batch_27','faculty_batch_28','faculty_batch_29','faculty_batch_30','faculty_batch_31','faculty_batch_32','faculty_batch_33','faculty_batch_34','faculty_batch_35','faculty_batch_36','faculty_batch_37','faculty_batch_38','faculty_batch_39','faculty_batch_40','faculty_batch_41','faculty_batch_42','faculty_batch_43','faculty_batch_44','faculty_batch_45','faculty_batch_46','faculty_batch_47','faculty_batch_48','faculty_batch_t','faculty_batch_Z','faculty_batch_49','faculty_batch_50','faculty_batch_51','faculty_batch_52','faculty_batch_u','faculty_batch_n','faculty_batch_um','faculty_batch_e'));


     }
	
	
	
     public function month_year_f(Request $res)
     {
        $date = Carbon::now();
        $monthName = $date->format('F');

        $month = Carbon::now()->format('o');
		 
		 
        $date = Carbon::now();
        $monthName = $date->format('F');

        $month = Carbon::now()->format('o');
		 
		 
          // $select = faculty_feedback_gpa::get();

          $date =now()->format('d');
         $from = $res->month;
        $to = $res->year;
          // echo now()->format('d');
  
          $dates = Carbon::now()->subMonth()->format('F');
  

                  // $select = faculty_feedback_gpa::get();
        $select = DB::table('faculty_feedback_gpas')
        //->where('month' ,'=' ,$monthName)
        //->where('year' ,'=' ,$month)
		->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_feedback_gpas = DB::table("batch_gpa")
			//->where('Month' ,'=' ,$monthName)
        //->where('Year' ,'=' ,$month)
		->where('Month' , 'LIKE' ,'%'.$from.'%')
    	->where('Year' , 'LIKE' , '%'.$to.'%')
			->get();
        
      
        $faculty_batch_1 = gpa_calculate::where('batch' , '=' ,'2010B')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();


        $faculty_batch_2 = gpa_calculate::where('batch' , '=' ,'2111F')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_3 = gpa_calculate::where('batch' , '=' ,'2204E')
	 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_4 = gpa_calculate::where('batch' , '=' ,'2008F')
			 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();
		 
		      $faculty_batch_u = gpa_calculate::where('batch' , '=' ,'2010F')
			 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();
		 
		  $faculty_batch_um = gpa_calculate::where('batch' , '=' ,'2107E')
			 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();



        $faculty_batch_5 = gpa_calculate::where('batch' , '=' ,'2101A')
 		->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_6 = gpa_calculate::where('batch' , '=' ,'2111A')
			 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();
		 
 		$faculty_batch_t = gpa_calculate::where('batch' , '=' ,'2106B')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();


        $faculty_batch_7 = gpa_calculate::where('batch' , '=' ,'2103F')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();


        $faculty_batch_8 = gpa_calculate::where('batch' , '=' ,'2111C')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_9 = gpa_calculate::where('batch' , '=' ,'2202E')
			 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_10 = gpa_calculate::where('batch' , '=' ,'2209E01')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();
		 
  		$faculty_batch_Z = gpa_calculate::where('batch' , '=' ,'2209E01')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();


        $faculty_batch_11 = gpa_calculate::where('batch' , '=' ,'2111B')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();


        $faculty_batch_12 = gpa_calculate::where('batch' , '=' ,'2107A')
	 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_13 = gpa_calculate::where('batch' , '=' ,'2011A')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_14 = gpa_calculate::where('batch' , '=' ,'2209B')
       ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

		  $faculty_batch_e = gpa_calculate::where('batch' , '=' )
          ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_15 = gpa_calculate::where('batch' , '=' ,'2211F')
			  ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();


        $faculty_batch_16 = gpa_calculate::where('batch' , '=' ,'2210D')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_17 = gpa_calculate::where('batch' , '=' ,'2011C')
	 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_18 = gpa_calculate::where('batch' , '=' ,'2112F')
			 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_19 = gpa_calculate::where('batch' , '=' ,'2109d')
			    ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_20 = gpa_calculate::where('batch' , '=' ,'2109d')
 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();


        $faculty_batch_21 = gpa_calculate::where('batch' , '=' ,'2208E')
	 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_22 = gpa_calculate::where('batch' , '=' ,'2212C')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_23 = gpa_calculate::where('batch' , '=' ,'2208E')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_24 = gpa_calculate::where('batch' , '=' ,'2109D01')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','Asc')->get();


       $faculty_batch_25 = gpa_calculate::where('batch' , '=' ,'2211B')
		  ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_26 = gpa_calculate::where('batch' , '=' ,'2206A')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_27 = gpa_calculate::where('batch' , '=' ,'2301A')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_28 = gpa_calculate::where('batch' , '=' ,'2203C')
	 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();



        $faculty_batch_29 = gpa_calculate::where('batch' , '=' ,'2206D')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_30 = gpa_calculate::where('batch' , '=' ,'2210B')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_31 = gpa_calculate::where('batch' , '=' ,'2211A')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_32 = gpa_calculate::where('batch' , '=' ,'2212A')
			 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_33 = gpa_calculate::where('batch' , '=' ,'2208B')
			 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();
		 
		    $faculty_batch_n = gpa_calculate::where('batch' , '=' ,'2109d')
			 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_34 = gpa_calculate::where('batch' , '=' ,'2209D')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_35 = gpa_calculate::where('batch' , '=' ,'2210E')
	 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_36 = gpa_calculate::where('batch' , '=' ,'2210F')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_37 = gpa_calculate::where('batch' , '=' ,'2109d')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_38 = gpa_calculate::where('batch' , '=' ,'2301F')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_39 = gpa_calculate::where('batch' , '=' ,'2207E')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_40 = gpa_calculate::where('batch' , '=' ,'2109d')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_41 = gpa_calculate::where('batch' , '=' ,'2209A')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_42 = gpa_calculate::where('batch' , '=' ,'2301B')
			 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_43 = gpa_calculate::where('batch' , '=' ,'2302A')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_44 = gpa_calculate::where('batch' , '=' ,'2109d')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();
		 


        $faculty_batch_45 = gpa_calculate::where('batch' , '=' ,'2209E')
			 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_46 = gpa_calculate::where('batch' , '=' ,'2301C')
			 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_47 = gpa_calculate::where('batch' , '=' ,'2206F')
			 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();

        $faculty_batch_48 = gpa_calculate::where('batch' , '=' ,'2207F')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();
		 
    $faculty_batch_49 = gpa_calculate::where('batch' , '=' ,'2212D')
		 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();
		 
    $faculty_batch_50 = gpa_calculate::where('batch' , '=' ,'2303E')
	 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();
		 
   $faculty_batch_51 = gpa_calculate::where('batch' , '=' ,'2303F')   
 ->where('month' , 'LIKE' ,'%'.$from.'%')
    	->where('year' , 'LIKE' , '%'.$to.'%')
        ->orderby('id','ASC')->get();
		 
   $faculty_batch_52 = gpa_calculate::where('batch' , '=' ,'')
        ->orderby('id','ASC')->get();
		 $sum= $faculty_feedback_gpas->sum('batch_count');
        $average= $faculty_feedback_gpas->average('gpa');

        return view("faculty_feedback",compact('average','sum','faculty_feedback_gpas','select','faculty_batch_1','faculty_batch_2','faculty_batch_3','faculty_batch_4','faculty_batch_5','faculty_batch_6','faculty_batch_7','faculty_batch_8','faculty_batch_9','faculty_batch_10','faculty_batch_11','faculty_batch_12','faculty_batch_13','faculty_batch_14'    ,'faculty_batch_15','faculty_batch_16','faculty_batch_17','faculty_batch_18','faculty_batch_19','faculty_batch_20','faculty_batch_21','faculty_batch_22','faculty_batch_23','faculty_batch_24','faculty_batch_25','faculty_batch_26','faculty_batch_27','faculty_batch_28','faculty_batch_29','faculty_batch_30','faculty_batch_31','faculty_batch_32','faculty_batch_33','faculty_batch_34','faculty_batch_35','faculty_batch_36','faculty_batch_37','faculty_batch_38','faculty_batch_39','faculty_batch_40','faculty_batch_41','faculty_batch_42','faculty_batch_43','faculty_batch_44','faculty_batch_45','faculty_batch_46','faculty_batch_47','faculty_batch_48','faculty_batch_t','faculty_batch_Z','faculty_batch_49','faculty_batch_50','faculty_batch_51','faculty_batch_52','faculty_batch_u','faculty_batch_n','faculty_batch_um','faculty_batch_e'));


    }
	
	public function filter_batch(Request $res)
    {
		$to = $res->to;
		$from = $res->month;

       $date = Carbon::now();
        $monthName = $date->format('F');

        $month = Carbon::now()->format('o');
		 
		   $date =now()->format('d');
        
        // echo now()->format('d');

          $dates = Carbon::now()->subMonth()->format('F');


        if(now()->format('d') == 10)
        {
        $cummulative = DB::table('cummulative')
        ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
		->where('batch' , 'LIKE' , '%'.$to.'%')
		->where('month' , 'LIKE' , '%'.$from.'%')
		

			->get();
		}
		  else
		  {
			   $cummulative = DB::table('cummulative')
        ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
				   			        ->where('batch' , 'LIKE' , '%'.$to.'%')
		->where('month' , 'LIKE' , '%'.$from.'%')
				   

			->get();
		  }
        return view("cummulative",compact('cummulative'));
		
	}
	
	  public function cummulative(Request $res)
     {
		   $to = $res->to;
		              $from = $res->month;

       $date = Carbon::now();
        $monthName = $date->format('F');

        $month = Carbon::now()->format('o');
		 
		   $date =now()->format('d');
        
        // echo now()->format('d');

          $dates = Carbon::now()->subMonth()->format('F');


        if(now()->format('d') == 10)
        {
        $cummulative = DB::table('cummulative')
        ->where('month' ,'=' ,$monthName)        
        ->where('year' ,'=' ,$month)
			        ->where('batch' , 'LIKE' , '%'.$to.'%')
		->where('month' , 'LIKE' , '%'.$from.'%')

			->get();
		}
		  else
		  {
			   $cummulative = DB::table('cummulative')
        ->where('month' ,'=' ,$dates)        
        ->where('year' ,'=' ,$month)
				   			        ->where('batch' , 'LIKE' , '%'.$to.'%')
		->where('month' , 'LIKE' , '%'.$from.'%')
				   

			->get();
		  }
		  
        return view("cummulative",compact('cummulative'));
     }
	
	    public function month_year(Request $res)
    {
        $from = $res->month;
        $to = $res->year;

        // $fetchtoday = Complain_Master::whereDate('date_of_reg','=',$mytime)->get();

        // $fetchtoday = DB::table("PROTAL_BAT_STUDENT_FEEDBACK_V")->whereBetween('Date_of_Complain',[$from,$to])->get();
        $fetchtoday = Complain_Master::orderBy('created_at', 'desc')->get();

        $countcomplain= Complain_Master::where('Status' ,'like', '%2%')->get();
        $count = $countcomplain->count();

        $countcomplains= Complain_Master::where('Status' ,'like', '%0%')->get();
        $count1 = $countcomplains->count();

        $Complain_Master = Complain_Master::all();


        $count_bat =  DB::table("PROTAL_BAT_STUDENT_FEEDBACK_V")
        ->where('month' , 'LIKE' , '%'.$from.'%')
        ->where('year' , 'LIKE' , '%'.$to.'%')
        ->get();
		
			
			foreach($count_bat as $fp)
		{
               $record = DB::table("PROTAL_BAT_STUDENT_FEEDBACK_V")
			 ->join('std_nt_fill_fd','std_nt_fill_fd.Batch','PROTAL_BAT_STUDENT_FEEDBACK_V.Batch')
			->where('std_nt_fill_fd.Batch' , $fp->Batch)
			  ->get();
		}
			
        if(isset($count_bat))
        {
        return view("/student_portal" ,compact('count_bat','fetchtoday','count','count1','Complain_Master'));
        }

        return view("/student_portal" ,compact('count_bat','fetchtoday','count','count1','Complain_Master'));

    }
	
	public function stdportal(Request $res)
    {
		$date = Carbon::now();
        $monthName = $date->format('F');

        $month = Carbon::now()->format('o');
        
        $mytime = Carbon::now();
        $mytime->toDateTimeString();


        $date =now()->format('d');
        
        // echo now()->format('d');

          $dates = Carbon::now()->subMonth()->format('F');


        if(now()->format('d') == 10)
        {
            $from = $res->month;
            $to = $res->year;
            $count_bat =  DB::table("PROTAL_BAT_STUDENT_FEEDBACK_V")
            ->where('month' , 'LIKE' , '%'.$from.'%')
            ->where('year' , 'LIKE' , '%'.$to.'%')
            ->where('month' ,'=' ,$monthName)        
            ->where('year' ,'=' ,$month)

        ->get();
        }

        else
        {
            $from = $res->month;
            $to = $res->year;
            $count_bat =  DB::table("PROTAL_BAT_STUDENT_FEEDBACK_V")
            ->where('month' , 'LIKE' , '%'.$from.'%')
            ->where('year' , 'LIKE' , '%'.$to.'%')
            ->where('month' ,'=' ,$dates)        
            ->where('year' ,'=' ,$month)

        ->get();
        }
        return view("student_portal", compact("count_bat"));
    }

	
	public function std_view()
	{
		$date = Carbon::now();
            $monthName = $date->format('F');
    
            $month = Carbon::now()->format('o');
		
		$std_fd = DB::table("std_nt_fill_fd")
			 ->where('month' ,'=' ,$monthName)        
            ->where('year' ,'=' ,$month)->get();
		return view("/std_nt_fill_fd" , compact('std_fd'));
	}
	
	public function batch(Request $req)
    {
		 $count_bat =  DB::table("PROTAL_BAT_STUDENT_FEEDBACK_V")
        ->get();
       $id = $req->post("labid_");
        //echo $id;
		foreach($count_bat as $fp)
		{
               $record = DB::table("PROTAL_BAT_STUDENT_FEEDBACK_V")
			 ->join('std_nt_fill_fd','std_nt_fill_fd.Batch','PROTAL_BAT_STUDENT_FEEDBACK_V.Batch')
			->where('std_nt_fill_fd.Batch' , $fp->Batch)
			  ->get();
		}
        foreach($record as $r)
        {
            $user =$r;
            echo json_encode($user);
        }
    }
	public function export_Users(Request $request){
        // $data  = DB::table("cummulative")->get();
        return Excel::download(new ExportUser , 'cummulative.xlsx');
    }
		
	 public function export_std(Request $request){
        // $data  = DB::table("cummulative")->get();
        return Excel::download(new Export_User , 'remainingstudent.xlsx');
    }

    // jobs insert
    public function job_insert()
    {
        return view("jobs_insert");
    }
    public function job_insert_post(Request $request)
    {

        $jobs = new jobs_models();
        $jobs->gender = $request->gender;
        $jobs->JobClosingDate = $request->JobClosingDate; 
        $jobs->JobDescription = $request->JobDescription; 
        $jobs->JobLocation = $request->JobLocation ;
        $jobs->JobNature = $request->JobNature; 
        $jobs->JobPostDate = $request->JobPostDate; 
        $jobs->JobNature	 = $request->JobNature	; 
        $jobs->JobTitle = $request->JobTitle ;
        $jobs->Status = $request->Status ;
        $jobs->save();

        // Validation
        // $validatedData = $request->validate([
        //     'gender' => 'required|string',
        //     'JobClosingDate' => 'required|string',
        //     'JobDescription' => 'required|string',
        //     'JobLocation' => 'required|string',
        //     'JobNature' => 'required|string',
        //     'JobPostDate' => 'required|string',
        //     'JobTitle' => 'required|string',
        //     'Status' => 'required|string',
        // ]);

        // Create the job record
        // jobs_models::all($validatedData);

        return redirect('/jobinsert')->with('success', 'Job created successfully.');
    }
}
