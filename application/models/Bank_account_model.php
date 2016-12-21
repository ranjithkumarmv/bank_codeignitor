<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Bank_account_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	public function fetch_my_account_details($username) {
		
		$this->db->select('*');
		$this->db->from('bank_accounts');
		$this->db->where('user_id', $username);
		$query = $this->db->get();

   		if ( $query->num_rows() > 0 )
   			 {
    	   	 $row = $query->row_array();
       		 return $row;
    		 }
		
	}

	public function fetch_my_personal_details($username) {
		
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		$query = $this->db->get();

   		if ( $query->num_rows() > 0 )
   			 {
    	   	 $row = $query->row_array();
       		 return $row;
    		 }
		
	}
	
	
	

	
}
