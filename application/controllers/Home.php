<?php
/*
    @author Nikhil
    *@version 1.0
    *Class to load page like home,login.. 
*/
class Home extends MY_Controller{

	/**
    * 
    * function to view home content
    * @param void
    * @return view
    **/
	public function index(){
		$data['username'] = '';
        $data['signup_name'] = "Signup";
        $data['signup_link'] = base_url().'home/signup';
        $data['login_link'] = base_url().'home/login';
        $data['login_name'] = 'Login';
        $this->data = $data;
		$this->middle = 'home_content';
		$this->layout();
		
	}
	/**
    * 
    * function to view login page
    * @param void
    * @return $data
    **/
	public function login($data = ''){
		$data['username'] = '';
        $data['signup_name'] = "Signup";
        $data['signup_link'] = base_url().'home/signup';
        $data['login_link'] = base_url().'home/login';
        $data['login_name'] = 'Login';
		$this->data = $data;
		$this->middle = 'login';
		$this->layout();
	}
	/**
    * 
    * function to view Signup page
    * @param void
    * @return $data
    **/
	public function signup($data = ''){
		
		$data['username'] = '';
        $data['signup_name'] = "Signup";
        $data['signup_link'] = base_url().'home/signup';
        $data['login_link'] = base_url().'home/login';
        $data['login_name'] = 'Login';
		$this->data = $data;
		$this->middle = 'signup';
		$this->layout();

	}
	/**
    * 
    * function to view forgot password page
    * @param void
    * @return $data
    **/
	public function forgot_pwd($data=''){
		
		$data['username'] = '';
        $data['signup_name'] = "Signup";
        $data['signup_link'] = base_url().'home/signup';
        $data['login_link'] = base_url().'home/login';
        $data['login_name'] = 'Login';
		$this->data = $data;
		$this->middle = 'forgot_pwd';
		$this->layout();

	}
}
?>