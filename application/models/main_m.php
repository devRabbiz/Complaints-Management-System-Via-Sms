<?php
class Main_m extends CI_Model {
	// ================== Constructer =====================
	function __construct() {
		parent::__construct ();
		$this->load->database ();
	}
	// ================== Constructer =====================
	
	// ================== User Not Delete But Disabled Admin By ID Fucntaion =====================
	function deleteById($id = "", $tablename = "") {
		echo $id . "_" . $tablename;
		exit ();
		$this->db->where ( $tablename . '_id', $id );
		$this->db->delete ( $tablename );
		return ($this->db->affected_rows () > 0) ? TRUE : FALSE;
	}
	function getMaxId($tablename = "") {
		$this->db->select_max ( 'id' );
		$query = $this->db->get ( $tablename );
		
		if ($query->row ( 'id' ) > 0) {
			return $query->row ( 'id' );
		} else {
			return "0";
		}
	}
	
	// ================== Delete Admin By ID Fucntaion =====================
	function disableMultiAdminByIds($user_id) {
		$data = array (
				'user_status' => 1 
		);
		$this->db->where_in ( 'user_id', $user_id )->update ( 'user', $data );
		return $this->db->affected_rows () > 0;
	}
	// ================== Delete Admin By ID Fucntaion =====================
	// ================== Delete Admin By ID Fucntaion =====================
	// ----------------------------------------------------------------------------------------
	// ADMIN MODULE FUNCTIONS
	// ----------------------------------------------------------------------------------------
	
