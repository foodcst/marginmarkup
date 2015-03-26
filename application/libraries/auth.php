<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth  {

	 function __construct()
    {
        $this->ci =& get_instance();
    }
	
	public function logout()
      {
	  	$newdata = array(
			  'login_id'   =>'',
			  'emailid'  =>'',
			  'username' =>'',
			  'logged_in' => FALSE,
			  );
  		$this->session->unset_userdata($newdata);
		$this->session->unset_userdata(admin);
  	    //$this->session->sess_destroy();
		$this->session->set_flashdata('logout_succes', 'You have been succesfully log out');
		redirect('../login');
		
	  }
	
}

