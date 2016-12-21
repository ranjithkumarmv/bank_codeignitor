<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Bank_account extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('Bank_account_model');
		$this->require_login();
		
	}
	
	protected function require_login() {
    	if(empty($_SESSION['username']))
      		redirect('/user/login');
    }
	public function index() {
		
		
	}
	
	public function my_account() {
			$data['myaccount'] = $this->Bank_account_model->fetch_my_account_details($_SESSION['username']);
			$data['mydetails'] = $this->Bank_account_model->fetch_my_personal_details($_SESSION['username']);
			$this->load->view('header');
			$this->load->view('bank_account/my_account', $data);
			$this->load->view('footer');
		
	}	

	
	
}
