@extends("web.admin.adminlayout")
@section("title")
Carousel
@endsection
@section("dashboardcontent")

<div class="container">
<br><br><br>
<h3 style="text-align:center;">Add Carousel</h3>
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
            <form action="/admincarousel" method="post" enctype="multipart/form-data" >

            <div class="modal-body">
            @csrf
            <label for="">Enter Heading 1 </label>
            <input type="text" name="heading1input" placeholder="Enter Heading 1" class="form-control">
            <br>
            <label for="">Enter Heading 2 </label>
            <input type="text" name="heading2input" placeholder="Enter Heading 2" class="form-control">
            <br>
            <label for="">Enter Description </label>
            <input type="text" name="descriptioninput" placeholder="Enter Description" class="form-control">
            <br>
            <label for="">Select Image</label>
            <input type="file" name="imageinput" class="form-control">
            <br><Br>
            <button type="submit" class="btn btn-info">Add</button>
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
<th>HEADING 1</th>
<th>HEADING 2</th>
<th>DESCRIPTION</th>
<th>IMAGE</th>
<th colspan="2">Action</th>

</tr>

@foreach($carousemodel as $c)
<tr>
<td>{{$c->id}}</td>
<td>{{$c->heading1}}</td>
<td>{{$c->heading2}}</td>
<td>{{$c->description}}</td>
<td><img src="images/carouselimages/{{$c->image}}" width="100px" height="100px"/></td>
<td><button type="button" class="btn btn-primary" width="100px" height="100px" id="modalbtnid" data-id="{{$c->id}}">Edit</button></td><td><a href="deletecarousel/{{$c->id}}" class="btn btn-danger">Delete</a></td>
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
            <form action="{{URL::to('/updatecarousel')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
               <input type="text" name="carouselidid" readonly id="carouselidid" class="form-control">
               <br>
               <input type="text" name="heading1" id="heading1" class="form-control">
               <br>
               <input type="text" name="heading2" id="heading2" class="form-control">
               <br>
               <input type="text" name="description" id="description" class="form-control">
               <br>
               <img class="form-control"  style="height:8rem; width:10rem; border-radius:50rem;"  id="outImg" src="" alt="" height="250px">
               <br>
                      <input type="file"  name="imageinput" class="imageinput" id="imageinput" onchange="onFileSelected(event)">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
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
                url:"/editcarousel",
                type:"POST",
                data:"uid="+id+
                '&_token={{csrf_token()}}',
                success:function(result)
                {
                    $("#updatemodalid").modal("show");
                    var result = JSON.parse(result);
                    $("#carouselidid").val(result["id"]);
                    $("#heading1").val(result["heading1"]);
                    $("#heading2").val(result["heading2"]);
                    $("#description").val(result["description"]);
                    document.getElementById("outImg").src="images/carouselimages/"+result["image"];
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