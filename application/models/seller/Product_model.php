<?php 
/*
  @author Nikhil
  *@version 1.0
  *Class to do product operation
*/
class Product_model extends CI_Model
{
	/**
	* 
	* function to get category
	* @param null
	* @return $query->result();
	**/
	public function get_category(){
		$this->load->database();
		$query = $this->db->get("category");
		return $query->result();
	}
	/**
	* 
	* function to add product
	* @param $data
	* @return $insert_id
	**/
	public function add_prod($data){
		$this->load->database();
		$table_name = "product";
		if($this->db->insert($table_name,$data)){
			$insert_id = $this->db->insert_id();
    		return $insert_id;
    	}else{
    		return false;
    	}

	}
}
?>