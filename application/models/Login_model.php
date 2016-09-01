<?php 
	/**
	* 
	*/
	class Login_model extends MY_Controller
	{
		
		function login_check($table_name,$where){
			//$this->db->query("SELECT lname from employee where fname='".$fname"');
			/*$where= array('fname' => $fname );
			$table_name="employee";*/
			$this->load->database();
			$query=$this->db->get_where($table_name,$where);
			if ( $query->num_rows() > 0 )
    		{
        		$row = $query->row_array();
        		return $row;
    		}else{
    			return false;
    		}

    		
		}
		function update_pwd($table_name,$pwd,$where)
 		{
 			$this->load->database();
 			$data = array('pwd' => $pwd );
 			$this->db->where($where);
			if($this->db->update($table_name,$data)){
			return true;
    		}else{
    		return false;
    		}

 		}
	}
 ?>