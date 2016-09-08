<?php 
/*
  @author Nikhil
  *@version 1.0
  *Class to foegot password
*/
class Forgot_pwd extends MY_Controller
{
    /**
    * 
    * function to check user is valid and send new password to mail
    * @param void
    * @return $view
    **/
	public function check_user(){
		$where  = array('email' => $_POST['username'] );
    	$this->load->model('Login_model');
    	$usr_valid = $this->Login_model->login_check($where);
    	$this->load->model('Forgot_pwd_model');
    	if($usr_valid == 0){
    		$data['status'] = "Invalid username";
    		echo "invalid";
    		$data['username'] = '';
    		$data['signup_name'] = "Signup";
    		$data['signup_link'] = base_url().'home/signup';
    		$data['login_link'] = base_url().'home/login';
    		$data['login_name'] = 'Login';
    		$this->data = $data;
    		$this->middle = 'forgot_pwd';
    		$this->layout();
    	}else{
    		$this->load->helper('string');
	 		$new_pwd = random_string('alnum',8);
    		$pwd = md5($new_pwd);
    		echo $new_pwd;
    		$status = $this->Login_model->update_pwd($pwd,$where);
    		$this->load->library('email');
            $config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$this->email->initialize($config);
			$this->email->from('nikhilbs1994@gmail.com', 'Nikhil B S');
			$this->email->to($_POST['username']);
			$this->email->subject('New password');
			$this->email->message('New password'.$new_pwd);
			$this->email->send();	
    		echo $this->email->print_debugger();
    		$data['username'] = '';
    		$data['signup_name'] = "Signup";
    		$data['signup_link'] = base_url().'home/signup';
    		$data['login_link'] = base_url().'home/login';
    		$data['login_name'] = 'Login';
			$this->data = $data;
			$this->middle = 'login';
			$this->layout();
    	}
	}
}
 ?>