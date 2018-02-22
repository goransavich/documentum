@extends('layouts.master')

@section('header')

@include('layouts.header')

@endsection

@section('services')

<div class="services-dashboard">
    <div class="container">
      <div class="row">
      	<div class="col-md-12">

      		<ul class="nav nav-tabs">

      			<li><a href="/controlpanel/department"><i class="fa fa-university"></i> Organi</a></li>
  				  <li><a href="/controlpanel/municipality"><i class="fa fa-building-o"></i> Opštine</a></li>
  				  <li><a href="/controlpanel/city"><i class="fa fa-cubes"></i> Mesta</a></li>
    		    <li class="active"><a href="/controlpanel/clas"><i class="fa fa-file-text-o"></i> Klase</a></li>
    		    <li><a href="/controlpanel/unit"><i class="fa fa-gear"></i> Jedinice</a></li>
    		    <li><a href="/controlpanel/inspection"><i class="fa fa-briefcase"></i> Inspekcije</a></li>
    		    <li><a href="/controlpanel/user"><i class="fa fa-user-plus"></i> Korisnici</a></li> 		  		  
			  
			    </ul>

      	</div>


      </div>

      <div class="row">
        <div class="col-md-12">
          <h3>Klase</h3>
        </div>
      </div>

      <div class="row">

        <div class="col-md-3">
          <div class="btn-group" role="group" aria-label="...">
            <button type="button" id="cp-clas-button" class="btn btn-primary"><i class="fa fa-plus cp-fa"></i>
                Dodaj</button>
            <button type="submit" form="get-clas" name="form2" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i>
                Izmeni</button>
            <button type="submit" form="get-clas" class="btn btn-danger" name="form4"><i class="fa fa-trash" aria-hidden="true"></i>
                Obriši</button>
          </div>
        </div>

      </div>

      <div class="row error-row">
        <div class="col-md-6">
          @if (session('greska_klasa'))
              <div class="alert alert-danger">
                  {{ session('greska_klasa') }}
              </div>
          @endif
        </div>
      </div>

      <div class="row user-list-form">
          
              <div class="col-md-3">
                    <form class="clas-list-form" id="get-clas" method="POST" action="">
                        {{csrf_field()}}

                        <select multiple class="form-control" name="clas-id-from-classes" required>
                          @foreach ($classes as $clas)
                          <option value="{{$clas->clas_id}}">{{$clas->clas_label}}-{{$clas->clas_name}}</option>
                          @endforeach
                        </select>
                      </form>
              </div>
     

          <div class="col-md-9 {{ $errors->has('clas_label') ? ' show-div ' : 'hide-div' }}" id="cp-input-clas-data">
            
            <form method="POST" action="">
              {{csrf_field()}}
              <div class="col-md-6">
                  <label class="cp-input-label">Oznaka:</label>
                  <div class="form-group cp-input-fields {{ $errors->has('clas_label') ? ' has-error' : '' }}">
                     <input type="text" class="form-control" name="clas_label" title="Unesi oznaku klase" required>
                  </div>
                  <small class="text-danger">{{ $errors->first('clas_label') }}</small>

                  <div>
                    <label class="cp-input-label">Naziv:</label>
                  </div>
                  <div class="form-group cp-input-fields">
                     
                     <input type="text" class="form-control " name="clas_name" title="Unesi naziv klase" required>
                  </div>
              </div>

              <div class="col-md-6">
                  <span class="cp-input-label">Pripada organu:</span>

                  @foreach($departments as $department)
                  <div class="checkbox">
                      <label class="cp-input-label">
                        <input type="checkbox" name="belongstodepartment[]" value="{{$department->department_id}}">
                        {{$department->department_name}}
                      </label>
                  </div>
                  @endforeach
                  
                  <div class="form-group">
                      <button type="submit" name="form1" class="btn btn-primary btn-block">Sačuvaj</button>
                  </div>
              </div>
            </form>


        </div>

        <div class="col-md-9" id="cp-update-clas-data" @if(isset($clas_for_update)) style="display:block;" @else style="display: none;" @endif>
            @if(isset($clas_for_update))
            <form method="POST" action="">
              {{csrf_field()}}
              <div class="col-md-6">
                  <input type="hidden" name="update_clas_id" value="{{$clas_for_update->clas_id}}">
                  <label class="cp-input-label">Oznaka:</label>
                  <div class="form-group cp-input-fields">
                     <input type="text" class="form-control" name="update_clas_label" disabled value="{{$clas_for_update->clas_label}}">
                  </div>

                  
                  <div class="form-group cp-input-fields">
                     <label class="cp-input-label">Naziv:</label>
                     <input type="text" class="form-control" name="update_clas_name" title="Unesi naziv klase" placeholder="{{$clas_for_update->clas_name}}">
                  </div>
              </div>

              <div class="col-md-6">
                  <span class="cp-input-label">Pripada organu:</span>

                  @foreach($departments as $department)
                  <div class="checkbox">
                      <label class="cp-input-label">
                        <input type="checkbox" name="update_belongstodepartment[]" value="{{$department->department_id}}">
                        {{$department->department_name}}
                      </label>
                  </div>
                  @endforeach
                  
                  <div class="form-group">
                      <button type="submit" name="form3" class="btn btn-primary btn-block">Sačuvaj</button>
                  </div>
              </div>
            </form>
            @endif

        </div>


      

        <div class="row error-alert">

            <div class="col-md-3">
            </div>

            <div class="col-md-9">

              
              
            </div>
       </div>

   </div>   
      
</div>


<script>
  $(document).ready(function(){
    $("#cp-clas-button").click(function(){
        $("#cp-input-clas-data").show();
        $("#cp-update-clas-data").hide();
        $(".error-alert").hide();
    });
});

</script>
@endsection