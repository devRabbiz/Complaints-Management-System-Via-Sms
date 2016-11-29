<?php

class Complaint_m extends CI_Model {
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
	function  getComplaintById($id){
		$this->db->select();
		$this->db->from('tbl_compose');
		$this->db->where('compose_id',$id);
		$query= $this->db->get();
		return $query->result_array();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  getComplaintAll(){
		$this->db->select();
		$this->db->from('tbl_customer_complaint cc');
		$this->db->join('tbl_customer c', 'cc.customer_id = c.customer_id', 'inner');
		$this->db->join('tbl_machine m', 'c.customer_id = m.customer_id', 'inner');
		$this->db->join('tbl_complaint_code ccode', 'cc.complaint_code = ccode.complaint_code', 'inner');
		$this->db->join('tbl_status_code scode', 'cc.status_code = scode.status_code', 'inner');
		$this->db->order_by('cc.customer_complaint_date_insert','desc');
		$this->db->group_by('cc.customer_complaint_id');
		$query= $this->db->get();
		return $query->result_array();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  countAllComplaint(){

		return $this->db->count_all('tbl_compose');
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  deleteComplaintById($id){
	$this->db->where('compose_id', $id)->delete('tbl_compose');
	return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
//==============================================================
//**************************************************************
//==============================================================	
    	function technicianForwordComplaint($data)
	{
		$insert = $this->db->insert('tbl_forward_complaint', $data);
		return $this->db->insert_id();
	}
//==============================================================
//**************************************************************
//==============================================================
		function updateCustomerComplaintByComplaintId($value,$status_data)
	{
		$this->db->where('customer_complaint_id',$value);
		$this->db->update('tbl_customer_complaint',$status_data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
//==============================================================
//**************************************************************
//==============================================================
	function  getComplaintAllForword(){
		$this->db->select();
		$this->db->from('tbl_customer_complaint cc');
		$this->db->join('tbl_customer c', 'cc.customer_id = c.customer_id', 'inner');
		$this->db->join('tbl_complaint_code ccode', 'cc.complaint_code = ccode.complaint_code', 'inner');
		$this->db->join('tbl_status_code scode', 'cc.status_code = scode.status_code', 'inner');
		$this->db->order_by('cc.customer_complaint_date_insert','desc');
		$this->db->group_by('cc.customer_complaint_id');
		$this->db->where('cc.status_code','xorsat0');
		$query= $this->db->get();
		return $query->result_array();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  getComplaintForSendTechnician($complaint_id){
		$this->db->select();
		$this->db->from('tbl_customer_complaint cc');
		$this->db->join('tbl_customer c', 'cc.customer_id = c.customer_id', 'inner');
		$this->db->join('tbl_complaint_code ccode', 'cc.complaint_code = ccode.complaint_code', 'inner');
		$this->db->join('tbl_status_code scode', 'cc.status_code = scode.status_code', 'inner');
		$this->db->order_by('cc.customer_complaint_date_insert','desc');
		$this->db->group_by('cc.customer_complaint_id');
		$this->db->where('cc.customer_complaint_id',$complaint_id);
		$query= $this->db->get();
		return $query->result_array();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  getTechnicianPhoneById($id){
		$this->db->select();
		$this->db->from('tbl_technician');
		$this->db->where('technician_id',$id);
		$query= $this->db->get();
		return $query->row()->technician_phone;
	}
//==============================================================
//**************************************************************
//==============================================================		
}