<?php

class Machine_m extends CI_Model {
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
    	function machineAdd($data)
	{
		$insert = $this->db->insert('tbl_machine', $data);
		return $this->db->insert_id();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function updateMachineById($data,$id)
	{
		$this->db->where('machine_id',$id);
		$this->db->update('tbl_machine',$data);
		return $this->db->affected_rows() > "";
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  getMachineByCustomerId($id){
		$this->db->select();
		$this->db->from('tbl_machine m');
		$this->db->join('tbl_customer c', 'm.customer_id = c.customer_id', 'inner');
		$this->db->order_by('m.id','desc');
		$this->db->where('m.customer_id',$id);
		$query= $this->db->get();
		return $query->result_array();
	}
	function  getMachineById($id){
		$this->db->select();
		$this->db->from('tbl_machine m');
		$this->db->where('m.machine_id',$id);
		$query= $this->db->get();
		return $query->result_array();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  getMachineAll($per_pg,$offset){
		//$this->db->from('tbl_machine m');
		$this->db->join('tbl_customer c', 'm.customer_id = c.customer_id', 'inner');
		$this->db->order_by('m.machine_key','desc');
		$query=$this->db->get('tbl_machine m');	
		return $query->result_array();
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  countAllMachine(){

		return $this->db->count_all('tbl_machine');
	}
//==============================================================
//**************************************************************
//==============================================================	
	function  deleteMachineById($id){
	$this->db->where('machine_id', $id)->delete('tbl_machine');
	return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
//==============================================================
//**************************************************************
//==============================================================	

}