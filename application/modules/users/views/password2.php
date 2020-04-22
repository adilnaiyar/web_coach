<div class="card-body">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<h5 class="text-center"><?php echo $title;?></h5>
			<?php if($message = $this->session->flashdata('error')): ?>
		 		<div class="alert alert-danger alert-dismissible " id ="msg">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><?php echo $message;?></strong>
				</div>
			<?php endif;?>
			<?php if($message = $this->session->flashdata('success')): ?>
				<div class="alert alert-success alert-dismissible " id ="msg">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong> <?php echo $message;?> </strong>
				</div>
			<?php endif;?>
	    	<?php echo form_open(base_url('users/action/password_change/'.$user_id.'/'.$role_id), array('id' => 'Change_pass')); ?>
		    	<div class="form-group">
			    	<div class="input-group">
                   		<span class="input-group-addon">
                        	<i class="fa fa-lock"></i>
                    	</span>
			        	<input type="password" name="newpass" id="newpass" class="form-control" placeholder=" New Password" required autofocus>
			    	</div>
		   		</div>
			 	<div class="form-group">
			 		<div class="input-group">
			    		<span class="input-group-addon">
                        	<i class="fa fa-lock"></i>
                    	</span>
			        	<input type="password" name="conpass" id="conpass" class="form-control" placeholder="Confirm Password" required >
			        </div>
		    	</div>			
			    <div class="form-group">
					<button type="submit" class="btn btn-success bg-success text-white" id = "submit" name="submit">Change Password</button>
					<button type="reset" class="btn btn-white bg-secondary text-white" id = "reset" name="reset">Reset</button>
				</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>
</div>
</div>
 		
		


	