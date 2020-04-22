<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Admin extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->config->load('config_users');
	}

	public function index()
	{
		$this->login();
	}

	private function dashboard_in()
	{
		if($this->session->userdata('authentication'))
		{
			$user_id = $this->session->userdata('id');
			$role_id = $this->session->userdata('role_id');

			if($role_id == USER_ROLE_STUDENT)
			{
				$this->session->set_flashdata('msg', 'Welcome to the Dashboard');
				redirect(base_url('home/frontend/dashboard/'.$user_id.'/'.$role_id));
			}else{
				$this->session->set_flashdata('msg', 'Welcome to the Dashboard');
				redirect(base_url('home/admin/dashboard/'.$user_id.'/'.$role_id));
			}
		}
	}

	private function logged_in()
	{
		if(!$this->session->userdata('authentication'))
		{
			redirect(base_url());
		}
	}


	public function login()
	{
		$this->dashboard_in();

		$data['title'] = "Member Login";
		
		$data['roles'] = $this->User_model->get_roles();
		$this->load->view('layout/header',$data);
		$this->load->view('login',$data);
		$this->load->view('layout/footer',$data);
	}

	public function register()
	{
		$this->dashboard_in();

		$data['title']     = "Student Register";
		
		$data['coaching']  = $this->User_model->get_all_coaching();
		$data['role']      = $this->User_model->get_roles_by_id(USER_ROLE_STUDENT);
		$this->load->view('layout/header',$data);
		$this->load->view('register',$data);	
	}

	public function forgot_password()
	{
		$this->dashboard_in();

		$data['title'] 		= 'Forgot Password';
		$this->load->view('layout/header',$data);
		$this->load->view('forgot_password',$data);
		$this->load->view('layout/footer',$data);
	}

	public function  password_change($user_id =0,$role_id =0, $check_email = 0)
	{	
		$data['title']   = "Change Password";
		$data['user_id'] = $user_id;
		$data['role_id'] = $role_id;

		$this->load->view('layout/header',$data);
		$this->load->view('password2',$data);
		$this->load->view('layout/footer',$data);	
	}

	public function user_profile($user_id=0,$role_id=0,$row_id=0)
	{ 
		$this->logged_in();

		$data['user_id'] = $user_id;

		if($row_id == 0)
		{
			$data['title']   = "User Profile";
			$data['role_id'] = $this->session->userdata('role_id');
			$data['users']   = $this->User_model->get_user_profile($user_id);
			$data['role']    = $this->User_model->get_roles_by_id($role_id);
			$this->load->view(INCLUDE_PATH.'header',$data);
			$this->load->view('user_profile',$data);
			$this->load->view(INCLUDE_PATH.'footer',$data);
		}else{

			$data['title']    = "Edit Profile";
			$data['role_id']  = $role_id;
			$data['row_id']   = $row_id;
			$data['users']    = $this->User_model->get_user_profile($row_id);
			$data['role']     = $this->User_model->get_roles_by_id($role_id);

			$this->load->view(INCLUDE_PATH.'header',$data);
			$this->load->view('user_profile',$data);
			$this->load->view(INCLUDE_PATH.'footer',$data);
		}
	}
	
	public function  change_password($user_id =0,$role_id =0, $check_email = 0)
	{	
		//$this->logged_in();

		$data['title'] = "Change Password";
		$data['user_id'] = $user_id;
		$data['role_id'] = $role_id;

		if($check_email == 0)
		{
			$this->load->view(INCLUDE_PATH.'header',$data);
			$this->load->view('change_password',$data);
			$this->load->view(INCLUDE_PATH.'footer',$data);
		}else{

			$this->load->view('layout/header',$data);
			$this->load->view('change_password',$data);
			$this->load->view('layout/footer',$data);
		}
	}
	 
	public function  coaching($user_id =0,$role_id =0)
	{
		$this->logged_in();

		$data['title']    = "Coaching Form";
		$data['user_id']  = $user_id;
		$data['role_id']  = $role_id;
		$this->load->view(INCLUDE_PATH.'header',$data);
		$this->load->view('coaching/coaching_reg',$data);
		$this->load->view(INCLUDE_PATH.'footer',$data);	
			
	}

	public function  coaching_list($user_id =0,$role_id =0)
	{
		$this->logged_in();
		
		$data['title']    = "Coaching List";
		$data['user_id']  = $user_id;
		$data['role_id']  = $role_id;
		$data['coaching'] = $this->User_model->get_all_coaching();
		$this->load->view(INCLUDE_PATH.'header',$data);
		$this->load->view('coaching/coaching_list',$data);
		$this->load->view(INCLUDE_PATH.'footer',$data);		
	}
	public function  edit_coaching($user_id =0,$role_id =0,$row_id=0)
	{
		$this->logged_in();

		$data['title']    = "Edit Coaching";
		$data['user_id']  = $user_id;
		$data['role_id']  = $role_id;
		$data['row_id']   = $row_id;
		$data['coaching'] = $this->User_model->get_coaching($row_id);
		$this->load->view(INCLUDE_PATH.'header',$data);
		$this->load->view('coaching/edit_coaching',$data);
			
	}
	public function  coadmin($user_id =0,$role_id =0)
	{
		$this->logged_in();

		$data['title']    = "Co-Admin Form";
		$data['user_id']  = $user_id;
		$data['role_id']  = $role_id;
		$data['coaching'] = $this->User_model->get_all_coaching();
		$data['role']     = $this->User_model->get_roles_by_id(USER_ROLE_CO_ADMIN);
		$this->load->view(INCLUDE_PATH.'header',$data);
		$this->load->view('coaching/coadmin_reg',$data);
		$this->load->view(INCLUDE_PATH.'footer',$data);		
	}
	public function  coadmin_list($user_id =0,$role_id =0)
	{
		$this->logged_in();

		$data['title']    = "Co-Admin List";
		$data['user_id']  = $user_id;
		$data['role_id']  = $role_id;
		$data['coadmin']  = $this->User_model->get_all_coadmin();
		$data['role']     = $this->User_model->get_roles_by_id(USER_ROLE_CO_ADMIN);
		$this->load->view(INCLUDE_PATH.'header',$data);
		$this->load->view('coaching/coadmin_list',$data);
		$this->load->view(INCLUDE_PATH.'footer',$data);		
	}
	
	public function  teacher($user_id =0,$role_id =0)
	{
		$this->logged_in();

		$data['title']    = "Teacher Form";
		$data['user_id']  = $user_id;
		$data['role_id']  = $role_id;
		$data['coaching'] = $this->User_model->get_all_coaching();
		$data['role']     = $this->User_model->get_roles_by_id(USER_ROLE_TEACHER);
		
		$this->load->view(INCLUDE_PATH.'header',$data);
		$this->load->view('coaching/teacher_reg',$data);
		$this->load->view(INCLUDE_PATH.'footer',$data);		
	}
	
	public function  teacher_list($user_id =0,$role_id =0)
	{
		$this->logged_in();

		$data['title']    = "Teacher List";
		$data['user_id']  = $user_id;
		$data['role_id']  = $role_id;
		if($role_id == USER_ROLE_ADMIN)
		{
			$data['teachers'] = $this->User_model->get_all_teacher();
		}else{
			$coaching_name  = $this->session->userdata('coaching_name');
			$data['teachers'] = $this->User_model->get_all_coach_teacher($coaching_name);
		}
			$this->load->view(INCLUDE_PATH.'header',$data);
			$this->load->view('coaching/teacher_list',$data);
			$this->load->view(INCLUDE_PATH.'footer',$data);		
	}
	public function  student($user_id =0,$role_id =0)
	{
		$this->logged_in();

		$data['title']    = "Student Form";
		$data['user_id']  = $user_id;
		$data['role_id']  = $role_id;
		$data['coaching'] = $this->User_model->get_all_coaching();
		$data['role']     = $this->User_model->get_roles_by_id(USER_ROLE_STUDENT);
		$this->load->view(INCLUDE_PATH.'header',$data);
		$this->load->view('coaching/student_reg',$data);
		$this->load->view(INCLUDE_PATH.'footer',$data);		
	}
	public function  student_list($user_id =0,$role_id =0)
	{
		$this->logged_in();
		
		$data['title']    = "Student List";
		$data['user_id']  = $user_id;
		$data['role_id']  = $role_id;

		if($role_id == USER_ROLE_ADMIN)
		{
			$data['students'] = $this->User_model->get_all_student();
		}else{
			$coaching_name    = $this->session->userdata('coaching_name');
			$data['students'] = $this->User_model->get_all_coach_student($coaching_name);
		}
			$this->load->view(INCLUDE_PATH.'header',$data);
			$this->load->view('coaching/student_list',$data);
			$this->load->view(INCLUDE_PATH.'footer',$data);	
	}	
	
}