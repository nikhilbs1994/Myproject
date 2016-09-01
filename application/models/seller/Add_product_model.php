<?php 
/**
* 
*/
class Add_product_model extends CI_Model
{
	
	public function get_category(){
		$this->load->database();
		$query=$this->db->get("category");
		return $query->result();
	}
}
?>