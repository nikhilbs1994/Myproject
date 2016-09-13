<?php 
/*
  @author Nikhil
  *@version 1.0
  *Class to do product operation
*/
class Product extends MY_Controller
{
	/**
    * 
    * function to load add product page
    * @param Null
    * @return $view
    **/
	public function index(){

		$data['category'] = $this->get_category();
		$data['signup_name'] = $_SESSION['fname'];
		$data['signup_link'] = base_url().'seller/my_profile/view_profile';
        $data['login_link'] = base_url().'home/logout'; 
        $data['login_name'] = 'Logout';
		
		$this->data = $data;
		$this->middle = 'seller/add_product';
		$this->layout();
	}
	/**
    * 
    * function to get different category
    * @param Null
    * @return $category
    **/ 
	public function get_category(){
		$this->load->model('seller/product_model');
		$category = $this->product_model->get_category();
		return $category;
	}
	/**
    * 
    * function to add new product
    * @param Null
    * @return $category
    **/ 
	public function add_product(){
		$this->load->model('seller/product_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('prod_name','Product name','required');
		$this->form_validation->set_rules('category','Category','required');
		$this->form_validation->set_rules('phno','Phone No','required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('alt_email','Email','required|valid_email');
		$this->form_validation->set_rules('addr1','Address 1','required');
		$this->form_validation->set_rules('rate','Expected rate','required');
		//$this->form_validation->set_rules('con_pwd','Confirm passord','required|matches[pwd]');
		
		/*if(empty($_FILES['uploads']['prod_pic'])){
			$this->form_validation->set_rules('prod_pic', 'Product picture', 'required');
		}*/
		
		$file_no = count($_FILES["prod_pic"]["name"]);
		
		/*if($file_no>3){
			$this->form_validation->set_rules('prod_pic', 'Product picture', 'max', array('max' => 'Maximuim 3 file allowed'));
		}*/
		
		$img_status = 0;
		$data = '';
		$data['category'] = $this->get_category();
		if ($this->form_validation->run() == FALSE)
		{	
			$data['username'] = '';
		$data['signup_name'] = $_SESSION['fname'];
		$data['signup_link'] = base_url().'seller/my_profile/view_profile';
        $data['login_link'] = 'logout';
        $data['login_name'] = 'Logout';
	    	$this->data = $data;
			$this->middle = 'seller/add_product';
			$this->layout();
		}
		else{
			$fi = new FilesystemIterator('uploads/products', FilesystemIterator::SKIP_DOTS);
			$target_file = basename($_FILES["prod_pic"]["name"][0]);
			$file_name = (int)iterator_count($fi);
			
			$images = '';
			if(strcmp($target_file,"") != 0){
				
				for ($i = 0; $i < $file_no ; $i++) { 
					$_FILES['userFile']['name'] = $_FILES['prod_pic']['name'][$i];
	            	$_FILES['userFile']['type'] = $_FILES['prod_pic']['type'][$i];
	            	$_FILES['userFile']['tmp_name'] = $_FILES['prod_pic']['tmp_name'][$i];
	            	$_FILES['userFile']['error'] = $_FILES['prod_pic']['error'][$i];
	            	$_FILES['userFile']['size'] = $_FILES['prod_pic']['size'][$i];
	            	$ext = pathinfo($_FILES['prod_pic']['name'][$i], PATHINFO_EXTENSION);
					
					if(strcmp($images,"") == 0){
						$images = 'uploads/products/'.$file_name.'.'.$ext;
					}else{
						$images .= ',uploads/products/'.$file_name.'.'.$ext;
					}

					$config = array('upload_path' => 'uploads/products',
	 								'allowed_types' => 'gif|jpg|png',
	 								'file_name' => $file_name);
					
					$this->load->library('upload',$config);
					$this->upload->initialize($config);
					if(!$this->upload->do_upload('userFile')){
						$img_status = 1;
						$error = array('error' => $this->upload->display_errors());
					}
					if($img_status == 1){
						$data['status'] = 'File not upload';
						echo $error['error'];
					}
					$file_name = $file_name+1;
				}
			}
			if($img_status == 0){
				$data = array( 'prod_name' => $_POST['prod_name'],
						   'category' => $_POST['category'],
						   'phno' => $_POST['phno'],
						   'email' => $_POST['alt_email'],
						   'addr1' => $_POST['addr1'],
						   'addr2' => $_POST['addr2'],
						   'state' => $_POST['state'],
						   'rate' => $_POST['rate'],
						   'product_pic' => $images,
						   'seller_id' => $_SESSION['user_id'] );
				
				$table_name = "product";
				$insert_id = $this->product_model->add_prod($data);
				if($insert_id != 0){
	    			$data['status'] = 'Product Added';
		    	}else{
		    		$data['error'] = 'Product not Added';
		    	}
		    	echo base_url().'admin/add_category/approve_prod/'.$insert_id;

		    	$this->load->library('my_library');
		    	$mail = array('from' => 'nikhilbs1994@gmail.com',
		    					'to' => 'nikhilbs1994@gmail.com',
		    					'subject' => 'Product Approval',
		    					'message' =>  base_url().'admin/add_category/view_prod/'.$insert_id );
		    	

				$this->my_library->send_mail($mail);
				$data['signup_name'] = $_SESSION['fname'];
				$data['signup_link'] = base_url().'seller/my_profile/view_profile';
			    $data['login_link'] = base_url().'home/logout'; 
			    $data['login_name'] = 'Logout';
		    	$this->data = $data;
				$this->middle = 'seller/add_product';
				$this->layout();
						
			}
		}
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
 		

		$data['signup_name'] = $_SESSION['fname'];
		$data['signup_link'] = base_url().'seller/my_profile/view_profile';
        $data['login_link'] = base_url().'home/logout'; 
        $data['login_name'] = 'Logout';
    	$this->data = $data;
		$this->middle = 'seller/view_product';
		$this->layout();
	}
} 
?>