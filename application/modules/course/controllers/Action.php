<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Action extends MX_Controller
{
	public function __construct()	
	{	
		parent::__construct();	
		$this->load->model('course_model');		
	}
	
	public function course_validation($user_id=0,$row_id=0)
	{
		$this->form_validation->set_rules('title','Title','required|alpha_numeric_spaces');
		$this->form_validation->set_rules('created_by','Created By','required|alpha_numeric_spaces');
		$this->form_validation->set_rules('duration','Duration','required|alpha_numeric_spaces');
		$this->form_validation->set_error_delimiters('<div class="text-white">','</div>');

		if($this->form_validation->run()==true) 
		{
			
			$course_info = $this->course_model->insert_course($user_id,$row_id);

			if($course_info)
			{
			    $this->session->set_flashdata('msg', "Course Added Successfully"); 
				 redirect (base_url('course/admin/course_list/'.$user_id.'/'.$course_info));
			}else{
			    $this->session->set_flashdata('msg', "Course Not Added");
			    redirect (base_url('course/admin/course_list/'.$user_id));
			}
		} 
		else 
		{
			$this->session->set_flashdata('error', validation_errors()); 
			redirect (base_url('course/admin/create_course/'.$user_id));
		}	
	}

	public function delete_course($user_id,$row_id)
	{
	 	$this->course_model->del_course($row_id);
	 	$this->session->set_flashdata('del', "Course Deleted Successfully");
		redirect (base_url('course/admin/course_list/'.$user_id));
	}

	public function section_validation($user_id=0,$course_id=0,$row_id=0)
	{
		$this->form_validation->set_rules('section_title','Title','required|trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('duration','Duration','required|trim|alpha_numeric');
		$this->form_validation->set_error_delimiters('<div class="text-white">','</div>');

		if($this->form_validation->run() == true)
			{
				$section_id = $this->course_model->insert_section($course_id,$row_id);
				$this->session->set_flashdata('msg', "Section Added Successfully");
				redirect(base_url('course/admin/section_list/'.$user_id.'/'.$course_id.'/'.$section_id));
			}
		else
			{
				$this->session->set_flashdata('error', validation_errors()); 
				redirect (base_url('course/admin/section/'.$user_id.'/'.$course_id));
			}
	}
	public function delete_section($user_id,$course_id,$row_id)
	{
		$this->course_model->del_section($row_id);
	 	$this->session->set_flashdata('del', "Section Deleted Successfully"); 
		redirect (base_url('course/admin/section/'.$user_id.'/'.$course_id));
	}
	
	public function lesson_validation($user_id=0,$course_id=0,$section_id=0,$row_id=0)
	{	
		$this->form_validation->set_rules('lesson_title','Title','required|trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('duration','Duration','required|trim|alpha_numeric');
		$this->form_validation->set_error_delimiters('<div class="text-white">','</div>');

		if($this->form_validation->run())
			{
				$lesson_id = $this->course_model->insert_lesson($course_id,$section_id,$row_id);
				$this->session->set_flashdata('msg', "Lesson Added Successfully");
				redirect(base_url('course/admin/lesson_list/'.$user_id.'/'.$course_id.'/'.$section_id.'/'.$lesson_id));
			}
		else
			{
				$this->session->set_flashdata('error', validation_errors());
				redirect(base_url('course/admin/lesson/'.$user_id.'/'.$course_id.'/'.$section_id)); 
			}
	}
	public function delete_lesson($user_id,$course_id,$section_id,$row_id)
	{
		$this->course_model->del_lesson($row_id);
		$this->session->set_flashdata('del', "Lesson deleted Successfully");
	 	redirect(base_url('course/admin/lesson_list/'.$user_id.'/'.$course_id.'/'.$section_id));
	}

	public function content_validation($user_id=0,$course_id=0,$section_id=0,$lesson_id=0,$row_id=0)
	{
		$data['user_id']   = $user_id;
		$data['course_id'] =$course_id;
		$data['section_id']=$section_id;
		$data['lesson_id'] =$lesson_id;

		$this->form_validation->set_rules('content_title','Title','required|alpha_numeric_spaces');
		$this->form_validation->set_rules('notes','Notes','required');
		$this->form_validation->set_error_delimiters('<div class="text-white">','</div>');

		if($this->form_validation->run())	
		{
			$configVideo['upload_path']   = 'upload/video/'; 
			$configVideo['max_size']      = 5*1024*1024; //20MB
			$configVideo['allowed_types'] = 'mp4'; 

			$this->load->library('upload', $configVideo);
			$this->upload->initialize($configVideo);
		
		if ($this->upload->do_upload('videofile')) 
			{
				$upload_data  = $this->upload->data();
		    	$content_id   = $this->course_model->insert_content($course_id,$section_id,$lesson_id,$row_id,$upload_data);
				$this->session->set_flashdata('msg', "Content Added Successfully");
				redirect(base_url('course/admin/content_list/'.$user_id.'/'.$course_id.'/'.$section_id.'/'.$lesson_id.'/'.$content_id));
			}
			else
			{
				$this->session->set_flashdata('error', validation_errors());
				redirect(base_url('course/admin/content/'.$user_id.'/'.$course_id.'/'.$section_id.'/'.$lesson_id));
			}
		}
	}

	public function delete_content($user_id,$course_id,$section_id,$lesson_id,$row_id)
	{
		$this->course_model->del_content($row_id);
		$this->session->set_flashdata('del', "Content deleted Successfully");
	 	redirect(base_url('course/admin/content_list/'.$user_id.'/'.$course_id.'/'.$section_id.'/'.$lesson_id));
	}
}

?>