<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Transcation_model extends CI_Model {

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

	public function verify_toaccount_present($toaccount) {
		
		$this->db->select('accountno');
		$this->db->from('bank_accounts');
		$this->db->where('accountno', $toaccount);
		$query = $this->db->get();

   		if ( $query->num_rows() > 0 )
   			 {
       		 return false;
    		 }
    		 else
    		 {
    		 	return true;
    		 }
		
	}

	public function get_netbalance($username) {
		
		$this->db->select('netbalance');
		$this->db->from('bank_accounts');
		$this->db->where('user_id', $username);
		return $this->db->get()->row('netbalance');
		
	}

	public function get_accountno($username) {
		
		$this->db->select('accountno');
		$this->db->from('bank_accounts');
		$this->db->where('user_id', $username);
		return $this->db->get()->row('accountno');
		
	}

	public function get_to_username($toaccount) {
		
		$this->db->select('user_id');
		$this->db->from('bank_accounts');
		$this->db->where('accountno', $toaccount);
		return $this->db->get()->row('user_id');
		
	}
	
	public function fetch_my_transcations($username) {
		
		$this->db->select('*');
		$this->db->from('transcations');
		$this->db->where('user_id', $username);
		$query = $this->db->get();
		return $query->result();
		
	}

	public function neft_transfer($fromaccount,$toaccount,$neft_amount,$status,$username) {
		
		$data = array(
			'user_id'   => $username,
			'status'      => $status,
			'tfamount'   => $neft_amount,
			'toaccount'   => $toaccount,
			'fromaccount'   => $fromaccount,
		);

		return $this->db->insert('transcations', $data);
		
	}

	public function credit_amount_self($credit_amount,$status,$username) {
		
		$data = array(
			'user_id'   => $username,
			'status'      => $status,
			'tfamount'   => $credit_amount,
		);

		return $this->db->insert('transcations', $data);
		
	}

	public function credit_amount_netbalance($credit_amount,$username) {
		
		$this->db->select('netbalance');
		$this->db->from('bank_accounts');
		$this->db->where('user_id', $username);
		$netbalance = $this->db->get()->row('netbalance');
		$netbalance = $netbalance+$credit_amount;
		
		$data = array(
			'netbalance'   => $netbalance,
		);

		 $this->db->where('user_id', $username);
		 return $this->db->update('bank_accounts', $data);
		
	}

public function debit_amount_self($debit_amount,$status,$username) {
		
		$data = array(
			'user_id'   => $username,
			'status'      => $status,
			'tfamount'   => $debit_amount,
		);

		return $this->db->insert('transcations', $data);
		
	}

	public function debit_amount_netbalance($debit_amount,$username) {
		
		$this->db->select('netbalance');
		$this->db->from('bank_accounts');
		$this->db->where('user_id', $username);
		$netbalance = $this->db->get()->row('netbalance');
		$netbalance = $netbalance - $debit_amount;
		
		$data = array(
			'netbalance'   => $netbalance,
		);

		 $this->db->where('user_id', $username);
		 return $this->db->update('bank_accounts', $data);
		
	}
	
	
	

	
}
