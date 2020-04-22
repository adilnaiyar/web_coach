<div class="card bg-info col-md-10">
	<div class="row justify-content-center mt-4">
		<div class="col-md-8">
			<?php 
			$no =1;
			foreach ($lessons as $lesson)
			{
				$lesson_id      = $lesson->id;
				$lesson_title   = $lesson->title;
				$data['contents'] = $this->course_model->get_content_list($course_id,$section_id,$lesson_id);
			?>
	<div class="accordion" id="accordionExample">
	  <div class="card card-default">
	    <div class="card-header bg-dark" id="headingOne">
	      <h4 class="card-title">
	        <a href ="#collapseOne"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	        <span>#Lesson <?php echo $no++.'=>'; ?></span>	
	          <?php echo $lesson_title; ?>
	        </a>
	      </h4>
	    </div>
	    <?php
	    	if (! empty($data['contents'])) 
	    	{
    		$sr = 1;
	    	foreach ($data['contents'] as $content) 
				{
					$content_id = $content->id;
		?>	
	    <div id="collapseOne" class="collapse in" aria-labelledby="headingOne" data-parent="#accordionExample">
	      <ul class="list-group">
	      	<li class="list-group-item">
	      		<span>#Content <?php echo $sr++.'=>'; ?></span>	
	      		<?php echo $content->title;?>
	      		<button  class="btn btn-success btn-sm float-right"><a href="<?php echo base_url('course/admin/view_content/'.$user_id.'/'.$course_id.'/'.$section_id.'/'.$lesson_id.'/'.$content_id);?>">View Content</a></button>
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
        
