<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purveyors extends CI_Controller {

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
		
		$company_id = $this->session->userdata('company_session_id');
		
		if($this->input->post('company_id', TRUE)) {
		 $company_id = $this->input->post('company_id', TRUE);
		}
		
		if (!is_numeric($company_id )) {
            show_404();
        }
		
		$data['company_info'] 	= $this->purveyors_model->get_company_row($company_id);
		
		$data['grocery']       = $this->grocery_model->get_all_grocery_purveyors();
		$data['purveyor_data'] = $this->purveyors_model->all_companywise_csvdata($company_id);
		
		//echo "<pre>"; print_r($data['purveyor_data']); exit;
		
		$this->load->view('dashboard/header',$data);
		//$this->load->view('dashboard/purveyors_view',$data); 
		$this->load->view('dashboard/synch_grocerry',$data);
		//$this->load->view('dashboard/purveyor_manual_view',$data); 
		
		$this->load->view('dashboard/footer');
				
	}
	
	public function ajax_purveyordata()
	{
		$csv_id =  $this->input->post('csv_id'); 
		$result = $this->grocery_model->getAllPurv($csv_id);
		echo json_encode($result);
		//echo "<pre>"; print_r($result); exit;
	}
	// search purveyors
	public function search() {
		
		$data['logged_in'] =  $this->session->userdata('login_id'); 
		$data['emailid']   =  $this->session->userdata('emailid');
		
		if($data['logged_in'] !='') {
			$data['details'] = $this->profile_model->select_data($data['logged_in']);
		}
		
		if($data['logged_in'] =='')
		{
			redirect('../login');
		}

		$data['grocery'] = $this->grocery_model->get_all();
	    		
		
		//$result = file_get_contents('http://www.SupermarketAPI.com/api.asmx/COMMERCIAL_SearchByProductName?APIKEY=ce9c65b752&ItemName=Parsley', false);
		//$data['result'] = simplexml_load_string($result);
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/purveyors_search',$data);
		$this->load->view('dashboard/footer');
		
	}
	//search purveyors using ajax
	public function ajax_search() 
	{
		
		$input_search 	  =  $this->input->post('input_value');
		
		$this->purveyors_model->get_ajax_search($input_search);
		//print_r($data['profile']);
		
	}
	//add new purveyors
	public function addnew() {
	
	 
		$company_id = $this->uri->segment('3');
		$data['logged_in'] =  $this->session->userdata('login_id'); 
		$data['emailid']   =  $this->session->userdata('emailid');
		
		if($data['logged_in'] !='') {
			$data['details'] = $this->profile_model->select_data($data['logged_in']);
		}
		
		if($data['logged_in'] =='')
		{
			redirect('../login');
		}
		
		$data['company_id'] = $company_id;
		
		$data['grocery'] = $this->grocery_model->get_all();	
		$data['company_info'] = $this->office_model->get_row_companyinfo($company_id);
		
		//echo "<pre>"; print_r($data['company_info']); exit;
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/purveyors_addnew',$data);
		//$this->load->view('dashboard/purveyor_manual_view',$data);
		
		$this->load->view('dashboard/footer');
		
	}
	//purveyors manage
	public function manage()
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
		
		if($_POST) {
		 $sync =   $this->purveyors_model->syncing_data($_POST);
		 
		}

		$data['purveyors'] = $this->purveyors_model->purveyors_all();
       //echo "<pre>"; print_r($data['purveyors']); exit;
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/purveyors_manage',$data);
		$this->load->view('dashboard/footer');

	}
	
	public function submit()
	{
	
	
	/*
		$data['csvall'] = $this->purveyors_model->all_companywise_csvdata(6);
				foreach($data['csvall'] as $csv)
				{
					$csv_item[] = $csv['product_number'];
				}
				
		$target_path = "uploads/csv/";
			$target_path = $target_path . basename( $_FILES['csv_file']['name']);
			if(move_uploaded_file($_FILES['csv_file']['tmp_name'], $target_path)) {
		 	
			$handle = fopen($target_path, "r");
		    $headerLine = true;
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
			if($headerLine) { $headerLine = false; }
			else {


					$group_name =  strtolower($data[0]);
								
					$group['group_name'] = $group_name;
					$this->db->where(array('group_name'=>$group_name));
					
					$query = $this->db->get('purveyors_group');
					$row = $query->row();
					
					$group_id = @$row->group_id; 
					if(@$row->group_name != $group_name) { 
					$this->db->insert('purveyors_group',$group);
					$group_id = $this->db->insert_id();
					}
					
					$data = array (
					'company_id' 		 => 6,
					'group_id'           => $group_id,
					'product_number'   	 => $data[1],
					'product_desc'   	 => $data[2],
					'product_brand'   	 => $data[3],
					'pack'   			 => $data[4],
					'size'   			 => $data[5],
					'unit'   			 => $data[6],
					'price'   			 => $data[7]
										
					 );
					
					//echo "<pre>"; print_r($data); exit;
					if (@in_array("$data[product_number]",$csv_item)) {
		   		 		 $this->db->where(array('company_id'=>6 , 'product_number'=>$data['product_number']));
						 $this->db->update('purveyors_csv_data',$data);
						}
						else
						{
							$this->db->insert("purveyors_csv_data",$data);
						}	
				}
				}
			   fclose($handle);
		      	$f = 'uploads/csv/';
				unlink($f.basename( $_FILES['csv_file']['name']));
				$this->session->set_flashdata('success',"Your information updated succesfuly...");
			redirect('../purveyors/manage');*/
		$this->purveyors_model->insert_data($_POST);
		//}
	  
	   
	}
	
	public function update()
	{
	  $this->purveyors_model->update_data($_POST);
	}
	
	public function debug($arrayObject){
	echo"<pre>";
	print_r($arrayObject);
	echo"</pre>";
	}
	
	
	//test purpose only
	public function test() {
	  
			$ftp_server = "salesloop.net";
			$ftp_user = "salelop";
			$ftp_pass = "kQxq9ds&Bft5";
			
			$conn_id = ftp_connect($ftp_server);
			
			if (@ftp_login($conn_id, $ftp_user, $ftp_pass)) {  
			  //$file = 'salesloop.net/export.csv';
			  $target_path = "http://"."$ftp_server"."/export.csv"; 
			 $handle = fopen($target_path, "r");
		    $headerLine = true;
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$this->debug($data);
			
			}

   			 echo "Connected as $ftp_user@$ftp_server\n";
			 //$remote_file_contents = @file_get_contents('salesloop.net/export.csv');
              //echo $remote_file_contents;
			//$local_file_path = 'uploads/csv/export.csv';
           
			//file_put_contents($local_file_path, $remote_file_contents);
			 
			
			
			}  else {
    			echo "Couldn't connect as $ftp_user\n";
				
				}
			

       
