<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		
		$data['purveyors'] =   $this->purveyors_model->purveyors_all();
		$data['ingredients'] = $this->grocery_model->grocery_count_all();
		$data['last_update'] = $this->grocery_model->grocery_last_update();
        
		//echo "<pre>"; print_r($data['last_update']);
		//echo $data['ingredients'];
		
		$this->load->view('dashboard/dashboard_header',$data);
		$this->load->view('dashboard/sidebar',$data);
		$this->load->view('dashboard/dashboard_view',$data);
		//$this->load->view('dashboard/footer');
		
	}
	
	public function test()
	{
		$data['login_id'] = $this->session->userdata('logged_in'); 
		$this->load->view('dashboard/dashboard_view',$data);
		//print_r($user); exit;
	}

	public function updateprice()
	{
		$this->dashboard_model->insert_data($_POST);
	}

	
	public function checked_in()
	{
	  $logged_in =	$this->session->userdata('logged_in');
	  if($logged_in == FALSE){
	   redirect('../login');
	  }
	}
	
	
}

