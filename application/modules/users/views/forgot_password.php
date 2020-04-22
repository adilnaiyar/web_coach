<div class="card-body">
	<h4 class="card-title text-center"><i class="fa fa-refresh"></i> Reset Password</h4>
		<div class="col-md-11 justify-content-center ml-3">
			<p class="card bg-dark py-2 px-2"> # Please enter your email address. You will receive a link to create a new password via email.</p>
		</div>
		<form  method="post" action="<?php echo base_url('users/action/forgot_password');?>">
			<div class="row justify-content-center">
				<div class="col-md-10">
					<?php if($message = $this->session->flashdata('error')): ?>
					 	<div class="alert alert-danger alert-dismissible " id ="msg">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong> <?php echo $message; ?> </strong>
						</div>
					<?php endif;?>
					<div class="form-group">
						<div class="input-group">
               				<span class="input-group-addon">
                    			<i class="fa fa-envelope"></i>
                			</span>
							<input type="text" class="form-control" id="email" name="email" placeholder="youremail@example.com" required autofocus>
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success" id = "submit" name="submit">Submit</button>
						<button type="reset" class="btn btn-secondary" id = "reset" name="reset">Reset</button>
					</div>
				</div>
			</div>
			<hr>
			<div class=" d-flex justify-content-center pull-right">
				<a href="<?php echo base_url('users/admin/login/'); ?>" class="text-white pull-right" style="text-decoration: none;" ><strong><i class="fa fa-arrow-left" aria-hidden="true"></i> BACK</strong></a>
			</div>
		</form>
	</div>


		





	