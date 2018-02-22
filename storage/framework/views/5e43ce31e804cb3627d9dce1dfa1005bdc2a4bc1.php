<?php $__env->startSection('header'); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('services'); ?>

<div class="createsubject">
	<div class="container">
		<div class="row">
		    <div class="col-md-12 title-create-subject">
		        <h3>Izveštaji</h3>
		    </div>
		</div>

		<div class="row">

			<form method="POST" action="">
				<?php echo e(csrf_field()); ?>


				<div class="col-md-4">

					<div class="btn-group reports-buttons">
					  <button type="submit" name="department_report" class="btn btn-primary">Organi</button>
					  <button type="submit" name="clas_report" class="btn btn-success">Klase</button>
					  <button type="submit" name="inspektor_report" class="btn btn-info">Inspektori</button>
					  
					</div>
				</div>

				<div class="col-md-2">
					<div>
						<select class="form-control select-year-reports" name="choose-year-from-reports">
							<option value="<?php echo e($current_year); ?>" selected><?php echo e($current_year); ?></option>
							<?php for($i=2014; $i<$current_year; $i++): ?>
							<option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
							<?php endfor; ?>
							
						</select>
					</div>
				</div>
			</form>
		</div>
		<?php if(isset($result_department)): ?>
		<div class="row report_tables">
			
			<table>
				  <tr class="history_table_header">
				    <th class="history_table_first">ORGAN</th>
				    <th class="report_table_second">AKTIVNI</th>
				    <th class="report_table_second">ARHIVIRANI</th>
				    <th class="report_table_second">UKUPNO</th>
				  </tr>

				  <?php if(count($result_department) == 0): ?>
				  <h4>Nema podataka po trazenom kriterijumu</h4>
				  <?php endif; ?>

				  <?php $__currentLoopData = $result_department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $results): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  <tr>
				    <td class="report_table_first"><?php echo e($results->departments->department_label. " - ".$results->departments->department_name); ?></td>
				    <td class="report_table_second"><?php echo e($results->total_aktivan); ?></td>
				    <td class="report_table_second"><?php echo e($results->total_arhiviran); ?></td>
				    <td class="report_table_second"><?php echo e($results->total_aktivan+$results->total_arhiviran); ?></td>
				  </tr>

				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				  

			</table> 

		</div>
		<?php endif; ?>

		<?php if(isset($result_clas)): ?>
		<div class="row report_tables">
			
			<table>
				  <tr class="history_table_header">
				    <th class="history_table_first">KLASA</th>
				    <th class="report_table_second">AKTIVNI</th>
				    <th class="report_table_second">ARHIVIRANI</th>
				    <th class="report_table_second">UKUPNO</th>
				  </tr>

				  <?php if(count($result_clas) == 0): ?>
				  <h4>Nema podataka po trazenom kriterijumu</h4>
				  <?php endif; ?>

				  <?php $__currentLoopData = $result_clas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $results): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  <tr>
				    <td class="report_table_first"><?php echo e($results->classes->clas_label. " - ".$results->classes->clas_name); ?></td>
				    <td class="report_table_second"><?php echo e($results->total_aktivan); ?></td>
				    <td class="report_table_second"><?php echo e($results->total_arhiviran); ?></td>
				    <td class="report_table_second"><?php echo e($results->total_aktivan+$results->total_arhiviran); ?></td>
				  </tr>

				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				  

			</table> 

		</div>
		<?php endif; ?>

		<?php if(isset($result_user)): ?>
		<div class="row report_tables">
			
			<table>
				  <tr class="history_table_header">
				    <th class="history_table_first">INSPEKTOR</th>
				    <th class="report_table_second">AKTIVNI</th>
				    <th class="report_table_second">ARHIVIRANI</th>
				    <th class="report_table_second">UKUPNO</th>
				  </tr>

				  <?php if(count($result_user) == 0): ?>
				  <h4>Nema podataka po trazenom kriterijumu</h4>
				  <?php endif; ?>

				  <?php $__currentLoopData = $result_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $results): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  <tr>
				    <td class="report_table_first"><?php echo e($results->user->name); ?></td>
				    <td class="report_table_second"><?php echo e($results->total_aktivan); ?></td>
				    <td class="report_table_second"><?php echo e($results->total_arhiviran); ?></td>
				    <td class="report_table_second"><?php echo e($results->total_aktivan+$results->total_arhiviran); ?></td>
				  </tr>

				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				  

			</table> 

		</div>
		<?php endif; ?>

	</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>