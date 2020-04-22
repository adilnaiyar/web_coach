<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Admin extends MX_Controller
{
	public function __construct()
		
	{
		parent::__construct();
		$this->load->model('course_model');	
		$this->logged_in();	
	}

	private function logged_in()
	{
		if(!$this->session->userdata('authentication'))
		{
			redirect(base_url());
		}
	}
	
	public function course_list($user_id=0)
	{
		$data['user_id'] = $user_id;
		$role_id         = $this->session->userdata('role_id');
		$data['role_id'] = $role_id;
		$data['title']   = "Course List";

		if($role_id == USER_ROLE_ADMIN)
		{
			$data['course_list'] = $this->course_model->get_course_dashboard();		
		}elseif($role_id == USER_ROLE_TEACHER){
			$coaching_name       = $this->session->userdata('coaching_name');
			$data['course_list'] = $this->course_model->get_all_course($user_id,$coaching_name);
		}else{
			$coaching_name       = $this->session->userdata('coaching_name');
			$data['course_list'] = $this->course_model->get_course_coach($coaching_name);
		}
			$this->load->view(INCLUDE_PATH.'header',$data);
			$this->load->view('index_courses',$data);
			$this->load->view(INCLUDE_PATH.'footer',$data);
	}
	public function create_course($user_id=0,$row_id=0)
	{
		$role_id         = $this->session->userdata('role_id');
		$data['role_id'] = $role_id;
		$data['user_id'] = $user_id;

		if($row_id == 0)
		{
			$data['title']      = "Create Course";
			$data['row_id']     = $row_id;
			$data['course_id']  = $this->course_model->auto_generate();
			$data['coaching']   = $this->User_model->get_all_coaching();
			$this->load->view(INCLUDE_PATH.'header',$data);
			$this->load->view('create_courses',$data);
			$this->load->view(INCLUDE_PATH.'footer',$data);
		}else{
			$data['row_id'] = $row_id;
			$data['title']  = "Edit_Course";
			$data['course'] = $this->course_model->get_course_by_id($row_id);
			$this->load->view(INCLUDE_PATH.'header',$data);
			$this->load->view('create_courses',$data);
			$this->load->view(INCLUDE_PATH.'footer',$data);
		}
	}
	
	public function section_list($user_id=0,$course_id=0,$row_id=0)
	{
		$data['user_id']      = $user_id;
		$data['role_id']      = $this->session->userdata('role_id');
		$data['course_id']    = $course_id;
		$data['title']        = "Section List";
		$data['section_list'] = $this->course_model->get_sections_list($course_id);
		$this->load->view(INCLUDE_PATH.'header',$data);
		$this->load->view('index_section',$data);
		$this->load->view(INCLUDE_PATH.'footer',$data);
	}
	public function section($user_id=0,$course_id=0,$row_id=0)
	{	
		$data['user_id']   = $user_id;
		$data['course_id'] = $course_id;
		if ($row_id == 0) 
		{
			$data['title'] = "Create Section";
			$data['row_id']   = $row_id;
			$this->load->view(INCLUDE_PATH.'header',$data);
			$this->load->view('add_section',$data);
			$this->load->view(INCLUDE_PATH.'footer',$data);
			
		}else{
			$data['row_id']   = $row_id;
			$data['title']    = "Edit Section";
			$data['sections'] = $this->course_model->get_sections_by_id($row_id);
			$this->load->view(INCLUDE_PATH.'header',$data);
			$this->load->view('add_section',$data);
			$this->load->view(INCLUDE_PATH.'footer',$data);
		}
		
	}
	
	public function lesson_list($user_id=0,$course_id=0,$section_id=0,$row_id=0)
	{
		$data['user_id']    = $user_id;
		$data['role_id']    = $this->session->userdata('role_id');
		$data['course_id']  = $course_id;
		$data['section_id'] = $section_id;

		$data['title']       = "Lesson List";
		$data['lesson_list'] = $this->course_model->get_lessons_list($course_id,$section_id);
		$this->load->view(INCLUDE_PATH.'header',$data);
		$this->load->view('index_lessons',$data);
		$this->load->view(INCLUDE_PATH.'footer',$data);
	}
	public function lesson($user_id=0,$course_id=0,$section_id=0,$row_id=0)
	{
		$data['user_id']    = $user_id;
		$data['course_id']  = $course_id;
		$data['section_id'] = $section_id;
		if($row_id == 0)
		{
		$data['title'] = "Create Lesson";
		$data['row_id']   = $row_id;
		$this->load->view(INCLUDE_PATH.'header',$data);
		$this->load->view('add_lesson',$data);
		$this->load->view(INCLUDE_PATH.'footer',$data);

		}else{
			$data['row_id']  = $row_id;
			$data['title']   = "Edit Lesson";
			$data['lessons'] = $this->course_model->get_lesson_by_id($row_id);

			$this->load->view(INCLUDE_PATH.'header',$data);
			$this->load->view('add_lesson',$data);
			$this->load->view(INCLUDE_PATH.'footer',$data);
		}
		
	}
	public function content_list($user_id=0,$course_id=0,$section_id=0,$lesson_id=0,$content_id=0)
	{	
		$data['user_id']     = $user_id;
		$data['role_id']     = $this->session->userdata('role_id');
		$data['course_id']   = $course_id;
		$data['section_id']  = $section_id;
		$data['lesson_id']   = $lesson_id;

		$data['title']   = "Content List";
		$data['content'] = $this->course_model->get_content_list($course_id,$section_id,$lesson_id );
		$this->load->view(INCLUDE_PATH.'header',$data);
		$this->load->view('index_content',$data);
		$this->load->view(INCLUDE_PATH.'footer',$data);
	}
	public function content($user_id=0,$course_id=0,$section_id=0,$lesson_id=0,$content_id=0)
	{
		$data['user_id']    = $user_id;
		$data['course_id']  = $course_id;
		$data['section_id'] = $section_id;
		$data['lesson_id']  = $lesson_id;

		if($content_id == 0)
		{
			$data['title']    = "Create Content";
			$data['content_id']   = $content_id;
			$this->load->view(INCLUDE_PATH.'header',$data);
			$this->load->view('add_content',$data);
			$this->load->view(INCLUDE_PATH.'footer',$data);
		}else{
			$data['content_id']   = $content_id;
			$data['title']        = "Edit Content";
			$data['contents']     = $this->course_model->get_content_by_id($content_id);
			$this->load->view(INCLUDE_PATH.'header',$data);
			$this->load->view('add_content',$data);
			$this->load->view(INCLUDE_PATH.'footer',$data);
		}
		
	}
	public function content_display($user_id=0,$course_id=0,$section_id=0,$lesson_id=0,$content_id=0)
	{
		$data['user_id']    = $user_id;
		$data['role_id']    = $this->session->userdata('role_id');
		$data['course_id']  = $course_id;
		$data['section_id'] = $section_id;
		$data['lesson_id']  = $lesson_id;
		$data['content_id'] = $content_id;

		$data['title']     = "Content Display";
		$data['contents']  = $this->course_model->get_content_by_id($content_id);
		$this->load->view(INCLUDE_PATH.'header',$data);
		$this->load->view('content_display',$data);
	}
		
}


?>