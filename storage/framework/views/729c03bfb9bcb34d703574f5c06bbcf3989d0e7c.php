<?php $__env->startSection('header'); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('services'); ?>

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
          <?php if(session('greska_klasa')): ?>
              <div class="alert alert-danger">
                  <?php echo e(session('greska_klasa')); ?>

              </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="row user-list-form">
          
              <div class="col-md-3">
                    <form class="clas-list-form" id="get-clas" method="POST" action="">
                        <?php echo e(csrf_field()); ?>


                        <select multiple class="form-control" name="clas-id-from-classes" required>
                          <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($clas->clas_id); ?>"><?php echo e($clas->clas_label); ?>-<?php echo e($clas->clas_name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </form>
              </div>
     

          <div class="col-md-9 <?php echo e($errors->has('clas_label') ? ' show-div ' : 'hide-div'); ?>" id="cp-input-clas-data">
            
            <form method="POST" action="">
              <?php echo e(csrf_field()); ?>

              <div class="col-md-6">
                  <label class="cp-input-label">Oznaka:</label>
                  <div class="form-group cp-input-fields <?php echo e($errors->has('clas_label') ? ' has-error' : ''); ?>">
                     <input type="text" class="form-control" name="clas_label" title="Unesi oznaku klase" required>
                  </div>
                  <small class="text-danger"><?php echo e($errors->first('clas_label')); ?></small>

                  <div>
                    <label class="cp-input-label">Naziv:</label>
                  </div>
                  <div class="form-group cp-input-fields">
                     
                     <input type="text" class="form-control " name="clas_name" title="Unesi naziv klase" required>
                  </div>
              </div>

              <div class="col-md-6">
                  <span class="cp-input-label">Pripada organu:</span>

                  <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="checkbox">
                      <label class="cp-input-label">
                        <input type="checkbox" name="belongstodepartment[]" value="<?php echo e($department->department_id); ?>">
                        <?php echo e($department->department_name); ?>

                      </label>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                  <div class="form-group">
                      <button type="submit" name="form1" class="btn btn-primary btn-block">Sačuvaj</button>
                  </div>
              </div>
            </form>


        </div>

        <div class="col-md-9" id="cp-update-clas-data" <?php if(isset($clas_for_update)): ?> style="display:block;" <?php else: ?> style="display: none;" <?php endif; ?>>
            <?php if(isset($clas_for_update)): ?>
            <form method="POST" action="">
              <?php echo e(csrf_field()); ?>

              <div class="col-md-6">
                  <input type="hidden" name="update_clas_id" value="<?php echo e($clas_for_update->clas_id); ?>">
                  <label class="cp-input-label">Oznaka:</label>
                  <div class="form-group cp-input-fields">
                     <input type="text" class="form-control" name="update_clas_label" disabled value="<?php echo e($clas_for_update->clas_label); ?>">
                  </div>

                  
                  <div class="form-group cp-input-fields">
                     <label class="cp-input-label">Naziv:</label>
                     <input type="text" class="form-control" name="update_clas_name" title="Unesi naziv klase" placeholder="<?php echo e($clas_for_update->clas_name); ?>">
                  </div>
              </div>

              <div class="col-md-6">
                  <span class="cp-input-label">Pripada organu:</span>

                  <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="checkbox">
                      <label class="cp-input-label">
                        <input type="checkbox" name="update_belongstodepartment[]" value="<?php echo e($department->department_id); ?>">
                        <?php echo e($department->department_name); ?>

                      </label>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                  <div class="form-group">
                      <button type="submit" name="form3" class="btn btn-primary btn-block">Sačuvaj</button>
                  </div>
              </div>
            </form>
            <?php endif; ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>