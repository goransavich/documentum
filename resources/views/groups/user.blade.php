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
    		    <li><a href="/controlpanel/unit"><i class="fa fa-gear"></i> Jedinice</a></li>
    		    <li><a href="/controlpanel/inspection"><i class="fa fa-briefcase"></i> Inspekcije</a></li>
    		    <li class="active"><a href="/controlpanel/user"><i class="fa fa-user-plus"></i> Korisnici</a></li> 		  		  
			  
			    </ul>

      	</div>


      </div>

      <div class="row">
        <div class="col-md-12">
          <h3>Korisnici</h3>
        </div>
      </div>

      <div class="row">

        <div class="col-md-12">
          <div class="btn-group" role="group" aria-label="...">
            <button type="button" id="cp-user-button" class="btn btn-primary"><i class="fa fa-plus cp-fa"></i>
                Dodaj</button>
            <button type="submit"  form="get-user" name="form2" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i>
                Izmeni</button>
            
          </div>
        </div>

      </div>

      <div class="row">
    
          <div class="col-md-3">
            <form class="user-list-form" id="get-user" method="POST" action="">
              {{csrf_field()}}
                <select multiple class="form-control" name="get-user-from-users" required>
                  @foreach($users as $user)
                  <option value="{{$user->user_id}}" @if($user->active == 'unactive') class="unactive" @endif)>{{$user->name}}</option>
                  @endforeach
                </select>
            </form>
          </div>
      
        
           
          <div class="col-md-9 {{ $errors->has('username') ? ' show-div ' : 'hide-div' }}" id="cp-input-user-data">
              <form method="POST" action="">
                {{csrf_field()}}
                 <div class="col-md-6">
                    <label class="cp-input-label">Ime i prezime:</label>
                    <div class="form-group cp-input-fields">
                        
                        <input type="text" name="name" class="form-control" title="Unesi ime i prezime" required>
                    </div>
                    <label class="cp-input-label">Korisničko ime:</label>
                    <div class="form-group cp-input-fields {{ $errors->has('username') ? ' has-error' : '' }}">
                        
                        <input type="text" name="username" class="form-control" title="Unesi korisničko ime" required>
                    </div>
                    <small class="text-danger">{{ $errors->first('username') }}</small>
                    <div>
                      <label class="cp-input-label">Lozinka:</label>
                    </div>
                    <div class="form-group cp-input-fields">
                        
                        <input type="text" name="password" class="form-control" title="Unesi lozinku" required>
                    </div>

                    <label class="cp-input-label cp-input-label-select-department">Organ:</label>
                    
                    <div class="form-group cp-input-fields">

                        <select class="form-control" name="choose-dep-from-user" title="Izaberi organ" required>
                          <option value="" selected>Izaberi organ:</option>
                          @foreach($departments as $department)
                          <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                          @endforeach
                        </select>

                    </div>
                 </div>

                 <div class="col-md-6">
                    <label class="cp-input-label">Inspekcija:</label>
                    
                    <div class="form-group cp-input-fields">

                        <select class="form-control" name="choose-insp-from-user" title="Izaberi inspekciju" required>
                          <option value="" selected>Izaberi inspekciju:</option>
                          @foreach($inspections as $inspection)
                          <option value="{{$inspection->inspection_id}}">{{$inspection->inspection_name}}</option>
                          @endforeach
                        </select>

                    </div>

                    <label class="cp-input-label">Uloga:</label>
                    <div class="form-group">
                        <div class="radio">
                            <label class="cp-input-label">
                              <input type="radio" name="status" id="optionsRadios1" value="inspektor">
                              Inspektor
                            </label>
                          </div>

                          <div class="radio">
                            <label class="cp-input-label">
                              <input type="radio" name="status" id="optionsRadios2" value="nacelnik">
                              Načelnik inspekcije
                            </label>
                          </div>

                          <div class="radio">
                            <label class="cp-input-label">
                              <input type="radio" name="status" id="optionsRadios3" value="pisarnica">
                              Pisarnica
                            </label>
                          </div>


                          <div class="radio">
                            <label class="cp-input-label">
                              <input type="radio" name="status" id="optionsRadios4" value="administrator">
                              Administrator
                            </label>
                          </div>
                        
                    </div>

                    <div class="form-group">
                      <label class="cp-input-label">Status:</label>
                        <div class="radio">
                            <label class="cp-input-label">
                              <input type="radio" name="active" id="optionActive1" value="active">
                              Aktivan
                            </label>
                        </div>

                        <div class="radio">
                            <label class="cp-input-label">
                              <input type="radio" name="active" id="optionActive2" value="unactive">
                              Neaktivan
                            </label>
                        </div>


                    </div>

                    <div class="form-group">
                      <button type="submit" name="form1" class="btn btn-primary btn-block">Sačuvaj</button>
                    </div>

                 </div>
                 
             </form>
           </div>  


           <div class="col-md-9" id="cp-update-user-data" @if(isset($users_for_update)) style="display:block;" @else style="display: none;" @endif>
              <form method="POST" action="">
                {{csrf_field()}}
                @if(isset($users_for_update))
                 <input type="hidden" name="update_user_id" value="{{$users_for_update->user_id}}">
                 <div class="col-md-6">
                    <label class="cp-input-label">Ime i prezime:</label>
                    <div class="form-group cp-input-fields">
                        
                        <input type="text" name="update_name" class="form-control" title="Unesi ime i prezime" placeholder="{{$users_for_update->name}}">
                    </div>
                    <label class="cp-input-label">Korisničko ime:</label>
                    <div class="form-group cp-input-fields">
                        
                        <input type="text" name="update_username" class="form-control" title="Unesi korisničko ime" placeholder="{{$users_for_update->username}}">
                    </div>

                    <label class="cp-input-label">Lozinka:</label>
                    <div class="form-group cp-input-fields">
                        
                        <input type="text" name="update_password" class="form-control" title="Unesi lozinku">
                    </div>

                    <label class="cp-input-label cp-input-label-select-department">Organ:</label>
                    
                    <div class="form-group cp-input-fields">

                        <select class="form-control" name="choose-dep-from-user" title="Izaberi organ">
                          <option value="" selected>Izaberi organ:</option>
                          @foreach($departments as $department)
                          <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                          @endforeach
                        </select>

                    </div>
                 </div>

                 <div class="col-md-6">
                    <label class="cp-input-label">Inspekcija:</label>
                    
                    <div class="form-group cp-input-fields">

                        <select class="form-control" name="choose-insp-from-user" title="Izaberi inspekciju">
                          <option value="" selected>Izaberi inspekciju:</option>
                          @foreach($inspections as $inspection)
                          <option value="{{$inspection->inspection_id}}">{{$inspection->inspection_name}}</option>
                          @endforeach
                        </select>

                    </div>

                    <label class="cp-input-label">Uloga:</label>
                    <div class="form-group">
                        <div class="radio">
                            <label class="cp-input-label">
                              <input type="radio" name="update_status" id="optionsRadios1" value="inspektor">
                              Inspektor
                            </label>
                          </div>

                          <div class="radio">
                            <label class="cp-input-label">
                              <input type="radio" name="update_status" id="optionsRadios2" value="nacelnik">
                              Načelnik inspekcije
                            </label>
                          </div>

                          <div class="radio">
                            <label class="cp-input-label">
                              <input type="radio" name="update_status" id="optionsRadios3" value="pisarnica">
                              Pisarnica
                            </label>
                          </div>


                          <div class="radio">
                            <label class="cp-input-label">
                              <input type="radio" name="update_status" id="optionsRadios4" value="administrator">
                              Administrator
                            </label>
                          </div>
                        
                    </div>

                    <div class="form-group">
                      <label class="cp-input-label">Status:</label>
                        <div class="radio">
                            <label class="cp-input-label">
                              <input type="radio" name="update_active" id="optionActive1" value="active">
                              Aktivan
                            </label>
                        </div>

                        <div class="radio">
                            <label class="cp-input-label">
                              <input type="radio" name="update_active" id="optionActive2" value="unactive">
                              Neaktivan
                            </label>
                        </div>

                    </div>

                    <div class="form-group">
                      <button type="submit" name="form3" class="btn btn-primary btn-block">Sačuvaj</button>
                    </div>

                 </div>
                 
             </form>
             @endif
           </div>  

           
        

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
    $("#cp-user-button").click(function(){
        $("#cp-input-user-data").show();
        $("#cp-update-user-data").hide();
        $(".error-alert").hide();
    });
});

</script>

 
@endsection