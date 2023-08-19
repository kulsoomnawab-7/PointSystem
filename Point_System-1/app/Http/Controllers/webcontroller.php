<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\webcareercoursemodel;
use App\Models\webcarouselmodel;
use App\Models\webconnectmodel;
use App\Models\webeventsmodel;
use App\Models\webcountermodel;
use App\Models\webplacementsmodel;
use App\Models\webprojectofmonthmodel;
use App\Models\webstudentofmonthmodel;
use App\Models\webwinnercirclemodel;
use App\Models\webshortcoursemodel;
use DB;
class webcontroller extends Controller
{
    // aptech website function start
    public function indexget()
    {
        $carousel=webcarouselmodel::all();
        $careercourse=webcareercoursemodel::all();
        $shortcourse=webshortcoursemodel::all();

        return View("web.index",compact("carousel","careercourse","shortcourse"));
    }

    public function aboutget()
    {
        return View("web.about");
    }
    public function contactget()
    {
        return View("web.contact");
    }
    public function eventget()
    {
        return View("web.event");
    }
    public function onlinevarsityget()
    {
        return View("web.onlinevarsity");
    }
    public function careercourseget()
    {
        return View("web.careercourse");
    }
    public function shortcourseget()
    {
        return View("web.shortcourse");
    }

    // aptech website function end


    // admin function start for aptech website
    public function adminindex()
    {
        return View("web.admin.index");
    }
    public function admincarousel()
    {
        $carousemodel=webcarouselmodel::all();
        return View("web.admin.carousel",compact("carousemodel"));
    }
    public function admincareercourses()
    {
        $careercourse=webcareercoursemodel::all();
        return View("web.admin.careercourses",compact("careercourse"));
    }
    public function adminshortcourses()
    {
        $shortcourse=webshortcoursemodel::all();
        return View("web.admin.shortcourse",compact("shortcourse"));
    }
    public function admincarouselpost(Request $r)
    {
        $carousemodel=new webcarouselmodel();
        $carousemodel->heading1=$r->heading1input;
        $carousemodel->heading2=$r->heading2input;
        $carousemodel->description=$r->descriptioninput;
        $image=$r->file("imageinput");
        $ext=rand().".".$image->getClientOriginalName();
        $image->move("images/carouselimages/",$ext);
        $carousemodel->image=$ext;
        $carousemodel->save();
        return redirect("/admincarousel");
    }
    public function deletecarousel($id)
    {
        $carousemodel=webcarouselmodel::find($id);
        $carousemodel->delete();
        return redirect()->back();
    }
    public function editcarousel(Request $req)
    {
        $uid = $req->post("uid");
        $record = DB::table("webcarouselmodels")->where("id",$uid)->get();
        foreach($record as $r)
        {
            $user=$r;
            echo json_encode($user);
        }
    }
    public function updatecarousel(Request $req)
    {
        $id = $req->carouselidid;
        $record = webcarouselmodel::find($id);
        $record->heading1 = $req->heading1;
        $record->heading2 = $req->heading2;
        $record->description = $req->description;
        $file=$req->file('imageinput');
        if(isset($file))
        {
            //echo "SND";
            $ext=rand().".".$file->getClientOriginalName();
            //$ext = uniqid() . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            $file->move('images/carouselimages/',$ext);
            $record->image=$ext;
            $record->update();
         }
         else
         {
            //echo "i7gy";
            $record->update();
            return redirect()->back()->with("updatesuccesscomp" , "Data has been updated");
         }
        $record->update();
        return redirect()->back();
    }


