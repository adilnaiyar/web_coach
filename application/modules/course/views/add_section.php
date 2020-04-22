<div class="row" style="margin-left: 75px">
  <div class="col-md-10">
	<div class="card-body bg-white">
		<div class="card-header bg-default">
			<h3 class="text-center">Create Section</h3>
		</div>
		<div class="row justify-content-center mt-2">
			<div class="col-md-10">
				<?php if($message = $this->session->flashdata('error')): ?>
			 		<div class="alert alert-danger alert-dismissible " id ="msg">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						 	<strong> <?php echo $message;?> </strong>
					</div>
		  		<?php endif;?>
				<?php echo form_open('course/action/section_validation/'.$user_id.'/'.$course_id.'/'. $row_id);?>
					<?php if($row_id == 0) { ?>
						<div class="form-group">
						Title:<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Title','name'=>'section_title','value'=>'']);?>
						</div>
						<div class="form-group">
							Duration:<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Duration(eg:2hr30min)','name'=>'duration','value'=>'']);?>
						</div>
					<?php }else{?>
						<div class="form-group">
						Title:<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Title','name'=>'section_title','value'=>set_value('section_title',$sections['title'])]);?>
						</div>
						<div class="form-group">
							Duration:<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Duration(eg:2hr30min)','name'=>'duration','value'=>set_value('duration',$sections['duration'])]);?>
						</div>
					<?php }?>
					<div class="form-group">
						<div id="response"></div>			
						<?php echo form_submit(['class'=>'btn bg-success text-white','value'=>'Submit','type'=>'submit']);?>
						<?php echo form_reset(['class'=>'btn bg-secondary text-white','value'=>'Reset','type'=>'reset']);?>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>
</div>
	
	