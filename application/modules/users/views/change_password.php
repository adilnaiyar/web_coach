<div class="row" style="margin-left: 75px">
  <div class="col-md-10">
	<div class="card-body bg-white">
		<div class="card-header bg-default">
			<h3 class="text-center">Change Your Password</h3>
		</div>
		<div class="row justify-content-center mt-4">
			<div class="col-md-8">
	   		<?php if($message = $this->session->flashdata('error')): ?>
				<div class="alert alert-danger alert-dismissible " id ="msg">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong> <?php echo $message;?> </strong>
				</div>
			<?php endif;?>
			<?php if($message = $this->session->flashdata('success')): ?>
				<div class="alert alert-success alert-dismissible " id ="msg">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong> <?php echo $message;?> </strong>
				</div>
			<?php endif;?>
	    	<?php echo form_open(base_url('users/action/change_password/'.$user_id.'/'.$role_id), array('id' => 'Change_pass')); ?>
		    	<div class="form-group">
			    	<label>New Password</label>
			        <input type="password" name="newpass" id="newpass" class="form-control" placeholder="Enter Your New Password">
		   		</div>
			 	<div class="form-group">
			    	<label>Confirm Password</label>
			        <input type="password" name="conpass" id="conpass" class="form-control" placeholder="Confirm Your New Password">
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
 		
		


	