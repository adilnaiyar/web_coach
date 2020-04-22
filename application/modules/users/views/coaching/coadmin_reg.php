<div class="row" style="margin-left: 75px">
  <div class="col-md-10">
	<div class="card-body bg-white">
		<div class="card-header bg-default">
			<h3 class="text-center">Create Coadmin</h3>
		</div>
		<div class="row justify-content-center mt-2">
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
    			<form id="myform" method="post" action="<?php echo base_url('users/action/coadmin_validation/'.$user_id.'/'.$role_id);?>">
						<div class="form-group">
		    				<label>Role</label>
		        			<input type="text" name="roles" id="roles" value="<?php echo $role['roles_level'];?>" class="form-control" placeholder="Enter Your Full Name" disabled>
		    			</div>
				 		<div class="form-group">
							<label>Coaching Name</label>
							<select name="coaching_name" class="form-control" id="coaching">
								<option value ='none' selected="selected" disabled=""> Select Coaching</option>
					       		 <?php 
						            foreach($coaching as $row)
						            { 
						              echo '<option value="'.$row['coaching_name'].'">'.$row['coaching_name'].'</option>'; 
						            }
						          ?>
							</select>
						</div>
		    			<div class="form-group">
		    				<label>Full Name</label>
		        			<input type="text" name="username" id="username" class="form-control" placeholder="Enter Owner Name" value="<?php echo set_value('username');?>">
		    			</div>
		    			<div class="form-group">
				    		<label>Email</label>
				        	<input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" value="<?php echo set_value('email');?>">
		    			</div>
		    			<div class="form-group">
			    			<label>Password</label>
			        		<input type="password" name="password" id="password" class="form-control" placeholder="********">
			    		</div>
			   			 <div class="form-group">
			    			<label>Re-Enter Password</label>
			        		<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="********">
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


				