<?php
/**
* 
*/
class Add_category_model extends CI_Model{
	
	public function add_cate($table_name,$data){
		$this->load->database();
		if($this->db->insert($table_name,$data)){
			$insert_id=$this->db->insert_id();
    		return $insert_id;
    	}else{
    		return false;
    	}

	}
}
?>