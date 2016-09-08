<?php 
/*
  @author Nikhil
  *@version 1.0
  *Class to login fuctionality
*/
class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('admin/Product_model');
        $this->load->model('seller/Product_model');

    }   
    /**
    * 
    * function to check user is valid
    * @param void
    * @return $data
    **/
    public function login_check()
    {
        /*$this->load->helper(array('form', 'url'));
        $this->form_validation->set_rules('username','User Name','required');
        $this->form_validation->set_rules('password','password','required');
        /*if ($this->form_validation->run() == FALSE){
    		$this->middle = 'login';
    		$this->layout();
        }else{*/
        	$data = '';
        	$pwd = md5($_POST['password']);
        	$where  = array('email' => $_POST['username'] ,
        					'pwd' => $pwd );
        	$this->load->model('Login_model');
        	$usr_valid = $this->Login_model->login_check($where);
        	if($usr_valid == 0){
        		$data['status'] = "Invalid username and password";
        		echo "invalid";
        		$data['username'] = '';
                $data['signup_name'] = "Signup";
                $data['signup_link'] = base_url().'home/signup';
                $data['login_link'] = base_url().'home/login';
                $data['login_name'] = 'Login';
                $this->data = $data;
        		$this->middle = 'login';
    		    $this->layout();
        	}else{
        		$data['username'] = $usr_valid['email'];
        		$data['signup_name'] = $usr_valid['fname'];
        		$data['signup_link'] = base_url().'buyer/my_profile/view_profile';
        		$data['login_link'] = 'home/signup';
        		$data['login_name'] = 'Logout';
                $session_data = array('user_id' => $usr_valid['usr_id'], 'fname' => $usr_valid['fname']);
                $this->session->set_userdata($session_data);

                if(isset($_SESSION['prod_id'])){
                    $this->view_prod($_SESSION['prod_id']); 
                    return;
                }
        		if($usr_valid['usr_type'] == 3){
                    $data['category'] =$this->get_category();
                    $data['signup_link'] = base_url().'buyer/my_profile/view_profile';
                    $this->data = $data; 
    			    $this->middle='buyer/home';
            	    $this->layout();
    		    }elseif ($usr_valid['usr_type'] == 2){
                    $data['signup_link'] = base_url().'seller/my_profile/view_profile';
    			    $this->data=$data;
    			    $this->middle='seller/home';
    			    $this->layout();
    		    }else{
                    $data['signup_link'] = base_url().'admin/my_profile/view_profile';
                    $this->data = $data;
                    $this->middle ='admin/home';
                    $this->layout(); 
                }
        	}
        //}
    }
    /**
    * 
    * function to view product list
    * @param integer $prod_id
    * @return view
    **/
    public function view_prod($prod_id){
        $where = array('prod_id' => $prod_id );
        
         
        $data['prod_details'] = $this->Product_model->view_product($where);
        //print_r($data);

        $data['signup_name'] = $_SESSION['fname'];
        $data['signup_link'] = base_url().'admin/my_profile/view_profile';
        $data['login_link'] = 'home/signup';
        $data['login_name'] = 'Logout';
        $this->data=$data;
        $this->middle='admin/view_product';
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