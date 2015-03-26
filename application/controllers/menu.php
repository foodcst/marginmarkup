<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

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
		
		$data['result'] = $this->grocery_model->menu_syncdata_all();
		$data['menucat'] = $this->testkitchen_model->menucategory_all();
		//echo "<pre>"; print_r($data['menucat']); exit;

		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/menu_product',$data); 
		$this->load->view('dashboard/footer');
				
	}
	
	public function cat()
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
		
		$data['result'] = $this->grocery_model->menu_syncdata_all();
		$data['menucat'] = $this->testkitchen_model->menucategory_all();
		//echo "<pre>"; print_r($data['result']); exit;

		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/menu_product',$data); 
		$this->load->view('dashboard/footer');
	}
	
	public function ajax_menudata()
	{
		$sync_id = $this->input->post('sync_id');
		$data['result'] = $this->testkitchen_model->getrow_syncdata($sync_id);
		echo json_encode($data['result']);
	}
	
	
	public function checked_in()
	{
	  $logged_in =	$this->session->userdata('logged_in');
	  if($logged_in == FALSE){
	   redirect('../login');
	  }
	}
	
		
}

