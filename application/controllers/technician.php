<?php

class Technician extends CI_Controller 
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('technician_m');
    $this->load->library("pagination");
    $this->load->library ("page_setting");
    $this->page_setting->isLogin();
     $this->page_setting->allowUserByType();
  }

  function index()
  {
    $this->technician_list;
  }
//==============================================================
//**************************************************************
//==============================================================  
  function technician_list()
  {
    $limit = 1200;
    $offset=$this->uri->segment(3);
    $config['total_rows'] = $this->technician_m->countAllTechnician();
    $config['base_url'] = site_url('/technician/technician_list/');
    $config['per_page'] = $limit;
    $data=$this->technician_m->getTechnicianAll($limit, $offset);
    $this->pagination->initialize($config);
  
    $this->page_setting->Pagination = $this->pagination->create_links();
    $this->page_setting->control_page( $data );
  }
//==============================================================
//**************************************************************
//==============================================================
  function technician_add($data="")
  {
    if ($_POST) {
       $data = $_POST;
       $data ['technician_date_insert'] =  date('Y-m-d H:i:s');
       $data['technician_id'] = $this->page_setting->get_uniq_id("tbl_technician");
       $id = $this->technician_m->technicianAdd($data);
       $this->page_setting->check_confrim($id,"technician/technician_list");
    }
    else{
       $technician_department = $this->technician_m->getTechnicianDepart();
     
      $data = explode(",", $technician_department);
    $this->page_setting->control_page( $data );    
    }
  }
//==============================================================
//**************************************************************
//==============================================================  
  function technician_edit() // just for sample
  {
   // echo $id;
    $technician_id_decode=$this->page_setting->first_auto_decoded_id;
    if ($_POST) {
       $data = $_POST;
       $data ['technician_date_update'] =  date('Y-m-d H:i:s');
       $id = $this->technician_m->updateTechnicianById($data,$technician_id_decode);
       $this->page_setting->check_confrim($id,"technician/technician_list");
     }
    $data= $this->technician_m->getTechnicianById($technician_id_decode);
     $technician_department = $this->technician_m->getTechnicianDepart();
     
      $this->page_setting->depart_list = explode(",", $technician_department);
    
   $this->page_setting->control_page($data); 
  }
 //==============================================================
//**************************************************************
//==============================================================  
  function technician_view() // just for sample
  {
   // echo $id;
    $technician_id_decode=$this->page_setting->first_auto_decoded_id;
    
    $data= $this->technician_m->getTechnicianById($technician_id_decode);
    
   $this->page_setting->control_page($data); 
  } 
//==============================================================
//**************************************************************
//==============================================================
    function technician_delete()
    {
      $id = $this->input->post("id");
      $delete_record = $this->technician_m->deleteTechnicianById($id);
       if ($delete_record >0) {
              echo json_encode($id );
               } else {
               }
    }
//==============================================================
//**************************************************************
//==============================================================
}
