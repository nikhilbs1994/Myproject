<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_library{
	function send_mail($send){
		$config = Array(
							'protocol' => 'smtp',														//
							'smtp_host' => 'ssl://smtp.googlemail.com',
							'smtp_port' => 465,
							'smtp_user' => 'nikhilbs1994@gmail.com', 
							'smtp_pass' => 'john2335', 
							'mailtype' => 'html',
							'charset' => 'iso-8859-1',
							'wordwrap' => TRUE
							);
			$CI =& get_instance();
			$CI->load->library('email', $config); 
			$CI->email->set_newline("\r\n");
			$CI->email->from($send['from']); 
			$CI->email->to($send['to']);
			$CI->email->subject($send['subject']);
			$CI->email->message($send['message']);
			$CI->email->send();

        	echo $CI->email->print_debugger();
        	
	}
} 
?>