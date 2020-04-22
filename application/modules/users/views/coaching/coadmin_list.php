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
				 <strong>
					 <?php 
					echo $message;
				 ?>
			 </strong>
			</div>
  	<?php endif;?>
  	<button  class="btn btn-primary pull-right"><a href="<?php echo base_url('users/admin/coadmin/'.$user_id.'/'.$role_id);?>">ADD COADMIN</a>
	</button>
	<div class="table-responsive-lg py-2">
		<table class="table table-hover stripe display " id="datatable">
			<thead>
				<tr>
					<th>#</th>
					<th width="10%">Coaching Name</th>
					<th>Name</th>
					<th>Email</th>
					<th>Status</th>
					<th>Join_Date</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php if(count($coadmin)):?>
				<?php $sr_no = '1';
				foreach ($coadmin as $row): ?>
				<tr>
					<td><?php echo $sr_no++; ?></td>
					<td><?php echo $row['coaching_name']; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php if($row['status'] == 1){
						echo "Active"; } else{ echo "Inactive";}?></td>
					<td><?php echo $row['join_date']; ?></td>
					<td><a href="<?php echo base_url('users/admin/user_profile/'.$user_id.'/'.$row['role_id'].'/'.$row['id']);?>" title="Edit Coadmin" onclick ="return confirm('Do you want to edit this Co-Admin ?')" class="btn bg-primary btn-sm text-white">EDIT</a>
					</td>
					<td><a href="<?php echo base_url('users/action/delete_coadmin/'.$user_id.'/'.$row['role_id'].'/'.$row['id']);?>" title="Delete Coadmin" onclick = "return confirm('Do you want to delete this Co-Admin ?')" class="btn bg-danger btn-sm text-white">DELETE</a>
					</td>
				</tr>		
				<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="10">No data avaliable</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>