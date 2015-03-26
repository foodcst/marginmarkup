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
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/purveyors_view',$data);
		$this->load->view('dashboard/footer');
				
	}
	
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
	    		
		
		$result = file_get_contents('http://www.SupermarketAPI.com/api.asmx/COMMERCIAL_SearchByProductName?APIKEY=ce9c65b752&ItemName=Parsley', false);
		$data['result'] = simplexml_load_string($result);
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/purveyors_search',$data);
		$this->load->view('dashboard/footer');
		
	}
	public function ajax_search() 
	{
		
		$input_search 	  =  $this->input->post('input_value');
		
		$this->purveyors_model->get_ajax_search($input_search);
		//print_r($data['profile']);
		
	}
	
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
		$this->load->view('dashboard/purveyors_addnew',$data);
		$this->load->view('dashboard/footer');
		
	}
	
	public function submit()
	{
		$this->purveyors_model->insert_data($_POST);
		
		/*if($this->input->post('ftp') == "on")
		 {
		 	$ftp_server = $this->input->post('server_name');
			$ftp_user = $this->input->post('serve_user');
			$ftp_pass  = $this->input->post('server_pwd');
			
			$conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server");
			if (@ftp_login($conn_id, $ftp_user, $ftp_pass))
			 {
			 	 $target_path = "http://"."$ftp_server"."/export.csv"; 
			 	 $handle = fopen($target_path, "r");
		    	 $headerLine = true;
				 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
				  {
				  	if($headerLine) { $headerLine = false; }
					else {
					$data = array (
							'comapny_id' 		 => 1,
							'item'   			 => $data[0],
							'quantity'   		 => $data[1],
							'eachc'   			 => $data[2],
							'eachavailable'   	 => $data[3],
							'pack'   			 => $data[4],
							'size'   			 => $data[5],
							'brand'   			 => $data[6],
							'description'   	 => $data[7],
							'oe'   			     => $data[8],
							'price'   			 => $data[9],
							'bcprice'   		 => $data[10],
							'bid'   			 => $data[11]
					
					 		);
					 $this->debug($data);			
					//$this->db->insert("purveyors_csv_data",$data);
				}
			
				  }
			 }
			else
			  {
			  	echo "Couldn't connect as $ftp_server\n";
				echo "<script type='text/javascript'>";
				echo '<a href="javascript:history.back()">Back</a>';
				echo "</script>";
			  }
			
		 } 
		
		exit; */
		
		/*if ($_FILES["user_file"]["error"] > 0) {
        			$error = $_FILES["user_file"]["error"];
    		} 
    		elseif
			(($_FILES["user_file"]["type"] == "image/gif") || 
			($_FILES["user_file"]["type"] == "image/jpeg") || 
			($_FILES["user_file"]["type"] == "image/png") || 
			($_FILES["user_file"]["type"] == "image/pjpeg")) {
                    $filename = stripslashes($_FILES['user_file']['name']);
					$filename = time().$filename;
        			$target_path = 'uploads/purveyor/'.$filename;
					move_uploaded_file($_FILES['user_file']['tmp_name'], $target_path);
					
	     } exit; */
		/*$handle = fopen('uploads/csv/export.csv', "r");
		$headerLine = true;
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
			
			if($headerLine) { $headerLine = false; }
			else {
			$data = array (
					'comapny_id' 		 => 1,
					'item'   			 => $data[0],
					'quantity'   		 => $data[1],
					'eachc'   			 => $data[2],
					'eachavailable'   	 => $data[3],
					'pack'   			 => $data[4],
					'size'   			 => $data[5],
					'brand'   			 => $data[6],
					'description'   	 => $data[7],
					'oe'   			     => $data[8],
					'price'   			 => $data[9],
					'bcprice'   		 => $data[10],
					'bid'   			 => $data[11]
					 );
				
			//$this->db->insert("purveyors_csv_data",$data);
			$this->debug($data);
			}
			}*/
		
	}
	
	public function debug($arrayObject){
	echo"<pre>";
	print_r($arrayObject);
	echo"</pre>";
	}
	
	
	
	public function test() {
	  
			$ftp_server = "salesloop.net";
			$ftp_user = "salelop";
			$ftp_pass = "kQxq9ds&Bft5";
			
			$conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server");
			
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
			 
			
			
			} else {
    			echo "Couldn't connect as $ftp_user\n";
				
				}
				

       
// close the connection
		
		/*$remote_file_contents = file_get_contents('salesloop.net/dermasnap/export.csv');

		$local_file_path = 'uploads/csv/export.csv';

		file_put_contents($local_file_path, $remote_file_contents);*/
		ftp_close($conn_id); 
	}
	
	public function test2() {
	
	 $this->load->view(test_view);
	}
	public function test3() {
	
	 echo $this->input->post('spreadchk'); exit;
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
		//fetch grocery items
		$data['grocery'] = $this->grocery_model->get_all();
		
		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/purveyor_manual_view',$data);
		$this->load->view('dashboard/footer');
	}
	public function manualsubmit()
	{
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