    public function admincareercoursepost(Request $r)
    {
        $careercoursemodel=new webcareercoursemodel();
        $careercoursemodel->semester=$r->semesterinput;
        $careercoursemodel->coursename=$r->coursenameinput;
        $careercoursemodel->endprofile=$r->endprofileinput;
        $careercoursemodel->description=$r->descriptioninput;
        $careercoursemodel->completition=$r->completitioninput;
        $careercoursemodel->courseduration=$r->coursedurationinput;
        $careercoursemodel->classduration=$r->classdurationinput;
        $careercoursemodel->courseinfo=$r->courseinfoinput;
        $image=$r->file("courseimageinput");
        $ext=rand().".".$image->getClientOriginalName();
        $image->move("images/careercourses/",$ext);
        $careercoursemodel->image=$ext;
        $careercoursemodel->save();
        return redirect("/admincareercourses");
    }

    public function deletecareercourse($id)
    {
        $careermodel=webcareercoursemodel::find($id);
        $careermodel->delete();
        return redirect()->back();
    }
    public function editcareercourses(Request $req)
    {
        $uid = $req->post("uid");
        $record = DB::table("webcareercoursemodels")->where("id",$uid)->get();
        foreach($record as $r)
        {
            $user=$r;
            echo json_encode($user);
        }
    }
    public function updatecareercourses(Request $req)
    {
        $id = $req->careercourseid;
        $record = webcareercoursemodel::find($id);
        $record->semester = $req->semester;
        $record->coursename = $req->coursename;
        $record->endprofile = $req->endprofile;
        $record->description = $req->description;
        $record->completition = $req->completition;
        $record->courseduration = $req->courseduration;
        $record->classduration = $req->classduration;
        $record->courseinfo = $req->courseinfo;
        $file=$req->file('imageinput');
        if(isset($file))
        {
            //echo "SND";
            $ext=rand().".".$file->getClientOriginalName();
            //$ext = uniqid() . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            $file->move('images/careercourses/',$ext);
            $record->image=$ext;
            $record->update();
         }
         else
         {
            //echo "i7gy";
            $record->update();
            return redirect()->back()->with("updatesuccesscomp" , "Data has been updated");
         }
        $record->update();
        return redirect()->back();
    }


    public function adminshortcoursepost(Request $r)
    {
        $shortcourse=new webshortcoursemodel();
        $shortcourse->coursename=$r->shortcoursenameinput;
        $shortcourse->description=$r->shortcoursedescriptioninput;
        $shortcourse->courseduration=$r->shortclassdurationinput;
        $shortcourse->classduration=$r->shortclassdurationinput;
        $shortcourse->courseinfo=$r->shortcourseinfoinput;
        $image=$r->file("shortcourseimageinput");
        $ext=rand().".".$image->getClientOriginalName();
        $image->move("images/shortcourses/",$ext);
        $shortcourse->image=$ext;
        $shortcourse->save();
        return redirect("/adminshortcourses");
    }
    public function deleteshortcourse($id)
    {
        $shortcoursemodel=webshortcoursemodel::find($id);
        $shortcoursemodel->delete();
        return redirect()->back();
    }
    public function editshortcourses(Request $req)
    {
        $uid = $req->post("uid");
        $record = DB::table("webshortcoursemodels")->where("id",$uid)->get();
        foreach($record as $r)
        {
            $user=$r;
            echo json_encode($user);
        }
    }


    public function updateshortcourses(Request $req)
    {
        $id = $req->shortcourseid;
        $record = webshortcoursemodel::find($id);
        $record->coursename = $req->coursename;
        $record->description = $req->description;
        $record->courseduration = $req->courseduration;
        $record->classduration = $req->classduration;
        $record->courseinfo = $req->courseinfo;
        $file=$req->file('imageinput');
        if(isset($file))
        {
            //echo "SND";
            $ext=rand().".".$file->getClientOriginalName();
            //$ext = uniqid() . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            $file->move('images/shortcourses/',$ext);
            $record->image=$ext;
            $record->update();
         }
         else
         {
            //echo "i7gy";
            $record->update();
            return redirect()->back()->with("updatesuccesscomp" , "Data has been updated");
         }
        $record->update();
        return redirect()->back();
    }

    // admin function end for aptech website

}
