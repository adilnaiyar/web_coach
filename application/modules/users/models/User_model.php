<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model
{
	public function __construct()
	{
		$this->config->load('config_users');
	}

	public function validate_login()
	{
		$email		 =  $this->security->xss_clean($this->input->post('email'));
		$password	 =  $this->security->xss_clean($this->input->post('password')); 
		$this->db->where('email',$email);
		$sql = $this->db->get('user_info');

		if($sql->num_rows()>0)
		{ 
			$row = $sql->row();
			if(password_verify($password,$row->password) == true)
			{
				$user_id  	     =  $row->id;		
				$login_dt   	 =  date("Y-m-d H:i:s"); 
				$logout_dt  	 = 	0;
				$session_id 	 = 	$this->session->userdata ('id',$user_id);
				$last_activity   =  date("Y-m-d H:i:s"); 
				$ip_address   	 = 	$_SERVER['REMOTE_ADDR'];
				$status			 = 	$row->status;

				$this->db->insert ('member_login_history', array ('user_id'=>$user_id, 'login_dt'=>$login_dt, 'logout_dt'=>$logout_dt, 'session_id'=>$session_id, 'last_activity'=>$last_activity, 'ip_address'=>$ip_address,'status'=>$status) );
				
				return $row;

			}else{
				return false;
			}

		}else
			{
			return false; 
		}
	}
	
	public function new_register()
	{
		$data = array(
				'username'      => $this->input->post('username'),
				'email'         => $this->input->post('email'),
				'role_id'       => 4,
				'coaching_name' => $this->input->post('coaching_name'),
				'status'        => 1,
				'password'      => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'join_date'     => date("Y-m-d H:i:s")
				);

				$this->db->insert('user_info',$data);	 
				return $this->db->insert_id();
	}

	public function student_details ($email,$coaching_name) 
	{
		$this->db->where ('email', $email);
		$this->db->where ('coaching_name', $coaching_name);
		$sql = $this->db->get ('user_info');
		if ($sql->num_rows () > 0 ) 
		{ 
			$result = $sql->row_array();
	
					return $result;
				}
			else 
			{
			return false;
		}			
	}

	public function coaching_register($row_id=0)
	{	
		if($row_id == 0)
		{
		$data = array(
				'coaching_name' => $this->input->post('coaching_name'),
				'username'  	=> $this->input->post('username'),
				'email'    		=> $this->input->post('email'),
				'address'   	=> $this->input->post('address'),
				'status'   		=> 1,
				'join_date'		=> date("Y-m-d H:i:s")
				);
				$this->db->insert('coaching',$data);
				return $this->db->insert_id();
		}else{
			$data = array(
						'coaching_name' => $this->input->post('coaching_name'),
						'username'  	=> $this->input->post('username'),
						'email'    		=> $this->input->post('email'),
						'address'   	=> $this->input->post('address'),
						'updated_at'	=> date("Y-m-d H:i:s")
				);
				$this->db->update('coaching',$data);
				return $row_id;
		}
	}
	public function coadmin_register()
	{
		$data = array(
				'coaching_name' => $this->input->post('coaching_name'),
				'username'  	=> $this->input->post('username'),
				'email'    		=> $this->input->post('email'),
				'role_id'   	=> 2,
				'status'   		=> 1,
				'password'      => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'join_date'		=> date("Y-m-d H:i:s")
				);
				$this->db->insert('user_info',$data);
				return $this->db->insert_id();
	}
	
	public function teacher_register($role_id)
	{
		$data['username'] 	= $this->input->post('username');
		$data['email'] 	    = $this->input->post('email');
		$data['role_id'] 	= 3;
		$data['status'] 	= 1;
		$data['password'] 	= password_hash($this->input->post('password'),PASSWORD_DEFAULT);
		$data['join_date'] 	= date("Y-m-d H:i:s");

		if($role_id == USER_ROLE_ADMIN)
		{
			$data['coaching_name'] = $this->input->post('coaching_name');
		}else{
			$data['coaching_name'] = $this->session->userdata('coaching_name');
		}

		$this->db->insert('user_info',$data);
		return $this->db->insert_id();
	}

	public function student_register($role_id)
	{
		$data['username'] 	= $this->input->post('username');
		$data['email'] 	    = $this->input->post('email');
		$data['role_id'] 	= 4;
		$data['status'] 	= 1;
		$data['password'] 	= password_hash($this->input->post('password'),PASSWORD_DEFAULT);
		$data['join_date'] 	= date("Y-m-d H:i:s");

		if($role_id == USER_ROLE_ADMIN)
		{
			$data['coaching_name'] = $this->input->post('coaching_name');
		}else{
			$data['coaching_name'] = $this->session->userdata('coaching_name');
		}

		$this->db->insert('user_info',$data);
		return $this->db->insert_id();		
	}

	public function get_roles()
	{
		$sql = $this->db->get('roles');
		return $sql->result();
	}

	public function get_roles_by_id($role_id)
	{
		$this->db->where('id',$role_id);
		$sql = $this->db->get('roles');
		return $sql->row_array();
	}

	public function send_email ($send_to, $subject, $message,$title='Web_coach') 
	{
		$this->load->config('email');
		$this->load->library ('email');
		$config['mailtype'] = 'html';
		$from = $this->config->item('smtp_user');
		$this->email->initialize($config);
		$this->email->from( $from, $title);
		$this->email->to ($send_to);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
		 if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
	}

	public function edit_user_profile($user_id=0)
	{
		$d    = $this->input->post('dob');
        $date = explode('/',$d);
       
		$data ['username']  	= $this->input->post('username');
		$data ['email']     	= $this->input->post('email');
		$data ['coaching_name']	= $this->input->post('coaching_name');
		$data ['address']   	= $this->input->post('address');
		$data ['dob']       	= $date[2].'-'.$date[1].'-'.$date[0]; //date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('dob'))));
		$data ['updated_at']	= date("Y-m-d H:i:s");
		
		$this->db->where('id',$user_id);
		$this->db->update('user_info',$data);
		return $user_id;
	}
	
	public function get_all_coaching()
	{
     	$query = $this->db->get('coaching');
       	return $query->result_array(); 
	}
	public function get_coaching($row_id)
	{
		$this->db->where('id',$row_id);
     	$query = $this->db->get('coaching');
       	return $query->row_array(); 
	}
	public function get_all_coach_teacher($coaching_name)
	{
		$this->db->where('coaching_name',$coaching_name);
		$this->db->where('role_id',USER_ROLE_TEACHER);
     	$query = $this->db->get('user_info');
       	return $query->result_array(); 
	}
	public function get_all_coach_student($coaching_name)
	{
		$this->db->where('coaching_name',$coaching_name);
		$this->db->where('role_id',USER_ROLE_STUDENT);
     	$query = $this->db->get('user_info');
       	return $query->result_array(); 
	}
	public function get_all_coadmin()
	{
		$this->db->where('role_id',USER_ROLE_CO_ADMIN);
     	$query = $this->db->get('user_info');
       	return $query->result_array(); 
	}

   public function get_all_teacher()
	{
		$this->db->where('role_id',USER_ROLE_TEACHER);
     	$query = $this->db->get('user_info');
       	return $query->result_array();
   }

	public function get_all_student()
	{
		$this->db->where('role_id',USER_ROLE_STUDENT);
     	$query = $this->db->get('user_info');
       	return $query->result_array(); 
	}
	public function get_student_num()
	{
		$this->db->where('role_id',USER_ROLE_STUDENT);
     	$query = $this->db->get('user_info');
       	return $query->num_rows(); 
	}
  
   public function get_user_profile($user_id)
	{
		$this->db->where('id',$user_id);
     	$query = $this->db->get('user_info');
       return $query->row_array();

   }
   public function upload_photo($user_id,$role_id,$upload_data)
   {
   		$filename = $upload_data['file_name'];
        $userdata = array('profile_photo'=>$filename);

   		$this->db->where('id',$user_id);
   		$this->db->where('role_id',$role_id);
     	$query = $this->db->update('user_info',$userdata);	

   }
   public function update_password($user_id,$npass)
	{
		$password = password_hash($npass, PASSWORD_DEFAULT);
		$data = array ('password'=> $password);
		$this->db->where ('id', $user_id);
		$query = $this->db->update ("user_info", $data );
           
    }
    public function check_registered_email ($email) 
    {
		$this->db->where ('email', $email);
		$query = $this->db->get ('user_info');
		return $query->row_array();	
	}
	public function del_coaching($row_id)
	{
		$this->db->where('id',$row_id);
		$this->db->delete('coaching');
		
	}
	public function del_coadmin($row_id)
	{
		$this->db->where('id',$row_id);
		$this->db->delete('user_info');	
	}
	public function del_teacher($row_id)
	{
		$this->db->where('id',$row_id);
		$this->db->delete('user_info');	
	}
	public function del_student($row_id)
	{
		$this->db->where('id',$row_id);
		$this->db->delete('user_info');	
	}
	public function logout()
	{
		$this->session->unset_userdata('authentication');
		//$this->session->sess_destroy('id');
	} 

}