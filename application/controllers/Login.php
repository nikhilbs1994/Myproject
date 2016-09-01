<?php 
  /**
  * 
  */
  class Login extends MY_Controller
  {
  
  	
  	function login_check()
  	{
  		
		
		$this->load->helper(array('form', 'url'));

        //$this->load->library('session');


		/*$this->form_validation->set_rules('username','User Name','required');
        $this->form_validation->set_rules('password','password','required');
        if ($this->form_validation->run() == FALSE)
        {
				$this->middle='login';
				$this->layout();
        }else{*/
        	$data='';
        	$pwd=md5($_POST['password']);
        	$where  = array('email' => $_POST['username'] ,
        					'pwd' => $pwd );
        	$table_name='user';
        	$this->load->model('Login_model');
        	$usr_valid=$this->Login_model->login_check($table_name,$where);
        	if($usr_valid==0){
        		$data['status']="Invalid username and password";
        		echo "invalid";
        		$data['username']='';
            $data['signup_name']="Signup";
            $data['signup_link']=base_url().'home/signup';
            $data['login_link']=base_url().'home/login';
            $data['login_name']='Login';
            $this->data=$data;
        		$this->middle='login';
				    $this->layout();
        	}else{
        		$data['username']=$usr_valid['email'];
        		$data['signup_name']=$usr_valid['fname'];
        		$data['signup_link']=base_url().'buyer/my_profile/view_profile';
        		$data['login_link']='home/signup';
        		$data['login_name']='Logout';
            $session_data = array('user_id' => $usr_valid['usr_id'], 'fname' => $usr_valid['fname']);
          
            $this->session->set_userdata($session_data);

//print_r($this->session);

        		if($usr_valid['usr_type']==3){
               $data['signup_link']=base_url().'buyer/my_profile/view_profile';
        			 $this->data=$data;
					     $this->middle='buyer/home';
					     $this->layout();
				    }elseif ($usr_valid['usr_type']==2){
                $data['signup_link']=base_url().'seller/my_profile/view_profile';
					     $this->data=$data;
					     $this->middle='seller/home';
					     $this->layout();
				    }else{
              $data['signup_link']=base_url().'admin/my_profile/view_profile';
               $this->data=$data;
               $this->middle='admin/home';
               $this->layout(); 
            }
        	}

        //}
  	}
  }
 ?>