<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Course_model extends CI_Model
{
	public function insert_course($user_id=0,$row_id=0)
	{
		$role_id = $this->session->userdata('role_id');
		if($role_id == USER_ROLE_ADMIN)
		{
			$data['coaching_name'] = $this->input->post('coaching_name');
		}else{
			$data['coaching_name'] = $this->session->userdata('coaching_name');
		}
		$data['title']         = $this->input->post ('title');
		$data['description']   = $this->input->post ('description');
		$data['duration']      = $this->input->post ('duration');
		$data['created_by']    = $this->input->post ('created_by');

		if($row_id == 0){

		$data['user_id']       = $user_id;
		$data['course_id']     = $this->input->post ('course_id');
		$data['status']        = 1;
		$data['creation_date'] = date("Y-m-d H:i:s"); 

		$this->db->insert('courses', $data);
		return $this->db->insert_id();

		}else{

			$data['updation_date'] = date("Y-m-d H:i:s");

			$this->db->where('id',$row_id);
			$this->db->update('courses',$data);
			return $row_id;
		}

	}


	public function auto_generate() 
    {
	    $this->db->select('RIGHT(courses.course_id,3) as kode', FALSE);
	    $this->db->order_by('course_id', 'DESC');
	    $this->db->limit(1);
	    $query = $this->db->get('courses');
	    if($query->num_rows() <> 0) {
	        $data = $query->row();
	        $kode = intval($data->kode) + 1;
	    }
	    else {
	        $kode = 1;
	    }

	    $kodemax = str_pad($kode, 3, 0, STR_PAD_LEFT); 
	    $kodejadi = "CID". $kodemax;

	    return $kodejadi;
    }

	public function get_all_course($user_id,$coaching_name)
	{
		$this->db->where('user_id',$user_id);
		$this->db->where('coaching_name',$coaching_name);
		$sql = $this->db->get('courses');
		return $sql->result();
	}
	public function get_course_dashboard()
	{
		$sql = $this->db->get('courses');
		return $sql->result();
	}
	public function get_course_coach($coaching_name)
	{
		$this->db->where('coaching_name',$coaching_name);
		$sql = $this->db->get('courses');
		return $sql->result();
	}
	
	public function get_course_by_id($row_id)
	{
		$this->db->where('id',$row_id);
		$sql = $this->db->get('courses');
		return $sql->row_array();

	}
	public function del_course($row_id)
	{
		 $this->db->where('id',$row_id);
		$this->db->delete('courses');
		return $this->db->insert_id();
		
	}

	public function insert_section($course_id=0,$row_id=0)
	{
		$data['title'] = $this->input->post('section_title');
		$data['duration'] = $this->input->post('duration');

		if($row_id == 0)
		{
			$data['course_id']=$course_id;
			$data['creation_date'] = date("Y-m-d H:i:s"); 

			$this->db->insert('sections',$data);
			return $this->db->insert_id();
		}
		else{

			$data['updation_date'] = date("Y-m-d H:i:s");

			$this->db->where('id',$row_id);
			$this->db->update('sections',$data);
			return $row_id;
		}
	}
	public function get_sections_list($course_id)
	{
	
	    $this->db->where('course_id',$course_id);
		$sql = $this->db->get('sections');
		return $sql->result();
	}
	public function get_sections_by_id($row_id)
	{
		$this->db->where('id',$row_id);
		$sql = $this->db->get('sections');
		return $sql->row_array();

	}
	public function del_section($row_id)
	{
		 $this->db->where('id',$row_id);
		$this->db->delete('sections');
		return $this->db->insert_id();
		
	}

	public function insert_lesson($course_id=0,$section_id=0,$row_id=0)
	{
		$data['title'] = $this->input->post('lesson_title');
		$data['duration'] = $this->input->post('duration');

		if($row_id == 0){

		$data['course_id'] = $course_id;
		$data['section_id'] = $section_id;
		$data['creation_at'] = date("Y-m-d H:i:s");

		$this->db->insert('lessons',$data);
		return $this->db->insert_id();

		}else{
			$data['updation_date'] = date("Y-m-d H:i:s");

			$this->db->where('id',$row_id); 
			$this->db->update('lessons',$data);
			return $row_id;
		}
		
	}
	public function get_lessons_list($course_id,$section_id)
	{
		$this->db->where('course_id',$course_id);
	    $this->db->where('section_id',$section_id);
		$sql = $this->db->get('lessons');
		return $sql->result();
	}
	public function get_lesson_by_id($row_id)
	{

		$this->db->where('id',$row_id);
		$sql = $this->db->get('lessons');
		return $sql->row_array();

	}
	public function del_lesson($row_id)
	{
		 $this->db->where('id',$row_id);
		$this->db->delete('lessons');
		return $this->db->insert_id();
		
	}

	public function insert_content($course_id=0,$section_id=0,$lesson_id=0,$row_id=0,$upload_data=0)
	{
		$data['title'] = $this->input->post('content_title');
        $data['notes'] = $this->input->post('notes');
        $url           = 'upload/video/'.$upload_data['file_name'];
        $data['video'] =  $url;
        
		if($row_id == 0){

		$data['course_id']     = $course_id;
		$data['section_id']    = $section_id;
		$data['lesson_id']     = $lesson_id;
		$data['creation_date'] = date("Y-m-d H:i:s");

		$this->db->insert('content',$data);
		return $this->db->insert_id();
		
		}else{

			$data['updation_date'] = date("Y-m-d H:i:s");

			$this->db->where('id',$row_id); 
			$this->db->update('content',$data);
			return $row_id;
		}		
	}

	public function get_content_list($course_id,$section_id,$lesson_id)
	{
		$this->db->where('course_id',$course_id);
	    $this->db->where('section_id',$section_id);
	    $this->db->where('lesson_id',$lesson_id);
		$sql = $this->db->get('content');
		return $sql->result();
	}

	public function get_content_by_id($row_id)
	{
		$this->db->where('id',$row_id);
		$sql = $this->db->get('content');
		return $sql->row_array();
	}

	public function del_content($row_id)
	{
		$this->db->where('id',$row_id);
		$this->db->delete('content');
			
	}	
}

?>