<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	public function insert_data($data='')
	{
		
		$choose =  $this->input->post('choose');
		$company_id =  $this->input->post('purveyor_name');
		// FTP csv file access
		if($choose == "ftp")
		{
			$ftp_server = $this->input->post('server');
			$ftp_user 	= $this->input->post('username');
			$ftp_pass 	= $this->input->post('pwd');
			$conn_id = ftp_connect($ftp_server) or 
			$this->session->set_flashdata('failure',"ftp server connection failed...");
				

			if (@ftp_login($conn_id, $ftp_user, $ftp_pass))
			 {
			 	 $target_path = "http://"."$ftp_server"."/export.csv"; 
			 	 $handle = fopen($target_path, "r");
		    	 $headerLine = true;
				 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
				 {
				  	if($headerLine) { $headerLine = false; }
						else
						{
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
									'company_id' 		 => $company_id,
									'group_id'           => $group_id,
									'product_number'   	 => $data[1],
									'product_desc'   	 => $data[2],
									'product_brand'   	 => $data[3],
									'pack'   			 => $data[4],
									'size'   			 => $data[5],
									'unit'   			 => $data[6],
									'price'   			 => $data[7]
							
							 		);
								
							$this->db->insert("purveyors_csv_data",$data);
						}
			
				 }
			 }
			 else
			  {
			  	$this->session->set_flashdata('failure',"ftp coonection problem...");
				redirect('../dashboard/');
			  	
			  }

		}///ftp end

		// drag n drop csv file
		if($choose == "drag")
		{
			if($company_id !="")
			{ 
				$data['csvall'] = $this->purveyors_model->all_companywise_csvdata($company_id);
					foreach($data['csvall'] as $csv)
					{
						$csv_item[] = $csv['product_number'];
					}

				$target_path = "uploads/csv/";
				$target_path = $target_path . basename( $_FILES['csv_file']['name']);
				
				if(move_uploaded_file($_FILES['csv_file']['tmp_name'], $target_path))
				 { 
		 	
					$handle = fopen($target_path, "r");
				    $headerLine = true;
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
					if($headerLine) { $headerLine = false; }
					else
					 	{
						
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
							'company_id' 		 => $company_id,
							'group_id'           => $group_id,
							'product_number'   	 => $data[1],
							'product_desc'   	 => $data[2],
							'product_brand'   	 => $data[3],
							'pack'   			 => $data[4],
							'size'   			 => $data[5],
							'unit'   			 => $data[6],
							'price'   			 => $data[7]
							
							 );
						
							if (in_array("$data[product_number]",$csv_item)) {
				   		 		 $this->db->where(array('company_id'=>$company_id , 'product_number'=>$data['product_number']));
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
				
				
			} /*else{
					$this->session->set_flashdata('failure',"There was an error trying to upload the file.!...");
					redirect('../dashboard');
				    
				}*/
			$this->session->set_userdata('company_session_id',$company_id);
			redirect('../purveyors');	
			} 
			
			} //end file upload
	}
}		
