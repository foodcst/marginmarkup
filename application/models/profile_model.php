<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	public function select_data($login_id)
	{
		$this->db->select('*');
		$this->db->from('tb_login');
		$this->db->where('login_id',$login_id);
		$query = $this->db->get();
		$row =  $query->row();
		return $row;
	}
	
	public function insert_data()
	{
		$email  	  =	$this->input->post('email'); 
		$oldpwd 	  =   md5($this->input->post('oldpwd'));
		$newpwd 	  =   md5($this->input->post('newpwd'));
		$phone 		  =   $this->input->post('phone'); 
		$cog_sms      =   $this->input->post('cog_sms')=='on' ? '1' : '0';
		$cog_email    =   $this->input->post('cog_email')=='on' ? '1' : '0';
		$cog_support  =   $this->input->post('customer_support')=='on' ? '1' : '0';
		//$this->input->post('newpwd');
		
		
		$data = array (
					'password' 			 => $newpwd,
					'phone'   			 => $phone,
					'cog_sms'  	  		 => $cog_sms,
					'cog_daily_email'  	 => $cog_email,
					'customer_support'   => $cog_support
		           );
		//echo "<pre>"; print_r($data); exit;
		$this->db->select('emailid,password');
		$this->db->from('tb_login');
		$this->db->where('emailid',$email);
		$this->db->where('password',$oldpwd);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if($query->num_rows() == 1)
		 { 
		 	$this->db->where('emailid', $email);
			$res = $this->db->update('tb_login', $data);
			if($res)
			 {
			 	$this->session->set_flashdata('success',"Your information updated succesfuly...");
				redirect('../profile');
			 }
		 }
		else
		 { 
		 	$this->session->set_flashdata('msg',"Your old password doesn't macth!.");
			redirect('../profile');
		 }
	}

}

