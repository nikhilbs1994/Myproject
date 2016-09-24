<?php 
/*
  @author Nikhil
  *@version 1.0
  *Class to login fuctionality
*/
class Login extends MY_Controller{

    public function __construct(){
        parent::__construct();
        
        $this->load->model('admin/product_model');
        $this->load->model('seller/Product_model');
        $this->load->library('session');
        $this->load->helper('my_helper');

    } 
    
    /**
    * 
    * function to check user is valid
    * @param void
    * @return $data
    **/
    public function login_check()
    {

    	$data = '';
    	$pwd = md5($_POST['password']);
    	$where  = array('email' => $_POST['username'] ,
    					'pwd' => $pwd );
    	$this->load->model('Login_model');
    	$usr_valid = $this->Login_model->login_check($where);
    	if($usr_valid == 0){

    		$data['status'] = "Invalid username and password";
    		echo "invalid";
            view_loader($data,'login');

    	}else{
    		$data['username'] = $usr_valid['email'];
    		$session_data = array('user_id' => $usr_valid['usr_id'], 'fname' => $usr_valid['fname'],'usr_type'=> $usr_valid['usr_type']);
            $this->session->set_userdata($session_data);
            
            if(isset($_SESSION['prod_id'])){
                $this->view_prod($_SESSION['prod_id']); 
                return;
            }
    		if($usr_valid['usr_type'] == 3){
                $data['category'] =$this->get_category();
                $data['signup_link'] = base_url().'buyer/my_profile/view_profile';
                view_loader($data,'buyer/home');
		    }elseif ($usr_valid['usr_type'] == 2){
                $this->view_seller_prod($usr_valid['usr_id']);
		    }else{
                $this->view_admin_prod();
            }
    	}

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
    * function to view product list  based on admin
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