<div class ="container-fluid">
	<?php if($message = $this->session->flashdata('msg')): ?>
	 	<div class="alert alert-success alert-dismissible " id ="msg">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				 <strong> <?php echo $message; ?> </strong>
		</div>
  	<?php endif;?>
  	<?php if($message = $this->session->flashdata('del')): ?>
	 	<div class="alert alert-danger alert-dismissible " id ="msg">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				 <strong> <?php echo $message; ?>
			 </strong>
		</div>
  	<?php endif;?>
	<?php if($role_id == USER_ROLE_TEACHER) { ?>
		<button  class="btn btn-primary pull-right"><a href="<?php echo base_url('course/admin/lesson/'.$user_id.'/'.$course_id.'/'.$section_id);?>">ADD LESSON</a>
		</button>
	<?php } else {}?>
	<div class="table-responsive py-2">
		<table class="table table-hover stripe display" id="datatable">
			<thead>
				<tr>
					<th>Sr.no</th>
					<th>Title</th>
					<th>Duration</th>
					<th>Creation_Date</th>
					<th>Updation_Date</th>
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
			<tbody>
				<?php if(count($lesson_list)):?>
				<?php 
				$sr_no = '1';
				foreach ($lesson_list as $row): 	
				?>
				<tr>
					<td><?php echo $sr_no++; ?></td>
					<td><?php echo $row->title; ?></td>
					<td><?php echo $row->duration; ?></td>
					<td><?php echo $row->creation_at; ?></td>
					<td><?php echo $row->updation_date; ?></td>
					<?php if($role_id == USER_ROLE_TEACHER) {?>
					<td><a href="<?php echo base_url('course/admin/lesson/'.$user_id.'/'.$course_id.'/'.$section_id.'/'.$row->id);?>" class="btn bg-primary btn-sm text-white" onclick ="return confirm('Do you want to edit this lesson ?')" title="Edit Lesson">EDIT</a>
					</td>
					<td><a href="<?php echo base_url('course/action/delete_lesson/'.$user_id.'/'.$course_id.'/'.$section_id.'/'.$row->id);?>" onclick ="return confirm('Do you want to delete this lesson ?')" class="btn bg-danger btn-sm text-white" title="Delete Lesson">DELETE</a>
					</td>
					<td><a href="<?php echo base_url('course/admin/content_list/'.$user_id.'/'.$course_id.'/'.$section_id.'/'.$row->id);?>" class="btn bg-dark btn-sm text-white" title="Manage Lesson">MANAGE</a>
					</td>
					<?php }else{?>
					<td>
						<a href="<?php echo base_url('course/admin/content_list/'.$user_id.'/'.$course_id.'/'.$section_id.'/'.$row->id);?>" class="btn bg-success btn-sm text-white" title="View Contents" >VIEW CONTENTS</a>
					</td>
					<?php } ?>
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

	
	
