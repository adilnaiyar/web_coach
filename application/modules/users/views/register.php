<div class="card-body">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<h5 class="text-center"><?php echo $title;?></h5>
			<?php if($message = $this->session->flashdata('msg')): ?>
			 	<div class="alert alert-danger alert-dismissible ">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong> <?php echo $message; ?>  </strong>
				</div>
			<?php endif;?>
    		<form id="myform" method="post" action="<?php echo base_url('users/action/register_validation/');?>">
   			 		<div class="form-group">
		    			<div class="input-group">
	                   		<span class="input-group-addon">
	                        	<i class="fa fa-user"></i>
	                    	</span>
		        			<input type="text" name="username" id="username" class="form-control" placeholder="Full Name" required autofocus>
		        		</div>
		    		</div>
		    		<div class="form-group">
				    	<div class="input-group">
	                   		<span class="input-group-addon">
	                        	<i class="fa fa-envelope"></i>
	                    	</span>
				        	<input type="text" name="email" id="email" class="form-control" placeholder="Email" required >
				        </div>
		    		</div>
		    		<div class="form-group">
						<select name="coaching_name" class="form-control" id="coaching" required >
							<option value ='0' selected='' disabled> Select Coaching</option>
				       		 <?php 
					            foreach($coaching as $row)
					            { 
					              echo '<option value="'.$row['coaching_name'].'">'.$row['coaching_name'].'</option>'; 
					            }
					          ?>
						</select>
					</div>
					 <div class="form-group">
		    			<div class="input-group">
                   			<span class="input-group-addon">
                        		<i class="fa fa-lock"></i>
                    		</span>
		        			<input type="password" name="password" id="password" class="form-control" placeholder="Password" required >
		        		</div>
		    		</div>
		   			 <div class="form-group">
		    			<div class="input-group">
	                   		<span class="input-group-addon">
	                        	<i class="fa fa-lock"></i>
	                    	</span>
		        			<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password" required >
		        		</div>
		    		</div>			
		    		<div class="form-group">
						<button type="submit" class="btn btn-info btn-rounded btn-md btn-block" id = "submit" name="submit">Submit</button>
						
					</div>
				<hr>
				<div class=" d-flex justify-content-center">
					<p>Already have an account?<a href="<?php echo base_url ('users/admin/login'); ?>" class="text-white"> Sign-In</a> </p>
				</div>
			</div>
		</div>
	</form>
</div>


				