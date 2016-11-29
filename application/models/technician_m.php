<?php

class Technician_m extends CI_Model {
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
    	function technicianAdd($data)
	{
		$insert = $this->db->insert('tbl_technician', $data);
		return $this->db->insert_id();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function updateTechnicianById($data,$id)
	{
		$this->db->where('technician_id',$id);
		$this->db->update('tbl_technician',$data);
		return $this->db->affected_rows() > "";
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  getTechnicianById($id){
		$this->db->select();
		$this->db->from('tbl_technician');
		$this->db->where('technician_id',$id);
		$query= $this->db->get();
		return $query->result_array();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  getTechnicianDepart(){
		$this->db->select('app_setting_value');
		$this->db->from('tbl_app_setting');
		$this->db->where('app_setting_id','6');
		$query= $this->db->get();
		return $query->row()->app_setting_value;
	}	
	
//==============================================================
//**************************************************************
//==============================================================	
	function  getTechnicianAll($per_pg,$offset){

		$this->db->order_by('technician_id','desc');
		$query=$this->db->get('tbl_technician',$per_pg,$offset);	
		return $query->result_array();
	}
//==============================================================
//**************************************************************
//==============================================================
	function  getTechnicianAllList(){

		$this->db->order_by('technician_id','desc');
		$query=$this->db->get('tbl_technician');	
		return $query->result_array();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  countAllTechnician(){
		

		return $this->db->count_all('tbl_technician');
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  deleteTechnicianById($id){
	$this->db->where('technician_id', $id)->delete('tbl_technician');
	return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
//==============================================================
//**************************************************************
//==============================================================

}