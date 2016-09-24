<?php 
/*
  @author Nikhil
  *@version 1.0
  *Class to load profile operation
*/
class My_profile extends MY_Controller{

    public function __construct(){
        parent::__construct();

    }
    /**
    * 
    * function to load profile details
    * @param void
    * @return $view
    **/	
	function view_profile(){
		$usr_id = $_SESSION['user_id'];
		$where = array('usr_id' => $usr_id );
		$this->load->model('buyer/My_profile_model');
		$data['user_details'] = $this->My_profile_model->view_profile($where);
		$data['signup_name'] = $_SESSION['fname'];
		$data['signup_link'] = base_url().'buyer/my_profile/view_profile';
		$data['login_link'] = base_url().'home/logout'; 
		$data['login_name'] = 'Logout';
		$this->data = $data;
		$this->middle ='buyer/my_profile';
		$this->layout();
	}
	    /**
    * 
    * function to load edit profile details
    * @param void
    * @return $view
    **/
	function edit_profile(){
		$usr_id = $_SESSION['user_id'];
		$where = array('usr_id' => $usr_id );
		$table_name = 'user';
		$this->load->model('buyer/My_profile_model');
		$data['user_details'] = $this->My_profile_model->view_profile($where);
		$data['signup_name']  = $_SESSION['fname'];
		$data['signup_link'] = base_url().'buyer/my_profile/view_profile';
		$data['login_link'] = base_url().'home/logout'; 
		$data['login_name'] = 'Logout';
		$this->data = $data;
		$this->middle = 'buyer/update_profile';
		$this->layout();
	}
} 
?>