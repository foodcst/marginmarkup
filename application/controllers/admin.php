<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		
		$data['ingredients'] = $this->grocery_model->grocery_count_all();
		$data['last_update'] = $this->grocery_model->grocery_last_update();
		
		$this->load->view('dashboard/dashboard_header',$data);
		$this->load->view('dashboard/sidebar',$data);
		$this->load->view('dashboard/admin_view',$data);
		//$this->load->view('dashboard/footer');
		
	}
	
	public function submit()
	{
	   //echo $this->input->post('color_1'); exit;
		$this->admin_model->insert_data($_POST);
	}
	
	public function popup()
	{
		$this->load->view('dashboard/popup');
	}
	public function videopopup()
	{
		$this->load->view('dashboard/videopopup');
	}
	
	public function checked_in()
	{
	  $logged_in =	$this->session->userdata('logged_in');
	  if($logged_in == FALSE){
	   redirect('../login');
	  }
	}
	
	
}

