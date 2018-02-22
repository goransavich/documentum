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
    		    <li><a href="/controlpanel/unit"><i class="fa fa-gear"></i> Jedinice</a></li>
    		    <li class="active"><a href="/controlpanel/inspection"><i class="fa fa-briefcase"></i> Inspekcije</a></li>
    		    <li><a href="/controlpanel/user"><i class="fa fa-user-plus"></i> Korisnici</a></li> 		  		  
			  
			    </ul>

      	</div>


      </div>
      <div class="row">
        <div class="col-md-12">
          <h3>Inspekcije</h3>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-3">
          <div class="btn-group" role="group" aria-label="...">
            <button type="button" id="cp-inspection-button" class="btn btn-primary"><i class="fa fa-plus cp-fa"></i>
                Dodaj</button>
            <button type="submit" form="get-inspection" class="btn btn-info" name="form2"><i class="fa fa-refresh" aria-hidden="true"></i>
                Izmeni</button>
            <button type="submit" form="get-inspection" class="btn btn-danger" name="form4"><i class="fa fa-trash" aria-hidden="true"></i>
                Obriši</button>
          </div>
        </div>
      </div>

      <div class="row">
            
              <div class="col-md-3">

                <form class="user-list-form" id="get-inspection" method="POST" action="">
                <?php echo e(csrf_field()); ?>


                    <select multiple class="form-control" name="choose-inspection" required>
                      <?php $__currentLoopData = $inspections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inspection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($inspection->inspection_id); ?>"><?php echo e($inspection->inspection_name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </form>

              </div>
            

              <div class="col-md-3" id="cp-input-inspection-data">
            
                  <form method="POST" action="">
                    <?php echo e(csrf_field()); ?>

                    <label class="cp-input-label">Naziv inspekcije:</label>
                
                    <div class="form-group cp-input-fields">
                        <input type="text" class="form-control" name="inspection_name" title="Unesite naziv inspekcije" required>
                    </div>
                    <div class="form-group cp-input-fields">
                       <select class="form-control" name="choose-dep-for-inspection" title="Izaberi organ iz liste" required>
                          <option value="" selected>Pripada organu:</option>
                          <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($department->department_id); ?>"><?php echo e($department->department_name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" name="form1">Sačuvaj</button>
                    </div>
                
                </form>

              </div>

              <div class="col-md-3" id="cp-update-inspection-data" <?php if(isset($inspection_for_update)): ?> style="display:block;" <?php else: ?> style="display: none;" <?php endif; ?>>
                  <?php if(isset($inspection_for_update)): ?>

                  <form method="POST" action="">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="update_inspection_id" value="<?php echo e($inspection_for_update->inspection_id); ?>">
                    <label class="cp-input-label">Naziv inspekcije:</label>
                
                    <div class="form-group cp-input-fields">
                        <input type="text" class="form-control" name="update_inspection_name" title="Unesite naziv inspekcije" placeholder="<?php echo e($inspection_for_update->inspection_name); ?>">
                    </div>
                    <div class="form-group cp-input-fields">
                       <select class="form-control" name="choose-dep-for-inspection" title="Izaberi organ iz liste">
                          <option value="" selected>Pripada organu:</option>
                          <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($department->department_id); ?>"><?php echo e($department->department_name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
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
    $("#cp-inspection-button").click(function(){
        $("#cp-input-inspection-data").show();
        $("#cp-update-inspection-data").hide();
        $(".error-alert").hide();
    });
});

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>