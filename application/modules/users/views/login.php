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
			<form id="myform" method="post" action="<?php echo base_url('users/action/login_validation');?>">
				<div class="form-group">
					<div class="input-group">
                   		<span class="input-group-addon">
                        	<i class="fa fa-envelope"></i>
                    	</span>
						<input type="text" class=" form-control" id="email" name="email" placeholder="Email" value=""  required autofocus>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
                   		<span class="input-group-addon">
                        	<i class="fa fa-lock"></i>
                    	</span>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" value="" required>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info btn-rounded btn-md btn-block" id = "submit" name="submit">Sign in</button>&nbsp;
					<a href="<?php echo base_url ('users/admin/forgot_password'); ?>" class="text-white" style="text-decoration: none;">Forgot the password?</a>
				</div>
				<hr/>
				<div class=" d-flex justify-content-center">
					<p>Don't have an account?<a href="<?php echo base_url ('users/admin/register'); ?>" class="text-white"> Create Account</a> </p>
				</div>
			</form>
		</div>
	</div>
</div>

			
				






	