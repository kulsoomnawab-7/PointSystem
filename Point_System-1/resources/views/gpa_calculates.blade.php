<?php
use App\Models\gpa_calculate;
use App\Models\feedback_form;
use App\Models\faculty_feedback_gpa;
use App\Models\user;


?>
@extends('layouts.admin_dashboard')
@section('dashboard')
<!doctype html>
<html lang="en">
  <head>
    <title>Student GPA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
  <br><br>
  <div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-1">
<center>

<h1>Student Feedback (GPA)</h1>




</center>
        <table class="table table-hover table-bordered table-striped table-responsive">
        

            @foreach($gpa_calculates as $gpa)

            <?php
              $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
              ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
              ->first();


              

                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();

                // echo $count;
            ?>

            
       <center>
       @if($gpa->gpa && $gpa->question == 'punctuality')

   <tr>

   <tr>
        <td colspan="12" style="height:4rem;"></td>
    </tr>

            <tr>
              @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h3>Faculty: {{$select->name ?? 'None'}}</h3></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h3>Batch: {{$select->batch ?? 'None'}}</h3></td>

                @endif
             </tr>

      
             
             

                
                <!-- <th>ID</th> -->
                <!-- <th>BATCH</th> -->
                <th>MONTH</th>
                <th>QUESTION</th>
                <th>YEAR</th>
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
                

            </tr>

          

              @endif

           



            </center>
           
            
            <tr>
                        
                <!-- <td>{{$gpa->id}}</td> -->
                 <!-- <td>{{$gpa->batch}}</td> -->
                <td>{{$gpa->month}}</td>
              

                <td>{{$gpa->question}}</td>
                <td>{{$gpa->year}}</td>           

                <td>
                    @if($gpa->column_iv)
                    {{$gpa->column_iv}}
                    @else
                    
                    @endif
                </td>

                <td>
                    @if($gpa->column_iii)
                    {{$gpa->column_iii}}
                    @else                    
                    @endif
                </td>

                <td>
                @if($gpa->column_ii)
                    {{$gpa->column_ii}}
                    @else
                    
                    @endif
                  
                </td>

                <td>
                    @if($gpa->column_i)
                    {{$gpa->column_i}}
                    @else
                    
                    @endif
                </td>

                <td>{{$gpa->sum}}</td>
                <td>{{$gpa->average}}</td>
               

                @if($gpa->gpa && $gpa->question == 'computer_uptime')
              <tr>
              <td colspan="12">
                <h4>Overall GPA:
               {{number_format(($gpa->gpa),2)}}% 
              </h4>
            </td>
              </tr>

              <tr>
              <td colspan="12">
              <h4>Number of Respondents:
               {{$count}}
              </h4>
            </td>
              </tr>
               @endif

               
            

            </tr >
            @endforeach

        </table>

        </div>
    </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

@endsection