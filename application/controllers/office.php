<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Office extends CI_Controller {

	 public function __construct()
       {
            parent::__construct();
			$this->checked_in();
          
       }

       public function index()
	   {
		
		$data['logged_in'] =  $this->session->userdata('login_id'); 
		$emailid  =  $this->session->userdata('emailid');
		
		if($data['logged_in'] !='') {
			$data['details'] = $this->profile_model->select_data($data['logged_in']);
		}
		//print_r($user); exit;
		if($data['logged_in'] =='')
		{
			redirect('../login');
		}

		$data['administrator'] = $this->office_model->get_all_administartor();
		//echo "<pre>"; print_r($data['administrator']); 

		//exit;
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/office_administrator_view',$data);
		
	   }

	
	public function administration()
	{
		
		$data['logged_in'] =  $this->session->userdata('login_id'); 
		$emailid  =  $this->session->userdata('emailid');
		
		if($data['logged_in'] !='') {
			$data['details'] = $this->profile_model->select_data($data['logged_in']);
		}
		//print_r($user); exit;
		if($data['logged_in'] =='')
		{
			redirect('../login');
		}
		
		$data['company'] = $this->office_model->get_purveyors();

		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/office_admin_view',$data);
		//$this->load->view('dashboard/footer');
		
	}


	public function submit()
	{
		$this->office_model->insert_contact($_POST);
	}
	
	public function checked_in()
	{
	  $logged_in =	$this->session->userdata('logged_in');
	  if($logged_in == FALSE){
	   redirect('../login');
	  }
	}
	
	
}

