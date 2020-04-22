<div class="row" style="margin-left: 75px">
  <div class="col-md-10">
	<div class="card-body bg-white">
		<div class="card-header bg-default">
			<h3 class="text-center">Create Coaching</h3>
		</div>
		<div class="row mt-2 justify-content-center">
		<div class="col-md-10">
		<?php if($message = $this->session->flashdata('error')): ?>
		 	<div class="alert alert-danger alert-dismissible ">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					 <strong> <?php echo $message; ?>  </strong>
				</div>
			<?php endif;?>
			<?php if($message = $this->session->flashdata('msg')): ?>
				 	<div class="alert alert-success alert-dismissible ">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							 <strong> <?php echo $message; ?>  </strong>
						</div>
			<?php endif;?>
    		<form id="myform" method="post" action="<?php echo base_url('users/action/coaching_validation/'.$user_id.'/'.$role_id);?>">
			 	<div class="form-group">
	    			<label>Coaching-Name</label>
	        		<input type="text" name="coaching_name" id="coaching" class="form-control" placeholder="Enter Coaching-Name" value="<?php echo set_value('coaching');?>">
	    		</div>
	    		<div class="form-group">
	    			<label>Owner-Name</label>
	        		<input type="text" name="username" id="username" class="form-control" placeholder="Enter Owner Name" value="<?php echo set_value('username');?>">
	    		</div>
	    		<div class="form-group">
			    	<label>Email</label>
			        <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" value="<?php echo set_value('email');?>">
	    		</div>
				 <div class="form-group">
			    	<label>Address</label>
			        <textarea  name="address" id="address" class="form-control" 
			         placeholder="Enter Address" value="<?php echo set_value('address');?>"></textarea>
	    		</div>		
	    		<div class="form-group">
					<button type="submit" class="btn bg-success text-white" id = "submit" name="submit">Submit</button>
					<button type="reset" class="btn  bg-secondary text-white" id = "reset" name="reset">Reset</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
</div>
		


				