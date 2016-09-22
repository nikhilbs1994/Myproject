<?php 
/*
  @author Nikhil
  *@version 1.0
  *Class to product opertion of admin 
*/
class Add_category extends MY_Controller{
	
    public function __construct(){
        parent::__construct();
        
        $this->load->model('admin/Product_model');

    }
    /**
    * 
    * function to load add category page of admin
    * @param void
    * @return $view
    **/
	public function index(){
        $data='';
        view_loader($data,'admin/add_category');
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
            view_loader($data,'admin/add_category');
    	}
    	else{  
    		$data = array('ct_name' => $_POST['category_name'] );
			$data['status'] = $this->Product_model->add_cate($data);
			if($data['status'] != 0){
	    		$data['status'] = 'Category Added';
	    	}else{
	    		$data['error'] = 'Category not Added';
	    	}
            view_loader($data,'admin/add_category');
    	}
   	}
   	/**
    * 
    * function to approve new product by admin
    * @param void
    * @return $view
    **/
   	public function approve_prod($prod_id){
		$where = array('prod_id' => $prod_id );
		$this->load->model('admin/Product_model');
 		$data['status'] = $this->Product_model->approve_prod($where);
        view_loader($data,'admin/home');
   	}
    /**
    * 
    * function to reject new product by admin
    * @param void
    * @return $view
    **/
    public function reject_prod($prod_id){
        $table_name = "product";
        $where = array('prod_id' => $prod_id );
        $this->load->model('admin/Product_model');
        $data['status'] = $this->Product_model->reject_prod($where);
        view_loader($data,'admin/home');
    }
   	/**
    * 
    * function to load product details
    * @param void
    * @return $view
    **/
   	public function view_prod($prod_id){
   		if(isset($_SESSION['user_id'])){
	   		$where = array('prod_id' => $prod_id );
	 		$data['prod_details'] =$this->Product_model->view_product($where);
            view_loader($data,'admin/view_product');
		}else{
			$session_data = array('prod_id' => $prod_id);
            $this->session->set_userdata($session_data);
            $this->login();
		}
   	}
        /**
    * 
    * function to load product details
    * @param void
    * @return $view
    **/
    public function view_products($prod_id){
        $where = array('prod_id' => $prod_id );
        $this->load->model('admin/Product_model');
        $data['prod_details'] =$this->Product_model->view_product($where);
        view_loader($data,'admin/view_product');
    
    }
   	/**
    * 
    * function to view login page
    * @param void
    * @return $view
    **/
   	public function login($data = ''){

        view_loader($data,'login');
	}	
}
?>