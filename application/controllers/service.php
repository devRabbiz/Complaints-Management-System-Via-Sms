<?php

class Service extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
	$this->load->model('service_m');
	$this->load->model('complaint_m');
    $this->load->library("pagination");
   	$this->load->library ("page_setting");
	}
	 function validate_service($value='')
	{
		$this->service_m->saveMessageLog($value);
	}

	function check_insert_technician()
	{
		$this->page_setting->isLogin();
    	$this->page_setting->control_page( $data="" );    
	}
	function check_insert_customer()
	{
		$this->page_setting->isLogin();
    	$this->page_setting->control_page( $data="" );    
	}
	function check_device()
	{
		$this->page_setting->isLogin();
    	$this->page_setting->check_device();   
    echo  "GCM : ".$this->page_setting->registatoin_ids."<br>"; 
	echo  "ID : ".$this->page_setting->device_id."<br>";
    echo  "IMEI : ".$this->page_setting->device_imei."<br>";
	}
	function check_log()
	{
		$this->page_setting->isLogin();
		$log_list = $this->service_m->getLogAll();
		$this->page_setting->control_page( $log_list );  
	}

	//**************************************************************
	//==============================================================
	function push_for_customer($complaint_id,$status_code)
	{
		$data['customer_id']=$this->complaint_m->getComplaintForSendTechnician($complaint_id);
	}
	//==============================================================
	//**************************************************************
	function register_device(){
		if ($_POST) {
			$this->service_m->newDeviceAdd($_POST);
		}else{
			echo "post not submit";
		}
		//$data['device_gcm'] = $device_gcm;
		//$data['device_imei'] = $device_imei;
		//$data['device_xorsat_code'] = $device_xorsat_code;
	}

	//==============================================================
	//**************************************************************

	function check_machine_code($code){
		
		$check_code= str_split($code);

		if($check_code['1'] == '0')
		{
			 $str = implode("",$check_code);
			return $str;
		}
		if ($check_code['1'] != '0') {
			  array_splice($check_code, 1,0,"0");
			  $str = implode("",$check_code);
			  return $str;
		}		
	}

	function complaint_add($message)
	{
		$message = explode(" ",$message);
	 	$complaint_code = $this->service_m->verifyComplaintCode($message['1']);
		$check_code = $this->service_m->verifyMachineCode($message['2']);

		$machine_code = $check_code;
		
		$customer_id = $this->service_m->getCustomerIdByNumber($_POST['sender_number']);
		if($customer_id == 0){
		$customer_id = $this->service_m->getCustomerIdByPrimeryNumber($_POST['sender_number']);
		}

		$data['customer_complaint_id'] = $this->page_setting->get_uniq_id("tbl_customer_complaint");
		$data ['customer_complaint_date_insert'] =  date('Y-m-d H:i:s');
		$data ['status_code'] =  'xorsat0';
		if($customer_id){
			$data ['customer_id'] =$customer_id;
		}else{
			echo  "one false";
		}
		if($machine_code){
			$data ['customer_machine_code'] = $message['2'];
		}else{
			echo  "Machine Code two false";
			return;
		}
		if($complaint_code){
			$data ['complaint_code'] = $message['1'];
		}else{
			echo  "complaint code not match three false";
			return;
		}

    $complaint_id = $this->service_m->customerComplaint($data);
   
    if ($complaint_id >0) {
    	$message = array(
    			'complaint_id' => $complaint_id,
    			'complaint_message' => auto_responder_message . $complaint_id
    			 );
    	$this->auto_response_for_customer($message);
    	  $this->page_setting->isNotLogin($location="complaint/complaint_list");
    }
  $this->page_setting->isNotLogin($location="complaint/complaint_list");
	}

	//**************************************************************
	//==============================================================
	function insert()
	{
		$this->validate_service($_POST);
		if($_POST)
		{
			$Message = explode(" ",$_POST['message']);
			if(CUSTOMER_PREFIX == $Message['0'])
			{
				$this->complaint_add($_POST['message']);
			}
			elseif(TECHNICIAN_PREFIX == $Message['0'])
			{
				$this->complaint_forward($_POST['message']);
			}else{
				echo  "User Not Match";
			}
		}
		else{
			echo "Not Post Submit";
		}

	}
	//==============================================================
	//**************************************************************

	function complaint_forward($message)
	{
		$message = explode(' ', $message);
		
		$customer_id = $this->service_m->getCustomerIdByComplaintId($message['1']);
		if($customer_id)
		{
	$status_code = $this->service_m->getStatusCode($message['2']);
	$technician_id = $this->service_m->getTechnicianIdByNumber($_POST['sender_number']);
	//$status = array('status_code' => $status_code['0']['status_code'],
	 //				 'customer_complaint_date_update' =>  date('Y-m-d H:i:s'));
	$status = array('status_code' => $status_code['0']['status_code']);
	$this->service_m->updateStatusCodeInCustomerComplaint($status,$message['1']);
	$this->add_complaint_forword_history($message['1'],$technician_id,$status_code['0']['status_code']);
			
		}else{
			echo "customer not valid";
		}
		  $this->page_setting->isNotLogin($location="complaint/complaint_list");
	}

	function auto_response_for_customer($message_status)
	{
		$customer_id = $this->service_m->getCustomerIdByComplaintId($message_status['complaint_id']);
		if($customer_id)
		{
		
			$customer_phone = $this->service_m->getCustomerPhoneByCustomerId($customer_id);
			   $phone_list = explode(',', $customer_phone);
		       foreach ($phone_list as $key => $value) {
		       
		        $message = array(
					"sms_destination_number"=>$value,
					"sms_message_body"=> CUSTOMER_PREFIX." ".$message_status['complaint_message']	
				);
				
				$this->page_setting->Push($message);
		           $this->page_setting->isNotLogin($location="complaint/complaint_list");
		        }
		}else{
			echo "customer not valid";
		}
		  $this->page_setting->isNotLogin($location="complaint/complaint_list");
	}

	//==============================================================
//**************************************************************
//==============================================================  
  function add_complaint_forword_history($customer_complaint_id,$technician_id,$status_code)
  {   
 		$status_id = $this->service_m->getStatusCodeIdByCode($status_code); 
        
        $data['customer_complaint_id'] = $customer_complaint_id;
        $data['technician_id'] = $technician_id;
        $data['forward_complaint_id'] = $this->page_setting->get_uniq_id("tbl_forward_complaint");
        $data['forward_complaint_date_insert'] =  date('Y-m-d H:i:s');
        $data['status_code_id'] = $status_id ;
      
       $this->complaint_m->technicianForwordComplaint($data);
 } 

}