// close the connection
		
		/*$remote_file_contents = file_get_contents('salesloop.net/dermasnap/export.csv');

		$local_file_path = 'uploads/csv/export.csv';

		file_put_contents($local_file_path, $remote_file_contents);*/
		if($conn_id) {
		ftp_close($conn_id); 
	}
	}
	
	public function test2() {
	
	 $this->load->view(test_view);
	}
	public function test3() {
	
	 echo $this->input->post('spreadchk'); exit;
	}
	//connect sync api only
	public function syncapi()
	{
		$company_id        = $this->session->userdata('company_session_id'); 

		$data['logged_in'] =  $this->session->userdata('login_id'); 
		$data['emailid']   =  $this->session->userdata('emailid');
		
		if($data['logged_in'] !='') {
			$data['details'] = $this->profile_model->select_data($data['logged_in']);
		}
			
			//$data['company_info'] 	= $this->purveyors_model->get_company_row($company_id );
			//echo "<pre>";print_r($data['company_info']); echo $data['company_info']['company_id'];  die;
			
		
		if($company_id!='') 
		{
			
			$data['company_info'] 	= $this->purveyors_model->get_company_row($company_id);
			if(count($data['company_info']) == "")
				{
					redirect('../purveyors/addnew');
				}

			$this->load->view('dashboard/header',$data);
			$this->load->view('dashboard/purveyors_addnew_syncapi',$data);
			$this->load->view('dashboard/footer');
		}
	}
	// fetching api using grocery dtaa
	public function grocerryadd()
	{
		
		$data['logged_in'] =  $this->session->userdata('login_id'); 
		$data['emailid']   =  $this->session->userdata('emailid');
		if($data['logged_in'] !='') {
			$data['details'] = $this->profile_model->select_data($data['logged_in']);
		}

		$company_id = $this->session->userdata('company_session_id');
		$ok = 1;
		/// api connection success
		if( ($ok == 1) && ($company_id!='') )
		{
			
			$data['company_info'] 	= $this->purveyors_model->get_company_row($company_id);
			if(count($data['company_info']) == "")
				{
					redirect('../purveyors/addnew');
				}
			$data['grocery'] = $this->grocery_model->get_all();	

			$this->load->view('dashboard/header',$data);
			$this->load->view('dashboard/purveyors_addgrocerry',$data);
			$this->load->view('dashboard/footer');
		}
		else
		{
			$this->session->set_flashdata('failure',"Your authorization failed !...");
			redirect('../purveyors/syncapi');
		}
	}
	
	public function api()
	{
		$data['grocery'] = $this->grocery_model->get_all();
	    		
		//$result = file_get_contents('http://www.SupermarketAPI.com/api.asmx/COMMERCIAL_GetGroceries?APIKEY=ce9c65b752&SearchText=Apple', false);
		$result = file_get_contents('http://www.SupermarketAPI.com/api.asmx/COMMERCIAL_SearchByProductName?APIKEY=ce9c65b752&ItemName=Parsley', false);
		$data['result'] = simplexml_load_string($result);
		
		//$this->debug($data);
		
		$this->load->view('dashboard/api_grocery',$data);
	}
	
	public function apiinsert()
	{
		if($_POST)
		{  
		    for($i=0;$i<count($_POST['check']);$i++) 
			 {
			 	$data = array(
				          'api_count' 			=> $this->input->post('count')[$i],
						  'api_unit' 			=> $this->input->post('unit')[$i],
						  'api_grocery_item' 	=> $this->input->post('itemname')[$i],
						  'api_factor' 		    => $this->input->post('factor')[$i]
						 
				         );
				 $this->debug($data);
				//$this->db->insert('purveyors_api_data',$data);
			
			 }
			 
		}	
	}

	public function addmanual()
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
		
		$company_id 			= $this->session->userdata('company_session_id');

		
		$data['company_info'] 	= $this->purveyors_model->get_company_row($company_id);
		
		if(count($data['company_info']) == "")
		{
			redirect('../purveyors/addnew');
		}
		//fetch grocery items
		$data['grocery'] = $this->grocery_model->get_all();
		//$data['purveyor_data'] = $this->purveyors_model->all_companywise_csvdata($company_id);
		
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/purveyor_manual_view',$data);
		$this->load->view('dashboard/footer');
	}
	
	public function addmanualold()
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
		//fetch grocery items
		$data['grocery'] = $this->grocery_model->get_all();
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/purveyor_manual_viewold',$data);
		$this->load->view('dashboard/footer');
	}
	public function manualsubmit()
	{ //echo"dd"; exit;
		$this->purveyors_model->manual_insertion();
	}
	
	public function tab()
	{
	 $this->load->view('tab');
	}
	
	public function checked_in()
	{
	  $logged_in =	$this->session->userdata('logged_in');
	  if($logged_in == FALSE){
	   redirect('../login');
	  }
	}
	
	public function tab2()
	{
	 $this->load->view('tab22');
	}
	
}

