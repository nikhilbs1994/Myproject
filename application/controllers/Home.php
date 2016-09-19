<?php
/*
    @author Nikhil
    *@version 1.0
    *Class to load page like home,login.. 
*/
class Home extends MY_Controller{

	 public function __construct()
    {
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
        if(isset($_SESSION['user_id'])){
            $data['login_link'] = 'home/logout';
            $data['login_name'] = 'Logout';
            if($_SESSION['usr_type'] == 3){
                $data['category'] =$this->get_category();
                $data['signup_name'] = $_SESSION['fname'];
                $data['login_link'] = 'logout';
                $data['login_name'] = 'Logout';
                $data['signup_link'] = base_url().'buyer/my_profile/view_profile';
                $this->data = $data; 
                $this->middle='buyer/home';
                $this->layout();
                
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
    * function to view contactus page
    * @param void
    * @return $data
    **/
    public function contact_us($data = ''){
        
        $data['username'] = '';
        $data['signup_name'] = "Signup";
        $data['signup_link'] = base_url().'home/signup';
        $data['login_link'] = base_url().'home/login';
        $data['login_name'] = 'Login';
        $this->data = $data;
        $this->middle = 'contact_us';
        $this->layout();

    }
        /**
    * 
    * function to view about us page
    * @param void
    * @return $data
    **/
    public function about_us($data = ''){
        
        $data['username'] = '';
        $data['signup_name'] = "Signup";
        $data['signup_link'] = base_url().'home/signup';
        $data['login_link'] = base_url().'home/login';
        $data['login_name'] = 'Login';
        $this->data = $data;
        $this->middle = 'about_us';
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

	}    /**
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
        /*$data['username'] = '';
        $data['signup_name'] = "Signup";
        $data['signup_link'] = base_url().'home/signup';
        $data['login_link'] = base_url().'home/login';
        $data['login_name'] = 'Login';
        $this->data = $data;
        $this->middle = 'home';
        $this->layout();*/
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
       
       
        $data['signup_name'] = $_SESSION['fname'];
        $data['signup_link'] = base_url().'admin/my_profile/view_profile';
        $data['login_link'] = 'logout';
        $data['login_name'] = 'Logout';
        $this->data=$data;
        $this->middle='admin/view_product';
        $this->layout();
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
        $data['signup_name'] = $_SESSION['fname'];
        $data['signup_link'] = base_url().'seller/my_profile/view_profile';
        $data['login_link'] = 'logout';
        $data['login_name'] = 'Logout';
        $this->data=$data;
        $this->middle='seller/home';
        $this->layout();
    }
    /**
    * 
    * function to view product list  based on seller
    * @param integer $prod_id
    * @return view
    **/
    public function view_admin_prod(){
        $data['prod_details'] = $this->Product_model->view_admin_prod();
        $data['signup_name'] = $_SESSION['fname'];
        $data['signup_link'] = base_url().'admin/my_profile/view_profile';
        $data['login_link'] = 'logout';
        $data['login_name'] = 'Logout';
        $this->data=$data;
        $this->middle='admin/home';
        $this->layout();
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