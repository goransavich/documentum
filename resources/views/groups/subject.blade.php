@extends('layouts.master')

@section('header')

@include('layouts.header')

@endsection

@section('services')

<div class="createsucess">

	<div class="container">

		<div class="row createsubject">

			<div class="col-md-4">
				<div class="subject-title-label">
					Predmet broj:<strong> {{$dep->department_label."-".$clas->clas_label."-".$subject->ord_number."/".$subject->ord_year."-".$unit->unit_label}} </strong>
				</div>
			</div>

			<div class="col-md-4">

			</div>

			<div class="col-md-4">
				<div class="btn-group btn-group-justified">
				  @if(Auth::user()->hasRole(['pisarnica', 'administrator']))
				  <div class="btn-group">
				    <button type="submit" form="update-subject-data" name="update_subject_button" class="btn btn-primary">Arhiviraj</button>
				  </div>
				  <div class="btn-group">
				    <a target="_blank" href="/download/{{$subject->subject_id}}"><button type="button" class="btn btn-success">Štampa</button></a>
				  </div>
				  @endif
				</div>
			</div>

		</div>

		<div class="createsubject-nav">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" id="myTab">
			  <li class="{{session('success') ? '' : 'active'}}"><a href="#podaci" data-toggle="tab">PODACI</a></li>
			  <li class="{{session('success') ? 'active' : ''}}"><a href="#dms" data-toggle="tab">DMS</a></li>
			  <li><a href="#istorija" data-toggle="tab">ISTORIJA PREDMETA</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content createsubject createsubject-tabpanes">
			  <div class="tab-pane {{session('success') ? '' : 'active'}}" id="podaci">
			  	<form method="POST" action="" id="update-subject-data">
			  		
			  		{{csrf_field()}}

			  		{{ method_field('PATCH') }}
				  	<div>
					  	<label class="createsubject-tabpanes-labels">Datum:</label>
					  	<input type="text" class="createsubject-tabpanes-inputs" value="{{$dep->created_at}}" disabled>
				    </div>

				    

				    <div>
					  	<label class="createsubject-tabpanes-labels">Opština:</label>
					  	<select class="createsubject-tabpanes-inputs" id="mun-from-createsubject" name="mun-from-createsubject">
							<option value="{{$municipality->municipality_id}}" selected>{{$municipality->municipality_name}}</option>
									@foreach($municipalities as $mun)
							<option value="{{$mun->municipality_id}}">{{$mun->municipality_name}}</option>
									@endforeach
						</select>
					</div>

					<div>
						<label class="createsubject-tabpanes-labels">Mesto:</label>
						
						<select class="createsubject-tabpanes-inputs" id="city-from-createsubject" name="city-from-createsubject">
							<option value="{{$city->city_id}}" selected>{{$city->city_name}}</option>
							@foreach($cities as $cit)
							<option value="{{$cit->city_id}}">{{$cit->city_name}}</option>
							@endforeach
						</select>
					</div>

					<div>
						<label class="createsubject-tabpanes-labels">Organ:</label>
						<input type="text" class="createsubject-tabpanes-inputs" value="{{$dep->department_label.' - '.$dep->department_name}}" disabled>
					</div>

					<div>
						<label class="createsubject-tabpanes-labels">Klasa:</label>
						<input type="text" class="createsubject-tabpanes-inputs" value="{{$clas->clas_label.' - '.$clas->clas_name}}" disabled>

					</div>

					<div>
						<label class="createsubject-tabpanes-labels">Jedinica:</label>
						
						<select class="createsubject-tabpanes-inputs" id="unit-from-createsubject" name="unit-from-createsubject">
							<option value="{{$unit->unit_id}}" selected>{{$unit->unit_label.' - '.$unit->unit_name}}</option>
							@foreach($units as $uni)
							<option value="{{$uni->unit_id}}">{{$uni->unit_label.' - '.$uni->unit_name}}</option>
							@endforeach
						</select>
					</div>
						
					<div>
						<label class="createsubject-tabpanes-labels">Podnosilac:</label>
						<input type="text" class="createsubject-tabpanes-inputs" name="owner" value="{{$subject->owner}}">
					</div>

					<div>
						<label class="createsubject-tabpanes-labels">Inspektor:</label>
						<select class="createsubject-tabpanes-inputs" id="user-from-createsubject" name="user-from-createsubject">
							<option value="{{$user->user_id}}" selected>{{$user->name}}</option>
							@foreach($users as $inspektor)
							<option value="{{$inspektor->user_id}}">{{$inspektor->name}}</option>
							@endforeach
						</select>

					</div>

					<div>
						<label class="createsubject-tabpanes-labels">Subjekt kontrole:</label>
						<input type="text" class="createsubject-tabpanes-inputs" name="controlled-from-createsubject" placeholder="{{$subject->controlled}}" disabled>

					</div>

					<div>
						<label class="createsubject-tabpanes-labels">Vrsta predmeta:</label>
						
						<select class="createsubject-tabpanes-inputs" name="subjecttype-from-createsubject">
								<option value="{{$subject->subjecttype}}" selected>{{$subject->subjecttype}}</option>
								<option value="0 - stvarni i lični predmeti">0 - stvarni i lični predmeti</option>
								<option value="1 - upravni postupak prvi stepen">1 - upravni postupak prvi stepen</option>
								<option value="2 - upravni postupak drugi stepen">2 - upravni postupak drugi stepen</option>
								<option value="3 - upravni postupak po službenoj dužnosti prvi stepen">3 - upravni postupak po službenoj dužnosti prvi stepen</option>
								<option value="4 - upravni postupak po službenoj dužnosti drugi stepen">4 - upravni postupak po službenoj dužnosti drugi stepen</option>
								<option value="5 - upravni postupak vanredni pravni lek prvi stepen">5 - upravni postupak vanredni pravni lek prvi stepen</option>
								<option value="6 - upravni postupak vanredni pravni lek drugi stepen">6 - upravni postupak vanredni pravni lek drugi stepen</option>
							</select>
					</div>

					<div>
						<label class="createsubject-tabpanes-labels">Sadržaj:</label>
						<input type="text" class="createsubject-tabpanes-inputs" name="title-from-createsubject" value="{{$subject->title}}">
							
						
					</div>

					

			  </form>
			  </div>
			  <div class="tab-pane {{session('success') ? 'active' : ''}}" id="dms">
			  	<div class="row">
			  		<div class="col-md-6">
			  			<div>
			  				<label>Dokumenti u ovom predmetu:</label>
			  			</div>
			  			<div>
			  				
				  			  @foreach($documents as $document)
				  			  	<div class="row row-display-documents">
									  <div class="col-md-6">
									  	@php
									  		switch($document->file_extension){
									  			case "pdf":
									    		echo "<i class='fa fa-file-pdf-o' aria-hidden='true'></i>";
									    		break;

									    		case "doc":
									    		echo "<i class='fa fa-file-word-o'></i>";
									    		break;

									    		case "docx":
									    		echo "<i class='fa fa-file-word-o'></i>";
									    		break;

									    		case "bmp":
									    		echo "<i class='fa fa-file-image-o'></i>";
									    		break;

									    		case "jpg":
									    		echo "<i class='fa fa-file-image-o'></i>";
									    		break;

									    		case "jpeg":
									    		echo "<i class='fa fa-file-image-o'></i>";
									    		break;

									    		case "xls":
									    		echo "<i class='fa fa-file-excel-o'></i>";
									    		break;

									    		case "xlsx":
									    		echo "<i class='fa fa-file-excel-o'></i>";
									    		break;

									    		default:
									    		echo "<i class='fa fa-file-o'></i>";
									    }

									    @endphp
											{{$document->original_name}}
									  </div>
									  <div class="col-md-6">
											<a target="_blank" href="/dashboard/show/{{$document->document_id}}"><button class="button-open"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
											Otvori</button></a>

											<form class="form_for_delete_documents" name="delete_document" method="POST" action="">
												{{method_field('DELETE')}}
												{{csrf_field()}}
												<input type="hidden" name="id_for_delete" value="{{$document->document_id}}">
												<button type="submit" class="button-delete"><i class="fa fa-times" aria-hidden="true"></i>
												Obriši</button>
											</form>
									 </div>
								</div> 
							  @endforeach
							  
						
			  			</div>
			  			<hr>
			  			<div>
			  				<form method="POST" action="" enctype="multipart/form-data">
			  					{{csrf_field()}}
							  <div class="form-group form-upload-documents">
							    <label for="exampleFormControlFile1">Unesite dokumente:</label>
							    <input type="file" name="upload_documents[]" class="form-control-file input-update-subject" id="exampleFormControlFile1" accept=".doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document, .pdf, .png, .jpg, .jpeg, image/*" multiple>
							    <button type="submit" name="save_documents" class="btn btn-primary">Snimi dokumente</button>
							  </div>
							</form>
			  				
			  			</div>

			  		</div>

			  		<div class="col-md-6">
			  			
			  		</div>

			  		
			  		
			  	</div>
			  </div>
			  
			  <div class="tab-pane" id="istorija">

			  	<h2>Istorija predmeta</h2>

			  	 <table>
					  <tr class="history_table_header">
					    <th class="history_table_first">VREME</th>
					    <th class="history_table_second">KORISNIK</th>
					    <th class="history_table_third">OPIS</th>
					  </tr>
					  @foreach($subject_history as $history)
					  <tr>
					    <td class="history_table_first">{{$history->created_at}}</td>
					    <td class="history_table_second">{{$history->name_of_user}}</td>
					    <td class="history_table_third">{{$history->action}}</td>
					  </tr>

					  @endforeach
				 </table> 

			  </div>
			  
			</div>
		</div>

	</div>


</div>

<script>
  $('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
})
</script>


@endsection