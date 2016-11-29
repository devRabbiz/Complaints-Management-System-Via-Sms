<?php

class Status_code extends CI_Controller 
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('status_code_m');
    $this->load->library("pagination");
    $this->load->library ("page_setting");
     $this->page_setting->isLogin();
      $this->page_setting->allowUserByType();
  }

  function index()
  {
    $this->status_code_list;
  }
//==============================================================
//**************************************************************
//==============================================================  
  function status_code_list()
  {
    $limit = 1200;
    $offset=$this->uri->segment(3);
    $config['total_rows'] = $this->status_code_m->countAllStatus();
    $config['base_url'] = site_url('/status_code/status_code_list/');
    $config['per_page'] = $limit;
    $data=$this->status_code_m->getStatusAll($limit, $offset);
    $this->pagination->initialize($config);
  
    $this->page_setting->Pagination = $this->pagination->create_links();
    $this->page_setting->control_page( $data );
  }
//==============================================================
//**************************************************************
//==============================================================
  function status_code_add()
  {
    if ($_POST) {
       $data = $_POST;
       $data ['status_code_date_insert'] =  date('Y-m-d H:i:s');
       $data['status_code_id'] = $this->page_setting->get_uniq_id("tbl_status_code");
       $id = $this->status_code_m->statusAdd($data);
       $this->page_setting->check_confrim($id,"status_code/status_code_list");
    }
    else{
    $this->page_setting->control_page( $data="" );    
    }
  }
//==============================================================
//**************************************************************
//==============================================================  
  function status_code_edit() // just for sample
  {
   // echo $id;
    $status_code_id_decode=$this->page_setting->first_auto_decoded_id;
    if ($_POST) {
       $data = $_POST;
       $data ['status_code_date_update'] =  date('Y-m-d H:i:s');
       $id = $this->status_code_m->updateStatusById($data,$status_code_id_decode);
       $this->page_setting->check_confrim($id,"status_code/status_code_list");
     }
    $data= $this->status_code_m->getStatusById($status_code_id_decode);
   $this->page_setting->control_page($data); 
  }
//==============================================================
//**************************************************************
//==============================================================
    function status_code_delete()
    {
      $id = $this->input->post("id");
      $delete_record = $this->status_code_m->deleteStatusCodeById($id);
       if ($delete_record >0) {
              
              echo json_encode($id );
               } else {
               }
    }
//==============================================================
//**************************************************************
//==============================================================

}
