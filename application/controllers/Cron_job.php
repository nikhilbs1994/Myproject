<?php

/**
* 
*/

class Cron_job extends MY_Controller{

	public function __construct(){
        parent::__construct();
        $this->load->model('admin/product_model');

    }
	public function index(){
	 	try {
		    $prod_details = $this->product_model->view_admin_prod();
		    $msg = "";
		    foreach ($prod_details as $row) {
		        if($row->status == 0){
					$prod_status = "Inactive";
				}elseif ($row->status == 1) {
					$prod_status = "Active";		
				}else{
					$prod_status = "Rejected";
				}
		    	$msg.= '<tr>';
		    	$msg.= '<td>'.$row->prod_id.'</td>';
		    	$msg.= '<td>'.$row->prod_name.'</td>';
		    	$msg.= '<td>'.$prod_status.'</td>';
		    	$msg.= '</tr>';
		    }    
		    $data['msg']=$msg;
		    $message = $this->load->view('msg',$data,TRUE);
			$this->load->library('my_library');
			$mail = array('from' => 'nikhilbs1994@gmail.com',
							'to' => 'nikhilbs1994@gmail.com',
							'subject' => 'Daily Status',
							'message' =>  $message );
			
			$this->my_library->send_mail($mail);	
    	}catch(Exception $e){
			$this->load->helper('file');
		    if ( ! write_file(FCPATH.'application/controllers/logfile.txt', $e->getMessage() . "\r\n", 'a')){
		            echo 'Unable to write the file';
		    }
		    else{
		            echo 'File written!';
		    }
		}
	}
}
?>