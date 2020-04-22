<div class="card bg-info col-md-10">
	<div class="row justify-content-center mt-4">
		<div class="col-md-8">
			<?php 
			$no =1;
			foreach ($sections as $section)
			{
				$section_id      = $section->id;
				$section_title   = $section->title;
				$data['lessons'] = $this->course_model->get_lessons_list($course_id,$section_id);
			?>
	<div class="accordion" id="accordionExample">
	  <div class="card card-default">
	    <div class="card-header bg-dark" id="headingOne">
	      <h4 class="card-title">
	        <a href ="#collapseOne"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	        <span>#Section <?php echo $no++.'=>'; ?></span>	
	          <?php echo $section_title; ?>
	        </a>
	      </h4>
	    </div>
	    <?php
	    	if (! empty($data['lessons'])) 
	    	{
    		$sr = 1;
	    	foreach ($data['lessons'] as $lesson) 
				{
					$lesson_id = $lesson->id;
		?>	
	    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
	      <ul class="list-group">
	      	<li class="list-group-item">
	      		<span>#Lesson <?php echo $sr++.'=>'; ?></span>	
	      		<?php echo $lesson->title;?>
	      		<button  class="btn btn-success btn-sm float-right"><a href="<?php echo base_url('course/admin/view_lesson/'.$user_id.'/'.$role_id.'/'.$course_id.'/'.$section_id);?>">View Lesson</a></button>
	      	</li>
	      </ul>
	    </div>
		<?php } } ?>
	  </div>
	</div>
	<?php } ?>
	</div>
</div>
</div>
        
