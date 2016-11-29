<?php
class Csv_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library ("page_setting");
    }
    function machineCodeUpload($data){
    $this->db->where('activation_code_status', '0');
    $this->db->delete('tbl_activation_code'); 

     $array_len =  count($data);
    $i=0;
    while($i < $array_len) { 
             foreach ($data[$i] as $key => $value) {
              $values[$i][] = $value;
              $keys[$i][] = $key;
                }
                 $row_data = array(
                'activation_code_id' => $this->page_setting->get_uniq_id("tbl_activation_code"),
                'machine_code' => $values[$i]['0'],
                'activation_code' => $values[$i]['1'],
                'activation_date' => $values[$i]['2'],
                'activation_code_date_insert' => date('Y-m-d H:i:s'),
                'activation_code_status' => '0'
                 );
            $this->db->insert('tbl_activation_code',$row_data);
            $activation_code_ids[] = $this->db->insert_id();
                 $i++;
            }

            
            return $activation_code_ids;

    }
    function addStudentByCsvfile($data)
    {
         $array_len =  count($data);
    $i=0;
    while($i < $array_len) { 
             foreach ($data[$i] as $key => $value) {
                 if (isset($key) && isset($value)) {
                      $values[$i][] = $value;
                      $keys[$i][] = $key;
                  } else {
                      echo "Some field is blank";
                      exit();
                  }
                } 
                if ($keys[$i]['1'] != "" && $values[$i]['1'] !="") {
                  $check_user_lenght = count($values[$i]);
                if ($check_user_lenght > 11 ) {
            $final_student_user = array(
                'user_first_name' => $values[$i]['2'],
                'user_last_name' => $values[$i]['3'],
                'user_gender' => $values[$i]['4'],
                'user_phone' => $values[$i]['10'],
                'user_role_id'   => '4',
                'user_image' => $values[$i]['8'],
                'user_email' => $values[$i]['11'],
                'user_application_pin' => "0",
                'user_username' => "0",
                'user_password' => "0",
                'user_status' => "0",
                'createdon' => "0",
                'modifiedon' => "0"
                 );
            $this->db->insert('user',$final_student_user);
            $student_user_inserted_id = $this->db->insert_id();
            // check  school class & class section id

                  if ($values[$i]['6'] !="" && $values[$i]['7'] !="") {
                    $school_campus_title = $values[$i]['30'];
                    $school_campus_id_get = $this->getSchoolCampusIdByTitle($school_campus_title);
                    $school_campus_id = $school_campus_id_get['0']['campus_id'];


                    $school_section_title = $values[$i]['5'];
                    $school_section_id_get = $this->getSchoolSectionIdByTitle($school_section_title,$school_campus_id);
                    $school_section_id = $school_section_id_get['0']['school_section_id'];

                    $school_class_title = $values[$i]['6'];
                    $school_class_id_get = $this->getSchoolClassIdByTitle($school_class_title,$school_section_id);
                    $school_class_id = $school_class_id_get['0']['school_class_id'];

                    $class_section_title = $values[$i]['7'];
                    $class_section_id_get = $this->getClassSectionIdByTitle($class_section_title,$school_class_id);
                    $class_section_id = $class_section_id_get['0']['class_section_id'];
                    
                  } else {
                    $school_class_id ="007";
                    $class_section_id ="007";
                  }
                
            $final_student = array(
                'user_id' => $student_user_inserted_id,
                'student_gr_number' => $values[$i]['1'],
                //'school_section_id' => $values[$i][5],
                'school_class_id' => $school_class_id,
                'class_section_id' => $class_section_id,
                'student_date_of_birth' => $values[$i]['9'],
                'student_address' => $values[$i]['12'],
                'house_id' => $values[$i]['29'],
                'student_joining_year' => $values[$i]['31'],
                'student_nfc_number' => '0',
                'student_nfc_start' => '0',
                'student_nfc_expiry' => '0',
                'student_city' => '0',
                'student_area' => '0',
                'student_home_phone' => '0'
                 );
            $this->db->insert('student',$final_student);
            $student_inserted_id = $this->db->insert_id();
            $student_guardian_relationship_inserted_id = $this->createStudentGuardianRelationFirst($student_user_inserted_id);
            
            $student_previous_school_data = array(
            'student_id'                                      => $student_user_inserted_id,
            'student_previous_school_name'                    => '0',
            'student_previous_school_address'                 => '0',
            'student_previous_school_last_class'              => '0',
            'student_previous_school_grades'                  => '0',
            'student_previous_school_comments'                => '0'
            ); 
            $this->createPreviousSchoolByStudentId($student_previous_school_data);

                } else {
                  echo "not add user";
                 exit();
                }
              // Check if father is exists 
            if ($values[$i]['15'] >0) {
              $father_exist = $this->checkFatherIsExist($values[$i]['15']);
                if ($father_exist >0) {
                 
                 $fa_id = $father_exist['0']['user_id'];
                  $this->updateStudentFatherGuardianRelation($fa_id,$student_user_inserted_id);
                } else {
            $final_father_user = array(
                'user_first_name' => $values[$i]['13'],
                'user_last_name' => $values[$i]['14'],
                'user_phone' => $values[$i]['16'],
                'user_role_id'   => '6',
                'user_email' => $values[$i]['17'],
                'user_gender' => 'Male',
                'user_application_pin' => "0",
                'user_username' => "0",
                'user_password' => "0",
                'user_status' => "0",
                'createdon' => "0",
                'modifiedon' => "0"
              );
            $this->db->insert('user',$final_father_user);
            $father_user_inserted_id = $this->db->insert_id();
            $final_father = array(
                'user_id' => $father_user_inserted_id,
                'guardian_cnic' => $values[$i]['15'],
                'guardian_profession' => $values[$i]['18'],
                'guardian_organization' => $values[$i]['19'],
                'guardian_role_id'   => '1',
                'guardian_office_phone' => $values[$i]['20'],
                'guardian_nfc_number' => '0',
                'guardian_nfc_start' => '0',
                'guardian_nfc_expiry' => '0',
                'guardian_address' => '0',
                'guardian_area' => '0',
                'guardian_city' => '0',
                'guardian_status' => '0'
              );
             $this->db->insert('guardian',$final_father);
            $father_guardian_inserted_id = $this->db->insert_id();
            $this->updateStudentFatherGuardianRelation($father_user_inserted_id,$student_user_inserted_id);

                }
            } else {
              // father cnic coloum is blank 
            }
             // Check if Mother is exists 
            if ($values[$i]['23'] >0) {
              $mother_exist = $this->checkMotherIsExist($values[$i]['15']);
                if ($mother_exist >0) {
                 $ma_id = $mother_exist['0']['user_id'];

                  $this->updateStudentMotherGuardianRelation($ma_id,$student_user_inserted_id);
                } else {
            $final_mother_user = array(
                'user_first_name' => $values[$i]['21'],
                'user_last_name' => $values[$i]['22'],
                'user_phone' => $values[$i]['24'],
                'user_role_id'   => '6',
                'user_email' => $values[$i]['25'],
                'user_gender' => 'Female',
                'user_application_pin' => "0",
                'user_username' => "0",
                'user_password' => "0",
                'user_status' => "0",
                'createdon' => "0",
                'modifiedon' => "0"
              );
            $this->db->insert('user',$final_mother_user);
            $mother_user_inserted_id = $this->db->insert_id();
            $final_mother = array(
                'user_id' => $mother_user_inserted_id,
                'guardian_cnic' => $values[$i]['23'],
                'guardian_profession' => $values[$i]['26'],
                'guardian_organization' => $values[$i]['27'],
                'guardian_role_id'   => '2',
                'guardian_office_phone' => $values[$i]['28'],
                'guardian_nfc_number' => '0',
                'guardian_nfc_start' => '0',
                'guardian_nfc_expiry' => '0',
                'guardian_address' => '0',
                'guardian_area' => '0',
                'guardian_city' => '0',
                'guardian_status' => '0'
              );
             $this->db->insert('guardian',$final_mother);
            $mother_guardian_inserted_id = $this->db->insert_id();
            $this->updateStudentMotherGuardianRelation($mother_user_inserted_id,$student_user_inserted_id);
                  
                }
                 
            } else {
              // Mother cnic coloum is blank 
            }
                } else {
                 echo "Blank";
                 exit();
                }
             
            $i++; } 
            echo "User".$i."is seccessfully add <br>";
         
    }
  //================== Check Existing Admin table Fucntaion =====================
}
?>