<?php

class App_setting extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
	  $this->load->model('app_setting_m');
    $this->load->library ("page_setting");
     $this->page_setting->isLogin();
	}

	function index()
	{
    $this->app_setting_list;
	}

//==============================================================
//**************************************************************
//==============================================================
	function setting_add($data="")
	{
    if ($_POST) {
       $data = $_POST;

       $data ['app_setting_date_insert'] =  date('Y-m-d H:i:s');
       $data['app_setting_id'] = $this->page_setting->get_uniq_id("tbl_app_setting");
       $id = $this->app_setting_m->app_settingAdd($data);
       $this->page_setting->check_confrim($id,"app_setting/app_setting_list");
    }
    else{
		$this->page_setting->control_page( $data="" );    
		}
	}
//==============================================================
//**************************************************************
//==============================================================  
	function setting_list() // just for sample
	{
    if ($_POST) {
       $data = $_POST;
        foreach ($data as $key => $value) {
         $final_data['app_setting_value'] = $value; 

       $this->app_setting_m->updateSettingByKey($final_data,$key);
       
       if ($key == "admin_password") {
         $data_admin  = array('user_password' => base64_encode($value));
         $admin_id ='1';
         $this->app_setting_m->updateUserPasswordById($data_admin,$admin_id);
       }
       if ($key == "operator_password") {
         $data_operator  = array('user_password' => base64_encode($value));
         $operator_id ='2';
         $this->app_setting_m->updateUserPasswordById($data_operator,$operator_id);
       }

       }
     }
    $data= $this->app_setting_m->getAppSettingAll();
   $this->page_setting->control_page($data); 
	}

}
