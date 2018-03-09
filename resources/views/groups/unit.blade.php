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
    		    <li><a href="/controlpanel/clas"><i class="fa fa-file-text-o"></i> Klase</a></li>
    		    <li class="active"><a href="/controlpanel/unit"><i class="fa fa-gear"></i> Jedinice</a></li>
    		    <li><a href="/controlpanel/inspection"><i class="fa fa-briefcase"></i> Inspekcije</a></li>
    		    <li><a href="/controlpanel/user"><i class="fa fa-user-plus"></i> Korisnici</a></li> 		  		  
			  
			    </ul>

      	</div>


      </div>
      <div class="row">
        <div class="col-md-12">
          <h3>Jedinice</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="btn-group" role="group" aria-label="...">
            <button type="button" id="cp-unit-button" class="btn btn-primary"><i class="fa fa-plus cp-fa"></i>
                Dodaj</button>
            <button type="submit" form="get-unit" name="form3" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i>
                Izmeni</button>
            <button type="submit" class="btn btn-danger" name="form5" form="get-unit"><i class="fa fa-trash" aria-hidden="true"></i>
                Obriši</button>
          </div>
        </div>

        <div class="col-md-3 cp-input-clas-choose-department">

          <form id="get-department-in-unit" method="POST" action="">
            {{csrf_field()}}
            <select class="form-control" id="choose-dep-in-unit" name="choose-dep-in-unit" required>
              <option value="" selected>Izaberi organ:</option>
              @foreach($departments as $department)
              <option value="{{$department->department_id}}">{{$department->department_name}}</option>
              @endforeach
            </select>
            
          </form>

        </div>

        <div class="col-md-3">
          <button form="get-department-in-unit" type="submit" id="cp-unit-button" name="form1" class="btn btn-primary"><i class="fa fa-search"></i>
                Pronađi</button>
        </div>
      </div>

      <div class="row user-list-form">

          
              <div class="col-md-3">
                <form class="unit-list-form" id="get-unit" method="POST" action="">
                {{csrf_field()}}

                    <select multiple class="form-control" name="unit-id-from-units" id="unit-list" required>
                      @if(isset($list_of_units))

                        @foreach($list_of_units as $unit)

                          <option value="{{$unit->unit_id}}">{{$unit->unit_label}}-{{$unit->unit_name}}</option>

                        @endforeach

                      @endif
                      
                      
                    </select>
                </form>
              </div>
          

            <div class="col-md-3" id="cp-input-unit-data">
              <form method="POST" action="">
               {{csrf_field()}} 
                  <div class="form-group">

                      <select class="form-control" name="choose-dep-for-unit" required>
                          <option value="" selected>Izaberi organ:</option>
                          @foreach($departments as $department)
                          <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                          @endforeach
                        </select>

                  </div>


                  <label class="cp-input-label">Oznaka:</label>
                  <div class="form-group cp-input-fields">
                     <input type="text" class="form-control" name="unit_label" title="Unesi šifru jedinice" required>
                  </div>
                  
                  <label class="cp-input-label">Naziv:</label>
                  <div class="form-group cp-input-fields">
                     <input type="text" class="form-control" name="unit_name" title="Unesi naziv jedinice" required> 
                  </div>

                  <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block" name="form2">Sačuvaj</button>
                  </div>
              
            </form>


           </div>

           <div class="col-md-3" id="cp-update-unit-data" @if(isset($unit_for_update)) style="display:block;" @else style="display: none;" @endif>
            @if(isset($unit_for_update))
              <form method="POST" action="">
               {{csrf_field()}} 
                  <input type="hidden" name="update_unit_id" value="{{$unit_for_update->unit_id}}">
                  


                  <label class="cp-input-label">Oznaka:</label>
                  <div class="form-group cp-input-fields {{ $errors->has('unit_label') ? ' has-error' : '' }}">
                     <input type="text" class="form-control" name="update_unit_label" title="Unesi šifru jedinice" placeholder="{{$unit_for_update->unit_label}}">
                  </div>
                  <small class="text-danger">{{ $errors->first('unit_label') }}</small>
                  <label class="cp-input-label">Naziv:</label>
                  <div class="form-group cp-input-fields">
                     <input type="text" class="form-control" name="update_unit_name" title="Unesi naziv jedinice" placeholder="{{$unit_for_update->unit_name}}"> 
                  </div>

                  <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block" name="form4">Sačuvaj</button>
                  </div>
              
              </form>
            @endif

           </div>




        </div>

        <div class="row error-alert">
            <div class="col-md-3">
            </div>

            <div class="col-md-3">

              
              
            </div>
        </div>

      
      
  </div>

 </div>
<script>
  $(document).ready(function(){
    $("#cp-unit-button").click(function(){
        $("#cp-input-unit-data").show();
        $("#cp-update-unit-data").hide();
        $(".error-alert").hide();
    });
});

</script>


@endsection