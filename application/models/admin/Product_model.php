<?php
/*
  @author Nikhil
  *@version 1.0
  *Class to do product  operation
*/
class Product_model extends CI_Model{
	/**
	* 
	* function to add product
	* @param $data
	* @return $insert_id
	**/
	public function add_cate($data){
		$table_name = "category";
		$this->load->database();
		if($this->db->insert($table_name,$data)){
			$insert_id = $this->db->insert_id();
    		return $insert_id;
    	}else{
    		return false;
    	}

	}
	/**
	* 
	* function to get product details
	* @param $where
	* @return $row
	**/
	public function view_product($where){
		$this->load->database();
		$table_name = 'product';
		$this->db->where($where);
		$query = $this->db->get($table_name);
		
		if ( $query->num_rows() > 0 )
		{
    		$row = $query->row_array();
    		
    		return $row;
		}else{
			return false;
		}
	}
	/**
	* 
	* function to approve product
	* @param $where
	* @return boolean
	**/
	function approve_prod($where)
 	{
		$this->load->database();
		$table_name = "product";
		$data = array('status' => 1 );
		$this->db->where($where);
		if($this->db->update($table_name, $data)){
		return true;
		}else{
		return false;
		}
		
 	}
 		/**
	* 
	* function to approve product
	* @param $where
	* @return boolean
	**/
	function reject_prod($where)
 	{
		$this->load->database();
		$table_name = "product";
		$data = array('status' => 2 );
		$this->db->where($where);
		if($this->db->update($table_name, $data)){
		return true;
		}else{
		return false;
		}
		
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
	* function to get product details for seller
	* @param $where
	* @return $row
	**/
	public function view_seller_prod($where){
		$this->load->database();
		$table_name = 'product';
		
		$query = $this->db->get_where($table_name, $where);
		if ( $query->num_rows() > 0 )
		{
    		$row = $query->result();
    		return $row;
		}else{
			return false;
		}
	}
		/**
	* 
	* function to get product details for admin
	* @param $where
	* @return $row
	**/
	public function view_admin_prod(){
		$this->load->database();
		$table_name = 'product';
		$query = $this->db->get($table_name);
		if ( $query->num_rows() > 0 )
		{
    		$row = $query->result();
    		return $row;
		}else{
			return false;
		}
	}
		/**
	* 
	* function to get product details for seller
	* @param $where
	* @return $row
	**/
	public function view_home_prod(){
		$this->load->database();
		$table_name = 'product';
		$where = array('status' => 1);
		$this->db->where($where);
		$this->db->order_by('prod_id','desc');
		$query = $this->db->get($table_name,9);
		if ( $query->num_rows() > 0 )
		{
    		$row = $query->result();
    		return $row;
		}else{
			return false;
		}
	}
}
?>