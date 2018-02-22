<?php $__env->startSection('header'); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('services'); ?>

<div class="services-dashboard">
    <div class="container">
      <div class="row">
      	<div class="col-md-12">

      		<ul class="nav nav-tabs">

      			<li class="active"><a href="/controlpanel/department"><i class="fa fa-university"></i> Organi</a></li>
  				  <li><a href="/controlpanel/municipality"><i class="fa fa-building-o"></i> Opštine</a></li>
  				  <li><a href="/controlpanel/city"><i class="fa fa-cubes"></i> Mesta</a></li>
    		    <li><a href="/controlpanel/clas"><i class="fa fa-file-text-o"></i> Klase</a></li>
    		    <li><a href="/controlpanel/unit"><i class="fa fa-gear"></i> Jedinice</a></li>
    		    <li><a href="/controlpanel/inspection"><i class="fa fa-briefcase"></i> Inspekcije</a></li>
    		    <li><a href="/controlpanel/user"><i class="fa fa-user-plus"></i> Korisnici</a></li> 		  		  
			  
			    </ul>

      	</div>


      </div>
      <div class="row">
        <div class="col-md-12">
          <h3>Organi</h3>
        </div>
      </div>

      <div class="row">

        <div class="col-md-12">
          <div class="btn-group" role="group" aria-label="...">
            <button type="button" id="cp-department-button" class="btn btn-primary"><i class="fa fa-plus cp-fa"></i>
                Dodaj</button>
            <button type="submit" form="get-department" id="cp-update-department" class="btn btn-info" name="form2"><i class="fa fa-refresh" aria-hidden="true"></i>
                Izmeni</button>
            <button type="submit" class="btn btn-danger" form="get-department" name="form4"><i class="fa fa-trash" aria-hidden="true"></i>
                Obriši</button>
          </div>
        </div>

      </div>

      <div class="row error-row">
        <div class="col-md-6">
          <?php if(session('greska')): ?>
              <div class="alert alert-danger">
                  <?php echo e(session('greska')); ?>

              </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="row">
        <form class="user-list-form" id="get-department" method="POST" action="">
          <?php echo e(csrf_field()); ?>

          <div class="col-md-3">
            <select multiple class="form-control" name="dep-id-from-departments" required>
              <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($department->department_id); ?>"><?php echo e($department->department_label); ?>-<?php echo e($department->department_name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
        </form>

        <div class="col-md-3 <?php echo e($errors->has('department_label') ? ' show-div ' : 'hide-div'); ?>" id="cp-input-department-data">
            <form method="POST" action="">
              <?php echo e(csrf_field()); ?>

              <div class="form-group">
                
                  <label class="cp-input-label">Oznaka organa:</label>

                  <div class="form-group cp-input-fields <?php echo e($errors->has('department_label') ? ' has-error' : ''); ?>">

                     <input type="text" class="form-control" id="department_label" name="department_label" title="Unesi šifru organa" value="<?php echo e(old('department_label')); ?>" required>
                     
                     
                  </div>
                  <small class="text-danger"><?php echo e($errors->first('department_label')); ?></small>
              </div>
              <label class="cp-input-label">Naziv organa:</label>
              <div class="form-group cp-input-fields">
                 <input type="text" class="form-control" id="department_name" name="department_name" title="Unesi naziv organa" required>
              </div>

              <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block" name="form1">Sačuvaj</button>
              </div>
              
            </form>


        </div>
        
        <div class="col-md-3" id="cp-update-department-data" <?php if(isset($department_for_update)): ?> style="display:block;" <?php else: ?> style="display: none;" <?php endif; ?>>
          <?php if(isset($department_for_update)): ?>
            <form method="POST" action="">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" name="update_department_id" value="<?php echo e($department_for_update->department_id); ?>">
              <label class="cp-input-label">Oznaka organa:</label>
              <div class="form-group cp-input-fields">
                 <input type="text" class="form-control" placeholder="<?php echo e($department_for_update->department_label); ?>" disabled>
              </div>

              <label class="cp-input-label">Naziv organa:</label>
              <div class="form-group cp-input-fields">
                 <input type="text" class="form-control" id="update_department_name" name="update_department_name" placeholder="<?php echo e($department_for_update->department_name); ?>">
              </div>

              <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block" name="form3">Sačuvaj</button>
              </div>
              
            </form>
            <?php endif; ?>

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
    $("#cp-department-button").click(function(){
        $("#cp-input-department-data").show();
        $("#cp-update-department-data").hide();
        $(".error-alert").hide();
    });
});

</script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>