<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Action extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->config->load('config_users');
		$this->load->helper('security');
	}

	public function register_validation()
	{
		$this->form_validation->set_rules('username','Full Name','required|trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user_info.email]');
		$this->form_validation->set_rules('coaching_name','Coaching Name','required');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[3]|max_length[12]|alpha_numeric');
		$this->form_validation->set_rules('cpassword','Re-enter Password','required|matches[password]')	;
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		$this->form_validation->set_message('is_unique',"Email is Already Register with Another user.");

		if($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('msg', validation_errors());
			redirect(base_url('users/admin/register'));
		}else{
			$user_info = $this->User_model->new_register();

			if($user_info)
			{
				$email          = $this->input->post('email');
				$coaching_name  = $this->input->post('coaching_name');
				$student_detail = $this->User_model->student_details($email,$coaching_name);
				
			// Load PHPMailer library
	        $this->load->library('phpmailer_lib');
	        
	        // PHPMailer object
	        $mail = $this->phpmailer_lib->load();
	        
	        // SMTP configuration
	        $mail->isSMTP();
	        $mail->Host        = 'smtp.gmail.com';
	        $mail->SMTPAuth    = true;
	        $mail->Username    = 'saif789767@gmail.com';
	        $mail->Password    = 'saif@786';
	        $mail->SMTPSecure  = 'tls';
	        $mail->Port        = 587;
	        
	        $mail->setFrom('Web_Coach@gmail.com', 'Web_Coach');
	        $mail->addReplyTo('Web_Coach@gmail.com', 'Web_Coach');
	        
	        // Add a recipient
	        $mail->addAddress($this->input->post('email'));
	        
	        // Add cc or bcc 
	        $mail->addCC('cc@example.com');
	        $mail->addBCC('bcc@example.com');
	        
	        // Email subject
	        $mail->Subject = 'Registration Successfull';
	        
	        // Set email format to HTML
	        $mail->isHTML(true);
	        
	        // Email body content
	        $mailContent = '<strong> Hi '.$student_detail['username'].',</strong>
					<p>Thank you for registering. Your '.SITE_TITLE.'\'s account has been successfully created with Coaching name:: <strong>'.$student_detail['coaching_name'].'</strong>   Please Login to continue with '.SITE_TITLE. '.';
	        $mail->Body = $mailContent;
	        
	        // Send email
	        if(!$mail->send()){
	            echo 'Message could not be sent.';
	            echo 'Mailer Error: ' . $mail->ErrorInfo;
	        }else{
	            echo 'Message has been sent';
	        }
    
   			}else{

				$this->session->set_flashdata('error', 'Sorry! Some error occured.');
				 redirect(base_url('users/admin/register'));
			}
		}

	}

	public function login_validation()
	{
		$this->form_validation->set_rules('email','email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[3]|max_length[12]');
		
		if($this->form_validation->run() == true)
		{
			$row = $this->User_model->validate_login();
			if ($row == false)
			{
			 	$this->session->set_flashdata('error',"Invalid Email or Password!!");
			 	redirect(base_url('users/admin/login'));
			} else {
				 	$userdata = array(
						'id'            =>$row->id,
						'username'      =>$row->username,
						'email'         =>$row->email,
						'role_id'       =>$row->role_id,
						'coaching_name' =>$row->coaching_name,
						'authentication'=>TRUE
					);
				 	$this->session->set_userdata($userdata);
					$user_id = $row->id;
					$role_id = $row->role_id;
					if($role_id == USER_ROLE_STUDENT)
					{
						$this->session->set_flashdata('msg', 'Welcome to the Dashboard');
						redirect(base_url('home/frontend/dashboard/'.$user_id.'/'.$role_id));
					}else{
						$this->session->set_flashdata('msg', 'Welcome to the Dashboard');
						redirect(base_url('home/admin/dashboard/'.$user_id.'/'.$role_id));
					}
				}
		    } else{
				$this->session->set_flashdata('error', validation_errors());
				 redirect(base_url('users/admin/login'));
		}			
	}

	public function coaching_validation($user_id = 0,$role_id =0,$row_id=0)
	{
		if($row_id == 0){
		$this->form_validation->set_rules('coaching_name','Coaching Name','required|trim|alpha_numeric_spaces|is_unique[user_info.coaching_name]');

		}else{
		$this->form_validation->set_rules('coaching_name','Coaching-Name','required|trim|alpha_numeric_spaces');
		}
		$this->form_validation->set_rules('username','Owner Name','required|trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('address','Address','required|trim');
		$this->form_validation->set_error_delimiters('<div class="text-white">','</div>');
		$this->form_validation->set_message('is_unique',"This Coaching is Already Register with Another user.");

		if($this->form_validation->run() == false)
		{
			 $this->session->set_flashdata('error', validation_errors());

			 redirect(base_url('users/admin/coaching/'.$user_id.'/'.$role_id));
			
		}else{

			$user_info = $this->User_model->coaching_register($row_id);

			$this->session->set_flashdata("msg", "Coaching Added Successfully!!");
			redirect(base_url('users/admin/coaching_list/'.$user_id.'/'.$role_id));
				
			}
	}
	public function coadmin_validation($user_id = 0,$role_id =0)
	{
		$this->form_validation->set_rules('username','Full Name','required|trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[3]|max_length[12]|alpha_numeric');
		$this->form_validation->set_rules('cpassword','Re-enter Password','required|matches[password]')	;
		$this->form_validation->set_error_delimiters('<div class="text-white">','</div>');

		if($this->form_validation->run() == false)
		{
			 $this->session->set_flashdata('error', validation_errors());

			 redirect(base_url('users/admin/coadmin/'.$user_id.'/'.$role_id));
			
		}else{

			$user_info = $this->User_model->coadmin_register();

			$this->session->set_flashdata("msg", "Coadmin Added Successfully!!");
			redirect(base_url('users/admin/coadmin_list/'.$user_id.'/'.$role_id));
				
			}
	}

	public function teacher_validation($user_id = 0,$role_id =0)
	{
		
		$this->form_validation->set_rules('username','Username','required|trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[3]|max_length[12]|alpha_numeric');
		$this->form_validation->set_rules('cpassword','Re-enter Password','required|matches[password]')	;
		$this->form_validation->set_error_delimiters('<div class="text-white">','</div>');
		
		if($this->form_validation->run() == false)
		{
			 $this->session->set_flashdata('error', validation_errors());

			 redirect(base_url('users/admin/teacher/'.$user_id.'/'.$role_id));
			
		}else{

			$user_info = $this->User_model->teacher_register($role_id);

			$this->session->set_flashdata("msg", "Teacher Added Successfully!!");
			redirect(base_url('users/admin/teacher_list/'.$user_id.'/'.$role_id));
				
			}
	}
	public function student_validation($user_id = 0,$role_id =0)
	{
		$this->form_validation->set_rules('username','Username','required|trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[3]|max_length[12]|alpha_numeric');
		$this->form_validation->set_rules('cpassword','Re-enter Password','required|matches[password]')	;
		$this->form_validation->set_error_delimiters('<div class="text-white">','</div>');
		
		if($this->form_validation->run() == false)
		{
			 $this->session->set_flashdata('error', validation_errors());

			 redirect(base_url('users/admin/student/'.$user_id.'/'.$role_id));
			
		}else{

			$user_info = $this->User_model->student_register($role_id);

			$this->session->set_flashdata("msg", "Student Added Successfully!!");
			redirect(base_url('users/admin/student_list/'.$user_id.'/'.$role_id));
				
			}
	}

	public function edit_user_profile($user_id = 0,$role_id = 0)
	{

		$this->form_validation->set_rules('username','FullName','required|trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('address','Address','trim|min_length[5]|max_length[50]');

		if($role_id == USER_ROLE_ADMIN){}else{
		$this->form_validation->set_rules('coaching_name','Coaching Name','required|trim');
		}
		
		$this->form_validation->set_error_delimiters('<div class="text-White">','</div>');

		if($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('error',validation_errors());
			 redirect(base_url('users/admin/user_profile/'.$user_id.'/'.$role_id));
		}else{

			$user_update = $this->User_model->edit_user_profile($user_id);

			$this->session->set_flashdata('success',"Your Profile is Updated!!");
			redirect(base_url('users/admin/user_profile/'.$user_id.'/'.$role_id));
				
		}
	}

	public function upload_photo($user_id = 0,$role_id = 0)
	{
		
		$data['user_id'] = $user_id;
		$data['role_id'] = $role_id;

 		$config['upload_path']          = './upload/images';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 5*1024*1024; //5MB
        
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $errors = $this->upload->display_errors();
				$this->output->set_content_type("application/json");
				$this->output->set_output(json_encode(array('status'=>false, 'error'=>$errors )));
        }
        else
        {
            $upload_data = $this->upload->data();

            $config['image_library']  = 'gd2';
			$config['source_image']   = './upload/images'.$upload_data['file_name'];
			$config['create_thumb']   = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['quality']        = '60%'; 
			$config['width']          = 200;
			$config['height']         = 200;
			$config['new_image']      = './upload/images'.$upload_data['file_name'];

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
        	
            $this->User_model->upload_photo($user_id,$role_id,$upload_data);
            $this->session->set_flashdata('msg','Image Uploaded successfully!!');
            redirect(base_url('users/admin/user_profile/'.$user_id.'/'.$role_id));
      
        }                	
	}

	public function change_password($user_id = 0,$role_id =0)
	{

		$this->form_validation->set_rules('newpass','New Password','required|trim|min_length[3]|max_length[12]');
		$this->form_validation->set_rules('conpass','Confirm Password','required|matches[newpass]');
		$this->form_validation->set_error_delimiters('<div class="text-White">','</div>');

		if($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('error',validation_errors());
			redirect(base_url('users/admin/change_password/'.$user_id.'/'.$role_id)); 

		} else{
				$npass = $this->input->post ('newpass');
				$update_password = $this->User_model->update_password($user_id,$npass);
				$this->session->set_flashdata('error',"Now Login wtith your new password!!");
				redirect(base_url('users/action/logout'));
		}
	}

	public function forgot_password() 
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		if ($this->form_validation->run () == true) 
		{
			$email         = $this->security->xss_clean($this->input->post ('email'));
			$email_exists  = $this->User_model->check_registered_email ($email);
			if ($email_exists == false) 
			{
				$this->session->set_flashdata('error',"Email Is Not Registered !!");
				redirect(base_url('users/admin/forgot_password'));
			}else{
				$user_id     = $email_exists['id']; 
				$role_id     = $email_exists['role_id'];
				$check_email = md5($email_exists['email']);

				$this->session->set_flashdata('success',"Create Your New Password Here!!");
				redirect(base_url('users/admin/password_change/'.$user_id.'/'.$role_id.'/'.$check_email));
			}

		}else{
				$this->session->set_flashdata('error',validation_errors());
				redirect(base_url('users/admin/forgot_password'));
		}
	}

	public function password_change($user_id = 0,$role_id =0)
	{
		$this->form_validation->set_rules('newpass','New Password','required|trim|min_length[3]|max_length[12]');
		$this->form_validation->set_rules('conpass','Confirm Password','required|matches[newpass]');
		$this->form_validation->set_error_delimiters('<div class="text-White">','</div>');

		if($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('error',validation_errors());
			redirect(base_url('users/admin/change_password/'.$user_id.'/'.$role_id)); 

		} else{
				$npass = $this->input->post ('newpass');
				$update_password = $this->User_model->update_password($user_id,$npass);
				$this->session->set_flashdata('error',"Now Login wtith your new password!!");
				redirect(base_url('users/action/logout'));
		}
	}	

	public function delete_coaching($user_id,$Crole_id,$row_id)
	{
		$role_id = $this->session->userdata('role_id');
	 	$this->User_model->del_coaching($row_id);
	 	$this->session->set_flashdata('del', "Coaching Deleted Successfully");
		redirect (base_url('users/admin/coaching_list/'.$user_id.'/'.$role_id));
	}
	public function delete_coadmin($user_id,$COArole_id,$row_id)
	{
		$role_id = $this->session->userdata('role_id');
	 	$this->User_model->del_coadmin($row_id);
	 	$this->session->set_flashdata('del', "Teacher Deleted Successfully");
		redirect (base_url('users/admin/coadmin_list/'.$user_id.'/'.$role_id));
	}
	public function delete_teacher($user_id,$Trole_id,$row_id)
	{
		$role_id = $this->session->userdata('role_id');
	 	$this->User_model->del_teacher($row_id);
	 	$this->session->set_flashdata('del', "Teacher Deleted Successfully");
		redirect (base_url('users/admin/teacher_list/'.$user_id.'/'.$role_id));
	}
	public function delete_student($user_id,$Srole_id,$row_id)
	{
		$role_id = $this->session->userdata('role_id');
	 	$this->User_model->del_student($row_id);
	 	$this->session->set_flashdata('del', "Student Deleted Successfully");
		redirect (base_url('users/admin/student_list/'.$user_id.'/'.$role_id));
	}

	public function logout () 
	{
		$this->User_model->logout ();
		$this->session->set_flashdata('error',"You are Logged Out!!");
		
		$data['title'] = "Member Login";
		$data['roles'] = $this->User_model->get_roles();
		$this->load->view('layout/header',$data);
		$this->load->view('login',$data);
		$this->load->view('layout/footer',$data);
	}
}			

