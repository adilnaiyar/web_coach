  <div class="card bg-secondary text-white">
    <div class="card-header text-center text-white bg-danger">
        <h4><?php echo $contents['title']; ?></h4>
    </div>
    <div class="card-body justify-content-center">
        <p class="card-text"><?php echo strip_tags(html_entity_decode($contents['notes'])); ?></p>
    </div>
    <div class="text-center">
    <?php if($contents['video']){?>
    
    <video width="620" height="320" controls>   
        <source src="<?php echo base_url($contents['video']);?>" type="video/mp4">
    </video>
    
    <?php }else{?>
        <video width="320" height="240" controls>   
            <source src="<?php echo base_url('upload/video/sample.mp4');?>" type="video/mp4">
        </video>
    <?php }?>
    </div>
    <div class="card-footer text-center">
        <hr size="30">
        <a href="<?php echo base_url('course/admin/content_list/'.$user_id.'/'.$course_id.'/'.$section_id.'/'.$lesson_id.'/'.$content_id);?>" class="btn bg-dark text-white"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
    </div>
</div>



