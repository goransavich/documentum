<?php $__env->startSection('header'); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('services'); ?>

<div class="createsubject">

	<div class="container">
		<form method="POST" action="">
			<?php echo e(csrf_field()); ?>

		<h2>Pretraga predmeta</h2>

		<div class="row row-search">
			
				<div class="inputfields-search-subject">
					<select class="form-control" name="choose-dep-from-create-subject" id="choose-dep-from-search-subject">
						<option value="" selected></option>
						<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($department->department_id); ?>"><?php echo e($department->department_label); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>

				<div class="interpunction">
					<span> - </span>
				</div>


				<div class="inputfields-search-subject">
					<select class="form-control" name="choose-clas-from-search-subject" id="choose-clas-from-search-subject">
						<option value="" selected></option>
						<?php $__currentLoopData = $clases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($clas->clas_id); ?>"><?php echo e($clas->clas_label); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>

				<div class="interpunction">
					<span> - </span>
				</div>

				<div class="inputfields-search-subject">

					<input type="text" class="input-search-number-subject" name="number_of_subject">

				</div>

				<div class="interpunction">
					<span> / </span>
				</div>				
				

				<div class="inputfields-search-subject">

					<select class="form-control" name="choose-year-from-search-subject">
						<option value="<?php echo e($current_year); ?>" selected><?php echo e($current_year); ?></option>
						<?php for($i=2014; $i<$current_year; $i++): ?>
						<option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
						<?php endfor; ?>
						
					</select>

				</div>

				<div class="interpunction">
					<span> - </span>
				</div>

				<div class="inputfields-search-subject">
					<select class="form-control" name="choose-unit-from-search-subject">
						<option value="" selected></option>	
						<?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($unit->unit_id); ?>"><?php echo e($unit->unit_label." - ".$unit->unit_name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
				<div class="inputfields-search-subject search-button">
					<button type="submit" class="btn btn-primary search-subject-button"><i class="fa fa-search" aria-hidden="true"></i>
					<span> &nbsp;Pretraži</span></button>
				</div>

			
		</div>

		<div class="row row-search">
			
			<div class="inputfields-search-subject">

					<select class="form-control" name="choose-inspektor-from-search-subject">
						<option value="" selected>Inspektor</option>
						<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($user->user_id); ?>"><?php echo e($user->name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>

			</div>

			<div class="inputfields-search-subject input-search">

					<input type="text" class="input-search-number-subject input-search-title" name="choose-title-from-search-subject" placeholder="Sadržaj">

			</div>

			<div class="inputfields-search-subject archive-search">

					<select class="form-control" name="choose-archive-from-search-subject">
						<option value="" selected>Stanje</option>
						<option value="aktivan">Aktivan</option>
						<option value="arhiviran">Arhiviran</option>
						
					</select>

			</div>

		</div>
		</form>
		<?php if(isset($subjects)): ?>
		<div class="row row-search">

			<table>
			  <tr class="search-table-header">
			  	<th class="search-table-first"></th>
			    <th class="search-table-second">Broj predmeta</th>
			    <th class="search-table-third">Podnosilac</th>
			    <th class="search-table-fourth">Inspektor</th>
			    <th class="search-table-fifth">Sadržaj</th>
			    <th class="search-table-sixth">Stanje</th>
			  </tr>
			  <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  <tr class="table-row-content">
			  	<td class="search-table-first"><a class="open-search-button" href="/dashboard/create/<?php echo e($subject->subject_id); ?>">Otvori</a></td>
			    <td class="search-table-second"><?php echo e($subject->departments['department_label']."-".$subject->classes['clas_label']."-".$subject->ord_number."/".$subject->ord_year."-".$subject->units['unit_label']); ?></td>
			    <td class="search-table-third"><?php echo e($subject->owner); ?></td>
			    
			    <td class="search-table-fourth"><?php echo e($subject->user['name']); ?></td>
			    
			    <td class="search-table-fifth"><?php echo e($subject->title); ?></td>
			    <td class="search-table-sixth"><?php echo e($subject->archive); ?></td>
			  </tr>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  
		    </table> 



		</div>
		<?php endif; ?>
	</div>
</div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>