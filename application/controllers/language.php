<?php

class Language extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
    $this->load->model('gallery_m');
    $this->load->model('language_m');
      $this->load->helper('html');
    $this->load->helper('url');
    $this->load->library("pagination");
	}
	function index()
	{
	
	}

	function language_list()
	{

      $limit = 6;
    $offset=$this->uri->segment(3);
    $config['total_rows'] = $this->language_m->countAllPicture();
    $config['base_url'] = site_url('/picture/language_list/');
    $config['per_page'] = $limit;
    $query_result=$this->language_m->getPictureAll($limit, $offset);
   // $data['posts'] = $this->post->limit($limit, $offset)->post->get_all();

    $this->pagination->initialize($config);

   

    //$this->load->view('posts',$data);
    
    //$query_result = $this->gallery_m->getGalleryAll();
    $data = $this->page_setting($query_result,$page="language_list",$message="");
     $data["pagination_links"] = $this->pagination->create_links();

    $this->load->view('includes/template', $data);

	
	}	

//--------------------------------------------------------------
//----------------------PICTURE LIST Fucntion ------------------
//--------------------------------------------------------------
//**************************************************************
//--------------------------------------------------------------
//-------------------- CREATE PICTURE Fucntion -----------------
//--------------------------------------------------------------	
	function language_add()
	{
    if ($_POST) {
     // echo "<pre>";
      //print_r($_FILES);
      //echo "<pre>";
     // exit();
    $data = $this->form_validation();
    $num = count($_FILES['news_picture']['tmp_name']); // output 8
    $language_id = $this->language_m->createPictureMultiple($data,$num);
     // create image name from gallery_id+language_id
      foreach ($language_id as $key => $value) {
         $image_name[] = $data['gallery_id']."_".$value;
      }
      
      $this->load->library("upload_file");
      $this->upload_file->file_upload($image_name);
 
     $query_result['gallery_data'] = $this->gallery_m->getGalleryById($data['gallery_id']);
     $query_result['language_data'] = $this->language_m->getPicturesByGalleryId($data['gallery_id']);
     
     $data = $this->page_setting($query_result,$page="edit_gallery",$message="");       
    $this->load->view('includes/template',$data);


    }else{


		$query_result=$this->gallery_m->getGalleryAll();
 
		$data = $this->page_setting($query_result,$page="add_picture",$message=""); 
		$this->load->view('includes/template', $data);
  }

	}
//--------------------------------------------------------------
//-------------------- CREATE PICTURE Fucntion -----------------
//--------------------------------------------------------------	
//**************************************************************
//--------------------------------------------------------------
//---------------------- EDIT PICTURE Fucntion -----------------
//--------------------------------------------------------------
	function language_edit() // just for sample
	{	
		$data = $this->page_setting($query_result="",$page="edit_picture",$message=""); 
		$this->load->view('includes/template', $data);
	}
//--------------------------------------------------------------
//---------------------- EDIT PICTURE Fucntion -----------------
//--------------------------------------------------------------
//**************************************************************
//--------------------------------------------------------------
//---------------------- VIEW PICTURE Fucntion -----------------
//--------------------------------------------------------------	
	function language_delete() // just for sample
	{
		$data = $this->page_setting($query_result="",$page="view_picture",$message=""); 
		$this->load->view('includes/template',$data);
	}


}
