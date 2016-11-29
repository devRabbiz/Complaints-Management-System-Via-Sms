<?php

class Compose_m extends CI_Model {
//==============================================================
//**************************************************************
//==============================================================	
	function __construct()
    {
    	parent::__construct();
    }
//==============================================================
//**************************************************************
//==============================================================
    	function composeAdd($data)
	{
		$insert = $this->db->insert('tbl_compose', $data);
		return $this->db->insert_id();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function updateComposeById($data,$id)
	{
		$this->db->where('compose_id',$id);
		$this->db->update('tbl_compose',$data);
		return $this->db->affected_rows() > "";
	}
	
//==============================================================
//**************************************************************
//==============================================================	
	function sendActivationCodeToCustomer($activation_code_id)
	{
		$data = array('activation_code_status' => '1' );
		$this->db->where('activation_code_id',$activation_code_id);
		$this->db->update('tbl_activation_code',$data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  getComposeById($id){
		$this->db->select();
		$this->db->from('tbl_compose');
		$this->db->where('compose_id',$id);
		$query= $this->db->get();
		return $query->result_array();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  getComposeAllTechnician(){
		$this->db->order_by('technician_id','desc');
		$query=$this->db->get('tbl_technician');	
		return $query->result_array();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  getComposeAllCustomer(){
		$this->db->order_by('customer_id','desc');
		$query=$this->db->get('tbl_customer');	
		return $query->result_array();
	}	
//==============================================================
//**************************************************************
//==============================================================	
	function  getComposeActivationCodeAllCustomer(){
		/*
		WHERE A.activation_code_status='1'
SELECT * FROM tbl_activation_code A INNER JOIN tbl_customer B ON B.customer_machine LIKE CONCAT('%', A.machine_code, '%');
		
	SELECT * FROM tbl_activation_code A 
INNER JOIN tbl_customer B ON B.customer_machine LIKE CONCAT('%', A.machine_code, '%')
WHERE A.activation_code_status='0'
ORDER BY A.activation_code_date_insert DESC 

		*/
		$query = $this->db->query("SELECT * FROM tbl_activation_code A 
		INNER JOIN tbl_machine c ON A.machine_code = c.machine_key
		INNER JOIN tbl_customer B ON c.customer_id = B.customer_id
		WHERE A.activation_code_status='0' ORDER BY A.activation_code_date_insert DESC");
		return $query->result_array();


	}	
//==============================================================
//**************************************************************
//==============================================================	
	function  countAllCompose(){

		return $this->db->count_all('tbl_compose');
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  deleteComposeById($id){
	$this->db->where('compose_id', $id)->delete('tbl_compose');
	return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
//==============================================================
//**************************************************************
//==============================================================	

}