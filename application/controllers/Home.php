<?php
/*
    @author Nikhil
    *@version 1.0
    *Class to load page like home,login.. 
*/
class Home extends MY_Controller{

	 public function __construct(){
        parent::__construct();
        
        $this->load->model('admin/product_model');
        $this->load->model('seller/Product_model');

    }   
    /**
    * 
    * function to view home content
    * @param void
    * @return view
    **/
	public function index(){
        
        $data['prod_details'] = $this->Product_model->view_home_prod();
        view_loader($data,'home_content');
	}
	/**
    * 
    * function to view login page
    * @param void
    * @return $data
    **/
	public function login($data = ''){
        if(isset($_SESSION['user_id'])){
            $data['login_link'] = 'home/logout';
            $data['login_name'] = 'Logout';
            if($_SESSION['usr_type'] == 3){
                $data['category'] =$this->get_category();
                view_loader($data,'buyer/home');
            }elseif ($_SESSION['usr_type'] == 2){
                $this->view_seller_prod($_SESSION['user_id']);
                
            }else{
                $this->view_admin_prod();
                
            }  
        }
        else{
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('fname');
            $this->session->unset_userdata('prod_id');
            view_loader($data,'login');
        }
	}
	/**
    * 
    * function to view Signup page
    * @param void
    * @return $data
    **/
	public function signup($data = ''){
		view_loader($data,'signup');
	}
    /**
    * 
    * function to view contactus page
    * @param void
    * @return $data
    **/
    public function contact_us($data = ''){
        view_loader($data,'contact_us');
    }
        /**
    * 
    * function to view about us page
    * @param void
    * @return $data
    **/
    public function about_us($data = ''){
        view_loader($data,'about_us');
    }
	/**
    * 
    * function to view forgot password page
    * @param void
    * @return $data
    **/
	public function forgot_pwd($data=''){
		view_loader($data,'forgot_pwd');
	}    
    /**
    * 
    * function to logout
    * @param null
    * @return $catrgory
    **/
    public function logout(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('fname');
        $this->session->unset_userdata('prod_id');
        $this->session->sess_destroy();
        $this->index();
    }
        /**
    * 
    * function to view product list
    * @param integer $prod_id
    * @return view
    **/
    public function view_prod($prod_id){
        $where = array('prod_id' => $prod_id );
        $data['prod_details'] = $this->product_model->view_product($where);
        view_loader($data,'admin/view_product');
    }
    /**
    * 
    * function to view product list  based on seller
    * @param integer $prod_id
    * @return view
    **/
    public function view_seller_prod($usr_id){
        $where = array('seller_id' => $usr_id );
        $data['prod_details'] = $this->Product_model->view_seller_prod($where);
        view_loader($data,'seller/home');
    }
    /**
    * 
    * function to view product list  based on seller
    * @param integer $prod_id
    * @return view
    **/
    public function view_admin_prod(){
        $data['prod_details'] = $this->Product_model->view_admin_prod();
        view_loader($data,'admin/home');
    }
    /**
    * 
    * function to get all category
    * @param integer $prod_id
    * @return $catrgory
    **/
    public function get_category(){
        $table_name = 'category';
        $category = $this->Product_model->get_category();
        return $category;
    }

}
?>