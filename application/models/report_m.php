<?php

class Report_m extends CI_Model {
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
	function  getReportAllTechnician($per_pg,$offset){
		$this->db->order_by('technician_id','desc');
		$query=$this->db->get('tbl_technician',$per_pg,$offset);	
		return $query->result_array();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  countAllReportTechnician(){

		return $this->db->count_all('tbl_technician');
	}
//==============================================================
//**************************************************************
//==============================================================
//==============================================================
//**************************************************************
//==============================================================	
	function  getReportAllCustomer($per_pg,$offset){
		$this->db->order_by('customer_id','desc');
		$query=$this->db->get('tbl_customer',$per_pg,$offset);	
		return $query->result_array();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  countAllReportCustomer(){

		return $this->db->count_all('tbl_customer');
	}
//==============================================================
//**************************************************************
//==============================================================
//==============================================================
//**************************************************************
//==============================================================	
	function  getReportAllComplaint($per_pg="",$offset=""){
		$this->db->select();
		$this->db->from('tbl_customer_complaint cc');
		$this->db->join('tbl_customer c', 'cc.customer_id = c.customer_id', 'inner');
		$this->db->join('tbl_forward_complaint fc', 'cc.customer_complaint_id = fc.customer_complaint_id', 'inner');
		$this->db->join('tbl_machine m', 'c.customer_id = m.customer_id', 'inner');
		$this->db->join('tbl_technician t', 't.technician_id = fc.technician_id', 'inner');
		$this->db->join('tbl_complaint_code ccode', 'cc.complaint_code = ccode.complaint_code', 'inner');
		$this->db->join('tbl_status_code scode', 'cc.status_code = scode.status_code', 'inner');
		$this->db->where('customer_complaint_is_done','1');
		$this->db->order_by('cc.customer_complaint_date_insert','desc');
		$this->db->group_by('cc.customer_complaint_id');
		$query= $this->db->get();
		//$query=$this->db->get($per_pg,$offset);	
		return $query->result_array();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  countAllReportComplaint(){

		return $this->db->count_all('tbl_customer_complaint');
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  getTechnicianReportById($id){
		$this->db->select();
		$this->db->from('tbl_technician');
		$this->db->where('technician_id',$id);
		$query= $this->db->get();
		return $query->result_array();
	}	
//==============================================================
//**************************************************************
//==============================================================	
	function  getComplaintByTechnicianId($id){
		$this->db->select();
		$this->db->from('tbl_forward_complaint fc');
		$this->db->join('tbl_customer_complaint c', 'fc.customer_complaint_id = c.customer_complaint_id', 'inner');
		$this->db->join('tbl_customer cc', 'c.customer_id = cc.customer_id', 'inner');
		//$this->db->join('tbl_machine m', 'c.customer_id = m.customer_id', 'inner');
		$this->db->join('tbl_technician t', 't.technician_id = fc.technician_id', 'inner');
		$this->db->join('tbl_complaint_code ccode', 'c.complaint_code = ccode.complaint_code', 'inner');
		$this->db->join('tbl_status_code scode', 'c.status_code = scode.status_code', 'inner');
		$this->db->where('fc.technician_id',$id);
		$this->db->order_by('fc.forward_complaint_date_insert	','desc');
		//$this->db->group_by('cc.customer_complaint_id');
		$query= $this->db->get();
		//$query=$this->db->get($per_pg,$offset);
			//echo  "<pre>";
			//print_r($query->result_array());
			//exit();
		return $query->result_array();



		
	}	
//==============================================================
//**************************************************************
//==============================================================
//==============================================================
//**************************************************************
//==============================================================	
	function  getComplaintReportById($id){
		$this->db->select();
		$this->db->from('tbl_customer_complaint cc');
		$this->db->join('tbl_customer c', 'cc.customer_id = c.customer_id', 'inner');
		$this->db->join('tbl_forward_complaint fc', 'cc.customer_complaint_id = fc.customer_complaint_id', 'inner');
		$this->db->join('tbl_machine m', 'c.customer_id = m.customer_id', 'inner');
		$this->db->join('tbl_technician t', 't.technician_id = fc.technician_id', 'inner');
		$this->db->join('tbl_complaint_code ccode', 'cc.complaint_code = ccode.complaint_code', 'inner');
		//$this->db->join('tbl_status_code scode', 'cc.status_code = scode.status_code', 'inner');
		$this->db->join('tbl_status_code scode', 'fc.status_code_id = scode.status_code_id', 'inner');
		$this->db->where('fc.customer_complaint_id',$id);
		$this->db->order_by('fc.forward_complaint_date_insert','desc');
		//$this->db->group_by('cc.customer_complaint_id');
		$query= $this->db->get();
		//$query=$this->db->get($per_pg,$offset);	
		return $query->result_array();



		
	}	
//==============================================================
//**************************************************************
//==============================================================	



}