<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendors extends CI_Controller {

	 public function __construct()
       {
            parent::__construct();
			$this->checked_in();
			
       }
	
	public function index()
	{
		
		$data['logged_in'] =  $this->session->userdata('login_id'); 
		$data['emailid']   =  $this->session->userdata('emailid');
		
		if($data['logged_in'] !='') {
			$data['details'] = $this->profile_model->select_data($data['logged_in']);
		}
		
		if($data['logged_in'] =='')
		{
			redirect('../login');
		}
		
		$this->load->view('dashboard/header',$data);
		//$this->load->view('dashboard/vendors_search',$data);
		$this->load->view('dashboard/footer');
				
	}
	
	//add new vendors
	public function addnew() {
		
		$data['logged_in'] =  $this->session->userdata('login_id'); 
		$data['emailid']   =  $this->session->userdata('emailid');
		
		if($data['logged_in'] !='') {
			$data['details'] = $this->profile_model->select_data($data['logged_in']);
		}
		
		if($data['logged_in'] =='')
		{
			redirect('../login');
		}
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/vendors_addnew',$data);
		$this->load->view('dashboard/footer');
		
	}
	// search vendors
	
	public function search()
	{
		
		$data['logged_in'] =  $this->session->userdata('login_id'); 
		$data['emailid']   =  $this->session->userdata('emailid');
		
		if($data['logged_in'] !='') {
			$data['details'] = $this->profile_model->select_data($data['logged_in']);
		}
		
		if($data['logged_in'] =='')
		{
			redirect('../login');
		}
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/vendors_search',$data);
		$this->load->view('dashboard/footer');
				
	}
	
	//search purveyors using ajax
	public function ajax_search() 
	{
		
		$input_search 	  =  $this->input->post('input_value');
		
		$this->vendors_model->get_ajax_search($input_search);
		//print_r($data['profile']);
		
	}
	
	
	public function checked_in()
	{
	  $logged_in =	$this->session->userdata('logged_in');
	  if($logged_in == FALSE){
	   redirect('../login');
	  }
	}
	
	
}

