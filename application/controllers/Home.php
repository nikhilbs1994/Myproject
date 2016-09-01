<?php
class Home extends MY_Controller{

	
	public function index(){
		$data['username']='';
        $data['signup_name']="Signup";
        $data['signup_link']=base_url().'home/signup';
        $data['login_link']=base_url().'home/login';
        $data['login_name']='Login';
        $this->data=$data;
		$this->middle='home_content';
		$this->layout();
		
	}
	public function login($data=''){
		$data['username']='';
        $data['signup_name']="Signup";
        $data['signup_link']=base_url().'home/signup';
        $data['login_link']=base_url().'home/login';
        $data['login_name']='Login';
		$this->data=$data;
		$this->middle='login';
		$this->layout();
	}
	public function signup($data=''){
		
		$data['username']='';
        $data['signup_name']="Signup";
        $data['signup_link']=base_url().'home/signup';
        $data['login_link']=base_url().'home/login';
        $data['login_name']='Login';
		$this->data=$data;
		$this->middle='signup';
		$this->layout();

	}
	public function forgot_pwd($data=''){
		
		$data['username']='';
        $data['signup_name']="Signup";
        $data['signup_link']=base_url().'home/signup';
        $data['login_link']=base_url().'home/login';
        $data['login_name']='Login';
		$this->data=$data;
		$this->middle='forgot_pwd';
		$this->layout();

	}
}
?>