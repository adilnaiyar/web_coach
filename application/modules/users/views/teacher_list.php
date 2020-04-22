<div class="container-fluid">
	<?php if($message = $this->session->flashdata('msg')): ?>
	 	<div class="alert alert-success alert-dismissible " id ="msg">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				 <strong>
					 <?php 
					echo $message;
				 ?>
			 </strong>
			</div>
  	<?php endif;?>
  	<?php if($message = $this->session->flashdata('del')): ?>
	 	<div class="alert alert-danger alert-dismissible " id ="msg">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $message;?></strong>
		</div>
  	<?php endif;?>
  	<button  class="btn btn-primary pull-right"><a href="<?php echo base_url('users/admin/teacher/'.$user_id.'/'.$role_id);?>">ADD TEACHER</a>
	</button>
	<div class="table-responsive-lg py-2">
		<input id="myInput" type="text" placeholder="Search.." class="pull-left">
		<br><br>
		<table class="table table-bordered table-hover">
			<thead>
				<tr class="bg-dark">
					<th>#</th>
					<th>Full Name</th>
					<th>Email</th>
					<th>Image</th>
					<th>Status</th>
					<th>Registration Date</th>
					<th>Updated</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php if(count($teachers)):?>
				<?php $sr_no = '1';
				foreach ($teachers as $row): ?>
				<tr>
					<td><?php echo $sr_no++; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php if($row['profile_photo']){?>
                        <img class="rounded mx-auto d-block" src="<?php echo base_url('upload/'.$row['profile_photo'])?>" style="width:25%" alt="Image" >
                    <?php } else{?>
                        <img class="rounded mx-auto d-block" src="<?php echo base_url(THEME_PATH.'assets/img/default-avatar.png')?>" style="width:25%" alt="Image">
                     <?php }?></td>
					<td><?php if($row['status'] == 1){
						echo "Active"; } else{ echo "Inactive";}?></td>
					<td><?php echo $row['created_at']; ?></td>
					<td><?php echo $row['updated_at']; ?></td>
					<td><a href="<?php echo base_url('users/admin/user_profile/'.$user_id.'/'.$row['role_id'].'/'.$row['id']);?>" class="fa fa-edit " title="Edit" style="font-size:24px;color:blue"  onclick ="return confirm('Do you want to edit this Teacher ?')"></a></td>
					<td><a href="<?php echo base_url('users/action/delete_teacher/'.$user_id.'/'.$row['role_id'].'/'.$row['id']);?>" class="fa fa-trash " title="Delete" style="font-size:24px ;color:red" onclick ="return confirm('Do you want to delete this Teacher?')"></a></td>
				</tr>		
				<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="9">No data avaliable</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>