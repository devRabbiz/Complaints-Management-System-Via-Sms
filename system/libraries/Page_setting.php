<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Page_setting  {

	private $CI;
	var $Previous_action	= ''; // The page we are linking to
	var $Previous_class		= ''; // A custom prefix added to the path.
	var $Previous_fucntion	= ''; // A custom suffix added to the path.

	var $Current_action		= ''; // Total number of items (database results)
	var $Current_class		= ''; // Max number of items you want shown per page
	var $Current_fucntion	= ''; // Number of "digit" links to show before/after the currently viewed page

	var $Page_title			= ''; // The current page being viewed
	var $Page_action		= ''; // Use page number for segment instead of offset

	var $first_auto_decoded_id	= '';
	var $first_auto_encoded_id	= '';

	var $Pagination	= '';

	var $Page_message = array();
	var $Page_content = array();

	var $Category_list = '';
	var $Gallery_list = '';
	var $Gallery_thumbnail_list = '';
	var $technician_list = '';
	var $detail ='';
  var $depart_list ='';
// Replace with real client registration IDs 
  var $registatoin_ids = '';
   var $device_id = '';
   var $device_imei = '';
   var $customer_machine ='';

  //'APA91bEsrrwtUTAq1A4d6t2-SEZ49l9vNitPhZIgmrPoAcMD1TWC2Vu43irIh-e6DenCvVE03BsZDeQh3mSKEt6IFe-_ODJpCQg_0EqMrw02pw-LJEdibJVa2ekbxaxYFzze4MQJD0pi4hcgAWTDErm-tfwXMOx5iixMVq1y40ocvdgYjzUNunU';
  //"APA91bE3IDbTE7yWKrK0ONN5UvYaV1Y60zIQd49mhNT_jKtUpkEghLvsNxpqK7En4ClYw0erRZX5X5C61JiZisuHM5K2KWVW5EGUmDubbC5EulQSV6M6mms45hKR70EX8HKEw75A-407R85xu9r0d45rglLmO64mBir67RiqjPBvro2nizAUwms";


	

 
	public function __construct()
	{
		
	//--------------  Check User is Login In Session --------
		$this->CI =& get_instance();
		
		$this->CI->load->model('main_m');
	//--------------  Check User is Login In Session --------
  //--------------  Previous Url / Class / & Method Get From Url --------
        $pre_url =  $this->CI->session->userdata('session_page');
      
        $this->Previous_action = $pre_url['url_full'];
        $this->Previous_class = $pre_url['class'];
        $this->Previous_fucntion = $pre_url['fucntion'];
  //--------------  Previous Url / Class / & Method Get From Url --------  
   //--------------  Current Url / Class / & Method Get From Url --------  
     $this->Current_action		=  $this->CI->uri->uri_string();
     $this->Current_class		= $this->CI->router->fetch_class();
	 $this->Current_fucntion	= $this->CI->router->fetch_method();
	 // Page Action And Page title
	 $page_action_arr = explode('_',$this->CI->router->fetch_method());
	 $this->Page_title = $page_action_arr['0'];
   if (isset($page_action_arr['1'])) {
   $this->Page_action = $page_action_arr['1'];
   }
	 // Get last id form url for decode
	 $get_array_for_first_id = explode('/',$this->CI->uri->uri_string());
	 $get_id_for_decode = end($get_array_for_first_id);
	 $this->first_auto_encoded_id = $get_id_for_decode;
	 $this->decode_base64($get_id_for_decode);

  //--------------  Current Url / Class / & Method Get From Url -------- 
	 // set page content
	 $this->Page_content['pc_title']	= $this->Page_title.' Listing';
     $this->Page_content['pc_title1']	= $this->Page_title.' Add';
     $this->Page_content['pc_title2']	= $this->Page_title.' Edit';
     $this->Page_content['pc_title3']	= $this->Page_title.' View';
     $this->Page_content['pc_title4']	= $this->Page_title.' Detail';
     $this->Page_content['pc_title5']	= $this->Page_title.'Back to '.$this->Page_title.' Listing';
     // set page messages
	 $this->Page_message['delete']		=  $this->Page_title.' record successfully deleted';
     $this->Page_message['add']		=  $this->Page_title.' record successfully added';
     $this->Page_message['edit']		=  $this->Page_title.' record successfully edit';
	$this->app_settings_call();
	}
  public function isLogin(){

    $is_logged_in = $this->CI->session->userdata('is_logged_in');
    if(!isset($is_logged_in) || $is_logged_in != true)
    {
          redirect('login');
      echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';  
      die();    
    }else
    {
      
      $this->session_constatn();

    }
  }
    public function isNotLogin($location='login'){

    $is_logged_in = $this->CI->session->userdata('is_logged_in');
    if(isset($is_logged_in) || $is_logged_in == true)
    {
          redirect($location);
      echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';  
      die();    
    }else
    {
      
      $this->session_constatn();

    }
  }
  public function allowUserByType()
  {
    
    if(ADMIN_RIGHTS_SESSION == "") { 
      redirect('complaint/complaint_list');

    }
 
  }
  function app_settings_call()
  {

  $app_setting = $this->CI->main_m->getSetting();
  foreach ($app_setting as $key => $value) {
   define($value['app_setting_key'], $value['app_setting_value']);
  }
 }
 function session_constatn(){
  $user_role_id=$this->CI->session->userdata('user_role_id');
if ($user_role_id=='1') {
  
  define('ADMIN_RIGHTS_SESSION', $user_role_id);   
    define('OPERATOR_RIGHTS_SESSION', "");  


} else {
  define('ADMIN_RIGHTS_SESSION', "");   
    define('OPERATOR_RIGHTS_SESSION', $user_role_id); 
}
  }
	//--------------------------------------------------------------
//--------------PAGE SETTING AND DATA SEND FUNCTOIN-------------
//--------------------------------------------------------------    
 function control_page($row=""){
 
   $data['main_content'] = $this->Current_fucntion;
   $data['list'] = array(
      'Page_content'			=> $this->Page_content,
      'Page_message' 			=> $this->Page_message,
      'current_decoded_id' 	=> $this->first_auto_decoded_id,
			'current_encoded_id' 	=> $this->first_auto_encoded_id,
      'Previous_action' 		=> $this->Previous_action,	
			'Previous_class' 		=> $this->Previous_class,
			'Previous_fucntion' 	=> $this->Previous_fucntion,
			'Current_action' 		=> $this->Current_action,
			'Current_class' 		=> $this->Current_class,
			'Current_fucntion' 		=> $this->Current_fucntion,
			'Pagination'			=> $this->Pagination,
			'technician_list'				=> $this->technician_list,
      'detail'        => $this->detail,
			'customer_machine'				=> $this->customer_machine,
      'depart_list'        => $this->depart_list,
      'row' 					=> $row
            );

   $this->CI->load->view('includes/template', $data);
   
    }
//--------------------------------------------------------------
//--------------PAGE SETTING AND DATA SEND FUNCTOIN-------------
//--------------------------------------------------------------
//**************************************************************
 
//--------------------------------------------------------------
//-----------------Check User is Login In Session---------------
//--------------------------------------------------------------
//**************************************************************
//--------------------------------------------------------------
//--------------------Base Url Encode Fucntion -----------------
//--------------------------------------------------------------
    function decode_base64($id="")
    {
     $base_64 = $id . str_repeat('=', strlen($id) % 4);
     $id_decode = base64_decode($base_64);
     $this->first_auto_decoded_id = $id_decode;
    }
     function decode_base64_return($id="")
    {
     $base_64 = $id . str_repeat('=', strlen($id) % 4);
     $id_decode = base64_decode($base_64);
     return $id_decode;
    }
//--------------------------------------------------------------
//--------------------Base Url Encode Fucntion -----------------
//--------------------------------------------------------------
//**************************************************************
//--------------------------------------------------------------
//--------------------Base Url Decode Fucntion -----------------
//--------------------------------------------------------------
   function encode_base64_return($id="")
    {
     //---------------- url encode base64 ---------------
                        $base_64_role = base64_encode($id);
                        $id_encode = rtrim($base_64_role, '=');
      //---------------- url encode base64 ---------------
     return $id_encode;
    }
//--------------------------------------------------------------
//--------------------Base Url Decode Fucntion -----------------
//--------------------------------------------------------------	
//--------------------------------------------------------------
//--------------Uniq Id create by self  FUNCTOIN-------------
//--------------------------------------------------------------
//**************************************************************

    public  function get_uniq_id($tbl_name="")
    {
    $id = $this->CI->main_m->getMaxId($tbl_name);
    $id++;
	return $id;
    }
//**************************************************************
//**************************************************************

    public  function check_confrim($id,$url)
    {
    if ($id) {
       redirect($url);
       }
       else{
        redirect('login/_404');
       }
    }
//**************************************************************
    function check_device()
    {
       $device_data = $this->CI->main_m->getLatestDevice();
      $this->registatoin_ids = $device_data['0']['device_gcm'];
      $this->device_id = $device_data['0']['id'];
      $this->device_imei = $device_data['0']['device_imei'];
    }
//================== Index Fucntion =====================
    public function Push($pushMessage="") {
      $device_data = $this->CI->main_m->getLatestDevice();
      $this->registatoin_ids = $device_data['0']['device_gcm'];
    //Google cloud messaging GCM-API url
        $url = 'https://android.googleapis.com/gcm/send';
        $fields = array(
            'registration_ids' => array($this->registatoin_ids),
            'data' => $pushMessage,
        );
       $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY_NEW,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);      
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        $final = json_decode($result,true);
        //print_r($final);
        if ($final['success'] == 0 && $final['failure'] =="1") {
          echo "not send";
        }else{
          return TRUE;
        }
    } 
//--------------------------------------------------------------
//-----------------Check User is Login In Session---------------
//--------------------------------------------------------------
//**************************************************************

}

/* End of file Page_setting.php */