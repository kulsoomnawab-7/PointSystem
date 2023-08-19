<?php
use App\Models\modular;

?>
@extends("dashboardhead_foot")
@section('content')

<style>
    .exam
    {
        border-bottom:2px solid blue;
        display:inline-block;
        font-size:20px;
        margin:20px;
    }
    .table-responsive .card h1
    {
        padding:20px;
    }
    .exam th
    {
        color:blue;
    }
    .exam2
    {
        font-size:30px;
    }
</style>
<div class="container-fluid page-body-wrapper">
<div class="main-panel">
<div class="content-wrapper">
<div class="row">
<div class="col-sm-6 mb-4 mb-xl-0">
<div class="d-lg-flex align-items-center">
<div>
<h3 class="text-dark font-weight-bold mb-2">Hi, welcome back!</h3>
<h6 class="font-weight-normal mb-2">Last login was 23 hours ago. View details</h6>
</div>
<div class="ms-lg-5 d-lg-flex d-none">
<button type="button" class="btn bg-white btn-icon">
<i class="mdi mdi-view-grid text-success"></i>
</button>

</div>
</div>
</div>

</div>

<section>

<?php

$fetch = DB::table("modulars")->where('Sem_ID', '1')->first();
?>

<br><br>
@if(isset($fetch->Sem_ID) != null)
@if($fetch->Sem_ID == 1)
@foreach($examfetch as $exam)
<?php
$fetch = DB::table("modulars")->where('Sem_ID', $exam->Sem_ID)->first();
?>
<div class="container table-primary">
<div class="table-responsive">
<div class="row">

</div>
@endforeach
<h1 class="text-center">Semester 1</h1>

<table class="table table-bordered table-hover table-responsive table-primary table-primary">
<thead>
<tr>
<th>ID</th>
<th>M1</th>
<th>M2</th>
<th>M3</th>
<th>M4</th>
<th>M5</th>
<th>M6</th>
<th>M7</th>
<th>R1</th>
<th>R2</th>
<th>R3</th>
<th>R4</th>
<th>R5</th>
<th>E1</th>
<th>Proj</th>
<th>Per</th>
<th>Point</th>
</tr>
</thead>
@foreach($examfetch as $exam)
<?php
$fetch = DB::table("modulars")->where('Sem_ID', $exam->Sem_ID)->first();
?>
<tr>
<td>{{$exam->id}}</td>
<td>{{$exam->M1}}</td>
<td>{{$exam->M2}}</td>
<td>{{$exam->M3}}</td>
<td>{{$exam->M4}}</td>
<td>{{$exam->M5}}</td>
<td>{{$exam->M6}}</td>
<td>{{$exam->M7}}</td>
<td>{{$exam->R1}}</td>
<td>{{$exam->R2}}</td>
<td>{{$exam->R3}}</td>
<td>{{$exam->R4}}</td>
<td>{{$exam->R5}}</td>
<td>{{$exam->E1}}</td>
<td>{{$exam->Proj}}</td>
<?php
$maximum_possible_score = 240;
$actual_score = $exam->M1 + $exam->M2 + $exam->M3 + $exam->M4 + $exam->M5 + $exam->M6 + $exam->M7 + $exam->R1 + $exam->R2 + $exam->R3 + $exam->R4 + $exam->R5;
$percentage = ($actual_score / $maximum_possible_score) * 100;
 ?>


<td>{{number_format($percentage = ($actual_score / $maximum_possible_score) * 100)}}%</td>
@if(($percentage * 100 ) /  $percentage > 60 )
<td>150 point extra</td>
@else
<td>no extra point</td>
@endif
</tr>
@endforeach



</table>
@endif
@endif
<?php

$fetch = DB::table("modulars")->where('Sem_ID', '2')->first();
?>

<br><br>
@if(isset($fetch->Sem_ID) != null)
@if($fetch->Sem_ID == "2")
<h1 class="text-center">Semester 2</h1>

<table class="table table-bordered table-hover table-responsive table-primary">
<thead>
<tr>
<th>ID</th>
<th>M1</th>
<th>M2</th>
<th>M3</th>
<th>M4</th>
<th>M5</th>
<th>M6</th>
<th>M7</th>
<th>R1</th>
<th>R2</th>
<th>R3</th>
<th>R4</th>
<th>R5</th>
<th>E1</th>
<th>Proj</th>
<th>Per</th>
<th>Point</th>

