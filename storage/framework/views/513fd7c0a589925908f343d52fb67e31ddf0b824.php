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
  				  <li class="active"><a href="/controlpanel/municipality"><i class="fa fa-building-o"></i> Opštine</a></li>
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
          <h3>Opštine</h3>
        </div>
      </div>

      <div class="row">

        <div class="col-md-12">
          <div class="btn-group" role="group" aria-label="...">
            <button type="button" id="cp-municipality-button" class="btn btn-primary"><i class="fa fa-plus cp-fa"></i>
                Dodaj</button>
            <button type="submit" form="get-municipality" name="form2" class="btn btn-info"><i class="fa fa-refresh"></i>
                Izmeni</button>
            <button type="submit" form="get-municipality" name="form4" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                Obriši</button>
          </div>
        </div>

      </div>

      <div class="row">

          <div class="col-md-3">
            <form class="user-list-form" id="get-municipality" method="POST" action="">
               <?php echo e(csrf_field()); ?>

                <select multiple class="form-control" name="mun-id-from-municipalities" required>
                  <?php $__currentLoopData = $municipalities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $municipality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($municipality->municipality_id); ?>"><?php echo e($municipality->municipality_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </form>
          </div>
        

        <div class="col-md-3" id="cp-input-municipality-data">

            <form method="POST" action="">

              <?php echo e(csrf_field()); ?>

              <label class="cp-input-label">Naziv opštine:</label>
              <div class="form-group cp-input-fields">
                 <input type="text" class="form-control" name="municipality_name" title="Unesi naziv opštine" required>
              </div>

              <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block" name="form1">Sačuvaj</button>
              </div>
 
            </form>


        </div>

        <div class="col-md-3" id="cp-update-municipality-data" <?php if(isset($municipality_for_update)): ?> style="display:block;" <?php else: ?> style="display: none;" <?php endif; ?>>
            <?php if(isset($municipality_for_update)): ?>
            <form method="POST" action="">
              <input type="hidden" name="update_municipality_id" value="<?php echo e($municipality_for_update->municipality_id); ?>">
              <?php echo e(csrf_field()); ?>

              <label class="cp-input-label">Naziv opštine:</label>
              <div class="form-group cp-input-fields">
                 <input type="text" class="form-control" name="update_municipality_name" title="Unesi naziv opštine" placeholder="<?php echo e($municipality_for_update->municipality_name); ?>">
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

          <div class="col-md-9">

            
            
          </div>
      </div>
      

  </div>

 </div>

<script>

  $(document).ready(function(){
    $("#cp-municipality-button").click(function(){
        $("#cp-input-municipality-data").show();
        $("#cp-update-municipality-data").hide();
        $(".error-alert").hide();
    });
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>