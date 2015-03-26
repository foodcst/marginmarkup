<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purveyors_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	public function insert_data($login_id)
	{
		/*if($this->input->post('manual'))
		{ 
			$res = 5;
			$this->session->set_userdata('company_session_id',$res);
			//$this->session->unset_userdata('company_session_id','');
			redirect('../purveyors/addmanual');
		}
		 exit;
		if($this->input->post('vendorapi'))
		{ 
			$res = 5;
			$this->session->set_userdata('company_session_id',$res);
			//$this->session->unset_userdata('company_session_id','');
			redirect('../purveyors/syncapi');
		}*/

		
		
		// company details submission
		if ($_FILES["user_file"]["error"] > 0) {
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
					
	     }
		
		$data = array (
					'company_name' 		=> $this->input->post('company_anme'),
					'contact_person' 	=> $this->input->post('contact_person'),
					'contact_number' 	=> $this->input->post('contact_number'),
					'contact_email' 	=> $this->input->post('email'),
					
						
				);
		if(@$filename!='')
		{
			$data['profile_photo'] = $filename;
		}	
		
		 $this->db->insert('purveyors_company_info',$data);
		$res = $this->db->insert_id();

		//start using vendor api
		if( ($res !='') && ($this->input->post('vendorapi')) )
		{ 
			$this->session->set_userdata('company_session_id',$res);
			//$this->session->unset_userdata('company_session_id','');
			redirect('../purveyors/syncapi');
		}

		
		// vendors api end

		//start using manual
		if( ($res !='') && ($this->input->post('manual')) )
		{ 
			$res = 5;
			$this->session->set_userdata('company_session_id',$res);
			//$this->session->unset_userdata('company_session_id','');
			redirect('../purveyors/addmanual');
		}

		
		// manual end


		// company drag n drop csv file details
		if( ($res !='') && ($this->input->post('ftp') == "on") )
		{
		  //start ftp connect
		  if($this->input->post('ftp') == "on")
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
							'comapny_id' 		 => $res,
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
								
					$this->db->insert("purveyors_csv_data",$data);
				}
			
				  }
			 }
			else
			  {
			  	$this->session->set_flashdata('failure',"Your csv file coudn't find...");
				redirect('../purveyors/addnew');
			  	//echo "Couldn't connect as $ftp_server\n";
			}
			
		 } //end ftp connect
		
		  
		  //start drag n drop
		  if($this->input->post('dragndrop') == "on") {
			$target_path = "uploads/csv/";
			$target_path = $target_path . basename( $_FILES['csv']['name']);
			if(move_uploaded_file($_FILES['csv']['tmp_name'], $target_path)) {
		 	
			$handle = fopen($target_path, "r");
		    $headerLine = true;
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
			if($headerLine) { $headerLine = false; }
			else {
					$data = array (
					'comapny_id' 		 => $res,
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
						
					$this->db->insert("purveyors_csv_data",$data);
				}
				}
			   fclose($handle);
		      	$f = 'uploads/csv/';
				unlink($f.basename( $_FILES['csv']['name']));
				
			} else{
					$this->session->set_flashdata('failure',"There was an error trying to upload the file.!...");
					redirect('../purveyors/syncapi');
				    //echo "There was an error trying to upload the file. ";
				}
			} // end drag n drop	
			// return true;	
			$this->session->set_flashdata('success',"Your information updated succesfuly...");
			redirect('../purveyors/addnew');
		}
		else
		{
		  return false;
		}		
	}
	
	
	public function get_ajax_search($input_search='')
	{
		if($input_search=="") { echo "please enter search vendors"; exit;}
		//$where = "(company_name LIKE '%".$input_search."%')";
		$this->db->select('*');
		$this->db->from('purveyors_company_info');
		//$this->db->where($where);
		$this->db->like('company_name',$input_search,'none');
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$data['profile'] = $query->result_array();
			 $this->get_profile($data['profile']);
			 
			
		}
		else
		{
			echo "No Result found!";
		}
	}
	
	public function get_profile($profile='')
	{
		foreach($profile as $p) {
				if($p["profile_photo"]!='') {
					$url =  base_url().'uploads/purveyor/'.$p["profile_photo"];
				} else {
					$url =  base_url().'assets/images/profile.gif';
				}

				 $im ="<img src=$url>";
				
				echo "<div style='float:left;'>";
				echo $im;    
				echo "</div>";
				echo "<div style='float:left;margin-top:28px;padding:10px;'>";	
				echo "<h2>$p[company_name]</h2> <br>";
				echo "contact Name :";echo $p["contact_person"]; echo "<br>";
				echo "Phone Number:";echo $p['contact_number'];echo "<br>";
				echo "Email Address:"; echo $p["contact_email"]; echo "<br>";
				echo "</div>";	
			    echo "<br clear='all'>";
			}
		$data['grocery'] = $this->grocery_model->get_all();	
		echo '<div id="item_list" style="margin-left:margin-left:150px;">';
		echo'<form action="<?php echo base_url();?>purveyors/apiinsert" method="post">';
		echo '<div style="overflow-y:auto;height:350px;">';
		echo'<table border="0" cellpadding="3" cellspacing="10">';
		echo'<tr><th style="background:#999999;"> Count </th><th style="background:#999999;">Unit</th><th style="background:#999999;">Grocery Items </th>';
		echo'<th style="background:#999999;">Factor </th> <th style="background:#999999;">count </th><th style="background:#999999;">Unit </th> <th style="background:#999999;">Order guide </th> <th style="background:#999999;">Match </th></tr>';
			foreach($data['grocery'] as $groc) { 	
		echo'<tr><td><input type="text" name="count[]" style="width:50px;" /></td>';
		echo'<td><input type="text" name="unit[]" style="width:50px;" /></td>';
		echo'<td><select name="itemname[]">';
		echo'<option> </option>';
								
		echo'<option value="tt">test</option>';
									
		echo'</select>';
		echo'</td>';
		echo'<td><input type="text" name="factor[]" style="width:50px;" /></td>';
		echo'<td>'.$groc->grocery_count.'</td>';
		echo'<td>'.$groc->grocery_unit.'</td>';
		echo'<td>'.$groc->grocery_descriptions.'</td>';
		echo'<td><input type="checkbox" name="check[]"/></td>';
		echo'</tr>';
			}				
							
		echo'</div>';
		echo'<tr><td colspan="10"><input type="submit" name="submit" class="submit" /></td></tr>';	
		echo'</table>';

	}
	public function manual_insertion()
	{
		$company_id = $this->session->userdata('company_session_id');
		if( ($_POST) && ($company_id!='') )
		{
			for($i=0;$i<count($_POST['match']);$i++)
			
			 {
			 	$data = array(
						'manual_count'  => $this->input->post('count')[$i],
						'company_id'    => $company_id,
						'manual_unit'   => $this->input->post('unit')[$i],
						'manual_items'  => $this->input->post('items')[$i],
						'manual_price'  => $this->input->post('price')[$i],
						'manual_factor' => $this->input->post('factor')[$i],
						
						);
				//$this->db->insert('purveyors_manual_data',$data);	
				echo "<pre>";print_r($data); 
			 }
		
	}


	public function get_company_row($company_id='')
	{
		$this->db->select('*');
		$this->db->from('purveyors_company_info');
		$this->db->where('company_id',$company_id);
		$query = $this->db->get();
		$row = $query->result();
		return $row;
	}

	public function all_companywise_csvdata($company_id='')
	{
		$this->db->select('*');
		$this->db->from('purveyors_csv_data');
		$this->db->where('company_id',$company_id);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}

}