</tr>
</thead>
@foreach($examfetch2 as $exam)
<tr>
<td>{{$exam->id}}</td>
<td>{{$exam->M1}}</td>
<td>{{$exam->M2}}</td>
<td>{{$exam->M3}}</td>
<td>{{$exam->M4}}</td>
<td>{{$exam->M5}}</td>
<td>{{$exam->M6}}</td>
<td>{{$exam->M7}}</td>
<td>{{$exam->R1}}</td>
<td>{{$exam->R2}}</td>
<td>{{$exam->R3}}</td>
<td>{{$exam->R4}}</td>
<td>{{$exam->R5}}</td>
<td>{{$exam->E1}}</td>
<td>{{$exam->Proj}}</td>

<?php
$maximum_possible_score = 240;
$actual_score = $exam->M1 + $exam->M2 + $exam->M3 + $exam->M4 + $exam->M5 + $exam->M6 + $exam->M7 + $exam->R1 + $exam->R2 + $exam->R3 + $exam->R4 + $exam->R5;
$percentage = ($actual_score / $maximum_possible_score) * 100;
?>



<td>{{number_format($percentage = ($actual_score / $maximum_possible_score) * 100)}}%</td>
@if($percentage > 60)

<td>150 point extra</td>
@else
<td>no extra point</td>
@endif
</tr>
@endforeach

</table>
@endif
@endif
<?php

$fetch = DB::table("modulars")->where('Sem_ID', '3')->first();
?>

<br><br>
@if(isset($fetch->Sem_ID) != null)
@if($fetch->Sem_ID == 3)
<h1 class="text-center">Semester 3</h1>

<table class="table table-bordered table-hover table-responsive table-primary">
<thead>
<tr>
<th>ID</th>
<th>M1</th>
<th>M2</th>
<th>M3</th>
<th>M4</th>
<th>M5</th>
<th>M6</th>
<th>M7</th>
<th>R1</th>
<th>R2</th>
<th>R3</th>
<th>R4</th>
<th>R5</th>
<th>E1</th>
<th>Proj</th>
<th>Per</th>
<th>Point</th>

</tr>
</thead>
@foreach($examfetch3 as $exam)
<tr>
<td>{{$exam->id}}</td>
<td>{{$exam->M1}}</td>
<td>{{$exam->M2}}</td>
<td>{{$exam->M3}}</td>
<td>{{$exam->M4}}</td>
<td>{{$exam->M5}}</td>
<td>{{$exam->M6}}</td>
<td>{{$exam->M7}}</td>
<td>{{$exam->R1}}</td>
<td>{{$exam->R2}}</td>
<td>{{$exam->R3}}</td>
<td>{{$exam->R4}}</td>
<td>{{$exam->R5}}</td>
<td>{{$exam->E1}}</td>
<td>{{$exam->Proj}}</td>
<?php
$maximum_possible_score = 240;
$actual_score = $exam->M1 + $exam->M2 + $exam->M3 + $exam->M4 + $exam->M5 + $exam->M6 + $exam->M7 + $exam->R1 + $exam->R2 + $exam->R3 + $exam->R4 + $exam->R5;
$percentage = ($actual_score / $maximum_possible_score) * 100;
?>




<td>{{number_format($percentage = ($actual_score / $maximum_possible_score) * 100)}}%</td>
@if($percentage > 60)
<td>150 point extra</td>
@else
<td>no extra point</td>
@endif
</tr>
@endforeach




</table>
@endif
@endif



<?php

$fetch = DB::table("modulars")->where('Sem_ID', '4')->first();
?>

<br><br>

<h1 class="text-center">Semester 4</h1>

<table class="table table-bordered table-hover table-responsive table-primary">
<thead>
<tr>
<th>ID</th>
<th>M1</th>
<th>M2</th>
<th>M3</th>
<th>M4</th>
<th>M5</th>
<th>M6</th>
<th>M7</th>
<th>R1</th>
<th>R2</th>
<th>R3</th>
<th>R4</th>
<th>R5</th>
<th>E1</th>
<th>Proj</th>
<th>Per</th>
<th>Point</th>

</tr>
</thead>

@foreach($examfetch4 as $exam)


<tr>
<td>{{$exam->id}}</td>
<td>{{$exam->M1}}</td>
<td>{{$exam->M2}}</td>
<td>{{$exam->M3}}</td>
<td>{{$exam->M4}}</td>
<td>{{$exam->M5}}</td>
<td>{{$exam->M6}}</td>
<td>{{$exam->M7}}</td>
<td>{{$exam->R1}}</td>
<td>{{$exam->R2}}</td>
<td>{{$exam->R3}}</td>
<td>{{$exam->R4}}</td>
<td>{{$exam->R5}}</td>
<td>{{$exam->E1}}</td>
<td>{{$exam->Proj}}</td>
<?php
$maximum_possible_score = 240;
$actual_score = $exam->M1 + $exam->M2 + $exam->M3 + $exam->M4 + $exam->M5 + $exam->M6 + $exam->M7 + $exam->R1 + $exam->R2 + $exam->R3 + $exam->R4 + $exam->R5;
$percentage = ($actual_score / $maximum_possible_score) * 100;
?>



