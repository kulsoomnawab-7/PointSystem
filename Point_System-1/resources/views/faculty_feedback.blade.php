@extends('layouts.admin_dashboard')
@section('dashboard')

<?php
use App\Models\faculty_feedback_gpa;
use App\Models\gpa_calculate;
use App\Models\feedback_form;
use App\Models\users;

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Faculty Feedback</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
  <br><br><br>
  <div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-4">
			<form action="{{URL::to ('/month_year_f')}}" method="post">
          @csrf
          <!-- <input type="type" name="month" style="height:2rem; width:12rem;" > -->

		  <select name="month" style="height:2rem; width:12rem;">
			<option value="" selected disabled>Select Month</option>
			<option value="January">January</option>
			<option value="February">February</option>
			<option value="March">March</option>
			<option value="April">April</option>
			<option value="May">May</option>
			<option value="June">June</option>
			<option value="July">July</option>
			<option value="August">August</option>
			<option value="September">September</option>
			<option value="October">October</option>
			<option value="November">November</option>
			<option value="December">December</option>
		  </select>

		  <!-- <select name="years[]" multiple style="height:2rem; width:12rem;">
		@for($i = date('Y'); $i >= date('Y') - 10; $i--)
			<option value="{{ $i }}">{{ $i }}</option>
		@endfor
	</select> -->
    <input type="number" name="year" id="year" min="{{ date('Y') - 10 }}" max="{{ date('Y') + 50 }}" value="2023" style="height:2rem; width:12rem;">
          <button type="submit" class="btn btn-primary mb-1 pt-1" style="background-color:#51E1C3; height:2rem;">Search</button>
        </form>
    <h1>Faculty Feedback</h1>
<br>
        <div class="table-responsive">
			
    <div class="table table-bordered table-hovered table-striped table-responsive">
        <table class="table table-bordered table-hovered table-striped table-responsive">
        <tr>
            <th>Faculty</th>
            <th>Total Batch</th>
     
            <th>Gpa</th>
            <!-- <th>Month</th>
            <th>year</th> -->
        </tr>


        @foreach($faculty_feedback_gpas as $ffg)

  
        <tr>
            <td>{{$ffg->faculty}}</td>
            <td>{{$ffg->batch_count}}</td>

            <td>
            {{number_format(($ffg->gpa),2)}} 

              <!-- {{$ffg->gpa}} -->
            </td>
            <!-- <td>{{$ffg->Month}}</td>
            <td>{{$ffg->Year}}</td> -->

            <!-- <td> -->
            <!-- <button id="updatebtn" data-id="{{$ffg->id}}" style="background-color:white;"><img src="draw.png" alt="" style="height:1rem;">View Faculty Btaches</button> -->

              <!-- <button class="btn btn-primary">View Faculty Btaches</button> -->
            <!-- </td> -->

        </tr>
        @endforeach


			 <tr>

          <th>Total Batches</th>
          <td>{{$sum}}</td>
          <td>{{number_format(($average),2)}}</td>


        </tr>

      
      
        </table>
    </div>
  </div>
        </div>
    </div>
  </div>
