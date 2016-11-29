<?php
class Csv extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('csv_m');
        $this->load->library('csvreader');
        $this->load->library ("page_setting");
        $this->page_setting->isLogin();
         $this->page_setting->allowUserByType();

   }
    //================== Page setting Fucntion =====================
      function index()
     {
         $this->machine_code_upload();
     }
//=============================================================
//--------- Upload Machine code Csv function  -----------    
//=============================================================     
       function machine_code_upload()
     {
           if ($_FILES) {

              $csv_file = $_FILES['csv'];
              $filePath =  $this->upload_csv(date('YmdHis'));
              $file_data = $this->csvreader->parse_file($filePath);
              $query_result = $this->csv_m->machineCodeUpload($file_data);
              if ($query_result['0'] != "" ) {
                //echo "good";
             $this->page_setting->control_page( $file_data );
              }else{
               // echo "bad";
                 $this->page_setting->control_page( $file_data="" );
              }
           } else {
             $this->page_setting->control_page( $data="" );
           }
     }
//=============================================================
//--------- Upload Machine code Csv function  -----------    
//=============================================================  

//----------------------------------------------------------------------------------------------------------------------
//------ Upload file and image with deffrent name and extention and many thumbnail of deffrent localtion Fucntion ------
//----------------------------------------------------------------------------------------------------------------------

function upload_csv($csv_name)
{
  
  // --- exploding the 'name' and 'extention' of file (resume)
                    //For Image Upload
      $config['file_name']= $csv_name;
      $config['upload_path'] = './csv/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg|csv';
      $config['max_size'] = '2000000';
      $config['maintain_ratio'] = true;
      $config['max_width']  = '4448';
      $config['max_height']  = '3300';
      $this->load->library('upload', $config);
     if(! $this->upload->do_upload('csv')){
         $e = $this->upload->display_errors();
    print_r($e);
        }else{
            $image=$this->upload->data();

     return $main_image_path = './csv/'.$image['file_name'];
       
             // return $image['file_name'];
        }
      }

}
?>