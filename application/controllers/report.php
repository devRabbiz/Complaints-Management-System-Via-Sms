<?php

class Report extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
	  $this->load->model('report_m');
    $this->load->library("pagination");

    $this->load->library ("page_setting");
    $this->page_setting->isLogin();
    $this->page_setting->allowUserByType();
	}

	function index()
	{
    $this->report_list;
	}
//==============================================================
//**************************************************************
//==============================================================	
	function customer_report()
	{
    $limit = 1200;
    $offset=$this->uri->segment(3);
    $config['total_rows'] = $this->report_m->countAllReportCustomer();
    $config['base_url'] = site_url('/report/report_customer/');
    $config['per_page'] = $limit;
    $data=$this->report_m->getReportAllCustomer($limit, $offset);
    $this->pagination->initialize($config);
  
    $this->page_setting->Pagination = $this->pagination->create_links();
    $this->page_setting->control_page( $data );
	}
//==============================================================
//**************************************************************
//==============================================================

//==============================================================
//**************************************************************
//==============================================================  
  function technician_report()
  {
    $limit = 1200;
    $offset=$this->uri->segment(3);
    $config['total_rows'] = $this->report_m->countAllReportTechnician();
    $config['base_url'] = site_url('/report/technician_report/');
    $config['per_page'] = $limit;
    $data=$this->report_m->getReportAllTechnician($limit, $offset);
    $this->pagination->initialize($config);
  
    $this->page_setting->Pagination = $this->pagination->create_links();
    $this->page_setting->control_page( $data );
  }
//==============================================================
//**************************************************************
//==============================================================

//==============================================================
//**************************************************************
//==============================================================  
  function complaint_report()
  {
    $limit = 2200;
    $offset=$this->uri->segment(3);
    $config['total_rows'] = $this->report_m->countAllReportComplaint();
    $config['base_url'] = site_url('/report/complaint_report/');
    $config['per_page'] = $limit;
    $data=$this->report_m->getReportAllComplaint($limit, $offset);
    $this->pagination->initialize($config);
  
    $this->page_setting->Pagination = $this->pagination->create_links();
    $this->page_setting->control_page( $data );
  }
//==============================================================
//**************************************************************
//==============================================================
  function technician_detail_report($value='')
  {
       // echo $id;
    $technician_id_decode=$this->page_setting->first_auto_decoded_id;
    
   //$data= $this->report_m->getTechnicianReportById($technician_id_decode);

    $data = $this->report_m->getComplaintByTechnicianId($technician_id_decode);
    
   $this->page_setting->control_page($data); 
  }
  //==============================================================
//**************************************************************
//==============================================================
  function complaint_detail_report($value='')
  {
       // echo $id;
    $id_decode=$this->page_setting->first_auto_decoded_id;
    
    $data= $this->report_m->getComplaintReportById($id_decode);

   // $this->page_setting->complaint_list = $this->report_m->getComplaintByTechnicianId($technician_id_decode);
    //echo "<pre>";
   // print_r($data);
   // exit();
   $this->page_setting->control_page($data); 
  }

}