<center>


  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg ml-5 pt-2" data-toggle="modal" data-target="#modelId" style="height:38px;">
          @foreach($faculty_batch_1 as $gpa)
	  <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>
    @if($gpa->gpa && $gpa->question == 'punctuality')
               <h6>{{$select->name  ?? 'None'}}</h6>

                @endif
	   @endforeach
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_1 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>

             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

            <!-- <th>MONTH</th> -->
                <th>QUESTION</th>
                <!-- <th>YEAR</th> -->
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
              <!-- <td>{{$gpa->month}}</td> -->


      <td>{{$gpa->question}}</td>
      <!-- <td>{{$gpa->year}}</td>            -->

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






        </tr>
      
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_2 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					
					 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>


      <td>{{$gpa->question}}</td>

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_3 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					
					 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>


      <td>{{$gpa->question}}</td>

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_4 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					
					 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>


      <td>{{$gpa->question}}</td>

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>
        </div>
	 <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_um as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>

             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

            <!-- <th>MONTH</th> -->
                <th>QUESTION</th>
                <!-- <th>YEAR</th> -->
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
              <!-- <td>{{$gpa->month}}</td> -->


      <td>{{$gpa->question}}</td>
      <!-- <td>{{$gpa->year}}</td>            -->

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






        </tr>
      
      @endforeach
    </table>
                </div>
		 
		                 <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_u as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>

             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

            <!-- <th>MONTH</th> -->
                <th>QUESTION</th>
                <!-- <th>YEAR</th> -->
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
              <!-- <td>{{$gpa->month}}</td> -->


      <td>{{$gpa->question}}</td>
      <!-- <td>{{$gpa->year}}</td>            -->

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






        </tr>
      
      @endforeach
    </table>
                </div>
               </div>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
  
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId_2" style="height:38px;">
    @foreach($faculty_batch_5 as $gpa)
	  <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>
    @if($gpa->gpa && $gpa->question == 'punctuality')
               <h6>{{$select->name  ?? 'None'}}</h6>

                @endif
	   @endforeach
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modelId_2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_5 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

       
                <th>QUESTION</th>
            
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
              


      <td>{{$gpa->question}}</td>
  
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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_6 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

            
                <th>QUESTION</th>
            
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
         


      <td>{{$gpa->question}}</td>
              

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>

          
        </div>
		  
		   <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_t as $gpa)
					<?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

         
                <th>QUESTION</th>
        
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
           


      <td>{{$gpa->question}}</td>
              

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






        </tr>
      @endforeach
    </table>
                </div>                </div>
                </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId_3" style="height:38px;">
    @foreach($faculty_batch_7 as $gpa)
	  <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>
    @if($gpa->gpa && $gpa->question == 'punctuality')
               <h6>{{$select->name  ?? 'None'}}</h6>

                @endif
	   @endforeach
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modelId_3" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_7 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					
					
					 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>


      <td>{{$gpa->question}}</td>

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_8 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>


      <td>{{$gpa->question}}</td>

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_9 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
       
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>


      <td>{{$gpa->question}}</td>

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






        </tr>
      @endforeach
    </table>
                </div>
				
				  <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_zam as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
       
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>


      <td>{{$gpa->question}}</td>

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






        </tr>
      @endforeach
    </table>
                </div>


               

              </div>
            </div>
        </div>

 
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
  


  

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId_4" style="height:38px;">
    @foreach($faculty_batch_11 as $gpa)
	  <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>
    @if($gpa->gpa && $gpa->question == 'punctuality')
               <h6>{{$select->name  ?? 'None'}}</h6>

                @endif
	   @endforeach
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modelId_4" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_11 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
             
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
             


      <td>{{$gpa->question}}</td>
             

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_12 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
               
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
             


      <td>{{$gpa->question}}</td>
         

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_13 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

         
                <th>QUESTION</th>
            
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
            


      <td>{{$gpa->question}}</td>
          

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_e as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

     
                <th>QUESTION</th>
             
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
             


      <td>{{$gpa->question}}</td>
           

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>
        </div>

      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>


  
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal_5" style="height:38px;">
    @foreach($faculty_batch_15 as $gpa)
	  <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>
    @if($gpa->gpa && $gpa->question == 'punctuality')
               <h6>{{$select->name  ?? 'None'}}</h6>

                @endif
	   @endforeach
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modal_5" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_15 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					
					 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
              
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
             


      <td>{{$gpa->question}}</td>
            

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_16 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					
  @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

         
                <th>QUESTION</th>
           
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
            


      <td>{{$gpa->question}}</td>
        

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_17 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					
		 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

           
                <th>QUESTION</th>
       
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_18 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					
							 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>
