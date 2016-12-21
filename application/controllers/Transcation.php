<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Transcation extends CI_Controller {

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
		$this->load->model('transcation_model');
		$this->load->model('Bank_account_model');
		$this->require_login();
		
	}
	
	protected function require_login() {
    	if(empty($_SESSION['username']))
      		redirect('/user/login');
    }
	public function index() {
		
		
	}

	public function neft(){

		$this->load->helper('form');
			$this->load->library('form_validation');
			
			// set validation rules
			$this->form_validation->set_rules('accountno', 'Account No', 'trim|numeric|required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('neft_amount', 'Neft Amount', 'trim|required|numeric|min_length[1]|max_length[5]');
			$this->form_validation->set_rules('neft_amount_confirm', 'Confirm neft amount', 'trim|required|min_length[1]|max_length[5]|matches[neft_amount]');
			
			if ($this->form_validation->run() === false) {
				
				// validation not ok, send validation errors to the view
				$this->load->view('header');
				$this->load->view('transcation/neft');
				$this->load->view('footer');
				
			} else {

				// set variables from the form
				$neft_amount = $this->input->post('neft_amount');
				$toaccount = $this->input->post('accountno');
				$status    = "NEFT TRANSACTION";
				$netbalance = $this->transcation_model->get_netbalance($_SESSION['username']);
				$fromaccount = $this->transcation_model->get_accountno($_SESSION['username']);
				$touser = $this->transcation_model->get_to_username($toaccount);
				$check = $this->transcation_model->verify_toaccount_present($toaccount);
				$data = array('neft_amount' => $neft_amount, 'status' => $status,'toaccount'=>$toaccount,'touser'=>$touser);
				if($check)
				{
					$data = new stdClass();
					// user debit failed, this should never happen
					$data->error = 'To Account no not exist checkTo Account no';
					
					// send error to the view
					$this->load->view('header');
					$this->load->view('transcation/neft', $data);
					$this->load->view('footer');

				}


				elseif($netbalance<$neft_amount)
				{
					$data = new stdClass();
					// user debit failed, this should never happen
					$data->error = 'Transfer amount Greater than You Current NET BALANCE';
					
					// send error to the view
					$this->load->view('header');
					$this->load->view('transcation/neft', $data);
					$this->load->view('footer');

				}
				
				elseif ($this->transcation_model->neft_transfer($fromaccount,$toaccount,$neft_amount, $status, $_SESSION['username']) && $this->transcation_model->debit_amount_netbalance($neft_amount, $_SESSION['username']) && $this->transcation_model->credit_amount_netbalance($neft_amount, $touser)) {

						// user debit ok
					$data['myaccount'] = $this->Bank_account_model->fetch_my_account_details($_SESSION['username']);
					$this->load->view('header');
					$this->load->view('transcation/neft_success', $data);
					$this->load->view('footer');
					
					
				} else {
					
					// user debit failed, this should never happen
					$data->error = 'There was a problem debiting your Amount. Please try again.';
					
					// send error to the view
					$this->load->view('header');
					$this->load->view('transcation/debit', $data);
					$this->load->view('footer');
					
				}
				
			}



	}

	public function debit() {

			// load form helper and validation library
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			// set validation rules
			$this->form_validation->set_rules('debitby', 'Debit By', 'trim|required');
			$this->form_validation->set_rules('debit_amount', 'Debit Amount', 'trim|required|numeric|min_length[1]|max_length[5]');
			$this->form_validation->set_rules('debit_amount_confirm', 'Confirm debit amount', 'trim|required|min_length[1]|max_length[5]|matches[debit_amount]');
			
			if ($this->form_validation->run() === false) {
				
				// validation not ok, send validation errors to the view
				$this->load->view('header');
				$this->load->view('transcation/debit');
				$this->load->view('footer');
				
			} else {

				// set variables from the form
				$debit_amount = $this->input->post('debit_amount');
				$status    = $this->input->post('debitby');
				$data = array('debit_amount' => $debit_amount, 'status' => $status);
				$netbalance = $this->transcation_model->get_netbalance($_SESSION['username']);

				if($netbalance<$debit_amount)
				{
					$data = new stdClass();
					// user debit failed, this should never happen
					$data->error = 'Debit amount Greater than You Current NET BALANCE';
					
					// send error to the view
					$this->load->view('header');
					$this->load->view('transcation/debit', $data);
					$this->load->view('footer');

				}
				
				elseif ($this->transcation_model->debit_amount_self($debit_amount, $status, $_SESSION['username']) && $this->transcation_model->debit_amount_netbalance($debit_amount, $_SESSION['username'])) {

						// user debit ok
					$data['myaccount'] = $this->Bank_account_model->fetch_my_account_details($_SESSION['username']);
					$this->load->view('header');
					$this->load->view('transcation/debit_success', $data);
					$this->load->view('footer');
					
					
				} else {
					
					// user debit failed, this should never happen
					$data->error = 'There was a problem debiting your Amount. Please try again.';
					
					// send error to the view
					$this->load->view('header');
					$this->load->view('transcation/debit', $data);
					$this->load->view('footer');
					
				}
				
			}
		
	}

	
	public function view_my_transcations() {

			$data['mytranscations'] = $this->transcation_model->fetch_my_transcations($_SESSION['username']);
			$this->load->view('header');
			$this->load->view('transcation/view_my_transcations', $data);
			$this->load->view('footer');
		
	}	

	public function credit() {
	
			// load form helper and validation library
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			// set validation rules
			$this->form_validation->set_rules('creditby', 'Credit By', 'trim|required');
			$this->form_validation->set_rules('credit_amount', 'Credit Amount', 'trim|required|numeric|min_length[1]|max_length[5]');
			$this->form_validation->set_rules('credit_amount_confirm', 'Confirm credit amount', 'trim|required|min_length[1]|max_length[5]|matches[credit_amount]');
			
			if ($this->form_validation->run() === false) {
				
				// validation not ok, send validation errors to the view
				$this->load->view('header');
				$this->load->view('transcation/credit');
				$this->load->view('footer');
				
			} else {
				
				// set variables from the form
				$credit_amount = $this->input->post('credit_amount');
				$status    = $this->input->post('creditby');
				
				$data = array('credit_amount' => $credit_amount, 'status' => $status);
				
				if ($this->transcation_model->credit_amount_self($credit_amount, $status, $_SESSION['username']) && $this->transcation_model->credit_amount_netbalance($credit_amount, $_SESSION['username'])) {

						// user credit ok
					$data['myaccount'] = $this->Bank_account_model->fetch_my_account_details($_SESSION['username']);
					$this->load->view('header');
					$this->load->view('transcation/credit_success', $data);
					$this->load->view('footer');
					
					
				} else {
					
					// user credit failed, this should never happen
					$data->error = 'There was a problem crediting your Amount. Please try again.';
					
					// send error to the view
					$this->load->view('header');
					$this->load->view('transcation/credit', $data);
					$this->load->view('footer');
					
				}
				
			}
			
		}
	
	
}
