<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common_model extends CI_Model
{
	public function send_email ($send_to='', $subject='', $message='', $from='adil.naiyar@gmail.com', $title='Web_coach') {
		$this->load->library ('email');
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from( $from, $title);
		$this->email->to ($send_to);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	}
}