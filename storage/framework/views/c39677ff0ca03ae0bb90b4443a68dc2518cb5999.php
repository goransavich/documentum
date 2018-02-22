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
            <?php echo e(csrf_field()); ?>

            <select class="form-control" id="choose-dep-in-unit" name="choose-dep-in-unit" required>
              <option value="" selected>Izaberi organ:</option>
              <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($department->department_id); ?>"><?php echo e($department->department_name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php echo e(csrf_field()); ?>


                    <select multiple class="form-control" name="unit-id-from-units" id="unit-list" required>
                      <?php if(isset($list_of_units)): ?>

                        <?php $__currentLoopData = $list_of_units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <option value="<?php echo e($unit->unit_id); ?>"><?php echo e($unit->unit_label); ?>-<?php echo e($unit->unit_name); ?></option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      <?php endif; ?>
                      
                      
                    </select>
                </form>
              </div>
          

            <div class="col-md-3" id="cp-input-unit-data">
              <form method="POST" action="">
               <?php echo e(csrf_field()); ?> 
                  <div class="form-group">

                      <select class="form-control" name="choose-dep-for-unit" required>
                          <option value="" selected>Izaberi organ:</option>
                          <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($department->department_id); ?>"><?php echo e($department->department_name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

           <div class="col-md-3" id="cp-update-unit-data" <?php if(isset($unit_for_update)): ?> style="display:block;" <?php else: ?> style="display: none;" <?php endif; ?>>
            <?php if(isset($unit_for_update)): ?>
              <form method="POST" action="">
               <?php echo e(csrf_field()); ?> 
                  <input type="hidden" name="update_unit_id" value="<?php echo e($unit_for_update->unit_id); ?>">
                  


                  <label class="cp-input-label">Oznaka:</label>
                  <div class="form-group cp-input-fields <?php echo e($errors->has('unit_label') ? ' has-error' : ''); ?>">
                     <input type="text" class="form-control" name="update_unit_label" title="Unesi šifru jedinice" placeholder="<?php echo e($unit_for_update->unit_label); ?>">
                  </div>
                  <small class="text-danger"><?php echo e($errors->first('unit_label')); ?></small>
                  <label class="cp-input-label">Naziv:</label>
                  <div class="form-group cp-input-fields">
                     <input type="text" class="form-control" name="update_unit_name" title="Unesi naziv jedinice" placeholder="<?php echo e($unit_for_update->unit_name); ?>"> 
                  </div>

                  <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block" name="form4">Sačuvaj</button>
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
    $("#cp-unit-button").click(function(){
        $("#cp-input-unit-data").show();
        $("#cp-update-unit-data").hide();
        $(".error-alert").hide();
    });
});

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>