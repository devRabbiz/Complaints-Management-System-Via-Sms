<?php

class Login_m extends CI_Model {

	function validate()
	{
		$this->db->where('user_username', $this->input->post('username'));
		$this->db->where('user_password', base64_encode($this->input->post('password')));
		$query = $this->db->get('tbl_user');
//print_r($query);
  //exit();
		  if($query->num_rows == 1)
		  {
		   return $query->result_array();
		  }
	}
	
	function create_member()
	{
		
		$new_member_insert_data = array(
			'user_first_name' => $this->input->post('first_name'),
			'user_last_name' => $this->input->post('last_name'),
			'user_email' => $this->input->post('email_address'),			
			'user_username' => $this->input->post('username'),
			'user_password' => base64_encode($this->input->post('password')),
		    'user_create_time' => "NOW()"						
		);
		
		$insert = $this->db->insert('tbl_user', $new_member_insert_data);
		return $insert;
	}
}