@extends('layouts.master')

@section('header')

@include('layouts.header')

@endsection

@section('services')

<div class="createsuccess">

	<div class="container">

		<div class="row">

			<div class="col-md-2">
			
			</div>

			<div class="col-md-8">
				<div class="row">
			
					<div class="alert alert-success">
						
						Uspešno kreiran predmet broj: <strong> @if(isset($ord_number)){{$dep_label."-".$clas_label."-".$ord_number."/".$ord_year."-".$unit_label}} @endif </strong>

					</div>

				</div>

				<div class="row">

					<div class="btn-group btn-group-justified">
					  <div class="btn-group">
					    <a href="/dashboard/create"><button type="button" class="btn btn-primary">Unos novog predmeta</button></a>
					  </div>
					  <div class="btn-group">
					    <a href="/dashboard/create/{{$subjects->subject_id}}"><button type="button" class="btn btn-success">Idi u ovaj predmet</button></a>
					  </div>
					  <div class="btn-group">
					    <a href="/dashboard"><button type="button" class="btn btn-info">Početna strana</button></a>
					  </div>
					</div>

				</div>

			</div>

			<div class="col-md-2">
			
			</div>


		</div>


	</div>



</div>


@endsection