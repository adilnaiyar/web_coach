<?php if($message = $this->session->flashdata('msg')): 
    $name = $this->session->userdata('username'); ?>
     <div class="row">
        <div class="col-md-6">
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
        <div class="card">
            <div class="card-header">
                 <h4 class="card-title">Number of Courses</h4>
            </div>
            <div class="card-body text-center">
            	<i class="fa fa-book " style="font-size:60px;color:blue"></i>
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
						<h5 class="media-heading margin-v-5-3"><a href="<?php echo base_url ('course/admin/course_list/'.$user_id.'/'.$role_id); ?>"> <?php echo $num_course." ".  'Courses';?> </a></h5>
                    </div>   
            </div>
        </div>
    </div>
</div>