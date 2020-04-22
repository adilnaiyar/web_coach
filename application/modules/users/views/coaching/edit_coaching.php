<div class="container-fluid ">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $title;?></h4>
                </div>
                <?php if($message = $this->session->flashdata('error')): ?>
                    <div class="alert alert-success text-center alert-dismissible mx-2">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         <strong> <?php echo $message; ?>  </strong>
                    </div>
                <?php endif;?>
                <?php if($message = $this->session->flashdata('msg')): ?>
                    <div class="alert alert-success text-center alert-dismissible mx-2">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> <?php echo $message; ?>  </strong>
                    </div>
                <?php endif;?>
                <div class="card-body">
                    <form action="<?php echo base_url('users/action/coaching_validation/'.$user_id.'/'.$role_id.'/'.$row_id);?>" method
                        ="POST">
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Owner Name</label>
                                    <input type="text" class="form-control" name ="username" placeholder="Enter Full Name" value="<?php echo set_value('username',$coaching['username']);?>">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name ="email" placeholder="Enter Email" value="<?php echo set_value('email',$coaching['email']);?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 px-3">
                                <div class="form-group">
                                    <label>Coaching Name</label>
                                    <input type="text" name ="coaching_name" class="form-control" placeholder="Enter Coaching Name" value="<?php echo set_value('coaching_name',$coaching['coaching_name']);?>">
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-md-12 px-3">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name ="address" class="form-control" placeholder="Enter Address" value="<?php echo set_value('address',$coaching['address']);?>">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <button type="submit" id="btn" class="btn btn-info btn-fill">Update Profile</button>
                            </div>
                        </div>
                    </form>
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

