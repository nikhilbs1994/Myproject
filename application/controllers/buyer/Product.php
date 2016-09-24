<?php 
/*
  @author Nikhil
  *@version 1.0
  *Class to do product operation
*/	
class Product extends MY_Controller{
	
	public function __construct(){
        parent::__construct();

    }
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
	        $data['category']= $this->get_category();
			view_loader($data,'buyer/home');
		}
		else{
			$where = array(	'category' => $_POST['category'],
							'state' => $_POST['state'], 
							'status' => 1);

			$this->load->model('buyer/Product_model');
			$row=$this->Product_model->search_product($where,$_POST['search_tag']);
			
			$data['product_details']= $row;
			$data['category'] = $this->get_category();
			view_loader($data,'buyer/home');
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
		view_loader($data,'buyer/view_product');
	}
		/**
    * 
    * function to add status
    * @param void
    * @return $view
    **/
   	public function add_status($prod_id){
		echo $prod_id;
	}
}
?>