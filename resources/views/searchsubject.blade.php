@extends('layouts.master')

@section('header')

@include('layouts.header')

@endsection

@section('services')

<div class="createsubject">

	<div class="container">
		<form method="POST" action="">
			{{csrf_field()}}
		<h2>Pretraga predmeta</h2>

		<div class="row row-search">
			
				<div class="inputfields-search-subject">
					<select class="form-control" name="choose-dep-from-create-subject" id="choose-dep-from-search-subject">
						<option value="" selected></option>
						@foreach($departments as $department)
						<option value="{{$department->department_id}}">{{$department->department_label}}</option>
						@endforeach
					</select>
				</div>

				<div class="interpunction">
					<span> - </span>
				</div>


				<div class="inputfields-search-subject">
					<select class="form-control" name="choose-clas-from-search-subject" id="choose-clas-from-search-subject">
						<option value="" selected></option>
						@foreach($clases as $clas)
						<option value="{{$clas->clas_id}}">{{$clas->clas_label}}</option>
						@endforeach
					</select>
				</div>

				<div class="interpunction">
					<span> - </span>
				</div>

				<div class="inputfields-search-subject">

					<input type="text" class="input-search-number-subject" name="number_of_subject">

				</div>

				<div class="interpunction">
					<span> / </span>
				</div>				
				

				<div class="inputfields-search-subject">

					<select class="form-control" name="choose-year-from-search-subject">
						<option value="{{$current_year}}" selected>{{$current_year}}</option>
						@for($i=2014; $i<$current_year; $i++)
						<option value="{{$i}}">{{$i}}</option>
						@endfor
						
					</select>

				</div>

				<div class="interpunction">
					<span> - </span>
				</div>

				<div class="inputfields-search-subject">
					<select class="form-control" name="choose-unit-from-search-subject">
						<option value="" selected></option>	
						@foreach($units as $unit)
						<option value="{{$unit->unit_id}}">{{$unit->unit_label." - ".$unit->unit_name}}</option>
						@endforeach
					</select>
				</div>
				<div class="inputfields-search-subject search-button">
					<button type="submit" class="btn btn-primary search-subject-button"><i class="fa fa-search" aria-hidden="true"></i>
					<span> &nbsp;Pretraži</span></button>
				</div>

			
		</div>

		<div class="row row-search">
			
			<div class="inputfields-search-subject">

					<select class="form-control" name="choose-inspektor-from-search-subject">
						<option value="" selected>Inspektor</option>
						@foreach($users as $user)
						<option value="{{$user->user_id}}">{{$user->name}}</option>
						@endforeach
					</select>

			</div>

			<div class="inputfields-search-subject input-search">

					<input type="text" class="input-search-number-subject input-search-title" name="choose-title-from-search-subject" placeholder="Sadržaj">

			</div>

			<div class="inputfields-search-subject archive-search">

					<select class="form-control" name="choose-archive-from-search-subject">
						<option value="" selected>Stanje</option>
						<option value="aktivan">Aktivan</option>
						<option value="arhiviran">Arhiviran</option>
						
					</select>

			</div>

		</div>
		</form>
		@if(isset($subjects))
		<div class="row row-search">

			<table>
			  <tr class="search-table-header">
			  	<th class="search-table-first"></th>
			    <th class="search-table-second">Broj predmeta</th>
			    <th class="search-table-third">Podnosilac</th>
			    <th class="search-table-fourth">Inspektor</th>
			    <th class="search-table-fifth">Sadržaj</th>
			    <th class="search-table-sixth">Stanje</th>
			  </tr>
			  @foreach($subjects as $subject)
			  <tr class="table-row-content">
			  	<td class="search-table-first"><a class="open-search-button" href="/dashboard/create/{{$subject->subject_id}}">Otvori</a></td>
			    <td class="search-table-second">{{$subject->departments['department_label']."-".$subject->classes['clas_label']."-".$subject->ord_number."/".$subject->ord_year."-".$subject->units['unit_label']}}</td>
			    <td class="search-table-third">{{$subject->owner}}</td>
			    
			    <td class="search-table-fourth">{{$subject->user['name']}}</td>
			    
			    <td class="search-table-fifth">{{$subject->title}}</td>
			    <td class="search-table-sixth">{{$subject->archive}}</td>
			  </tr>
			  @endforeach
			  
		    </table> 



		</div>
		@endif
	</div>
</div>

@endsection



