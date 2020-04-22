<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Admin extends MX_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Home_model');
		$this->logged_in();
	}
	
	private function logged_in()
	{
		if(!$this->session->userdata('authentication'))
		{
			redirect(base_url());
		}
	}

	public function dashboard($user_id = 0,$role_id=0)
	{
		$data['user_id'] = $user_id;
		$data['role_id'] = $role_id;
		
		if($role_id == USER_ROLE_ADMIN)
		{		
			$data['title'] 	= "Admin Dashboard";
			$this->load->view(INCLUDE_PATH.'header',$data);
			$this->load->view('dashboard_admin',$data);
			$this->load->view(INCLUDE_PATH.'footer',$data);

		}else if($role_id == USER_ROLE_CO_ADMIN)
		{
			$data['title'] 	  = "Co-Admin Dashboard";
			$coaching_name    = $this->session->userdata('coaching_name');
			$data['teacher']  = $this->User_model->get_all_coach_teacher($coaching_name);
			$data['student']  = $this->User_model->get_all_coach_student($coaching_name);
			$data['course']   = $this->Course_model->get_course_coach($coaching_name);
			$this->load->view(INCLUDE_PATH.'header',$data);
			$this->load->view('dashboard_coadmin',$data);
			$this->load->view(INCLUDE_PATH.'footer',$data);
		}else{
			$data['title'] 	  = "Teacher Dashboard";
			$coaching_name    = $this->session->userdata('coaching_name');
			$data['student']  = $this->User_model->get_all_coach_student($coaching_name);
			$data['course']   = $this->Course_model->get_all_course($user_id,$coaching_name);
			$this->load->view(INCLUDE_PATH.'header',$data);
			$this->load->view('dashboard_teacher',$data);
			$this->load->view(INCLUDE_PATH.'footer',$data);
		}
		
	}
}
?>

