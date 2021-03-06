<?php 
/*
  @author Nikhil
  *@version 1.0
  *Class to update profile details
*/			
 class Update_profile extends MY_Controller{

 	public function __construct(){
        parent::__construct();

    }
    /**
    * 
    * function to load profile details page
    * @param void
    * @return $view
    **/	 	
 	function view_profile(){
 		$usr_id = $_SESSION['user_id'];
 		
 		$where = array('usr_id' => $usr_id );
 		$this->load->model('admin/My_profile_model');
 		$data['user_details'] = $this->My_profile_model->view_profile($where);
		 	$data['signup_name'] = $_SESSION['fname'];
    	$data['signup_link'] = base_url().'admin/my_profile/view_profile';
		$data['login_link'] = base_url().'home/logout'; 
		$data['login_name'] = 'Logout';
    	$this->data = $data;
		$this->middle ='admin/my_profile';
		$this->layout();
	}
    /**
    * 
    * function to load profile details
    * @param void
    * @return $view
    **/	
	function get_profile(){
 		$usr_id = $_SESSION['user_id'];
 		$where = array('usr_id' => $usr_id );
 		$table_name = 'user';
 		$this->load->model('admin/My_profile_model');
 		$data['user_details'] = $this->My_profile_model->view_profile($where);
 		
    	$data['signup_name'] = $_SESSION['fname'];
    	$data['signup_link'] = base_url().'admin/my_profile/view_profile';
		$data['login_link'] = base_url().'home/logout';
		$data['login_name'] = 'Logout';
    	return $data;
	}
    /**
    * 
    * function to update profile details
    * @param void
    * @return $view
    **/	
 	function upd_profile(){	
 		$this->load->model('admin/Update_profile_model');
 		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

		$this->form_validation->set_rules('fname','Firstname','required');
        $this->form_validation->set_rules('lname','Lastname','required');
        $this->form_validation->set_rules('phno','Phone No','required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('usr_type','User type','required');

        $usr_type = 3;
		$img_status = 0;
		$data = '';
		$usr_id = $_SESSION['user_id'];
		if(strcmp($_POST['usr_type'],"seller") == 0){
			$usr_type=2;
		}
        if ($this->form_validation->run() == FALSE)
        {
              
        	$this->data = $data;
			$this->middle = 'admin/update_profile';
			$this->layout();
        }
    	else
    	{        	
    		$target_file = basename($_FILES["profilepic"]["name"]);
			if(strcmp($target_file,"") != 0){
				$target_dir = "uploads/";
				$target_file = $target_dir . basename($_FILES["profilepic"]["name"]);
				$config = array('upload_path' => 'uploads/',
	 				'allowed_types' => 'gif|jpg|png');

				$this->load->library('upload',$config);
	
				if(file_exists($target_file)){	

					$data = $this->get_profile();
					$data['status'] = 'File already exist';
					$img_status = 1;
					$this->data = $data;
					$this->middle = 'admin/update_profile';
					$this->layout();
				}else{
					if(!$this->upload->do_upload('profilepic')){
						$data = $this->get_profile();
						$error = array('error' => $this->upload->display_errors());
						$data['status'] = 'File not upload.'.$error['error'];
						$img_status = 1;
						
						$this->data = $data;
						$this->middle = 'admin/update_profile';
						$this->layout();
					}
				}
			}else{
				$img_status = 2;
			}
			
			if($img_status == 0){
				$data = $this->get_profile();
				print_r(base_url().$data['user_details']['profile_pic']);	
				unlink($data['user_details']['profile_pic']); 
				$data = array( 'fname' => $_POST['fname'],
						   'lname' => $_POST['lname'],
						   'phno' => $_POST['phno'],
						   'email' => $_POST['email'],
						   'usr_type' => $usr_type,
						   'profile_pic' => $target_file );
				
				$where = array('usr_id' => $usr_id );
				$data['status'] = $this->Update_profile_model->upd_profile($data,$where);
				
				$where = array('user_id' => $usr_id );
				$data = array('role_id' => $usr_type );
				$data['status']=$this->Update_profile_model->upd_user_role($data,$where);
				$this->view_profile();		
			}
			if($img_status == 2){
				$data = array( 'fname' => $_POST['fname'],
						   'lname' => $_POST['lname'],
						   'phno' => $_POST['phno'],
						   'email' => $_POST['email'],
						   'usr_type' => $usr_type );
				
				$where = array('usr_id' => $usr_id );
				$data['status'] = $this->Update_profile_model->upd_profile($data,$where);
				
				$where = array('user_id' => $usr_id );
				$data = array('role_id' => $usr_type );
				$data['status'] = $this->Update_profile_model->upd_user_role($data,$where);
				print_r($data);	
				$this->view_profile();
			}	
		}
 	}
} 
?>