<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
           


      <td>{{$gpa->question}}</td>
            

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>
        </div>

        <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_19 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
								 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

   
                <th>QUESTION</th>
          
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
            


      <td>{{$gpa->question}}</td>
       

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_20 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'computer_uptime')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'computer_uptime')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'computer_uptime')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

            <th>MONTH</th>
                <th>QUESTION</th>
                <th>YEAR</th>
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>




  
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId_6" style="height:38px;">
 @foreach($faculty_batch_21 as $gpa)
	  <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>
    @if($gpa->gpa && $gpa->question == 'punctuality')
               <h6>{{$select->name  ?? 'None'}}</h6>

                @endif
	   @endforeach
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modelId_6" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_21 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count1 = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count1}}
</h5>
</td>
</tr>

     
                <th>QUESTION</th>
          
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>



      <td>{{$gpa->question}}</td>
               

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_22 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

         
                <th>QUESTION</th>
               
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
             
      <td>{{$gpa->question}}</td>
           

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_23 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count2 = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count2}}
</h5>
</td>
</tr>

          
                <th>QUESTION</th>
             
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>


      <td>{{$gpa->question}}</td>
            

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_24 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count3 = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count3}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
            


      <td>{{$gpa->question}}</td>
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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>



    
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId_7" style="height:38px;">
   @foreach($faculty_batch_25 as $gpa)
	  <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>
    @if($gpa->gpa && $gpa->question == 'punctuality')
               <h6>{{$select->name  ?? 'None'}}</h6>

                @endif
	   @endforeach
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modelId_7" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_25 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
							 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
       
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
            


      <td>{{$gpa->question}}</td>
           

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_26 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
							 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

           
                <th>QUESTION</th>
              
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
        


      <td>{{$gpa->question}}</td>
          

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_27 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
							 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

      
                <th>QUESTION</th>
            
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
           


      <td>{{$gpa->question}}</td>
           

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_28 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
							 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
              
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
           


      <td>{{$gpa->question}}</td>
        

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>


    
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId_8" style="height:38px;">
   @foreach($faculty_batch_29 as $gpa)
	  <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>
    @if($gpa->gpa && $gpa->question == 'punctuality')
               <h6>{{$select->name  ?? 'None'}}</h6>

                @endif
	   @endforeach
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modelId_8" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_29 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
							 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

 
                <th>QUESTION</th>
            
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
           


      <td>{{$gpa->question}}</td>
          

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_30 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
							 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

        
                <th>QUESTION</th>

                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
            


      <td>{{$gpa->question}}</td>
             

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_31 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
							 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

      
                <th>QUESTION</th>

                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
           


      <td>{{$gpa->question}}</td>
            

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_32 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
							 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
			
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
                
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
        


      <td>{{$gpa->question}}</td>
         

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-md-6">

            <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_33 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
							 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
           


      <td>{{$gpa->question}}</td>
        

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






        </tr>
      @endforeach
    </table>
            </div>
          </div>
        </div>

 <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_n as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>

             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

            <!-- <th>MONTH</th> -->
                <th>QUESTION</th>
                <!-- <th>YEAR</th> -->
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
              <!-- <td>{{$gpa->month}}</td> -->


      <td>{{$gpa->question}}</td>
      <!-- <td>{{$gpa->year}}</td>            -->

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






        </tr>
      
      @endforeach
    </table>
                </div>
                </div>
                </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId_9" style="height:38px;">
   @foreach($faculty_batch_34 as $gpa)
	  <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>
    @if($gpa->gpa && $gpa->question == 'punctuality')
               <h6>{{$select->name  ?? 'None'}}</h6>

                @endif
	   @endforeach
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modelId_9" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_34 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
							 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                           <th>QUESTION</th>
         
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
      


      <td>{{$gpa->question}}</td>
           

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_35 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
							 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

     
                <th>QUESTION</th>
        
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
           


      <td>{{$gpa->question}}</td>
     

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_36 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
							 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

         
                <th>QUESTION</th>
             
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
              


      <td>{{$gpa->question}}</td>
               

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_azh as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

      
                <th>QUESTION</th>
     
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
            


      <td>{{$gpa->question}}</td>
                

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>
        </div>

		

		 <div class="container">
        <div class="row"> 
			
		</div>
        </div>
  
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
</center>

<br>


<center>
  
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg ml-5" data-toggle="modal" data-target="#modelId_10" style="height:38px;">
   @foreach($faculty_batch_38 as $gpa)
	  <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>
    @if($gpa->gpa && $gpa->question == 'punctuality')
               <h6>{{$select->name  ?? 'None'}}</h6>

                @endif
	   @endforeach
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modelId_10" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_38 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
							 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

           
                <th>QUESTION</th>
            
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
             


      <td>{{$gpa->question}}</td>
       

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_39 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
								 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                          <th>QUESTION</th>
            
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
            


      <td>{{$gpa->question}}</td>
             

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_40 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'computer_uptime')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'computer_uptime')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'computer_uptime')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

            <th>MONTH</th>
                <th>QUESTION</th>
                <th>YEAR</th>
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
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






        </tr>
      @endforeach
    </table>
</div>

              </div>
            </div>
        </div>

  
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId_11" style="height:38px;">
   @foreach($faculty_batch_41 as $gpa)
	  <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>
    @if($gpa->gpa && $gpa->question == 'punctuality')
               <h6>{{$select->name  ?? 'None'}}</h6>

                @endif
	   @endforeach
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modelId_11" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_41 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
								 @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

   
                <th>QUESTION</th>
            
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
            


      <td>{{$gpa->question}}</td>
                

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_42 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					   @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

         
                <th>QUESTION</th>
                
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
          


      <td>{{$gpa->question}}</td>
               

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_43 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					   @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

            <th>MONTH</th>
                <th>QUESTION</th>
                <th>YEAR</th>
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_44 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					   @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
      
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
           


      <td>{{$gpa->question}}</td>
            

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>
        </div>

  
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId_12" style="height:38px;">
   @foreach($faculty_batch_45 as $gpa)
	  <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>
    @if($gpa->gpa && $gpa->question == 'punctuality')
               <h6>{{$select->name  ?? 'None'}}</h6>

                @endif
	   @endforeach
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modelId_12" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_45 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					   @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

            
                <th>QUESTION</th>
              
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
            


      <td>{{$gpa->question}}</td>
            

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_46 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					   @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

                <th>QUESTION</th>
              
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
             


      <td>{{$gpa->question}}</td>
       

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_47 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					   @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

           
                <th>QUESTION</th>
                
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
            


      <td>{{$gpa->question}}</td>
   
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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_48 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					   @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

            
                <th>QUESTION</th>
           
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>

      <td>{{$gpa->question}}</td>
         

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>
        </div>

		  
