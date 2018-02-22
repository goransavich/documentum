<?php $__env->startSection('header'); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('services'); ?>

<div class="createsucess">

	<div class="container">

		<div class="row createsubject">

			<div class="col-md-4">
				<div class="subject-title-label">
					Predmet broj:<strong> <?php echo e($dep->department_label."-".$clas->clas_label."-".$subject->ord_number."/".$subject->ord_year."-".$unit->unit_label); ?> </strong>
				</div>
			</div>

			<div class="col-md-4">

			</div>

			<div class="col-md-4">
				<div class="btn-group btn-group-justified">
				  <?php if(Auth::user()->hasRole(['pisarnica', 'administrator'])): ?>
				  <div class="btn-group">
				    <button type="submit" form="update-subject-data" name="update_subject_button" class="btn btn-primary">Arhiviraj</button>
				  </div>
				  <div class="btn-group">
				    <a target="_blank" href="/download/<?php echo e($subject->subject_id); ?>"><button type="button" class="btn btn-success">Štampa</button></a>
				  </div>
				  <?php endif; ?>
				</div>
			</div>

		</div>

		<div class="createsubject-nav">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" id="myTab">
			  <li class="<?php echo e(session('success') ? '' : 'active'); ?>"><a href="#podaci" data-toggle="tab">PODACI</a></li>
			  <li class="<?php echo e(session('success') ? 'active' : ''); ?>"><a href="#dms" data-toggle="tab">DMS</a></li>
			  <li><a href="#istorija" data-toggle="tab">ISTORIJA PREDMETA</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content createsubject createsubject-tabpanes">
			  <div class="tab-pane <?php echo e(session('success') ? '' : 'active'); ?>" id="podaci">
			  	<form method="POST" action="" id="update-subject-data">
			  		
			  		<?php echo e(csrf_field()); ?>


			  		<?php echo e(method_field('PATCH')); ?>

				  	<div>
					  	<label class="createsubject-tabpanes-labels">Datum:</label>
					  	<input type="text" class="createsubject-tabpanes-inputs" value="<?php echo e($dep->created_at); ?>" disabled>
				    </div>

				    

				    <div>
					  	<label class="createsubject-tabpanes-labels">Opština:</label>
					  	<select class="createsubject-tabpanes-inputs" id="mun-from-createsubject" name="mun-from-createsubject">
							<option value="<?php echo e($municipality->municipality_id); ?>" selected><?php echo e($municipality->municipality_name); ?></option>
									<?php $__currentLoopData = $municipalities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($mun->municipality_id); ?>"><?php echo e($mun->municipality_name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>

					<div>
						<label class="createsubject-tabpanes-labels">Mesto:</label>
						
						<select class="createsubject-tabpanes-inputs" id="city-from-createsubject" name="city-from-createsubject">
							<option value="<?php echo e($city->city_id); ?>" selected><?php echo e($city->city_name); ?></option>
							<?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($cit->city_id); ?>"><?php echo e($cit->city_name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>

					<div>
						<label class="createsubject-tabpanes-labels">Organ:</label>
						<input type="text" class="createsubject-tabpanes-inputs" value="<?php echo e($dep->department_label.' - '.$dep->department_name); ?>" disabled>
					</div>

					<div>
						<label class="createsubject-tabpanes-labels">Klasa:</label>
						<input type="text" class="createsubject-tabpanes-inputs" value="<?php echo e($clas->clas_label.' - '.$clas->clas_name); ?>" disabled>

					</div>

					<div>
						<label class="createsubject-tabpanes-labels">Jedinica:</label>
						
						<select class="createsubject-tabpanes-inputs" id="unit-from-createsubject" name="unit-from-createsubject">
							<option value="<?php echo e($unit->unit_id); ?>" selected><?php echo e($unit->unit_label.' - '.$unit->unit_name); ?></option>
							<?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($uni->unit_id); ?>"><?php echo e($uni->unit_label.' - '.$uni->unit_name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
						
					<div>
						<label class="createsubject-tabpanes-labels">Podnosilac:</label>
						<input type="text" class="createsubject-tabpanes-inputs" name="owner" value="<?php echo e($subject->owner); ?>">
					</div>

					<div>
						<label class="createsubject-tabpanes-labels">Inspektor:</label>
						<select class="createsubject-tabpanes-inputs" id="user-from-createsubject" name="user-from-createsubject">
							<option value="<?php echo e($user->user_id); ?>" selected><?php echo e($user->name); ?></option>
							<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inspektor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($inspektor->user_id); ?>"><?php echo e($inspektor->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>

					</div>

					<div>
						<label class="createsubject-tabpanes-labels">Subjekt kontrole:</label>
						<input type="text" class="createsubject-tabpanes-inputs" name="controlled-from-createsubject" placeholder="<?php echo e($subject->controlled); ?>" disabled>

					</div>

					<div>
						<label class="createsubject-tabpanes-labels">Vrsta predmeta:</label>
						
						<select class="createsubject-tabpanes-inputs" name="subjecttype-from-createsubject">
								<option value="<?php echo e($subject->subjecttype); ?>" selected><?php echo e($subject->subjecttype); ?></option>
								<option value="0 - stvarni i lični predmeti">0 - stvarni i lični predmeti</option>
								<option value="1 - upravni postupak prvi stepen">1 - upravni postupak prvi stepen</option>
								<option value="2 - upravni postupak drugi stepen">2 - upravni postupak drugi stepen</option>
								<option value="3 - upravni postupak po službenoj dužnosti prvi stepen">3 - upravni postupak po službenoj dužnosti prvi stepen</option>
								<option value="4 - upravni postupak po službenoj dužnosti drugi stepen">4 - upravni postupak po službenoj dužnosti drugi stepen</option>
								<option value="5 - upravni postupak vanredni pravni lek prvi stepen">5 - upravni postupak vanredni pravni lek prvi stepen</option>
								<option value="6 - upravni postupak vanredni pravni lek drugi stepen">6 - upravni postupak vanredni pravni lek drugi stepen</option>
							</select>
					</div>

					<div>
						<label class="createsubject-tabpanes-labels">Sadržaj:</label>
						<input type="text" class="createsubject-tabpanes-inputs" name="title-from-createsubject" value="<?php echo e($subject->title); ?>">
							
						
					</div>

					

			  </form>
			  </div>
			  <div class="tab-pane <?php echo e(session('success') ? 'active' : ''); ?>" id="dms">
			  	<div class="row">
			  		<div class="col-md-6">
			  			<div>
			  				<label>Dokumenti u ovom predmetu:</label>
			  			</div>
			  			<div>
			  				
				  			  <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  			  	<div class="row row-display-documents">
									  <div class="col-md-6">
									  	<?php
									  		switch($document->file_extension){
									  			case "pdf":
									    		echo "<i class='fa fa-file-pdf-o' aria-hidden='true'></i>";
									    		break;

									    		case "doc":
									    		echo "<i class='fa fa-file-word-o'></i>";
									    		break;

									    		case "docx":
									    		echo "<i class='fa fa-file-word-o'></i>";
									    		break;

									    		case "bmp":
									    		echo "<i class='fa fa-file-image-o'></i>";
									    		break;

									    		case "jpg":
									    		echo "<i class='fa fa-file-image-o'></i>";
									    		break;

									    		case "jpeg":
									    		echo "<i class='fa fa-file-image-o'></i>";
									    		break;

									    		case "xls":
									    		echo "<i class='fa fa-file-excel-o'></i>";
									    		break;

									    		case "xlsx":
									    		echo "<i class='fa fa-file-excel-o'></i>";
									    		break;

									    		default:
									    		echo "<i class='fa fa-file-o'></i>";
									    }

									    ?>
											<?php echo e($document->original_name); ?>

									  </div>
									  <div class="col-md-6">
											<a target="_blank" href="/dashboard/show/<?php echo e($document->document_id); ?>"><button class="button-open"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
											Otvori</button></a>

											<form class="form_for_delete_documents" name="delete_document" method="POST" action="">
												<?php echo e(method_field('DELETE')); ?>

												<?php echo e(csrf_field()); ?>

												<input type="hidden" name="id_for_delete" value="<?php echo e($document->document_id); ?>">
												<button type="submit" class="button-delete"><i class="fa fa-times" aria-hidden="true"></i>
												Obriši</button>
											</form>
									 </div>
								</div> 
							  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  
						
			  			</div>
			  			<hr>
			  			<div>
			  				<form method="POST" action="" enctype="multipart/form-data">
			  					<?php echo e(csrf_field()); ?>

							  <div class="form-group form-upload-documents">
							    <label for="exampleFormControlFile1">Unesite dokumente:</label>
							    <input type="file" name="upload_documents[]" class="form-control-file input-update-subject" id="exampleFormControlFile1" accept=".doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document, .pdf, .png, .jpg, .jpeg, image/*" multiple>
							    <button type="submit" name="save_documents" class="btn btn-primary">Snimi dokumente</button>
							  </div>
							</form>
			  				
			  			</div>

			  		</div>

			  		<div class="col-md-6">
			  			
			  		</div>

			  		
			  		
			  	</div>
			  </div>
			  
			  <div class="tab-pane" id="istorija">

			  	<h2>Istorija predmeta</h2>

			  	 <table>
					  <tr class="history_table_header">
					    <th class="history_table_first">VREME</th>
					    <th class="history_table_second">KORISNIK</th>
					    <th class="history_table_third">OPIS</th>
					  </tr>
					  <?php $__currentLoopData = $subject_history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <tr>
					    <td class="history_table_first"><?php echo e($history->created_at); ?></td>
					    <td class="history_table_second"><?php echo e($history->name_of_user); ?></td>
					    <td class="history_table_third"><?php echo e($history->action); ?></td>
					  </tr>

					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				 </table> 

			  </div>
			  
			</div>
		</div>

	</div>


</div>

<script>
  $('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
})
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>