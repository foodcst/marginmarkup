<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purveyors_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	public function insert_data($login_id = '')
	{
		
		$if_exist = $this->db->get_where('purveyors_company_info', array('company_name' => $this->input->post('company_name')), 1)->result();
		if ($if_exist) {
           $this->session->set_flashdata('failure_already',$this->input->post('company_name')."! already exist !");
			redirect('../purveyors/addnew');
        }
		
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
					'company_name' 		=> $this->input->post('company_name'),
					'contact_person' 	=> $this->input->post('contact_person'),
					'contact_number' 	=> $this->input->post('contact_number'),
					'contact_email' 	=> $this->input->post('email'),
					'reg_date'			=> date('Y-m-d H:i:s')
						
				);
		if(@$filename!='')
		{
			$data['profile_photo'] = $filename;
		}	
		
		$this->db->insert('purveyors_company_info',$data);
		$res = $this->db->insert_id();

		//start using vendor api
		if( ($res !='') && ($this->input->post('vendorapi') == "vendorapi") )
		{ 
			$this->session->set_userdata('company_session_id',$res);
			//$this->session->unset_userdata('company_session_id','');
			redirect('../purveyors/syncapi');
		}

		
		// vendors api end

		//start using manual
		if( ($res !='') && ($this->input->post('manual') == "manual") )
		{ 
			
			$this->session->set_userdata('company_session_id',$res);
			//$this->session->unset_userdata('company_session_id','');
			redirect('../purveyors/addmanual');
		}

		
		// manual end
        
     
		// using ftp connect csv file details
		if( ($res !='') && ($this->input->post('ftp') == "ftp") )
		{ 
		    $this->session->set_userdata('company_session_id',$res);
				//fetching all csv data for updation
		  	$data['csvall'] = $this->purveyors_model->all_companywise_csvdata($res);
				foreach($data['csvall'] as $csv)
				{
					$csv_item[] = $csv['product_number'];
				}
		  //start ftp connect
		  if($this->input->post('ftp') == "ftp")
		 {
		 	$ftp_server = $this->input->post('server_name');
			$ftp_user = $this->input->post('serve_user');
			$ftp_pass  = $this->input->post('server_pwd');
			
			$conn_id = ftp_connect($ftp_server) or $this->session->set_flashdata('failure',"ftp server connection failed...");
			if (@ftp_login($conn_id, $ftp_user, $ftp_pass))
			 {
			 	 $target_path = "http://"."$ftp_server"."/export.csv"; 
			 	 $handle = fopen($target_path, "r");
		    	 $headerLine = true;
				 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
				  {
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
							'company_id' 		 => $res,
							'group_id'           => $group_id,
							'product_number'   	 => $data[1],
							'product_desc'   	 => $data[2],
							'product_brand'   	 => $data[3],
							'pack'   			 => $data[4],
							'size'   			 => $data[5],
							'unit'   			 => $data[6],
							'price'   			 => $data[7]
							
					 		);
								
					if (@in_array("$data[product_number]",$csv_item)) {
		   		 		 $this->db->where(array('company_id'=>$res , 'product_number'=>$data['product_number']));
						 $this->db->update('purveyors_csv_data',$data);
						}
						else
						{
							$this->db->insert("purveyors_csv_data",$data);
						}	
				}
			
				  }
			 }
			/*else
			  {
			  	$this->session->set_flashdata('failure',"FTP connection problem...");
				redirect('../purveyors/manage');
			  	//echo "Couldn't connect as $ftp_server\n";
			}*/
			
		 } 
		} 
		 //end ftp connect //end ftp connect
		
		  
		  //start drag n drop
		  if( ($res !='') && ($this->input->post('drag') == "drag") ) {
		  
		    $this->session->set_userdata('company_session_id',$res);
		  	//fetching all csv data for updation
		  	$data['csvall_1'] = $this->purveyors_model->all_companywise_csvdata($res);
				foreach($data['csvall_1'] as $csv)
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
							'company_id' 		 => $res,
							'group_id'           => $group_id,
							'product_number'   	 => $data[1],
							'product_desc'   	 => $data[2],
							'product_brand'   	 => $data[3],
							'pack'   			 => $data[4],
							'size'   			 => $data[5],
							'unit'   			 => $data[6],
							'price'   			 => $data[7]
					
					 );
					//echo "<pre>";print_r($data); exit;
					if (@in_array("$data[product_number]",$csv_item)) {
		   		 		 $this->db->where(array('company_id'=>$res , 'product_number'=>$data['product_number']));
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
				$this->session->set_flashdata('success',"Your csv file updated...");
				
				redirect('../purveyors');
				
			} /*else{
					$this->session->set_flashdata('failure',"There was an error trying to upload the file.!...");
					redirect('../purveyors/addnew');
				    //echo "There was an error trying to upload the file. ";
				}*/
			} // end drag n drop	
			// return true;	
			$this->session->set_flashdata('success',"Your information updated succesfuly...");
			redirect('../purveyors');
	}
		/*else
		{
		  return false;
		}*/		
	
	
	public function update_data()
	{
	
	 $company_id  = $this->input->post('company_id'); 
	
	  $data = array (
					'company_name' 		=> $this->input->post('company_name'),
					'contact_person' 	=> $this->input->post('contact_person'),
					'contact_number' 	=> $this->input->post('contact_number'),
					'contact_email' 	=> $this->input->post('email'),
					'reg_date'			=> date('Y-m-d H:i:s')
						
				);
	
	 $this->db->where('company_id',$company_id);
	 $this->db->update('purveyors_company_info',$data);
	 
	 // manual
	 if( ($this->input->post('manual') == "manual") )
		{ 
			
			$this->session->set_userdata('company_session_id',$company_id);
			//$this->session->unset_userdata('company_session_id','');
			redirect('../purveyors/addmanual');
		}
		
	 //start using vendor api
		if(($this->input->post('vendorapi') == "vendorapi") )
		{ 
			$this->session->set_userdata('company_session_id',$company_id);
			//$this->session->unset_userdata('company_session_id','');
			redirect('../purveyors/syncapi');
		}
		
		// using ftp connect csv file details
		if( ($this->input->post('ftp') == "ftp") )
		{ 
		    $this->session->set_userdata('company_session_id',$company_id);
				//fetching all csv data for updation
		  	$data['csvall'] = $this->purveyors_model->all_companywise_csvdata($company_id);
				foreach($data['csvall'] as $csv)
				{
					$csv_item[] = $csv['product_number'];
				}
				
		  //start ftp connect
		  if($this->input->post('ftp') == "ftp")
		 {
		 	$ftp_server = $this->input->post('server_name');
			$ftp_user = $this->input->post('serve_user');
			$ftp_pass  = $this->input->post('server_pwd');
			
			$conn_id = ftp_connect($ftp_server) or $this->session->set_flashdata('failure',"ftp server connection failed...");
			if (@ftp_login($conn_id, $ftp_user, $ftp_pass))
			 { 
			 	 $target_path = "http://"."$ftp_server"."/export.csv"; 
			 	 $handle = fopen($target_path, "r");
		    	 $headerLine = true;
				 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
				  {
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
								
					if (@in_array("$data[product_number]",$csv_item)) {
		   		 		 $this->db->where(array('company_id'=>$company_id , 'product_number'=>$data['product_number']));
						 $this->db->update('purveyors_csv_data',$data);
						}
						else
						{
							$this->db->insert("purveyors_csv_data",$data);
						}	
				}
			
				  }
				  
				  redirect('../purveyors');
			 }
			
			
		 }
		        //$this->session->set_flashdata('success',"Your csv file updated...");
				
				redirect('../purveyors/addnew');
		 
	  }	  //end ftp connect
	
		
		 //start drag n drop
		  if( ($this->input->post('drag') == "drag") )
		   { 
		  	$this->session->set_userdata('company_session_id',$company_id);
		  	$data['csvall'] = $this->purveyors_model->all_companywise_csvdata($company_id);
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
							'company_id' 		 => $company_id,
							'group_id'           => $group_id,
							'product_number'   	 => $data[1],
							'product_desc'   	 => $data[2],
							'product_brand'   	 => $data[3],
							'size'   			 => $data[5],
							'unit'   			 => $data[6],
							'price'   			 => $data[7]
					
					 );
						
					if (@in_array("$data[product_number]",$csv_item)) {
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
						
			} 	
			   $this->session->set_flashdata('success',"Your csv file updated...");
				
				redirect('../purveyors');
			 // end drag n drop	
			// return true;	
			//$this->session->set_flashdata('success',"Your information updated succesfuly...");
			//redirect('../purveyors/manage');
		 }
				
	}
	
	
	public function get_ajax_search($input_search='')
	{
		if($input_search=="") { echo "<div style='font-size: 12px;padding: 5px;'>please enter search vendors</div>"; exit;}
		//$where = "(company_name LIKE '%".$input_search."%')";
		$this->db->select('*');
		$this->db->from('purveyors_company_info');
		//$this->db->where($where);
		$this->db->like('company_name',$input_search,'both');
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$data['profile'] = $query->result_array();
			$this->get_profile($data['profile']);
			 
			
		}
		else
		{
			echo "<div style='font-size: 12px;padding: 5px;'>No Result found! </div>";
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
				echo "<p class='p-class'>Profile Photo</p>";    
				echo "</div>";
				echo "<div class='purv-search'>";	
				echo "<h3>$p[company_name]</h3> <br>";
				echo "<span><b>contact Name :</b>";echo $p["contact_person"]; echo "</span><br>";
				echo "<span>Phone Number:";echo $p['contact_number'];echo "</span><br>";
				echo "<span>Email Address:"; echo $p["contact_email"]; echo "</span><br>";
				echo "</div>";	
			    echo "<br clear='all'>";
			}
		$data['grocery'] = $this->grocery_model->get_all($profile[0]['company_id']);
		$data['purveyor_data'] = $this->purveyors_model->all_companywise_csvdata($profile[0]['company_id']);
			
		echo '<div id="item_list" style="margin-left:0px;">';
		echo'<form action="'.base_url().'purveyors/manage" method="post">';
		echo '<div class="content mCustomScrollbar">';
		//echo '<div style="overflow-y:auto;height:350px;" class="search-bg">';
		echo '<div>';
		echo '<table  border="0" cellpadding="3" cellspacing="10" >';
		echo '<tr class="common-tr"><th style="width:108px;" > Pack / Size / PU </th><th style="text-align:center;width:255px;">Grocery Item</th>
			<th style="text-align:center;width:50px;">Factor </th> <th style="width:90px;" > Pack / Size / PU </th><th style="text-align:left;width:245px;" >Order guide </th> <th>Match </th></thead></tr>';
		echo '</table>';
		echo '</div>';
		echo'<table id="table" border="0" cellpadding="3" cellspacing="10" style="font-size: 12px;">';
		
			if($data['grocery']) { $i=1; foreach($data['grocery'] as $groc) { 	
		//echo'<tr ><td id="grosspack">'.$groc->grocery_pack." ".$groc->grocery_size." ".$groc->grocery_purcunit. '</td>';
		echo'<tr id="saj_'.$i.'">';
		echo '<td class="psp_pack" style="width:20px;"></td><td class="psp_size" style="width:45px;"></td> <td class="psp_unit" style="width:30px;"></td>';
		
		echo'<td><select name="itemname[]" class="itemname">';
		echo'<option> </option>';
			foreach($data['purveyor_data'] as $purv) {					
		echo '<option value="'.$purv["csv_id"].'">'.$purv['product_desc'].'</option>';
			}						
		echo'</select>';
		echo'</td>';
		
		if( floatval($groc->grocery_size) == 0 ) {  $size = 1;}
		else { $size = floatval($groc->grocery_size); }
		$factor = $groc->grocery_pack * $size;
		
		echo'<td><input type="hidden" name="hiddenprice[]" class="hiddenprice"  />
		<input type="hidden" class="purchase_pack" name="purchase_pack[]"  />
		<input type="hidden" class="purchase_size" name="purchase_size[]" />
		<input type="hidden" class="purchase_unit" name="purchase_unit[]" />
		<input type="text" class="factor" name="factor[]" style="width:50px;" />
		
		<input type="hidden" class="size" value="'.$factor.'">
		</td>';
		
		
		echo'<td>'.$groc->grocery_pack." ".$groc->grocery_size." ".$groc->grocery_purcunit. '</td>';
		
		
		echo'<td>'.$groc->grocery_desc.'</td>';
		echo'<td><input type="checkbox" name="check[]"/></td>';
		echo'</tr>';
			$i++; } }				
							
		//echo'</div>';
		//echo'<tr><td colspan="10"><input type="submit" name="submit" class="submit" /></td></tr>';	
		echo'</table>';
		echo '</div>';
		echo '<div style="width:600px;font-size: 12px;position: relative;top: 37px">';
		echo '<div style="float:left;clear:left;margin-right:7px;">';
		echo '<img src="'.base_url() .'assets/images/i.png" />';
		echo '</div>';
		echo 'If the added ingredient count does not equal your order guide count, a FACTOR will be added that is used to provide comparable pricing.See this video for further explanation.';
		echo '</div>';
		echo' <input type="hidden" name="company_id" value="'.$profile[0]["company_id"].'"  />';
		echo '<div style="float:right;margin-top:5px; margin-right: 30px;"><input type="submit" class="submit"  value="Add&Sync"/> </div>';
		echo '<br clear="all">';
		echo '</form>';

	}
	public function manual_insertion()
	{
		$company_id = $this->session->userdata('company_session_id');
		//if( ($_POST) && ($company_id !="") )
		if( ($_POST) )
		{
			for($i=0;$i<count($_POST['match']);$i++)
			
			 {
			 	$data = array(  
						'manual_pack'  => $this->input->post('pack')[$i],
						'company_id'    => 2,
						'manual_size'   => $this->input->post('size')[$i],
						'manual_punit'  => $this->input->post('punit')[$i],
						'manual_groceryitem'  => $this->input->post('groceryitem')[$i],
						'manual_price' => $this->input->post('price')[$i],
						'manual_factor' => $this->input->post('factor')[$i],
						'reg_date'      => date('Y-m-d H:i:s')
						
						);
				$this->db->insert('purveyors_manual_data',$data);	
				
				//echo "<pre>";print_r($data); 
			 }
			 redirect('../purveyors/manage');
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

	public function purveyors_all()
	{
		$this->db->select('*');
		$this->db->from('purveyors_company_info');
		$query = $this->db->get();
		$row = $query->result();
		return $row;

	}

	public function get_all_group()
	{
		$this->db->select('*');
		$this->db->from('purveyors_group');
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	
	public function syncing_data($data = '')
	{ 
	  if( ($_POST) )
		{
		   		
			for($i=0;$i<count($_POST['check']);$i++) 
			{
			  $data = array(
			            'sync_csv_id'     => $this->input->post('itemname')[$i],
						'sync_company_id' => $this->input->post('company_id'),
						'sync_grocery_id' => $this->input->post('grocery_id')[$i],
						'sync_pack'       => $this->input->post('purchase_pack')[$i],
						'sync_size'       => $this->input->post('purchase_size')[$i],
						'sync_unit'       => $this->input->post('purchase_unit')[$i],
						'sync_price'      => $this->input->post('hiddenprice')[$i],
						'sync_factor'     => $this->input->post('factor')[$i],
						'sync_date'       => date('Y-m-d H:i:s')
						
					    );
						
			  $data_groc = array(
			            'grocery_id'     => $this->input->post('grocery_id')[$i]
						);
			  $this->db->where('company_id',$this->input->post('company_id'));	
			  $this->db->where('csv_id',$this->input->post('itemname')[$i]);				
			  $this->db->update('purveyors_csv_data',$data_groc);						
				//echo "<pre>";		 print_r($data); exit;
			 $if_exist = $this->db->get_where('sync_data', array('sync_csv_id' => $this->input->post('itemname')[$i],'sync_company_id' => $this->input->post('company_id') ), 1)->result();
			 if ($if_exist) { 
			  $this->db->where('sync_csv_id',$this->input->post('itemname')[$i]);
			  $this->db->where('sync_company_id',$this->input->post('company_id'));
			  $this->db->update('sync_data',$data);	
			  //echo $this->db->last_query(); exit;
			 }
			  
			  else {			
			    $this->db->insert('sync_data',$data);	
			  }
			}
			 
		}
		$this->session->set_flashdata('success',"Your information updated succesfuly...");
		redirect('../purveyors/manage');
	}
	
	
	public function get_all_purveyors_list($group_id = '')
	{
		$this->db->select('*');	
		$this->db->from('purveyors_csv_data');
		$this->db->where('group_id',$group_id);
		$this->db->group_by('product_number');
		$query = $this->db->get('');
		$row = $query->result();
		return $row;
	}
	
	public function get_all_purveyors()
	{
		$this->db->select('*');	
		$this->db->from('purveyors_company_info');
		$query = $this->db->get('');
		$row = $query->result();
		return $row;
	}

}


  
