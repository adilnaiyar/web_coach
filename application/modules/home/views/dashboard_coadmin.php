 <?php if($message          = $this->session->flashdata('msg')): 
            $name           = $this->session->userdata('username'); 
            $coaching_name  = $this->session->userdata('coaching_name');
    ?>
     <div class="row">
        <div class="col-md-9">
        <div class="alert alert-info alert-dismissible " id ="msg" role ="dialog">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <h5 class='text-center text-dark'>
                 <?php 
                    echo "<strong>".$name."!! ".$message."</strong>";
                 ?>
             </h5>
        </div>
    </div>
</div>
<?php endif;?>
 <div class="row">
    <div class="col-md-3">
        <div class="card ">
            <div class="card-header ">
                 <h4 class="card-title">Number of Teachers</h4>
            </div>
            <div class="card-body text-center">
            	<i class="fas fa-chalkboard-teacher" style="font-size:50px;color:black"></i>
            	<?php 
					$num_teacher = 0;
					if (! empty ($teacher)) {
						$num_teacher = count ($teacher);
					}	
				?>
            </div>   
            <div class="card-footer ">
            <hr>
                <div class="media-body">
					<h5 class="media-heading margin-v-5-3"><a href="<?php echo base_url ('users/admin/teacher_list/'.$user_id.'/'.$role_id); ?>"> <?php echo $num_teacher." ".  'teacher';?> </a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
     <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                 <h4 class="card-title">Number of Students</h4>
            </div>
            <div class="card-body text-center">
            	<i class="fas fa-user-graduate " style="font-size:50px;color:green"></i>
            	<?php 
					$num_student = 0;
					if (! empty ($student)) {
						$num_student = count ($student);
					}	
				?>
            </div>
            <div class="card-footer ">
            	<hr>
                	<div class="media-body">
						<h5 class="media-heading margin-v-5-3"><a href="<?php echo base_url ('users/admin/student_list/'.$user_id.'/'.$role_id); ?>"> <?php echo $num_student." ".  'Students';?> </a>
                        </h5>
                	</div>
                </div>
            </div>
        </div>  
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                 <h4 class="card-title">Number of Courses</h4>
            </div>
            <div class="card-body text-center">
            	<i class="fa fa-book " style="font-size:50px;color:blue"></i>
            	<?php 
					$num_course = 0;
					if (! empty ($course)) {
						$num_course = count ($course);
					}	
				?>
            </div>
            <div class="card-footer ">
            <hr>
            <div class="media-body">
				<h5 class="media-heading margin-v-5-3"><a href="<?php echo base_url ('course/admin/course_list/'.$user_id.'/'.$role_id); ?>"> <?php echo $num_course." ".  'Courses';?> </a>
                </h5>
            </div>   
        </div>
    </div>
</div>
</div>