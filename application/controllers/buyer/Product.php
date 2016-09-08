<?php 
/*
  @author Nikhil
  *@version 1.0
  *Class to do product operation
*/	
class Product extends MY_Controller{
	 /**
    * 
    * function to search products tags
    * @param void
    * @return $row->prod_name
    **/	 
	public function search_tag(){
		$keyword = $this->input->post('term');
		$data['response'] = 'false'; //Set default response
		$this->load->model('buyer/Product_model');
		$query = $this->Product_model->get_prod($keyword); //Search DB
		if( ! empty($query) ) {
			$data['response'] = 'true'; //Set response
			$data['message'] = array(); //Create array
			$previous = ''; 

	        foreach( $query->result() as $row ) {
	           if($previous != $row->prod_name) {
		           	$data['message'][] = ucfirst($row->prod_name);
		       		$previous = $row->prod_name;
	           }
	   		}
		}
	   	if('IS_AJAX') {
	    	echo json_encode($data); //echo json string if ajax request
	   	}else {
	   		return FALSE;
	   	}
	}

	/**
    * 
    * function to search products
    * @param void
    * @return $row->prod_name
    **/	 
	public function search_product(){
		$this->load->helper(array('form', 'url'));
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('search_tag','Search tag','required');
		if ($this->form_validation->run() == FALSE)
		{	
			$data['username'] = '';
	        $data['signup_name'] = "Signup";
	        $data['signup_link'] = base_url().'home/signup';
	        $data['login_link'] = base_url().'home/login';
	        $data['login_name'] = 'Login';
	        $data['category']= $this->get_category();
	    	$this->data = $data;
			$this->middle = 'buyer/home';
			$this->layout();
		}
		else{
			$where = array(	'category' => $_POST['category'],
							'state' => $_POST['state'], 
							'status' => 1);

			$this->load->model('buyer/Product_model');
			$row=$this->Product_model->search_product($where,$_POST['search_tag']);
			
			$data['product_details']= $row;
			 $data['category'] = $this->get_category();
			$data['username'] = '';
	        $data['signup_name'] = "Signup";
	        $data['signup_link'] = base_url().'home/signup';
	        $data['login_link'] = base_url().'home/login';
	        $data['login_name'] = 'Login';
			$this->data = $data;
			$this->middle = 'buyer/home';
			$this->layout();

		}	
	}
	/**
    * 
    * function to get different category
    * @param Null
    * @return $category
    **/ 
	public function get_category(){
		$this->load->model('buyer/product_model');
		$category = $this->product_model->get_category();
		return $category;
	}
	/**
    * 
    * function to load product details
    * @param void
    * @return $view
    **/
   	public function view_prod($prod_id){
		$where = array('prod_id' => $prod_id );
 		$this->load->model('buyer/Product_model');
 		$data['prod_details'] =$this->Product_model->view_prod($where);
 		print_r($data);

    	$data['signup_name'] = $_SESSION['fname'];
    	$data['signup_link'] = base_url().'buyer/my_profile/view_profile';
    	$data['login_link'] = 'home/signup';
    	$data['login_name'] = 'Logout';
    	$this->data = $data;
		$this->middle = 'buyer/view_product';
		$this->layout();
	}
}
?>