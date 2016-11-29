<?php

class Complaint extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
	  $this->load->model('complaint_m');
    $this->load->model('technician_m');
    $this->load->library ("page_setting");
    $this->page_setting->isLogin();
	}


	function index()
	{
    $this->complaint_list;
	}
//==============================================================
//**************************************************************
//==============================================================	
	function complaint_list()
	{
    $data=$this->complaint_m->getComplaintAll();
    $this->page_setting->control_page( $data );
	}
//==============================================================
//**************************************************************
//==============================================================  
  function push_for_technician($complaint_id="",$technician_id="")
  {
    $data = $this->complaint_m->getComplaintForSendTechnician($complaint_id);
    $phone = $this->complaint_m->getTechnicianPhoneById($technician_id);
    $phone_list = explode(',', $phone);
  foreach ($phone_list as $key => $value) {
           
             $message = array(
                     "sms_destination_number" => $value,
                     "sms_message_body" =>  TECHNICIAN_PREFIX." ".$data['0']['customer_complaint_id']."|".$data['0']['complaint_code']."|".$data['0']['customer_name']."|".$data['0']['customer_address'] );
    $this->page_setting->Push($message);
             
            }

  
  }
//==============================================================
//**************************************************************
//==============================================================  
  function complaint_forword()
  {
    if ($_POST && isset($_POST['customer_complaint_id']) && $_POST['customer_complaint_id'] >0)  {
     foreach ($_POST['customer_complaint_id'] as $key => $value) {
      
      foreach ($_POST['technician_id'] as $key_technician_id => $value_technician_id) {
       
        $data['customer_complaint_id'] = $value;
        $data['technician_id'] = $value_technician_id;
        $data['forward_complaint_id'] = $this->page_setting->get_uniq_id("tbl_forward_complaint");
        $data ['forward_complaint_date_insert'] =  date('Y-m-d H:i:s');
        $status['status_code'] = 'xorsat1';
        $status['customer_complaint_date_update'] = date('Y-m-d H:i:s');
        $this->push_for_technician($value,$value_technician_id);
       $update[] = $this->complaint_m->updateCustomerComplaintByComplaintId($value,$status);
       $ids[] = $this->complaint_m->technicianForwordComplaint($data);
     }
      } 
    }
    $data=$this->complaint_m->getComplaintAllForword();
    $this->page_setting->technician_list = $this->technician_m->getTechnicianAllList();
    $this->page_setting->control_page( $data );
  }  
//==============================================================
//**************************************************************
//==============================================================
	function complaint_add($data="")
	{
    if ($_POST) {
       $data = $_POST;
       $data ['complaint_date_insert'] =  date('Y-m-d H:i:s');
       $data['complaint_id'] = $this->page_setting->get_uniq_id("tbl_customer");
       $id = $this->complaint_m->customerAdd($data);
       $this->page_setting->check_confrim($id,"customer/complaint_list");
    }
    else{
		$this->page_setting->control_page( $data="" );    
		}
	}
//==============================================================
//**************************************************************
//==============================================================  
	function complaint_edit() // just for sample
	{
   // echo $id;
    $complaint_id_decode=$this->page_setting->first_auto_decoded_id;
    if ($_POST) {
       $data = $_POST;
       $data ['complaint_date_update'] =  date('Y-m-d H:i:s');
       $id = $this->complaint_m->updateComplaintById($data,$complaint_id_decode);
       $this->page_setting->check_confrim($id,"customer/complaint_list");
     }
    $data= $this->complaint_m->getComplaintById($complaint_id_decode);
   $this->page_setting->control_page($data); 
	}
//==============================================================
//**************************************************************
//==============================================================
    function complaint_view() // just for sample
  {
   // echo $id;
    $complaint_id_decode=$this->page_setting->first_auto_decoded_id;
    if ($_POST) {
       $data = $_POST;
       $data ['complaint_date_update'] =  date('Y-m-d H:i:s');
       $id = $this->complaint_m->updateComplaintById($data,$complaint_id_decode);
       $this->page_setting->check_confrim($id,"customer/complaint_list");
     }
    $data= $this->complaint_m->getComplaintById($complaint_id_decode);
   $this->page_setting->control_page($data); 
  }
//==============================================================
//**************************************************************
//==============================================================
    function complaint_delete()
    {
      $id = $this->input->post("id");
      $delete_record = $this->complaint_m->deleteComplaintById($id);
       if ($delete_record >0) {
              
              echo json_encode($id );
               } else {
               }
    }
//==============================================================
//**************************************************************
//==============================================================
}