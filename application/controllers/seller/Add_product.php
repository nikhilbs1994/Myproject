<?php 
/**
 * 
 */
 class Add_product extends MY_Controller
 {
 	
 	public function index(){

 		$table_name = 'category';
 		$this->load->model('seller/Add_product_model');
 		$data['category'] =$this->Add_product_model->get_category();
 		
    	$data['signup_name']=$_SESSION['fname'];
    	$data['signup_link']=base_url().'buyer/my_profile/view_profile';
    	$data['login_link']='home/signup';
    	$data['login_name']='Logout';
    	
    	$this->data=$data;
		$this->middle='seller/add_product';
		$this->layout();
 	} 
 } 
?>