<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grocery extends CI_Controller {

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
		$this->load->view('dashboard/grocery_view',$data);
		$this->load->view('dashboard/footer');
				
	}
	// Grocery fresh products
	public function freshproducts()
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

		$data['group_cat'] = $this->purveyors_model->get_all_group();
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/grocery_fresh_product_view',$data);
		$this->load->view('dashboard/footer');
				
	}

	// Grocery Meat
	public function meat()
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
		$this->load->view('dashboard/grocery_meat_view',$data);
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
		
		$data['cat_id'] =  $this->uri->segment(3);
        if (!is_numeric($data['cat_id'])) {
            show_404();
        }
		if($data['cat_id'] !='')
		{

			$data['group_cat']  = $this->purveyors_model->get_all_group();
			$data['orderguide'] = $this->grocery_model->get_cat_wise_grocery($data['cat_id']);
			
			//echo "<pre>"; print_r($data['orderguide']); exit;
			
			$this->load->view('dashboard/header',$data);
			$this->load->view('dashboard/grocery_cat_product_view',$data);
			//$this->load->view('dashboard/grocery_cat_test_view',$data);
			
			$this->load->view('dashboard/footer');
		}
				
	}
	
	public function submit()
	{ 
	
	   if (!is_numeric($this->input->post('cat_id'))) {
            show_404();
        } 
		 
		 $this->grocery_model->insert_data($_POST);
		
	}
	
	public function ajax_grocery()
	{
		$grocery =  $this->input->post('grocery_cat'); 
		$this->grocery_model->grocery_cat_insert($grocery);
	}

	public function ajax_delete_grocery()
	{
		$group_id =  $this->input->post('group_name');
		$this->grocery_model->grocery_cat_delete($group_id);

	}
	
	public function checked_in()
	{
	  $logged_in =	$this->session->userdata('logged_in');
	  if($logged_in == FALSE){
	   redirect('../login');
	  }
	}
	
	public function test()
	{
	  $this->load->view('popup_view');
	}
}

