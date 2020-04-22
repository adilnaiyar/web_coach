<div class="row" style="margin-left: 75px">
  <div class="col-md-10">
	<div class="card-body bg-white">
		<div class="card-header bg-default">
			<h3 class="text-center">Create Content</h3>
		</div>
		<div class="row justify-content-center mt-2">
			<div class="col-md-10">
				<?php if($message = $this->session->flashdata('error')): ?>
			 		<div class="alert alert-danger alert-dismissible " id ="msg">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						 <strong> <?php echo $message;?> </strong>
					</div>
		  		<?php endif;?>
				<?php echo form_open_multipart('course/action/content_validation/'.$user_id.'/'.$course_id.'/'.$section_id.'/'.$lesson_id.'/'.$content_id);?>

					<?php if($content_id == 0) { ?>
						<div class="form-group">
							<?php echo form_label('Title:','title');?>
							<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Content-Title','name'=>'content_title','value'=>'']);?>
						</div>
						<div class="form-group">
							<?php echo form_label('Notes:','Notes');?>
							<?php echo form_textarea(['id'=>'mytextarea','rows' => '12','cols' => '50','placeholder'=>'Enter Embeded','name'=>'notes','value'=>'']);?>
						</div>
						<div class="form-group">
							<video width="320" height="240" controls>   
	            				<source src="<?php echo base_url('upload/video/sample.mp4');?>" type="video/mp4">
	       					 </video>
							<?php echo form_upload(['class'=>'form-control bg-info btn-danger', 'id'=>'myvideo','placeholder'=>'Upload Video Here','name'=>'videofile','value'=>'']);?>
							
						</div>
					<?php }else{?>

						<div class="form-group">
						<?php echo form_label('Title:','title');?>
						<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Content-Title','name'=>'content_title','value'=>set_value('content_title',$contents['title'])]);?>
					</div>
					<div class="form-group">
						<?php echo form_label('Notes:','Notes');?>
						<?php echo form_textarea(['id'=>'mytextarea','rows' => '12','cols' => '50','placeholder'=>'Enter Embeded','name'=>'notes','value'=>set_value('notes',strip_tags(html_entity_decode($contents['notes'])))]);?>
					</div>
					<div class="form-group">
						<video width="320" height="240" controls>   
            				<source src="<?php echo base_url($contents['video']);?>" type="video/mp4">
       					 </video>
						<?php echo form_upload(['class'=>'form-control bg-info btn-danger', 'id'=>'myvideo','placeholder'=>'Upload Video Here','name'=>'videofile','value'=>set_value('video',$contents['video'])]);?>
						
					</div>
					<?php }?>
					
					<div class="form-group">			
						<?php echo form_submit(['class'=>'btn bg-success text-white','value'=>'Submit','type'=>'submit']);?>
						<?php echo form_reset(['class'=>'btn bg-secondary text-white','value'=>'Reset','type'=>'reset']);?>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>
</div>
<script>
	CKEDITOR.replace('notes', {
  		height: 300,
  		filebrowserUploadUrl: ""
	});	
</script>

 
  
  
