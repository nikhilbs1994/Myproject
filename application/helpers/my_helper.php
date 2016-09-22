<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('view_loader')){
	function view_loader($data,$view){
		$CI = & get_instance();  //get instance, access the CI superobject
  		   
	    if($CI->session->userdata('user_id') == null){
    		$data['username'] = '';
            $data['signup_name'] = "Signup";
            $data['signup_link'] = base_url().'home/signup';
            $data['login_link'] = base_url().'home/login';
            $data['login_name'] = 'Login';
            $CI->data = $data;
    		$CI->middle = "".$view;
		    $CI->layout();
	    }else{

	    	if($CI->session->userdata('usr_type') == 1){
	    		$data['signup_link'] = base_url().'admin/my_profile/view_profile';
	    	}elseif ($CI->session->userdata('usr_type') == 2) {
	    		$data['signup_link'] = base_url().'seller/my_profile/view_profile';
	    	}else{
	    		$data['signup_link'] = base_url().'buyer/my_profile/view_profile';
	    	}

	    	$data['signup_name'] = $CI->session->userdata('fname');
	        $data['login_link'] = base_url().'home/logout';;
	        $data['login_name'] = 'Logout';
	        $CI->data = $data;
    		$CI->middle = "".$view;
		    $CI->layout();

	    }
	}
}	