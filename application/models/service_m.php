<?php

class Service_m extends CI_Model {
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
   	function newDeviceAdd($data)
	{
		$insert = $this->db->insert('tbl_device', $data);
		return $this->db->insert_id();
	}
//==============================================================
//**************************************************************
//==============================================================
   	function saveMessageLog($data)
	{
		$insert = $this->db->insert('tbl_log', $data);
		return $this->db->insert_id();
	}	
	
//==============================================================
//**************************************************************
//==============================================================
//==============================================================
//**************************************************************
//==============================================================	
	function  getLogAll(){
		$this->db->order_by('id','desc');
		$query=$this->db->get('tbl_log');	
		return $query->result_array();
	}
//==============================================================
//**************************************************************
//==============================================================
    	function customerComplaint($data)
	{
		$insert = $this->db->insert('tbl_customer_complaint', $data);
		return $this->db->insert_id();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function updateCustomerById($data,$id)
	{
		$this->db->where('customer_id',$id);
		$this->db->update('tbl_customer',$data);
		return $this->db->affected_rows() > "";
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  getCustomerById($id){
		$this->db->select();
		$this->db->from('tbl_customer');
		$this->db->where('customer_id',$id);
		$query= $this->db->get();
		return $query->result_array();
	}
//==============================================================
//**************************************************************
	//**************************************************************
	//==============================================================
	
	function  getCustomerIdByNumber($number){
		$this->db->select('customer_id');
		$this->db->from('tbl_customer');
		$this->db->like('customer_phone', $number);
		$query= $this->db->get();
		$id = $query->row()->customer_id;
		return ($query->num_rows () > 0) ? $id : '0';
	}
//==============================================================
//**************************************************************
//**************************************************************
//==============================================================
	
	function  getTechnicianIdByNumber($number){
		$this->db->select('technician_id');
		$this->db->from('tbl_technician');
		$this->db->like('technician_phone', $number);
		$query= $this->db->get();
		$id = $query->row()->technician_id;
		return ($query->num_rows () > 0) ? $id : '0';
	}	
	function  getStatusCodeIdByCode($code){
		
		$this->db->select('status_code_id');
		$this->db->from('tbl_status_code');
		$this->db->like('status_code', $code);
		$query= $this->db->get();
		$id = $query->row()->status_code_id;
		return ($query->num_rows () > 0) ? $id : '0';
	}
		function  getCustomerIdByPrimeryNumber($number){
		
		$this->db->select('customer_id');
		$this->db->from('tbl_customer');
		$this->db->like('customer_primary_phone', $number);
		$query= $this->db->get();
		$id = $query->row()->customer_id;
		return ($query->num_rows () > 0) ? $id : '0';
	}
	
//		function  getTechnicianIdByNumber($number){
//		$this->db->select('technician_id');
//		$this->db->from('tbl_technician');
//		$this->db->like('technician_phone', $number);
//		$query= $this->db->get();
//		$id = $query->row()->technician_id;
//		return ($query->num_rows () > 0) ? $id : '0';
//	}
	//==============================================================
	//**************************************************************
	
	//**************************************************************
	//==============================================================
	function  getCustomerIdByComplaintId($complaint_id){
		$this->db->select();
		$this->db->from('tbl_customer_complaint');
		$this->db->where('customer_complaint_id', $complaint_id);
		$query= $this->db->get();
		$id = $query->row()->customer_id;
		return ($query->num_rows () > 0) ? $id : '0';
	}
	//==============================================================
	//**************************************************************
	
	//**************************************************************
	//==============================================================
	function  getCustomerPhoneByCustomerId($customer_id){
		$this->db->select();
		$this->db->from('tbl_customer');
	
		$this->db->like('customer_id', $customer_id);
		$query= $this->db->get();
		return $query->row()->customer_phone;
	}
	//==============================================================
	//**************************************************************
	//**************************************************************
	//==============================================================
	function  getStatusCode($status_code){
		$this->db->select();
		$this->db->from('tbl_status_code');
	
		$this->db->like('status_code', $status_code);
		$query= $this->db->get();
		return $query->result_array();
	}
	//==============================================================
	//**************************************************************
	//**************************************************************
	//==============================================================
	function  updateStatusCodeInCustomerComplaint($status_code,$id){
		$this->db->where('customer_complaint_id',$id);
		$this->db->update('tbl_customer_complaint',$status_code);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
		}
	//==============================================================
	//**************************************************************
	
	//**************************************************************
	//==============================================================
	function  verifyComplaintCode($complaint_code){
		$this->db->select();
		$this->db->from('tbl_complaint_code');
		$this->db->like('complaint_code', $complaint_code);
		$query= $this->db->get();
		return ($query->num_rows () > 0) ? '1' : '0';
		
	}
		function  verifyMachineCode($machine_code){
		$this->db->select();
		$this->db->from('tbl_customer c');
		$this->db->join('tbl_machine m', 'c.customer_id = m.customer_id', 'inner');
		$this->db->like('m.machine_key', $machine_code);
		$query= $this->db->get();
		return ($query->num_rows () > 0) ? '1' : '0';
		
	}
	//==============================================================
	//**************************************************************
//==============================================================	
	function  getCustomerAll($per_pg,$offset){
		$this->db->order_by('customer_id','desc');
		$query=$this->db->get('tbl_customer',$per_pg,$offset);	
		return $query->result_array();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  countAllCustomer(){

		return $this->db->count_all('tbl_customer');
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  deleteCustomerById($id){
	$this->db->where('customer_id', $id)->delete('tbl_customer');
	return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
//==============================================================
//**************************************************************
//==============================================================	

}