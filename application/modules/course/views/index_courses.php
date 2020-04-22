<div class ="container-fluid">
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
	<?php if($role_id == USER_ROLE_TEACHER) { ?>
		<button  class="btn btn-primary pull-right " title="Add course"><a href="<?php echo base_url('course/admin/create_course/'.$user_id);?>">ADD COURSE</a>
		</button>
		<?php }else{}?>
	<div class="table-responsive-lg py-2">	
		<table class="table table-hover stripe display" id="datatable">
			<thead>
				<tr>
					<th>#</th>
					<th>Course_Id</th>
					<th>Title</th>
					<th>Description</th>
					<th>Coaching Name</th>
					<th>Duration</th>
					<th>Created_By</th>
					
					<?php 
					if($role_id == USER_ROLE_TEACHER) {?>
					<th>Edit</th>
					<th>Delete</th>
					<th>Manage</th>
					<?php }else{?>
					<th>View</th>
					<?php } ?>
				</tr>
			</thead>
			<tbody">
				<?php if(count($course_list)):?>
				<?php $sr_no = '1';
				foreach ($course_list as $row): ?>
				<tr>
					<td><?php echo $sr_no++; ?></td>
					<td><?php echo $row->course_id; ?></td>
					<td><?php echo $row->title; ?></td>
					<td><?php echo $row->description; ?></td>
					<td><?php echo $row->coaching_name; ?></td>
					<td><?php echo $row->duration; ?></td>
					<td><?php echo $row->created_by; ?></td>
					
					<?php if($role_id == USER_ROLE_TEACHER) {?>
					<td><a href="<?php echo base_url('course/admin/create_course/'.$user_id.'/'.$row->id);?>" title="Edit Course" onclick ="return confirm('Do you want to edit this course ?')" class="btn bg-primary btn-sm text-white">EDIT</a>
					</td>
					<td><a href="<?php echo base_url('course/action/delete_course/'.$user_id.'/'.$row->id);?>" class="btn bg-danger btn-sm text-white" title="Delete Course" onclick ="return confirm('Do you want to delete this course ?')">DELETE</a>
					</td>
					<td><a href="<?php echo base_url('course/admin/section_list/'.$user_id.'/'.$row->id);?>" class="btn bg-dark btn-sm text-white" title="Manage Section">MANAGE</a>
					</td>
					<?php }else{?>
					<td>
						<a href="<?php echo base_url('course/admin/section_list/'.$user_id.'/'.$row->id);?>" class="btn bg-success btn-sm text-white" title="View Section">VIEW SECTIONS</a>
						
					</td>
					<?php } ?>
				</tr>	
				<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="11">No data avaliable</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

	
