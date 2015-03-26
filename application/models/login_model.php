<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	public function getCheck()
	{
		$emailid = $this->security->xss_clean($this->input->post('email'));
		$password = $this->security->xss_clean(md5($this->input->post('password')));
		
		$this->db->select('login_id,emailid,password');
		$this->db->from('tb_login');
		$this->db->where('emailid',$emailid);
		$this->db->where('password',$password);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if($query->num_rows() == 1)
   		{ 
     		//return $query->result();
			$result = $query->result();
			foreach($result as $row) {
			$newdata =array(
						'login_id' => $row->login_id,
						'emailid'  => $row->emailid,
						'username' => $row->username,
						'logged_in'  => TRUE
						);
			}
			$this->session->set_userdata($newdata);
			return true;
   		}
   		else
   		{ 
     		$this->session->set_flashdata('msg',"Email and Password doesn't match");
			redirect('../login');
   		}
	}
	
	public function chkMail($emailid='')
	{ 
		$this->db->select('emailid');
		$this->db->from('tb_login');
		$this->db->where('emailid',$emailid);
		//$this->db->limit(1);
		$query = $this->db->get();
		
		if($query->num_rows() == 1)
   		{ 
     		return true;
   		}
   		else
   		{ 
     		 $this->form_validation->set_message('email_check', 'This Email does not exist.');
       		 return false;
   		}
		
	}
	
	public function update_password($data='')
	{
		 $this->db->where('rs', $rs);
     
      	 $this->db->update('tb_login',$data);
		 redirect('../login');
	}
	
}

