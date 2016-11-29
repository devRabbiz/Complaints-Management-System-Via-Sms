<?php

class Machine extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
	  $this->load->model('machine_m');
    $this->load->library("pagination");
    $this->load->library ("page_setting");
     $this->page_setting->isLogin();
	}

	function index()
	{
    $this->machine_list;
	}
//==============================================================
//**************************************************************
//==============================================================	
	function machine_list()
	{
    $limit = 1200;
    $offset=$this->uri->segment(3);
    $config['total_rows'] = $this->machine_m->countAllMachine();
    $config['base_url'] = site_url('/customer/machine_list/');
    $config['per_page'] = $limit;
    $data=$this->machine_m->getMachineAll($limit, $offset);
    $this->pagination->initialize($config);
  
    $this->page_setting->Pagination = $this->pagination->create_links();
    $this->page_setting->control_page( $data );
	}
//==============================================================
//**************************************************************
//==============================================================
	function machine_add($data="")
	{

    // echo $id;
    $customer_id_decode=$this->page_setting->first_auto_decoded_id;
        if ($_POST) {
        
        $machine_warranty_start = date('Y-m-d', strtotime($_POST['machine_warranty_start']));
       
         $machine_warranty_end = date('Y-m-d', strtotime($_POST['machine_warranty_end']));
       //date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('dob'))));

         $data = array(
                      'machine_key' => $_POST['machine_key'],
                      'machine_warranty_start' => $machine_warranty_start,
                      'machine_warranty_end' => $machine_warranty_end,
                      'customer_id' => $customer_id_decode,
                      'machine_id' => $this->page_setting->get_uniq_id("tbl_machine"),
                       );


       $id = $this->machine_m->machineAdd($data);
       $this->page_setting->check_confrim($id,"customer/customer_list");
     }
    $data= $this->machine_m->getMachineByCustomerId($customer_id_decode);
   $this->page_setting->control_page($data); 
	}
//==============================================================
//**************************************************************
//==============================================================  
	function machine_edit() // just for sample
	{ 
       $machine_id_decode=$this->page_setting->first_auto_decoded_id;
    if ($_POST) {
      
      $machine_warranty_start = date('Y-m-d', strtotime($_POST['machine_warranty_start']));
       
         $machine_warranty_end = date('Y-m-d', strtotime($_POST['machine_warranty_end']));

         $data = array(
                      'machine_key' => $_POST['machine_key'],
                      'machine_warranty_start' => $machine_warranty_start,
                      'machine_warranty_end' => $machine_warranty_end
                       );
       
       $id = $this->machine_m->updateMachineById($data,$machine_id_decode);
       
      $this->page_setting->check_confrim($id,"customer/customer_list");
    }
    else{
      $data= $this->machine_m->getMachineById($machine_id_decode);
    $this->page_setting->control_page( $data );    
    }
	}
//==============================================================
//**************************************************************
//==============================================================
    function machine_view() // just for sample
  {
   // echo $id;
    $machine_id_decode=$this->page_setting->first_auto_decoded_id;
    if ($_POST) {
       $data = $_POST;
       $data ['machine_date_update'] =  date('Y-m-d H:i:s');
       $id = $this->machine_m->updateMachineById($data,$machine_id_decode);
       $this->page_setting->check_confrim($id,"customer/machine_list");
     }
    $data= $this->machine_m->getMachineById($machine_id_decode);
   $this->page_setting->control_page($data); 
  }
//==============================================================
//**************************************************************
//==============================================================
    function machine_delete()
    {
      $id = $this->input->post("id");
      $delete_record = $this->machine_m->deleteMachineById($id);
       if ($delete_record >0) {
              
              echo json_encode($id );
               } else {
               }
    }
//==============================================================
//**************************************************************
//==============================================================
}