<td>{{number_format($percentage = ($actual_score / $maximum_possible_score) * 100)}}%</td>
@if($percentage > 60)
<td>150 point extra</td>
@else
<td>no extra point</td>
@endif
</tr>
@endforeach




</table>


<?php

$fetch = DB::table("modulars")->where('Sem_ID', '5')->first();
?>

<br><br>

<h1 class="text-center">Semester 5</h1>

<table class="table table-bordered table-hover table-responsive table-primary ">
<thead>
<tr>
<th>ID</th>
<th>M1</th>
<th>M2</th>
<th>M3</th>
<th>M4</th>
<th>M5</th>
<th>M6</th>
<th>M7</th>
<th>R1</th>
<th>R2</th>
<th>R3</th>
<th>R4</th>
<th>R5</th>
<th>E1</th>
<th>Proj</th>
<th>Per</th>
<th>Point</th>

</tr>
</thead>
@foreach($examfetch5 as $exam)
<tr>
<td>{{$exam->id}}</td>
<td>{{$exam->M1}}</td>
<td>{{$exam->M2}}</td>
<td>{{$exam->M3}}</td>
<td>{{$exam->M4}}</td>
<td>{{$exam->M5}}</td>
<td>{{$exam->M6}}</td>
<td>{{$exam->M7}}</td>
<td>{{$exam->R1}}</td>
<td>{{$exam->R2}}</td>
<td>{{$exam->R3}}</td>
<td>{{$exam->R4}}</td>
<td>{{$exam->R5}}</td>
<td>{{$exam->E1}}</td>
<td>{{$exam->Proj}}</td>
<?php
$maximum_possible_score = 240;
$actual_score = $exam->M1 + $exam->M2 + $exam->M3 + $exam->M4 + $exam->M5 + $exam->M6 + $exam->M7 + $exam->R1 + $exam->R2 + $exam->R3 + $exam->R4 + $exam->R5;
$percentage = ($actual_score / $maximum_possible_score) * 100;
?>

<td>{{number_format($percentage = ($actual_score / $maximum_possible_score) * 100)}}%</td>
@if($percentage > 60)
<td>150 point extra</td>
@else
<td>no extra point</td>
@endif
</tr>
@endforeach

</table>

<br><br>
<?php

$fetch = DB::table("modulars")->where('Sem_ID', '6')->first();
?>

<br><br>

<h1 class="text-center">Semester 6</h1>

<table class="table table-bordered table-hover table-responsive table-primary">
<thead>
<tr>
<th>ID</th>
<th>M1</th>
<th>M2</th>
<th>M3</th>
<th>M4</th>
<th>M5</th>
<th>M6</th>
<th>M7</th>
<th>R1</th>
<th>R2</th>
<th>R3</th>
<th>R4</th>
<th>R5</th>
<th>E1</th>
<th>Proj</th>
<th>Per</th>
<th>Point</th>

</tr>
</thead>
@foreach($examfetch6 as $exam)
<tr>
<td>{{$exam->id}}</td>
<td>{{$exam->M1}}</td>
<td>{{$exam->M2}}</td>
<td>{{$exam->M3}}</td>
<td>{{$exam->M4}}</td>
<td>{{$exam->M5}}</td>
<td>{{$exam->M6}}</td>
<td>{{$exam->M7}}</td>
<td>{{$exam->R1}}</td>
<td>{{$exam->R2}}</td>
<td>{{$exam->R3}}</td>
<td>{{$exam->R4}}</td>
<td>{{$exam->R5}}</td>
<td>{{$exam->E1}}</td>
<td>{{$exam->Proj}}</td>
<?php
$maximum_possible_score = 240;
$actual_score = $exam->M1 + $exam->M2 + $exam->M3 + $exam->M4 + $exam->M5 + $exam->M6 + $exam->M7 + $exam->R1 + $exam->R2 + $exam->R3 + $exam->R4 + $exam->R5;
$percentage = ($actual_score / $maximum_possible_score) * 100;

?>

<td>{{number_format($percentage = ($actual_score / $maximum_possible_score) * 100)}}%</td>
@if($percentage > 60)
<td>150 point extra</td>
@else
<td>no extra point</td>
@endif
</tr>
@endforeach
</table>
</div>
</div>
</section>
@endsection
<!-- End custom dashboard/js for this page-->