<div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_49 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					   @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

          
                <th>QUESTION</th>

                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
    


      <td>{{$gpa->question}}</td>
        

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






        </tr>
      @endforeach
    </table>
                </div>                </div>
                </div>


  
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>




  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId_16" style="height:38px;">
   @foreach($faculty_batch_50 as $gpa)
	  <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>
    @if($gpa->gpa && $gpa->question == 'punctuality')
               <h6>{{$select->name  ?? 'None'}}</h6>

                @endif
	   @endforeach 
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modelId_16" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_50 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					   @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

          
                <th>QUESTION</th>
              
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
             


      <td>{{$gpa->question}}</td>
          

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_51 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					   @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

          
                <th>QUESTION</th>
             
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
         


      <td>{{$gpa->question}}</td>
             

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_52 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					   @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="3"><h4 style="font-size:1.4rem;">year: {{$gpa->year}}</h4 style="font-size:1.4rem;"></td>
                <td colspan="4"><h4 style="font-size:1.4rem;">Month: {{$gpa->month}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

         
                <th>QUESTION</th>
           
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
            


      <td>{{$gpa->question}}</td>
         

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






        </tr>
      @endforeach
    </table>
                </div>


                <div class="col-md-6">
                <table class="table table-bordered table-hovered table-striped table-responsive">
          <tr>
          
          </tr>


          @foreach($faculty_batch_44 as $gpa)

              <?php
                 $select = faculty_feedback_gpa::join('users','users.id' ,'faculty_feedback_gpas.faculty_id')
                 ->where('faculty_feedback_gpas.batch', '=', $gpa->batch)
                 ->first();
                
                $std_count= feedback_form::where('batch' ,'=', $gpa->batch)->get();
                $count = $std_count->count();
            ?>

    <tr>
    @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Faculty: {{$select->name  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif


              </tr>
             <tr>
             @if($gpa->gpa && $gpa->question == 'punctuality')
                <td colspan="12"><h4 style="font-size:1.4rem;">Batch: {{$select->batch  ?? 'None'}}</h4 style="font-size:1.4rem;"></td>

                @endif
             </tr>
					   $faculty_batch_50 = gpa_calculate::where('batch' , '=' ,'2206F')
        ->orderby('id','DESC')->get();
@if($gpa->gpa && $gpa->question == 'punctuality')
<tr>
  
<td colspan="12">
<h5>Overall GPA:
{{number_format(($gpa->gpa),2)}} 
</h5>
</td>
</tr>

<tr>
<td colspan="12">
<h5>Number of Respondents:
{{$count}}
</h5>
</td>
</tr>

        
                <th>QUESTION</th>
            
                <th >GPA 4</th>
                <th>GPA 3</th>
                <th>GPA 2</th>
                <th>GPA 1</th>
                <th>SUM</th>
                <th>AVERAGE</th>
@endif
            <tr>
            


      <td>{{$gpa->question}}</td>
          

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






        </tr>
      @endforeach
    </table>
                </div>

              </div>
            </div>
        </div>

  
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
</center>
<br>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
$(document).on("click" , "#updatebtn" ,function(){
  //alert("clicked");
  var uid = $(this).attr("data-id");
  //console.log(uid);
  //$("updatemodal").modal("show");

  $.ajax({

    url:"/getdatadep_prof",
    type:"POST",
    data:"user_id_="+uid+
    "&_token={{csrf_token()}}",

    success:function(result)
    {
      $("#updatemodal").modal("show");
      var res = JSON.parse(result);
      $("#inputuser_id").val(res["id"]);
      $("#institueinput").val(res["institue"]);
      $("#field_input").val(res["field"]);
      $("#passinput").val(res["comp_year"]);  
    
    },

    error:function()
    {
      alert("error found");
    }

  });
});
});
  </script>  
  </body>
</html>
@endsection