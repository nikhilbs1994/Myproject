<?php
/*
  @author Nikhil
  *@version 1.0
  *Class to signup fuctionality
*/	
class Signup extends MY_Controller{
	/**
    * 
    * function to add user and data validation
    * @param void
    * @return $data
    **/
	public function add_usr(){
		
		$this->load->model('Signup_model');
		$this->load->helper(array('form', 'url'));
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('fname','Firstname','required');
    	$this->form_validation->set_rules('lname','Lastname','required');
    	$this->form_validation->set_rules('phno','Phone No','required|regex_match[/^[0-9]{10}$/]');
    	$this->form_validation->set_rules('email','Email','required|valid_email');
    	$this->form_validation->set_rules('usr_type','User type','required');
    	$this->form_validation->set_rules('pwd','Password','required');
    	$this->form_validation->set_rules('con_pwd','Confirm passord','required|matches[pwd]');
		$usr_type = 3;
		$img_status = 0;
		$data = '';
		if(strcmp($_POST['usr_type'],"seller") == 0){
			$usr_type = 2;
		}
    	if($this->form_validation->run() == FALSE){
          	$data['username'] = '';
	        $data['signup_name'] = "Signup";
	        $data['signup_link'] = base_url().'home/signup';
	        $data['login_link'] = base_url().'home/login';
	        $data['login_name'] = 'Login';
        	$this->data = $data;
			$this->middle = 'signup';
			$this->layout();
    	}
    	else{        	
    		$target_file = basename($_FILES["profilepic"]["name"]);
			if(strcmp($target_file,"") != 0){
				$target_dir = "uploads/";
				$target_file = $target_dir . basename($_FILES["profilepic"]["name"]);
				$config = array('upload_path' => 'uploads/',
	 				'allowed_types' => 'gif|jpg|png');

				$this->load->library('upload',$config);
	
				if(file_exists($target_file)){	

					$data['status'] = 'File already exist';
					
					$img_status = 1;
					$data['username'] = '';
			        $data['signup_name'] = "Signup";
			        $data['signup_link'] = base_url().'home/signup';
			        $data['login_link'] = base_url().'home/login';
			        $data['login_name'] = 'Login';
					$this->data = $data;
					$this->middle = 'signup';
					$this->layout();
				}else{
					if(!$this->upload->do_upload('profilepic')){

					$error = array('error' => $this->upload->display_errors());
					$data['status'] = 'File not upload.'.$error['error'];
					$img_status = 1;
					$data['username'] = '';
			        $data['signup_name'] = "Signup";
			        $data['signup_link'] = base_url().'home/signup';
			        $data['login_link'] = base_url().'home/login';
			        $data['login_name'] = 'Login';
					$this->data = $data;
					$this->middle = 'signup';
					$this->layout();
					
					}
				}
			}
			$pwd = md5($_POST['pwd']);
			if($img_status == 0){
				$data = array( 'fname' => $_POST['fname'],
						   'lname' => $_POST['lname'],
						   'phno' => $_POST['phno'],
						   'email' => $_POST['email'],
						   'pwd' => $pwd,
						   'usr_type' => $usr_type,
						   'profile_pic' => $target_file );
				$insert_id = $this->Signup_model->add_user($data);
				$data = array('user_id' => $insert_id,
								'role_id' => $usr_type );
				$data['status'] = $this->Signup_model->add_user_role($data);
				//print_r($data);
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
}
?>	