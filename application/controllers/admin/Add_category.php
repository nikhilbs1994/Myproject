<?php 
/**
* 
*/
class Add_category extends MY_Controller
{
	
	public function index(){
		$data['signup_name']=$_SESSION['fname'];
    	$data['signup_link']=base_url().'admin/my_profile/view_profile';
    	$data['login_link']='home/signup';
    	$data['login_name']='Logout';
    	$this->data=$data;
		$this->middle='admin/add_category';
		$this->layout();
	}

	public function add_cate(){
		$this->load->model('admin/Add_category_model');
		$this->load->helper(array('form', 'url'));
    	$this->load->library('form_validation');

		$this->form_validation->set_rules('category_name','Category Name','required');
		if ($this->form_validation->run() == FALSE)
    	{
			$data['signup_name']=$_SESSION['fname'];
	    	$data['signup_link']=base_url().'admin/my_profile/view_profile';
	    	$data['login_link']='home/signup';
	    	$data['login_name']='Logout';
	    	$this->data=$data;
			$this->middle='admin/add_category';
			$this->layout();
    	}
    	else
    	{  
    		$table_name="category";
			$data = array('ct_name' => $_POST['category_name'] );
			$data['status']=$this->Add_category_model->add_cate($table_name,$data);
			$data['signup_name']=$_SESSION['fname'];
	    	$data['signup_link']=base_url().'admin/my_profile/view_profile';
	    	$data['login_link']='home/signup';
	    	$data['login_name']='Logout';
	    	if($data['status']!=0){
	    		$data['status']='Category Added';
	    	}else{
	    		$data['error']='Category not Added';
	    	}
	    	$this->data=$data;
			$this->middle='admin/add_category';
			$this->layout();
    	}
    	

	}	
}
?>