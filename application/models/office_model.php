<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Office_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	public function insert_contact($data='')
	{
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
        			$target_path = 'uploads/administrator/'.$filename;
					move_uploaded_file($_FILES['user_file']['tmp_name'], $target_path);
					
	     }

		$data = array(

					'office_company_name' 	=> $this->input->post('company_name'),
					'photo' 				=> $filename,
					'office_contact_person' => $this->input->post('contact_person'),
					'office_phone_number' 	=> $this->input->post('contact_number'),
					'office_email' 			=> $this->input->post('email'),
					'linkedin_link' 		=> $this->input->post('linkedin'),
					'facebook_link' 		=> $this->input->post('fb'),
					'twitter_link' 			=> $this->input->post('twitter')

				   );
		
		$this->db->insert('office_administration',$data);

		$this->session->set_flashdata('success',"Your information updated succesfuly...");
		redirect('../office');
	}

	public function get_purveyors()
	{
		$this->db->select('company_id,company_name');
		$this->db->from('purveyors_company_info');
		$query = $this->db->get('');
		$row = $query->result_array();
		return $row;
	}
	
	
	public function get_all_administartor()
	{
		$this->db->select('office_administration.*,purveyors_company_info.company_name,purveyors_company_info.company_id');
		$this->db->from('office_administration');
		$this->db->join('purveyors_company_info', 'office_administration.office_company_name = purveyors_company_info.company_id');
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	
	public function get_row_companyinfo($company_id = '')
	{
	    $this->db->select('*');
		$this->db->from('purveyors_company_info');
		$this->db->where('company_id',$company_id);
		$query = $this->db->get('');
		$row = $query->row();
		return $row;
	}
	
}

