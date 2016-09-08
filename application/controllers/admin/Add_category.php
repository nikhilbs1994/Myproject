<?php 
/*
  @author Nikhil
  *@version 1.0
  *Class to product opertion of admin 
*/
class Add_category extends MY_Controller
{
	/**
    * 
    * function to load add category page of admin
    * @param void
    * @return $view
    **/
	public function index(){
		$data['signup_name'] = $_SESSION['fname'];
    	$data['signup_link'] = base_url().'admin/my_profile/view_profile';
    	$data['login_link'] = 'home/signup';
    	$data['login_name'] = 'Logout';
    	$this->data = $data;
		$this->middle = 'admin/add_category';
		$this->layout();
	}
	/**
    * 
    * function to add category and data validation
    * @param void
    * @return $view
    **/
	public function add_cate(){
		$this->load->model('admin/Product_model');
		$this->load->helper(array('form', 'url'));
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('category_name','Category Name','required');
		if ($this->form_validation->run() == FALSE)    	{
			$data['signup_name'] = $_SESSION['fname'];
	    	$data['signup_link'] = base_url().'admin/my_profile/view_profile';
	    	$data['login_link'] = 'home/signup';
	    	$data['login_name'] = 'Logout';
	    	$this->data = $data;
			$this->middle = 'admin/add_category';
			$this->layout();
    	}
    	else{  
    		$data = array('ct_name' => $_POST['category_name'] );
			$data['status'] = $this->Product_model->add_cate($data);
			$data['signup_name'] = $_SESSION['fname'];
	    	$data['signup_link'] = base_url().'admin/my_profile/view_profile';
	    	$data['login_link'] = 'home/signup';
	    	$data['login_name'] = 'Logout';
	    	if($data['status'] != 0){
	    		$data['status'] = 'Category Added';
	    	}else{
	    		$data['error'] = 'Category not Added';
	    	}
	    	$this->data = $data;
			$this->middle = 'admin/add_category';
			$this->layout();
    	}
   	}
   	/**
    * 
    * function to approve new product by admin
    * @param void
    * @return $view
    **/
   	public function approve_prod($prod_id){
		$table_name = "product";
		$where = array('prod_id' => $prod_id );
		$this->load->model('admin/Product_model');
 		$data['status'] = $this->Product_model->approve_prod($where);
 		$data['signup_name'] = $_SESSION['fname'];
    	$data['signup_link'] = base_url().'admin/my_profile/view_profile';
    	$data['login_link'] = 'home/signup';
    	$data['login_name'] = 'Logout';
    	$this->data = $data;
		$this->middle = 'admin/home';
		$this->layout();
   	}
   	/**
    * 
    * function to load product details
    * @param void
    * @return $view
    **/
   	public function view_prod($prod_id){
   		if(isset($_SESSION['usr_id'])){
	   		$where = array('prod_id' => $prod_id );
	 		$this->load->model('admin/Product_model');
	 		$data['prod_details'] =$this->Product_model->view_prod($where);
	 		print_r($data);

	    	$data['signup_name'] = $_SESSION['fname'];
	    	$data['signup_link'] = base_url().'admin/my_profile/view_profile';
	    	$data['login_link'] = 'home/signup';
	    	$data['login_name'] = 'Logout';
	    	$this->data = $data;
			$this->middle = 'admin/view_product';
			$this->layout();
		}else{
			$session_data = array('prod_id' => $prod_id);
            $this->session->set_userdata($session_data);
            $this->login();
		}
   	}
   	/**
    * 
    * function to view login page
    * @param void
    * @return $view
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
}
?>