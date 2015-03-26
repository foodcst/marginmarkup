<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resetpassword extends CI_Controller {

	 public function __construct()
       {
            parent::__construct();
			$this->load->library('form_validation');
          
       }
	
	public function index($code='')
	{
	      
         	 $this->load->view('resetPassword_view');
			  //$this->load->view('test_view');
  		 
	}
	
	public function add()
	{
		
		   $code =  $this->input->post('code'); 
		   if($code =='') {  echo "0"; exit; }
		   $query = $this->db->get_where('tb_login', array('rs' => $code), 1);
		   $row = $query->result_array();
			//print_r($row); exit;
			if ($query->num_rows() == 0)
      		 {
     			 echo "0"; exit;
       		} 
			else
			{
			 
			 $emailid = $row[0]['emailid'];
			 
			 $data = array(
								'password' => md5($this->input->post('password')),
								'rs' => ''
					 		 );
			$this->db->where('emailid', $emailid);
     
      	    $result = $this->db->update('tb_login',$data);
			if($result) { echo "1"; exit;}
			//print_r($result); exit;				 
				//$this->login_model->update_password($data);
			 
			} 	
			
		  	
		 
	}
	
	
	
	
}

