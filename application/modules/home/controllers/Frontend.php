<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Frontend extends MX_Controller
{
	public function __construct()
	{
		parent:: __construct();
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
		$data['user_id']  = $user_id;
		$data['role_id']  = $role_id;
		$data['title'] 	  = "Student Dashboard";
		$coaching_name    = $this->session->userdata('coaching_name');
		$data['course']   = $this->Course_model->get_course_coach($coaching_name);
		$this->load->view(INCLUDE_PATH.'header',$data);
		$this->load->view('dashboard_student',$data);
		$this->load->view(INCLUDE_PATH.'footer',$data);
	}
}

?>

