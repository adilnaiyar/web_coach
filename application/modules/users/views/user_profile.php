<div class="container-fluid ">
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?php echo $title;?></h4>
            </div>
             <?php if($message = $this->session->flashdata('error')): ?>
                <div class="alert alert-danger text-center alert-dismissible mx-2">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong> <?php echo $message; ?>  </strong>
                </div>
            <?php endif;?>
            <?php if($message = $this->session->flashdata('success')): ?>
                <div class="alert alert-success text-center alert-dismissible mx-2">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong> <?php echo $message; ?>  </strong>
                </div>
            <?php endif;?>
            <div class="card-body">
                <form action="<?php echo base_url('users/action/edit_user_profile/'.$user_id.'/'.$role_id);?>" method
                ="POST">
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Role</label>
                                <input type="text" class="form-control" disabled="" value="<?php echo $role['roles_level'];?>">
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" name ="username" placeholder="Enter Full Name" value="<?php echo $users['username'];?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name ="email" placeholder="Enter Email" value="<?php echo $users['email'];?>">
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Date Of Birth</label>
                                <?php 
                                    $d = $users['dob'];
                                    $date = explode('-',$d);
                                    $data['dob'] = $date[2].'/'.$date[1].'/'.$date[0];
                                ?>
                                <input  id = "dob" name = "dob" class="form-control" placeholder='dd/mm/yyyy' autocomplete="off" value="<?php echo $data['dob'];?>">
                            </div>
                        </div>
                    </div>
                    <?php if($role_id == USER_ROLE_ADMIN){}else{?>
                     <div class="row">
                        <div class="col-md-12 px-3">
                            <div class="form-group">
                                <label>Coaching Name</label>
                                <input type="text" name ="coaching_name" class="form-control" placeholder="Enter Coaching Name" value="<?php echo $users['coaching_name'];?>">
                            </div>
                        </div>
                    </div> 
                    <?php }?>  
                    <div class="row">
                        <div class="col-md-12 px-3">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name ="address" class="form-control" placeholder="Enter Address" value="<?php echo $users['address'];?>">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <button type="submit" id="btn" class="btn btn-info btn-fill text-center">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row mb-6">
        <div class="col-md-4 ">
           <div class="card bg-dark" style="width: 18rem;">
                <div class="card-header bg-info">
                     <h4 class="text-center text-white"> Profile Image</h4>
                </div>
                <div class="card-body">
                    <?php if($users['profile_photo']){?>
                        <img class="rounded mx-auto d-block" src="<?php echo base_url('upload/images/'.$users['profile_photo'])?>" style="width:50%" alt="..." >
                    <?php } else{?>
                        <img class="rounded mx-auto d-block" src="<?php echo base_url(THEME_PATH.'assets/img/default-avatar.png')?>"  alt="...">
                     <?php }?>
                 
                    <h3 class=" card-title text-center text-white " role="alert">
                        <?php echo $users['username'];?> </h3>
                </div>
                <div class="card-footer text-center">
                     <button type="button" class="btn btn-primary btn-fill text-white my-2" data-toggle="modal" data-target="#myModal"><i class="fa fa-upload" aria-hidden="true"></i> Upload Image
                    </button>
                </div> 
                <ul class="list-group text-center ">
                    <li class="list-group-item bg-dark"><a href="<?php echo base_url('users/admin/change_password/'.$user_id.'/'.$role_id)?>">Change Password</a>
                    </li>
             </ul>    
         </div>
    </div>
</div>
<!--Modal-->
 <div id="myModal" class="modal fade " role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php echo form_open_multipart ('users/action/upload_photo/'.$user_id.'/'.$role_id); ?>
            <div class="modal-header bg-info ">
                 <h4 class=" model-title text-center">Upload Image</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <div class="row">
                    <label class="col-md-3">Browse File</label>
                    <div class="col-md-9">
                        <input type="file" name="userfile" size="20" class="form-control bg-secondary" />
                        <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
                    </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp
                    <input type="submit" id="" class="btn btn-success text-white bg-success " value="Upload ">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>

    $(document).ready(function(){
        $("#date").datepicker({
            defaultDate: +0,
            showOtherMonths:true, 
            autoSize: true,
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            maxDate: "+0",
            yearRange: "-120:+0", 
        });
    });
</script>

