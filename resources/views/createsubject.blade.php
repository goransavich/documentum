@extends('layouts.master')

@section('header')

@include('layouts.header')

@endsection

@section('services')
<div class="createsubject">
	<div class="container">
		<div class="row">
		    <div class="col-md-12 title-create-subject">
		        <h3>Unos novog predmeta</h3>
		    </div>
		</div>

		<div class="row">
			<form method="POST" action="/dashboard/create">
				{{csrf_field()}}
				<div class="col-md-6">
					<div class="labels col-md-4">
						<ul>

						  <li class="label-for-create-subject">Datum:</li>

						  <li class="label-for-create-subject">Opština:</li>
											
						  <li class="label-for-create-subject">Mesto:</li>
						
						  <li class="label-for-create-subject">Organ:</li>
						
						  <li class="label-for-create-subject">Klasa:</li>
						
						  <li class="label-for-create-subject">Jedinica:</li>
						
						  <li class="label-for-create-subject">Podnosilac:</li>
						
						  
						</ul>
					</div>

					<div class="inputdata col-md-8">
						<div class="inputfield-date">
							<input name="subject_date" type="text" value="{{$today_date}}" disabled>
						</div>

						<div class="inputfields-create-subject">
							<select class="form-control" id="choose-mun-from-create-subject" name="choose-mun-from-create-subject" required>
								<option value="" selected>--- Izaberi opstinu ---</option>
								@foreach($municipalities as $municipality)
								<option value="{{$municipality->municipality_id}}">{{$municipality->municipality_name}}</option>
								@endforeach
							</select>
						</div>

						<div class="inputfields-create-subject">
							<select class="form-control" id="choose-city-from-create-subject" name="choose-city-from-create-subject" required>
								
								
							</select>
						</div>

						<div class="inputfields-create-subject">
							<select class="form-control" name="choose-dep-from-create-subject" id="choose-dep-from-create-subject" required>
								<option value="" selected></option>
								@foreach($departments as $department)
								<option value="{{$department->department_id}}">{{$department->department_name}}</option>
								@endforeach
							</select>
						</div>

						<div class="inputfields-create-subject">
							<select class="form-control" name="choose-clas-from-create-subject" id="choose-clas-from-create-subject" required>
								
								
							</select>
						</div>

						<div class="inputfields-create-subject">
							<select class="form-control" name="choose-unit-from-create-subject" required>
								
							</select>
						</div>

						<div class="inputfields-create-subject">
							<input type="text" class="input-for-create-subject" name="owner" required>
						</div>

						
					</div>
				</div>

				<div class="col-md-6">
					<div class="labels col-md-4">
						<ul>
						  
						
						  <li class="label-for-create-subject">Inspektor:</li>
						
						  <li class="label-for-create-subject">Subjekt kontrole:</li>
						
						  <li class="label-for-create-subject">Vrsta predmeta:</li>
						
						  <li class="label-for-create-subject">Sadržaj:</li>
						</ul>
					</div>

					<div class="inputdata col-md-8">

						<div class="inputfields-create-subject">
							<select class="form-control" name="choose-user-from-create-subject" required>
								<option value="" selected></option>
								@foreach($users as $user)
								<option value="{{$user->user_id}}">{{$user->name}}</option>
								@endforeach
							</select>
						</div>

						<div class="inputfields-create-subject">
							<input type="text" class="input-for-create-subject" name="controlled">
						</div>

						<div class="inputfields-create-subject" >
							<select class="form-control" name="choose-subjecttype-from-create-subject" required>
								<option value="" selected>Izaberi vrstu predmeta:</option>
								<option value="0 - stvarni i lični predmeti">0 - stvarni i lični predmeti</option>
								<option value="1 - upravni postupak prvi stepen">1 - upravni postupak prvi stepen</option>
								<option value="2 - upravni postupak drugi stepen">2 - upravni postupak drugi stepen</option>
								<option value="3 - upravni postupak po službenoj dužnosti prvi stepen">3 - upravni postupak po službenoj dužnosti prvi stepen</option>
								<option value="4 - upravni postupak po službenoj dužnosti drugi stepen">4 - upravni postupak po službenoj dužnosti drugi stepen</option>
								<option value="5 - upravni postupak vanredni pravni lek prvi stepen">5 - upravni postupak vanredni pravni lek prvi stepen</option>
								<option value="6 - upravni postupak vanredni pravni lek drugi stepen">6 - upravni postupak vanredni pravni lek drugi stepen</option>
							</select>
						</div>

						<div class="inputfields-create-subject">
							<textarea class="input-for-create-subject" name="title" required>
								
							</textarea>

						</div>

						<button type="submit" class="btn btn-primary btn-lg button-create-subject">Potvrdi unos</button>

					</div>
				</div>
			
			</form>
		
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	

	$(document).ready(function() {
    $("#choose-mun-from-create-subject").on('change',function() {
        
        var munID = $(this).val();
            
        $.ajax({
        	type: 'get',
        	url: "{!!URL::to('getmunicipality')!!}",
        	data: {'id':munID},
        	
        	success: function(cities){
        		

        		$('select[name="choose-city-from-create-subject"]').empty();

        		$('select[name="choose-city-from-create-subject"]').append('<option value="0" selected disabled>-- Izaberi mesto --</option>');
        		
        		for(var i=0; i<cities.length; i++){

        			$('select[name="choose-city-from-create-subject"]').append('<option value="'+ cities[i].city_id +'">' + cities[i].city_name + '</option>');
        		}
        		
        		
        	},
        	error: function(){
        		console.log("failure");
        	}

        });


        
        
    });
});

</script>

<script>
	

	$(document).ready(function() {
    $("#choose-dep-from-create-subject").on('change',function() {
        
        var depID = $(this).val();
        
        $.ajax({
        	type: 'get',
        	url: "{!!URL::to('getClas')!!}",
        	data: {'id':depID},
        	

        	success: function(clases){
        		

        		$('select[name="choose-clas-from-create-subject"]').empty();

        		$('select[name="choose-clas-from-create-subject"]').append('<option value="0" selected disabled>-- Izaberi klasu --</option>');
        		
        		for(var i=0; i<clases.length; i++){

        			$('select[name="choose-clas-from-create-subject"]').append('<option value="'+ clases[i].clas_id +'">' + clases[i].clas_label+ "-" +clases[i].clas_name + '</option>');
        		}
        		
        		
        	},
        	error: function(){
        		console.log("nije dobro");
        	}

        });


        
        
    });
});

</script>



<script>
	

	$(document).ready(function() {
    $("#choose-dep-from-create-subject").on('change',function() {
        
        var depID = $(this).val();
        

        $.ajax({
        	type: 'get',
        	url: "{!!URL::to('getUnit')!!}",
        	data: {'id':depID},


        	
        	success: function(units){
        		

        		$('select[name="choose-unit-from-create-subject"]').empty();

        		$('select[name="choose-unit-from-create-subject"]').append('<option value="0" selected disabled>-- Izaberi jedinicu --</option>');
        		
        		for(var i=0; i<units.length; i++){

        			$('select[name="choose-unit-from-create-subject"]').append('<option value="'+ units[i].unit_id +'">' + units[i].unit_label+" "+units[i].unit_name + '</option>');
        		}
        		
        		
        	},
        	error: function(){
        		console.log("failure");
        	}

        });


        
        
    });
});

</script>
@endsection

