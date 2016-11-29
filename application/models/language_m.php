<?php

class Language_m extends CI_Model {

 //========= user validata at the time of login Fucntaion ==============	
	function validate()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('membership');
		
		if($query->num_rows == 1)
		{
			return true;
		}
		
	}
 //========= user validata at the time of login Fucntaion ==============
 //*********************************************************************
 //==================== Create Picture Fucntaion =======================	
	function createPicture($data)
	{	
		$insert = $this->db->insert('tbl_picture', $data);
		return $this->db->insert_id();
	}
 //==================== Create Picture Fucntaion =======================	
 //*********************************************************************
 //=============== Create Multiple Picture Fucntaion ===================
	function createPictureMultiple($data,$num)
	{	
		$i = 1;
while ($i <= $num) {
	$insert = $this->db->insert('tbl_picture', $data);
		$_ids[] = $this->db->insert_id();

   $i++;  }


		return $_ids;
	}
 //=============== Create Multiple Picture Fucntaion ===================
 //*********************************************************************
 //================== Update Picture by id Fucntaion ===================
	function updatePictureById($data,$id)
	{
		$this->db->where('picture_id',$id);
		$this->db->update('tbl_picture',$data);
	}
 //================== Update Picture by id Fucntaion ===================
 //*********************************************************************
 //================== Get Admin By Id Fucntaion ========================
	function  getPicturesByGalleryId($gallery_id){
	$this->db->select();
		$this->db->from('tbl_picture');
		$this->db->where('gallery_id',$gallery_id);
		$query= $this->db->get();
		
	return ($query->num_rows > 0) ? $query->result_array() : FALSE;

	}
 //================== Get Admin By Id Fucntaion ========================
 //================== Get Admin By Id Fucntaion =====================
	function  countAllPicture(){
	
		return $this->db->count_all('tbl_picture');
	}
 //================== Get Admin By Id Fucntaion =====================
 //================== Get Admin By Id Fucntaion =====================
	function  getPictureAll($per_pg="",$offset=""){
	$this->db->select('gallery_thumb_picture_id,gallery_feature_picture_id');
    $this->db->from('tbl_gallery');
    $query= $this->db->get();
    $id = $query->result_array();
    foreach ($id as $key => $value) {
    	foreach ($value as $key_2 => $value_2) {
    		$ids[] = $value_2;
    	}
    }
    //print_r($ids);
    //exit();


	$this->db->select('*');
    $this->db->from('tbl_picture');
    $this->db->join('tbl_gallery', 'tbl_gallery.gallery_id = tbl_picture.gallery_id', 'inner');
    $this->db->order_by('tbl_picture.picture_id','desc');
    $this->db->limit($per_pg, $offset);
    $this->db->where_not_in('picture_id', $ids);	
    $query= $this->db->get();
    return $query->result_array();

	}
 //================== Get Admin By Id Fucntaion =====================
	 //================== Get Admin By Id Fucntaion =====================
	function  deletePictureById($picture_id){
	$this->db->where('picture_id', $picture_id)->delete('tbl_picture');
	return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
 //================== Get Admin By Id Fucntaion =====================

	
}