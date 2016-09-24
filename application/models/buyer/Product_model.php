<?php 
/*
  @author Nikhil
  *@version 1.0
  *Class to do product operation
*/
 class Product_model extends CI_Model{
 	/**
	* 
	* function to get product details
	* @param $where
	* @return $query
	**/
 	public function get_prod($q){
	   $this->db->select('prod_name');
	   $this->db->like('prod_name', $q);
	   $query = $this->db->get('product');
	   return $query;
 	}
 	/**
	* 
	* function to get category
	* @param $where
	* @return $row
	**/
 	public function get_category(){
		$this->load->database();
		$query = $this->db->get("category");
		return $query->result();
	}
	/**
	*
	* function to serach product
	* @param $where,$q
	* @return $row 
	*/
	public function search_product($where,$q){
		$this->db->where($where);
		$this->db->like('prod_name', $q);
		$query=$this->db->get("product");
		$row=$query->result();
		return $row;
	}
	/**
	* 
	* function to get product details
	* @param $where
	* @return $row
	**/
	public function view_prod($where){
		$this->load->database();
		$table_name = 'product';
		$query = $this->db->get_where($table_name, $where);
		if ( $query->num_rows() > 0 )
		{
    		$row = $query->row_array();
    		return $row;
		}else{
			return false;
		}
	} 
} 
?>