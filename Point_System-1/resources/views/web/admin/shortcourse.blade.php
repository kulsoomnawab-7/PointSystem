@extends("web.admin.adminlayout")
@section("title")
Short Courses
@endsection
@section("dashboardcontent")

<div class="container">
<br><br><br>
<h3 style="text-align:center;">Add Short Courses</h3>
<!-- Button trigger modal -->.
<br><br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
  Create new
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="/adminshortcourses" method="post" enctype="multipart/form-data" >

            <div class="modal-body">
            @csrf
           <div class="row">
           <div class="col-md-6">
           <label for="">Enter Short Course Name </label>
            <input type="text" name="shortcoursenameinput" placeholder="Enter Course Name" class="form-control">
            <br>
           </div>
           <div class="col-md-6">
           <label for="">Enter Short Course Description </label>
            <input type="text" name="shortcoursedescriptioninput" placeholder="Enter Course Description" class="form-control">
            <br>
           </div>

           <div class="col-md-6">
           <label for="">Enter Short Class Duration </label>
            <input type="text" name="shortclassdurationinput" placeholder="Enter Class Duration" class="form-control">
            <br>
           </div>

           <div class="col-md-6">
           <label for="">Enter Short Course Image </label>
            <input type="file" name="shortcourseimageinput"  class="form-control">
            <br>
           </div>

           <div class="col-md-6">
           <label for="">Enter Short Course Info Detail with line break </label>
            <textarea type="text" name="shortcourseinfoinput" placeholder="Enter Course Info" class="form-control"></textarea>       
            <br>
           </div>
           </div>
                       </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>

        </div>
    </div>
</div>
<table class="table table-hover table-bordered table-striped table-responsive" style="margin-top:50px;">
<tr>
<th>ID</th>
<th>COURSE</th>
<th>DESCRIPTION</th>
<th>COURSE DURATION</th>
<th>CLASS DURATION</th>
<th>COURSE INFO</th>
<th>IMAGE</th>

<th colspan="2">Action</th>

</tr>

@foreach($shortcourse as $c)
<tr>
<td>{{$c->id}}</td>
<td>{{$c->coursename}}</td>
<td>{{$c->description}}</td>
<td>{{$c->courseduration}}</td>
<td>{{$c->classduration}}</td>
<td>{{$c->courseinfo}}</td>

<td><img src="images/shortcourses/{{$c->image}}" width="100px" height="100px"/></td>
<td><button type="button" class="btn btn-primary" width="100px" height="100px" id="modalbtnid" data-id="{{$c->id}}">Edit</button></td>
<td><a href="deleteshortcourse/{{$c->id}}" class="btn btn-danger">Delete</a></td>
</tr>
@endforeach
</table>
</div>

<div class="modal fade" id="updatemodalid" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="{{URL::to('/updateshortcourses')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
               <input type="text" name="shortcourseid" readonly id="shortcourseid" class="form-control">
               <br>
               <input type="text" name="coursename" id="coursename" class="form-control">
               <br>      
               <input type="text" name="description" id="description" class="form-control">
               <br>
               <input type="text" name="courseduration" id="courseduration" class="form-control">
               <br>
               <input type="text" name="classduration" id="classduration" class="form-control">
               <br>
               <input type="text" name="courseinfo" id="courseinfo" class="form-control">
               <br>
               <img class="form-control"  style="height:8rem; width:10rem; border-radius:50rem;"  id="outImg" src="" alt="" height="250px">
               <br>
                      <input type="file"  name="imageinput" class="imageinput" id="imageinput" onchange="onFileSelected(event)">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $(document).on("click","#modalbtnid",function(){
            // alert("clicked");
            var id = $(this).attr("data-id");
            // console.log(id);
            // $("#updatemodalid").modal("show");
            $.ajax({
                url:"/editshortcourses",
                type:"POST",
                data:"uid="+id+
                '&_token={{csrf_token()}}',
                success:function(result)
                {
                    $("#updatemodalid").modal("show");
                    var result = JSON.parse(result);
                    $("#shortcourseid").val(result["id"]);
                    $("#coursename").val(result["coursename"]);
                    $("#description").val(result["description"]);
                    $("#courseduration").val(result["courseduration"]);
                    $("#classduration").val(result["classduration"]);
                    $("#courseinfo").val(result["courseinfo"]);
                    document.getElementById("outImg").src="images/shortcourses/"+result["image"];
                    $("#imageinput").val(result["image"]);  


                }
            });


        });
    });


    function onFileSelected(event) {
    var selectedFile = event.target.files[0];
    var reader = new FileReader();

    var imgtag = document.getElementById("outImg");
    imgtag.title = selectedFile.name;

    reader.onload = function(event) {
    imgtag.src = event.target.result;
    };

    reader.readAsDataURL(selectedFile);
  }


 </script>
 
@endsection