<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

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
		$this->load->view('dashboard/profile_view',$data);
		
		
	}
	
	public function submit()
	{
		
		$data['logged_in'] =  $this->session->userdata('login_id'); 
		$emailid           =  $this->session->userdata('emailid');
		
		//print_r($user); exit;
		if($data['logged_in'] =='')
		{
			redirect('../login');
		}
		
		$this->profile_model->insert_data();
		
		
	}
	
	
	
	public function checked_in()
	{
	  $logged_in =	$this->session->userdata('logged_in');
	  if($logged_in == FALSE){
	   redirect('../login');
	  }
	}
	
	
}