	// ================== Create Admin Model Fucntaion =====================
	function addByRoleId($tablename, $data) {
		$this->db->insert ( $tablename, $data );
		return $this->db->insert_id ();
	}
	// ================== Create Admin Model Fucntaion =====================
	

function getLatestDevice() {
		$this->db->select ();
		$this->db->from ( 'tbl_device' );
		$this->db->order_by ( 'id', 'desc' );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	function getSetting() {
		$this->db->select ();
		$this->db->from ( 'tbl_app_setting' );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	
	// ================== Create Admin Model Fucntaion =====================
	function createUserByUserId($data_user = "", $decode_role_id = "") {
		$role_list = $this->getUserRoleListing ();
		
		foreach ( $role_list as $role ) {
			// echo $role['user_role_id'];
			if ($role ['user_role_id'] == $decode_role_id) {
				$role_id = $role ['user_role_id'];
				$role_name = $role ['user_role_title'];
			} else {
			}
		}
		$this->db->insert ( $role_name, $data_user );
		return $this->db->insert_id ();
	}
	// ================== Create Admin Model Fucntaion =====================
	// ================== Create Admin Model Fucntaion =====================
	function createStudentInSession($student_in_session_data = "") {
		$this->db->insert ( "student_in_session", $student_in_session_data );
		return $this->db->insert_id ();
	}
	// ================== Create Admin Model Fucntaion =====================
	
	// ================== Edit student user current permote year Fucntaion =====================
	function getCurrentStudentInYearlySessionByUserId($decode_student_user_id) {
		$this->db->select ();
		$this->db->from ( 'student_in_session' );
		$this->db->where ( 'user_id', $decode_student_user_id );
		$this->db->where ( 'is_session_close', '0' );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== Edit student user current permote year Fucntaion =====================
	
	// ================== Get Admin By Id Fucntaion =====================
	function getUserList($user_role_id = "") {
		$role_list = $this->getUserRoleListing ();
		
		foreach ( $role_list as $role ) {
			// echo $role['user_role_id'];
			if ($role ['user_role_id'] == $user_role_id) {
				$role_id = $role ['user_role_id'];
				$role_name = $role ['user_role_title'];
			}
		}
		
		$this->db->select ();
		$this->db->from ( 'user' );
		$this->db->join ( $role_name, $role_name . '.user_id = user.user_id', 'inner' );
		$this->db->where ( 'user.user_role_id', $role_id );
		$this->db->where ( 'user.user_status', 0 );
		$this->db->order_by ( 'user.createdon', 'desc' );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== Get Admin By Id Fucntaion =====================
	// ================== Get Admin By Id Fucntaion =====================
	function getAllListing($tbl_name = "", $role_id = "") {
		$this->db->select ();
		$this->db->from ( $tbl_name );
		$this->db->where ( 'user_role_id', $role_id );
		$this->db->order_by ( 'createdon', 'desc' );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== Get Admin By Id Fucntaion =====================
	
	// ================== Check Existing Admin table Fucntaion =====================
	function userEmailExist($email) {
		// $query = $this->db->get_where('admin', array('admin_email' => $email));
		$this->db->select ( 'user_email' );
		$this->db->from ( 'user' );
		$this->db->where ( 'user_email', $email );
		$this->db->where ( 'user_status', 0 );
		$query = $this->db->get ();
		return $query->num_rows () != 0;
	}
	// ================== Check Existing Admin table Fucntaion =====================
	// ================== Check Existing Admin table Fucntaion =====================
	function userNameExist($username) {
		// $query = $this->db->get_where('admin', array('admin_email' => $email));
		$this->db->select ( 'user_username' );
		$this->db->from ( 'user' );
		$this->db->where ( 'user_username', $username );
		$this->db->where ( 'user_status', 0 );
		$query = $this->db->get ();
		return $query->num_rows () != 0;
	}
	// ================== Check Existing Admin table Fucntaion =====================
	
	// ================== Check Existing Admin table Fucntaion =====================
	function userOldPasswordExist($password) {
		// $query = $this->db->get_where('admin', array('admin_email' => $email));
		$this->db->select ( 'user_password' );
		$this->db->from ( 'user' );
		$this->db->where ( 'user_password', $password );
		$query = $this->db->get ();
		return $query->num_rows () == 0;
	}
	// ================== Check Existing Admin table Fucntaion =====================
	// ================== Check Existing Admin table Fucntaion =====================
	function userOldPinExist($pin) {
		// $query = $this->db->get_where('admin', array('admin_email' => $email));
		$this->db->select ( 'user_application_pin' );
		$this->db->from ( 'user' );
		$this->db->where ( 'user_application_pin', $pin );
		$query = $this->db->get ();
		return $query->num_rows () == 0;
	}
	// ================== Check Existing Admin table Fucntaion =====================
	
	// ================== Edit Admin By ID Fucntaion =====================
	function editByRoleId($tablename, $data, $id) {
		$this->db->where ( $tablename . '_id', $id );
		$this->db->update ( $tablename, $data );
		return $this->db->affected_rows ();
	}
	// ================== Edit Admin By ID Fucntaion =====================
	// ================== Edit student current session year Fucntaion =====================
	function editStudentCurrentSessionYearByStudentUserId($user_id, $data) {
		$this->db->where ( 'user_id', $user_id );
		$this->db->where ( 'is_session_close', '0' );
		$this->db->update ( 'student_in_session', $data );
		return $this->db->affected_rows ();
	}
	// ================== Edit student current session year Fucntaion =====================
	// ================== Edit Admin By ID Fucntaion =====================
	function editUserByUserId($data, $id, $user_role_id) {
		$role_list = $this->getUserRoleListing ();
		
		foreach ( $role_list as $role ) {
			// echo $role['user_role_id'];
			if ($role ['user_role_id'] == $user_role_id) {
				$role_id = $role ['user_role_id'];
				$role_name = $role ['user_role_title'];
			} else {
			}
		}
		
		$this->db->where ( 'user_id', $id );
		$this->db->update ( $role_name, $data );
		return $this->db->affected_rows ();
	}
	// ================== Edit Admin By ID Fucntaion =====================
	
	// ================== Edit Admin By ID Fucntaion =====================
	function getUserRoleListing() {
		$this->db->select ();
		$this->db->from ( 'user_role' );
		$this->db->order_by ( 'user_role_id', 'desc' );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== Edit Admin By ID Fucntaion =====================
	// ================== Edit Admin By ID Fucntaion =====================
	function viewRoleById($user_id = "", $user_role_id = "", $table_name = "") {
		$this->db->select ();
		$this->db->from ( $table_name );
		$this->db->where ( $table_name . '_id', $user_id );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== Edit Admin By ID Fucntaion =====================
	function viewUserByIdJonin($user_id, $table_join, $table_name) {
		$this->db->select ();
		$this->db->from ( $table_name );
		$this->db->join ( $table_join, $table_join . '.' . $table_name . '_id = ' . $table_name . '.' . $table_name . '_id', 'left' );
		$this->db->where ( $table_name . '.' . $table_name . '_id', $user_id );
		// $this->db->where($table_name.'.user_status',0);
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== Delete Admin By ID Fucntaion =====================
	
	// ================== Delete Admin By ID Fucntaion =====================
	function deleteAdminById($admin_id) {
		$this->db->where ( 'admin_id', $admin_id );
		$this->db->delete ( 'admin' );
	}
	// ================== Delete Admin By ID Fucntaion =====================
	
	// ================== Delete Admin By ID Fucntaion =====================
	function deleteMultiAdminByIds($admin_id) {
		$this->db->where_in ( 'admin_id', $admin_id )->where ( 'admin_type', '0' )->delete ( 'admin' );
		return $this->db->affected_rows () > 0;
	}
	// ================== Delete Admin By ID Fucntaion =====================
	
	// ----------------------------------------------------------------------------------------
	// ADMIN MODULE FUNCTIONS
	// ----------------------------------------------------------------------------------------
	
	// ****************************************************************************************
	
	// ----------------------------------------------------------------------------------------
	// TEACHER MODULE FUNCTIONS
	// ----------------------------------------------------------------------------------------
	
	// ================== Create Teacher Model Fucntaion =====================
	function createTeacherByUserId($data) {
		$this->db->insert ( 'teacher', $data );
		return $this->db->insert_id ();
	}
	// ================== Create Teacher Model Fucntaion =====================
	// ================== View Teacher By ID Fucntaion =====================
	function viewTeacherById($user_id) {
		$this->db->select ();
		$this->db->from ( 'user' );
		$this->db->join ( 'teacher', 'teacher.user_id = user.user_id', 'inner' );
		$this->db->where ( 'user.user_id', $user_id );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== View Teacher By ID Fucntaion =====================
	// ================== Get Admin By Id Fucntaion =====================
	function getTeacherList() {
		$this->db->select ();
		$this->db->from ( 'user' );
		$this->db->join ( 'teacher', 'teacher.user_id = user.user_id', 'inner' );
		$this->db->where ( 'user.user_role_id', 2 );
		$this->db->where ( 'user.user_status', 0 );
		$this->db->order_by ( 'user.createdon', 'desc' );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== Get Admin By Id Fucntaion =====================
	// ================== Edit Admin By ID Fucntaion =====================
	function editUserById($data, $id) {
		$this->db->where ( 'user_id', $id );
		$this->db->update ( 'user', $data );
		return $this->db->affected_rows ();
	}
	// ================== Edit Admin By ID Fucntaion =====================
	// ================== Edit Admin By ID Fucntaion =====================
	function editTeacherByUserId($data, $id) {
		$this->db->where ( 'user_id', $id );
		$this->db->update ( 'teacher', $data );
		return $this->db->affected_rows ();
	}
	// ================== Edit Admin By ID Fucntaion =====================
	
	// ----------------------------------------------------------------------------------------
	// TEACHER MODULE FUNCTIONS
	// ----------------------------------------------------------------------------------------
	
	// ****************************************************************************************
	
	// ----------------------------------------------------------------------------------------
	// STAFF MODULE FUNCTIONS
	// ----------------------------------------------------------------------------------------
	// ================== Create Teacher Model Fucntaion =====================
	function createOfficeAssistantByUserId($data) {
		$this->db->insert ( 'office_assistant', $data );
		return $this->db->insert_id ();
	}
	// ================== Create OfficeAssistant Model Fucntaion =====================
	// ================== View OfficeAssistant By ID Fucntaion =====================
	function viewOfficeAssistantById($user_id) {
		$this->db->select ();
		$this->db->from ( 'user' );
		$this->db->join ( 'office_assistant', 'office_assistant.user_id = user.user_id', 'inner' );
		$this->db->where ( 'user.user_id', $user_id );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== View OfficeAssistant By ID Fucntaion =====================
	// ================== Get Admin By Id Fucntaion =====================
	function getOfficeAssistantList() {
		$this->db->select ();
		$this->db->from ( 'user' );
		$this->db->join ( 'office_assistant', 'office_assistant.user_id = user.user_id', 'inner' );
		$this->db->where ( 'user.user_role_id', 3 );
		$this->db->where ( 'user.user_status', 0 );
		$this->db->order_by ( 'user.createdon', 'desc' );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== Get Admin By Id Fucntaion =====================
	// ================== Edit Admin By ID Fucntaion =====================
	function editOfficeAssistantById($data, $id) {
		$this->db->where ( 'user_id', $id );
		$this->db->update ( 'user', $data );
		return $this->db->affected_rows ();
	}
	// ================== Edit Admin By ID Fucntaion =====================
	// ================== Edit Admin By ID Fucntaion =====================
	function editOfficeAssistantByUserId($data, $id) {
		$this->db->where ( 'user_id', $id );
		$this->db->update ( 'office_assistant', $data );
		return $this->db->affected_rows ();
	}
	// ================== Edit Admin By ID Fucntaion =====================
	
	// ----------------------------------------------------------------------------------------
	// OfficeAssistant MODULE FUNCTIONS
	// ----------------------------------------------------------------------------------------
	
	// ****************************************************************************************
	
	// ----------------------------------------------------------------------------------------
	// Management MODULE FUNCTIONS
	// ----------------------------------------------------------------------------------------
	// ================== Create Teacher Model Fucntaion =====================
	function createManagementByUserId($data) {
		$this->db->insert ( 'management', $data );
		return $this->db->insert_id ();
	}
	// ================== Create Management Model Fucntaion =====================
	// ================== View Management By ID Fucntaion =====================
	function viewManagementById($user_id) {
		$this->db->select ();
		$this->db->from ( 'user' );
		$this->db->join ( 'management', 'management.user_id = user.user_id', 'inner' );
		$this->db->where ( 'user.user_id', $user_id );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== View Management By ID Fucntaion =====================
	// ================== Get Admin By Id Fucntaion =====================
	function getManagementList() {
		$this->db->select ();
		$this->db->from ( 'user' );
		$this->db->join ( 'management', 'management.user_id = user.user_id', 'inner' );
		$this->db->where ( 'user.user_role_id', 5 );
		$this->db->where ( 'user.user_status', 0 );
		$this->db->order_by ( 'user.createdon', 'desc' );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== Get Admin By Id Fucntaion =====================
	// ================== Edit Admin By ID Fucntaion =====================
	function editManagementById($data, $id) {
		$this->db->where ( 'user_id', $id );
		$this->db->update ( 'user', $data );
		return $this->db->affected_rows ();
	}
	// ================== Edit Admin By ID Fucntaion =====================
	// ================== Edit Admin By ID Fucntaion =====================
	function editManagementByUserId($data, $id) {
		$this->db->where ( 'user_id', $id );
		$this->db->update ( 'management', $data );
		return $this->db->affected_rows ();
	}
	// ================== Edit Admin By ID Fucntaion =====================
	
	// ----------------------------------------------------------------------------------------
	// Management MODULE FUNCTIONS
	// ----------------------------------------------------------------------------------------
	
	// ****************************************************************************************
	
	// ----------------------------------------------------------------------------------------
	// Parent MODULE FUNCTIONS
	// ----------------------------------------------------------------------------------------
	// ================== Create Teacher Model Fucntaion =====================
	function createParentByUserId($data) {
		$this->db->insert ( 'parent', $data );
		return $this->db->insert_id ();
	}
	// ================== Create Parent Model Fucntaion =====================
	// ================== View Parent By ID Fucntaion =====================
	function viewParentById($user_id) {
		$this->db->select ();
		$this->db->from ( 'user' );
		$this->db->join ( 'parent', 'parent.user_id = user.user_id', 'inner' );
		$this->db->where ( 'user.user_id', $user_id );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== View Parent By ID Fucntaion =====================
	// ================== Get Admin By Id Fucntaion =====================
	function getParentList() {
		$this->db->select ();
		$this->db->from ( 'user' );
		$this->db->join ( 'parent', 'parent.user_id = user.user_id', 'inner' );
		$this->db->where ( 'user.user_role_id', 6 );
		$this->db->where ( 'user.user_status', 0 );
		$this->db->order_by ( 'user.createdon', 'desc' );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== Get Admin By Id Fucntaion =====================
	// ================== Edit Admin By ID Fucntaion =====================
	function editParentById($data, $id) {
		$this->db->where ( 'user_id', $id );
		$this->db->update ( 'user', $data );
		return $this->db->affected_rows ();
	}
	// ================== Edit Admin By ID Fucntaion =====================
	// ================== Edit Admin By ID Fucntaion =====================
	function editParentByUserId($data, $id) {
		$this->db->where ( 'user_id', $id );
		$this->db->update ( 'parent', $data );
		return $this->db->affected_rows ();
	}
	// ================== Edit Admin By ID Fucntaion =====================
	
	// ----------------------------------------------------------------------------------------
	// Parent MODULE FUNCTIONS
	// ----------------------------------------------------------------------------------------
	
	// ****************************************************************************************
	
	// ----------------------------------------------------------------------------------------
	// Finance MODULE FUNCTIONS
	// ----------------------------------------------------------------------------------------
	// ================== Create Teacher Model Fucntaion =====================
	function createFinanceByUserId($data) {
		$this->db->insert ( 'finance', $data );
		return $this->db->insert_id ();
	}
	// ================== Create Finance Model Fucntaion =====================
	// ================== View Finance By ID Fucntaion =====================
	function viewFinanceById($user_id) {
		$this->db->select ();
		$this->db->from ( 'user' );
		$this->db->join ( 'finance', 'finance.user_id = user.user_id', 'inner' );
		$this->db->where ( 'user.user_id', $user_id );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== View Finance By ID Fucntaion =====================
	// ================== Get Admin By Id Fucntaion =====================
	function getFinanceList() {
		$this->db->select ();
		$this->db->from ( 'user' );
		$this->db->join ( 'finance', 'finance.user_id = user.user_id', 'inner' );
		$this->db->where ( 'user.user_role_id', 8 );
		$this->db->where ( 'user.user_status', 0 );
		$this->db->order_by ( 'user.createdon', 'desc' );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== Get Admin By Id Fucntaion =====================
	// ================== Edit Admin By ID Fucntaion =====================
	function editFinanceById($data, $id) {
		$this->db->where ( 'user_id', $id );
		$this->db->update ( 'user', $data );
		return $this->db->affected_rows ();
	}
	// ================== Edit Admin By ID Fucntaion =====================
	// ================== Edit Admin By ID Fucntaion =====================
	function editFinanceByUserId($data, $id) {
		$this->db->where ( 'user_id', $id );
		$this->db->update ( 'finance', $data );
		return $this->db->affected_rows ();
	}
	// ================== Edit Admin By ID Fucntaion =====================
	
	// ----------------------------------------------------------------------------------------
	// Finance MODULE FUNCTIONS
	// ----------------------------------------------------------------------------------------
	
	// ****************************************************************************************
	
	// ----------------------------------------------------------------------------------------
	// Driver MODULE FUNCTIONS
	// ----------------------------------------------------------------------------------------
	// ================== Create Teacher Model Fucntaion =====================
	function createDriverByUserId($data) {
		$this->db->insert ( 'driver', $data );
		return $this->db->insert_id ();
	}
	// ================== Create Driver Model Fucntaion =====================
	// ================== View Driver By ID Fucntaion =====================
	function viewDriverById($user_id) {
		$this->db->select ();
		$this->db->from ( 'user' );
		$this->db->join ( 'driver', 'driver.user_id = user.user_id', 'inner' );
		$this->db->where ( 'user.user_id', $user_id );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== View Driver By ID Fucntaion =====================
	// ================== Get Admin By Id Fucntaion =====================
	function getDriverList() {
		$this->db->select ();
		$this->db->from ( 'user' );
		$this->db->join ( 'driver', 'driver.user_id = user.user_id', 'inner' );
		$this->db->where ( 'user.user_role_id', 7 );
		$this->db->where ( 'user.user_status', 0 );
		$this->db->order_by ( 'user.createdon', 'desc' );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== Get Admin By Id Fucntaion =====================
	// ================== Edit Admin By ID Fucntaion =====================
	function editDriverById($data, $id) {
		$this->db->where ( 'user_id', $id );
		$this->db->update ( 'user', $data );
		return $this->db->affected_rows ();
	}
	// ================== Edit Admin By ID Fucntaion =====================
	// ================== Edit Admin By ID Fucntaion =====================
	function editDriverByUserId($data, $id) {
		$this->db->where ( 'user_id', $id );
		$this->db->update ( 'driver', $data );
		return $this->db->affected_rows ();
	}
	// ================== Edit Admin By ID Fucntaion =====================
	
	// ----------------------------------------------------------------------------------------
	// Driver MODULE FUNCTIONS
	// ----------------------------------------------------------------------------------------
	// ********************************************************************************************
	// --------------------------------------------------------------------------------------------
	// STUDENT GUARDIAN, MODULE
	// --------------------------------------------------------------------------------------------
	// ********************************************************************************************
	function createPreviousSchoolByStudentId($data) {
		$this->db->insert ( 'student_previous_school', $data );
		return $this->db->insert_id ();
	}
	function updatePreviousSchoolByStudentId($data, $student_id) {
		$this->db->where ( 'student_id', $student_id );
		$this->db->update ( 'student_previous_school', $data );
		return $this->db->affected_rows ();
	}
	function viewStudentIdByUserId($student_id) {
		$this->db->select ( 'student_id' );
		$this->db->from ( 'student' );
		$this->db->where ( 'student.user_id', $student_id );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	function houseList() {
		$this->db->select ();
		$this->db->from ( 'house' );
		$this->db->order_by ( 'house_id', 'desc' );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	function campusList() {
		$this->db->select ();
		$this->db->from ( 'campus' );
		$this->db->where ( 'campus_status', 0 );
		$this->db->order_by ( 'campus_id', 'desc' );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	function yearlySessionList() {
		$this->db->select ();
		$this->db->from ( 'yearly_session' );
		$this->db->order_by ( 'yearly_session_id', 'desc' );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== Edit Admin By ID Fucntaion =====================
	function viewStudentGaurdianAllByUserId($decode_student_user_id, $decode_role_id) {
		$this->db->select ();
		$this->db->from ( 'user' );
		$this->db->join ( 'student', 'student.user_id = user.user_id', 'inner' );
		$this->db->where ( 'user.user_id', $decode_student_user_id );
		$this->db->join ( 'school_class', 'school_class.school_class_id = student.school_class_id', 'inner' );
		$this->db->join ( 'class_section', 'class_section.class_section_id = student.class_section_id', 'inner' );
		$this->db->join ( 'student_previous_school', 'student_previous_school.student_id = student.user_id', 'inner' );
		$this->db->join ( 'student_guardian_relationship', 'student_guardian_relationship.student_id = user.user_id', 'inner' );
		$this->db->where ( 'user.user_status', 0 );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	// ================== Delete Admin By ID Fucntaion =====================
	// ================== Check Existing Admin table Fucntaion =====================
	function checkFatherIsExist($user_cnic) {
		// $query = $this->db->get_where('admin', array('admin_email' => $email));
		$this->db->select ( 'user_id' );
		$this->db->from ( 'guardian' );
		$this->db->where ( 'guardian_cnic', $user_cnic );
		$this->db->where ( 'guardian_status', 0 );
		$this->db->where ( 'guardian_role_id', 1 );
		$query = $this->db->get ();
		if ($query->num_rows () > 0) {
			return $query->result_array ();
		} else {
			return false;
		}
	}
	// ================== Check Existing Admin table Fucntaion =====================
	// ================== Check Existing Admin table Fucntaion =====================
	function checkMotherIsExist($user_cnic) {
		// $query = $this->db->get_where('admin', array('admin_email' => $email));
		$this->db->select ( 'user_id' );
		$this->db->from ( 'guardian' );
		$this->db->where ( 'guardian_cnic', $user_cnic );
		$this->db->where ( 'guardian_status', 0 );
		$this->db->where ( 'guardian_role_id', 2 );
		$query = $this->db->get ();
		if ($query->num_rows () > 0) {
			return $query->result_array ();
		} else {
			return false;
		}
	}
	// ================== Check Existing Admin table Fucntaion =====================
	
	// ================== Check Existing Admin table Fucntaion =====================
	function checkRelationFather($guardian_user_id, $student_user_id) {
		// $query = $this->db->get_where('admin', array('admin_email' => $email));
		$this->db->select ( 'relationship_id' );
		$this->db->from ( 'student_guardian_relationship' );
		$this->db->where ( 'student_id', $student_user_id );
		$this->db->where ( 'father_id', $guardian_user_id );
		$query = $this->db->get ();
		return $query->num_rows () != 0;
	}
	// ================== Check Existing Admin table Fucntaion =====================
	// ================== Check Existing Admin table Fucntaion =====================
	function checkRelationMother($guardian_user_id, $student_user_id) {
		// $query = $this->db->get_where('admin', array('admin_email' => $email));
		$this->db->select ( 'relationship_id' );
		$this->db->from ( 'student_guardian_relationship' );
		$this->db->where ( 'student_id', $student_user_id );
		$this->db->where ( 'mother_id', $guardian_user_id );
		$query = $this->db->get ();
		return $query->num_rows () != 0;
	}
	// ================== Check Existing Admin table Fucntaion =====================
	
	// ================== Check Existing Admin table Fucntaion =====================
	function createStudentGuardianRelation($father_user_id = "", $student_user_id) {
		$data = array (
				'student_id' => $student_user_id,
				'father_id' => $father_user_id 
		);
		
		$this->db->insert ( 'student_guardian_relationship', $data );
		return $this->db->insert_id ();
	}
	// ================== Check Existing Admin table Fucntaion =====================
	// ================== Check Existing Admin table Fucntaion =====================
	function createStudentGuardianRelationFirst($student_user_id) {
		$data = array (
				'student_id' => $student_user_id,
				'father_id' => "0",
				'mother_id' => "0",
				'guardian_one_id' => "0",
				'guardian_two_id' => "0",
				'guardian_three_id' => "0",
				'guardian_four_id' => "0",
				'guardian_five_id' => "0" 
		);
		
		$this->db->insert ( 'student_guardian_relationship', $data );
		return $this->db->insert_id ();
	}
	// ================== Check Existing Admin table Fucntaion =====================
	// ================== Check Existing Admin table Fucntaion =====================
	function updateStudentMotherGuardianRelation($mother_user_id, $student_user_id) {
		$data = array (
				'mother_id' => $mother_user_id 
		);
		$this->db->where ( 'student_id', $student_user_id );
		$this->db->update ( 'student_guardian_relationship', $data );
		return $this->db->affected_rows ();
	}
	// ================== Check Existing Admin table Fucntaion =====================
	// ================== Check Existing Admin table Fucntaion =====================
	function updateStudentFatherGuardianRelation($father_user_id, $student_user_id) {
		$data = array (
				'father_id' => $father_user_id 
		);
		$this->db->where ( 'student_id', $student_user_id );
		$this->db->update ( 'student_guardian_relationship', $data );
		return $this->db->affected_rows ();
	}
	// ================== Check Existing Admin table Fucntaion =====================
	// ================== Check Existing Admin table Fucntaion =====================
	function updateStudentGuardianOneRelation($guardian_one_user_id, $student_user_id) {
		$data = array (
				'guardian_one_id' => $guardian_one_user_id 
		);
		$this->db->where ( 'student_id', $student_user_id );
		$this->db->update ( 'student_guardian_relationship', $data );
		return $this->db->affected_rows ();
	}
	// ================== Check Existing Admin table Fucntaion =====================
	// ================== Check Existing Admin table Fucntaion =====================
	function updateStudentGuardianTwoRelation($guardian_two_user_id, $student_user_id) 

	{
		$data = array (
				'guardian_two_id' => $guardian_two_user_id 
		);
		$this->db->where ( 'student_id', $student_user_id );
		$this->db->update ( 'student_guardian_relationship', $data );
		return $this->db->affected_rows ();
	}
	// ================== Check Existing Admin table Fucntaion =====================
	// ================== Check Existing Admin table Fucntaion =====================
	function updateStudentGuardianThreeRelation($guardian_three_user_id, $student_user_id) 

	{
		$data = array (
				'guardian_three_id' => $guardian_three_user_id 
		);
		$this->db->where ( 'student_id', $student_user_id );
		$this->db->update ( 'student_guardian_relationship', $data );
		return $this->db->affected_rows ();
	}
	// ================== Check Existing Admin table Fucntaion =====================
	// ================== Check Existing Admin table Fucntaion =====================
	function updateStudentGuardianFourRelation($guardian_four_user_id, $student_user_id) 

	{
		$data = array (
				'guardian_four_id' => $guardian_four_user_id 
		);
		$this->db->where ( 'student_id', $student_user_id );
		$this->db->update ( 'student_guardian_relationship', $data );
		return $this->db->affected_rows ();
	}
	// ================== Check Existing Admin table Fucntaion =====================
	// ================== Check Existing Admin table Fucntaion =====================
	function updateStudentGuardianFiveRelation($guardian_five_user_id, $student_user_id) 

	{
		$data = array (
				'guardian_five_id' => $guardian_five_user_id 
		);
		$this->db->where ( 'student_id', $student_user_id );
		$this->db->update ( 'student_guardian_relationship', $data );
		return $this->db->affected_rows ();
	}
	// ================== Check Existing Admin table Fucntaion =====================
	function guardianRoleList() {
		$this->db->select ();
		$this->db->from ( 'guardian_role' );
		$this->db->order_by ( 'guardian_role_id', 'asc' );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	
	// for edit employee
	function get_employee1($emp_id) {
		$this->db->select ();
		$this->db->from ( 'employee' );
		$this->db->where ( 'employee.emp_id', $emp_id );
		$this->db->join ( 'department', 'department.dept_id=employee.dept_id' );
		// $this->db->join('document','document.emp_id=employee.emp_id');
		$query = $this->db->get ();
		// header("Content-type: ".$query['image']);
		// $q = $query->result_array();
		return $query->result_array ();
		// return $query;
	}
	function insert_emp($data1) {
		$this->load->database ();
		$this->db->insert ( 'employee', $data1 );
		return $this->db->insert_id ();
		
		// return $this->db->insert_id();
	}
	public function delete_emp($ID) {
		$this->load->database ();
		// $this->db->where('dept_id',$ID);
		// $this->db->delete('employee');
		$this->db->where ( 'emp_id', $ID );
		$this->db->delete ( 'employee' );
	}
	function search($keyword) {
		$this->db->like ( 'emp_name', $keyword );
		
		$this->db->or_like ( 'father_name', $keyword );
		$this->db->or_like ( 'dept_name', $keyword );
		$this->db->or_like ( 'nic_num', $keyword );
		$this->db->or_like ( 'phone_mob', $keyword );
		$this->db->or_like ( 'department.dept_name', $keyword );
		$this->db->join ( 'department', 'employee.dept_id = department.dept_id' );
		$query = $this->db->get ( 'employee' );
		return $query->result_array ();
		// exit();
	}
	function dept_selector() {
		{
			$this->db->select ( 'dept_id,dept_name' );
			$records [rec] = $this->db->get ( 'department' );
			// $data=array();
			foreach ( $rec as $row ) {
				$data [$row->dept_id] = $row->dept_name;
			}
			return ($data);
		}
	}
}