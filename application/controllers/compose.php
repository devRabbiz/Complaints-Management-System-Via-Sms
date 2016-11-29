<?php

class Compose extends CI_Controller 
{
    var $machine_code         = '';
    var $activation_code      = '';
    var $activation_date      = '';
    var $activation_code_id   = '';
    var $customer_id          = '';
    var $customer_message     = '';
    var $technician_message   = '';
    var $technician_id        = '';

	function __construct()
	{
		parent::__construct();
	  $this->load->model('compose_m');
    $this->load->library("page_setting");
     $this->page_setting->isLogin();
      $this->page_setting->allowUserByType();
	}

	function index()
	{

    //$this->compose_list;
	}

  function push_for_activation($cell_number="")
  { 
   $message = array(
                    "sms_destination_number" => $cell_number,
                    "sms_message_body" => CUSTOMER_PREFIX." ---- ".$this->machine_code."----".$this->activation_code."----".$this->activation_date );
   if ($this->page_setting->Push($message)) {
      $this->compose_m->sendActivationCodeToCustomer($this->activation_code_id);
    } 
  }
//==============================================================
//**************************************************************
//==============================================================  
  function push_for_technician($cell_number="")
  {
    $message = array(
                    
                    "sms_destination_number" => $cell_number,
                    "sms_message_body" => TECHNICIAN_PREFIX." ".$this->technician_id." ---- ".$this->technician_message );
    $this->page_setting->Push($message);
  }
//==============================================================
//**************************************************************
//==============================================================  
  function push_for_customer($cell_number="")
  {
  $message = array( 
                    "sms_destination_number" => $cell_number,
                    "sms_message_body" => CUSTOMER_PREFIX." ".$this->customer_id." ---- ".$this->customer_message );
  $this->page_setting->Push($message);
  }
//==============================================================
//**************************************************************
//==============================================================	
	function compose_for_technician()
	{
    if ($_POST) {
     
      foreach ($_POST['technician_id'] as $key => $value) {
       list($technician_id,$technician_phone) = explode('|', $value);
          $phone_list = explode(',', $technician_phone);
       foreach ($phone_list as $key => $value) {
           $this->technician_id = $technician_id;
           $this->technician_message = $_POST['technician_message'];
           $this->push_for_technician($value);
        }
    }
    }
    $data=$this->compose_m->getComposeAllTechnician();
    $this->page_setting->control_page( $data );
	}
//==============================================================
//**************************************************************
//==============================================================
 function compose_for_customer()
  {
   if ($_POST) {
   
      foreach ($_POST['customer_id'] as $key => $value) {
      $data =  json_decode($value, true);
      if ($_POST['phone_type'] == 1) {
         $phone_list = explode(',', $data['customer_primary_phone']);
         $phone_list_n = explode(',', $data['customer_phone']);
         foreach ($phone_list_n as $key => $value) {
           $phone_list[] = $value;
         }
      }elseif ($_POST['phone_type'] == 2) {
         $phone_list = explode(',', $data['customer_primary_phone']);
     
      }elseif ($_POST['phone_type'] == 3) {
         $phone_list = explode(',', $data['customer_phone']);
      }
       foreach ($phone_list as $key => $value) {
           $this->customer_id = $data['customer_id'];
           $this->customer_message = $_POST['customer_message'];
           $this->push_for_customer($value);
        }
    }
  }
    $data=$this->compose_m->getComposeAllCustomer();
    $this->page_setting->control_page( $data );
  }
//==============================================================
//**************************************************************
//==============================================================
  function compose_for_activation()
  {
    if ($_POST) 
      {
        if (isset($_POST['customer_id']) && is_array($_POST['customer_id'])) {
      
        foreach ($_POST['customer_id'] as $key => $value) {
           $data =  json_decode($value, true);
      if ($_POST['phone_type'] == 1) {
         $phone_list = explode(',', $data['customer_primary_phone']);
         $phone_list_n = explode(',', $data['customer_phone']);
         foreach ($phone_list_n as $key => $value) {
           $phone_list[] = $value;
         }
      }elseif ($_POST['phone_type'] == 2) {
         $phone_list = explode(',', $data['customer_primary_phone']);
     
      }elseif ($_POST['phone_type'] == 3) {
         $phone_list = explode(',', $data['customer_phone']);
      }
     // //  list($activation_code_id,$customer_phone,$customer_email, $activation_code,$machine_code, $activation_date) = explode('|', $value);
     //      $phone_list = explode(',', $customer_phone);
       foreach ($phone_list as $key => $value) {
           $this->activation_code_id = $data['activation_code_id'];
           $this->machine_code  =   $data['machine_code'];
           $this->activation_code =  $data['activation_code'];
           $this->activation_date =   $data['activation_date'];
           $this->push_for_activation($value);
        }

      }
      }
      
    }    
    $data=$this->compose_m->getComposeActivationCodeAllCustomer();
    $this->page_setting->control_page( $data );
  }
//==============================================================
//**************************************************************
//==============================================================
	function compose_add($data="")
	{
    if ($_POST) {
       $data = $_POST;
       $data ['compose_date_insert'] =  date('Y-m-d H:i:s');
       $data['compose_id'] = $this->page_setting->get_uniq_id("tbl_compose");
       $id = $this->compose_m->composeAdd($data);
       $this->page_setting->check_confrim($id,"compose/compose_list");
    }
    else{
		$this->page_setting->control_page( $data="" );    
		}
	}
//==============================================================
//**************************************************************
//==============================================================  
	function compose_edit() // just for sample
	{
   // echo $id;
    $compose_id_decode=$this->page_setting->first_auto_decoded_id;
    if ($_POST) {
       $data = $_POST;
       $data ['compose_date_update'] =  date('Y-m-d H:i:s');
       $id = $this->compose_m->updateComposeById($data,$compose_id_decode);
       $this->page_setting->check_confrim($id,"compose/compose_list");
     }
    $data= $this->compose_m->getComposeById($compose_id_decode);
   $this->page_setting->control_page($data); 
	}
//==============================================================
//**************************************************************
//==============================================================
    function compose_view() // just for sample
  {
   // echo $id;
    $compose_id_decode=$this->page_setting->first_auto_decoded_id;
    if ($_POST) {
       $data = $_POST;
       $data ['compose_date_update'] =  date('Y-m-d H:i:s');
       $id = $this->compose_m->updateComposeById($data,$compose_id_decode);
       $this->page_setting->check_confrim($id,"compose/compose_list");
     }
    $data= $this->compose_m->getComposeById($compose_id_decode);
   $this->page_setting->control_page($data); 
  }
//==============================================================
//**************************************************************
//==============================================================
    function compose_delete()
    {
      $id = $this->input->post("id");
      $delete_record = $this->compose_m->deleteComposeById($id);
       if ($delete_record >0) {
              
              echo json_encode($id );
               } else {
               }
    }
//==============================================================
//**************************************************************
//==============================================================
}
