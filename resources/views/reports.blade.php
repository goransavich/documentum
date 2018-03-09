@extends('layouts.master')

@section('header')

@include('layouts.header')

@endsection

@section('services')

<div class="createsubject">
	<div class="container">
		<div class="row">
		    <div class="col-md-12 title-create-subject">
		        <h3>Izveštaji</h3>
		    </div>
		</div>

		<div class="row">

			<form method="POST" action="">
				{{csrf_field()}}

				<div class="col-md-4">

					<div class="btn-group reports-buttons">
					  <button type="submit" name="department_report" class="btn btn-primary">Organi</button>
					  <button type="submit" name="clas_report" class="btn btn-success">Klase</button>
					  <button type="submit" name="inspektor_report" class="btn btn-info">Inspektori</button>
					  
					</div>
				</div>

				<div class="col-md-2">
					<div>
						<select class="form-control select-year-reports" name="choose-year-from-reports">
							<option value="{{$current_year}}" selected>{{$current_year}}</option>
							@for($i=2014; $i<$current_year; $i++)
							<option value="{{$i}}">{{$i}}</option>
							@endfor
							
						</select>
					</div>
				</div>
			</form>
		</div>
		@if(isset($result_department))
		<div class="row report_tables">
			
			<table>
				  <tr class="history_table_header">
				    <th class="history_table_first">ORGAN</th>
				    <th class="report_table_second">AKTIVNI</th>
				    <th class="report_table_second">ARHIVIRANI</th>
				    <th class="report_table_second">UKUPNO</th>
				  </tr>

				  @if(count($result_department) == 0)
				  <h4>Nema podataka po trazenom kriterijumu</h4>
				  @endif

				  @foreach($result_department as $results)
				  <tr>
				    <td class="report_table_first">{{$results->departments->department_label. " - ".$results->departments->department_name}}</td>
				    <td class="report_table_second">{{$results->total_aktivan}}</td>
				    <td class="report_table_second">{{$results->total_arhiviran}}</td>
				    <td class="report_table_second">{{$results->total_aktivan+$results->total_arhiviran}}</td>
				  </tr>

				  @endforeach

				  

			</table> 

		</div>
		@endif

		@if(isset($result_clas))
		<div class="row report_tables">
			
			<table>
				  <tr class="history_table_header">
				    <th class="history_table_first">KLASA</th>
				    <th class="report_table_second">AKTIVNI</th>
				    <th class="report_table_second">ARHIVIRANI</th>
				    <th class="report_table_second">UKUPNO</th>
				  </tr>

				  @if(count($result_clas) == 0)
				  <h4>Nema podataka po trazenom kriterijumu</h4>
				  @endif

				  @foreach($result_clas as $results)
				  <tr>
				    <td class="report_table_first">{{$results->classes->clas_label. " - ".$results->classes->clas_name}}</td>
				    <td class="report_table_second">{{$results->total_aktivan}}</td>
				    <td class="report_table_second">{{$results->total_arhiviran}}</td>
				    <td class="report_table_second">{{$results->total_aktivan+$results->total_arhiviran}}</td>
				  </tr>

				  @endforeach

				  

			</table> 

		</div>
		@endif

		@if(isset($result_user))
		<div class="row report_tables">
			
			<table>
				  <tr class="history_table_header">
				    <th class="history_table_first">INSPEKTOR</th>
				    <th class="report_table_second">AKTIVNI</th>
				    <th class="report_table_second">ARHIVIRANI</th>
				    <th class="report_table_second">UKUPNO</th>
				  </tr>

				  @if(count($result_user) == 0)
				  <h4>Nema podataka po trazenom kriterijumu</h4>
				  @endif

				  @foreach($result_user as $results)
				  <tr>
				    <td class="report_table_first">{{$results->user->name}}</td>
				    <td class="report_table_second">{{$results->total_aktivan}}</td>
				    <td class="report_table_second">{{$results->total_arhiviran}}</td>
				    <td class="report_table_second">{{$results->total_aktivan+$results->total_arhiviran}}</td>
				  </tr>

				  @endforeach

				  

			</table> 

		</div>
		@endif

	</div>

</div>

@endsection
