<?php

class Complaint_code extends CI_Controller 
{ 
  function __construct()
  {
    parent::__construct();
    $this->load->model('complaint_code_m');
    $this->load->library("pagination");
    $this->load->library ("page_setting");
     $this->page_setting->isLogin();
      $this->page_setting->allowUserByType();
  }

  function index()
  {
    $this->complaint_code_list;
  }
//==============================================================
//**************************************************************
//==============================================================  
  function complaint_code_list()
  {
    $limit = 1200;
    $offset=$this->uri->segment(3);
    $config['total_rows'] = $this->complaint_code_m->countAllComplaint();
    $config['base_url'] = site_url('/complaint_code/complaint_code_list/');
    $config['per_page'] = $limit;
    $data=$this->complaint_code_m->getComplaintAll($limit, $offset);
    $this->pagination->initialize($config);
  
    $this->page_setting->Pagination = $this->pagination->create_links();
    $this->page_setting->control_page( $data );
  }
//==============================================================
//**************************************************************
//==============================================================
  function complaint_code_add()
  {
    if ($_POST) {
       $data = $_POST;
       $data ['complaint_code_date_insert'] =  date('Y-m-d H:i:s');
       $data['complaint_code_id'] = $this->page_setting->get_uniq_id("tbl_complaint_code");
       $id = $this->complaint_code_m->complaintAdd($data);
       $this->page_setting->check_confrim($id,"complaint_code/complaint_code_list");
    }
    else{
    $this->page_setting->control_page( $data="" );    
    }
  }
//==============================================================
//**************************************************************
//==============================================================  
  function complaint_code_edit() // just for sample
  {
   // echo $id;
    $complaint_code_id_decode=$this->page_setting->first_auto_decoded_id;
    if ($_POST) {
       $data = $_POST;
       $data ['complaint_code_date_update'] =  date('Y-m-d H:i:s');
       $id = $this->complaint_code_m->updateComplaintById($data,$complaint_code_id_decode);
       $this->page_setting->check_confrim($id,"complaint_code/complaint_code_list");
     }
    $data= $this->complaint_code_m->getComplaintById($complaint_code_id_decode);
   $this->page_setting->control_page($data); 
  }
//==============================================================
//**************************************************************
//==============================================================
    function complaint_code_delete()
    {
      $id = $this->input->post("id");
      $delete_record = $this->complaint_code_m->deleteComplaintCodeById($id);
       if ($delete_record >0) {
              
              echo json_encode($id );
               } else {
               }
    }
//==============================================================
//**************************************************************
//==============================================================
}
