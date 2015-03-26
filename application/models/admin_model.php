<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	public function insert_data($data ="")
	{
		if ($_FILES["logo_file"]["error"] > 0) {
        			$error = $_FILES["logo_file"]["error"];
    		} 
    		elseif
			(($_FILES["logo_file"]["type"] == "image/gif") || 
			($_FILES["logo_file"]["type"] == "image/jpeg") || 
			($_FILES["logo_file"]["type"] == "image/png") || 
			($_FILES["logo_file"]["type"] == "image/pjpeg")) {
                    $filename = stripslashes($_FILES['logo_file']['name']);
					$filename = time().$filename;
        			$target_path = 'uploads/admin/'.$filename;
					move_uploaded_file($_FILES['logo_file']['tmp_name'], $target_path);
					
	     }
	
		$data = array(
				'company_name' =>   	 $this->input->post('company_name'),
				'email_recipie' =>   	 $this->input->post('email_recipie'),
				'email_price' =>    	 $this->input->post('email_price'),
				'email_potential' =>	 $this->input->post('email_potential'),
				'support_name' =>    	 $this->input->post('support_name'),
				'support_email' =>   	 $this->input->post('support_email'),
				'color_theme'  =>   	 $this->input->post('color_1'),
				'company_logo' =>  @$filename   
				
				);
		echo "<pre>"; print_r($data); exit;	
		$res = $this->db->insert('admin_profile',$data);
		if($res!='') {
		      $this->session->set_flashdata('success',"Your information updated succesfuly...");
				redirect('../admin');		
			}	
		//echo "<pre>"; print_r($data); exit;
	}
	
	
	
}

