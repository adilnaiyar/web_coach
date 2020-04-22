<div class="row" style="margin-left: 75px">
  <div class="col-md-10">
	<div class="card-body bg-white">
		<div class="card-header bg-default">
			<h3 class="text-center">Create Course</h3>
		</div>
		<div class="row justify-content-center mt-2">
			<div class="col-md-10">
				<?php if($message = $this->session->flashdata('error')): ?>
			 		<div class="alert alert-danger alert-dismissible " id ="msg">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						 <strong> <?php echo $message; ?> </strong>
					</div>
		  		<?php endif;?>
				<?php echo form_open('course/action/course_validation/'.$user_id.'/'.$row_id,array('id'=>'create_course','class'=>'registration form'));?>
		  		<?php if($role_id == USER_ROLE_ADMIN){?>
		    		<div class="form-group">
						<label>Coaching Name</label>
						<select name="coaching_name" class="form-control" id="coaching">
							<option value ='0' selected="selected" disabled=""> Select Coaching</option>
			       		 	<?php 
				            	foreach($coaching as $row)
				            	{ 
				              		echo '<option value="'.$row['coaching_name'].'">'.$row['coaching_name'].'</option>'; 
				            	}
				          	?>
						</select>
					</div>
		    		<?php } else{
		    		$coaching_name  = $this->session->userdata('coaching_name');?>
		    		<div class="form-group">
						<label>Coaching Name</label>
						<input type="text" name="coaching_name" id="coaching_name" class="form-control" value="<?php echo $coaching_name;?>"  disabled="">
					</div>
		    		<?php }?>
					<?php if($row_id == 0) { ?>
						<div class="form-group">
							Course_Id:<?php echo form_input(['class'=>'form-control required digits','placeholder'=>'Enter Course_Id','name'=>'course_id','readonly'=>true,'value'=>set_value('course_id',$course_id)]);?>
						</div>
						<div class="form-group">				
							Title:<?php echo form_input(array('class'=>'form-control','placeholder'=>'Enter Title','name'=>'title','type'=>'text','value'=>''));?>
						</div>
						<div class="form-group">
							Description:<?php echo form_textarea(['class'=>'form-control','placeholder'=>'Enter Description','name'=>'description','type'=>'text','value'=>'']);?>
						</div>
						<div class="form-group">
							Duration:<?php echo form_input(['type'=>'text','class'=>'form-control','placeholder'=>'Enter Duration','name'=>'duration','value'=>'']);?>
						</div>
						<div class="form-group">
							Created By:<?php echo form_input(['type'=>'text','class'=>'form-control','placeholder'=>'Enter Creater Name','name'=>'created_by','value'=>'']);?>
						</div>
					<?php }else {  ?>
						<div class="form-group">
							Course_Id:<?php echo form_input(['class'=>'form-control required digits','placeholder'=>'Enter Course_Id','name'=>'course_id','readonly'=>true,'value'=>set_value('course_id',$course['course_id'])]);?>
						</div>
						<div class="form-group">				
							Title:<?php echo form_input(array('class'=>'form-control','placeholder'=>'Enter Title','name'=>'title','type'=>'text','value'=>set_value('title',$course['title'])));?>
						</div>
						<div class="form-group">
							Description:<?php echo form_textarea(['class'=>'form-control','placeholder'=>'Enter Description','name'=>'description','type'=>'text','value'=>set_value('description',$course['description'])]);?>
						</div>
						<div class="form-group">
							Duration:<?php echo form_input(['type'=>'text','class'=>'form-control','placeholder'=>'Enter Duration','name'=>'duration','value'=>set_value('duration',$course['duration'])]);?>
						</div>
						<div class="form-group">
							Created By:<?php echo form_input(['type'=>'text','class'=>'form-control','placeholder'=>'Enter Creater Name','name'=>'created_by','value'=>set_value('created_by',$course['created_by'])]);?>
						</div>
					<?php  }  ?>
					
					<div class="form-group">			
						<?php echo form_submit(['class'=>'btn  bg-success text-white','value'=>'Submit','id'=>'btn','type'=>'submit']);?>
						<?php echo form_reset(['class'=>'btn bg-secondary text-white','value'=>'Reset','type'=>'reset']);?>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>
</div>
	