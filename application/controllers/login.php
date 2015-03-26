<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	 public function __construct()
       {
            parent::__construct();
			$this->load->library('form_validation');
			$this->load->library('email');
          
       }
	
	public function index()
	{
	
		    
         	  $this->load->view('login_view');
  		
	}
	
	public function authenticate()
	{
	
		 $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
  		 $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		 
		 if($this->form_validation->run() == FALSE)
   			{
         	  $this->load->view('login_view');
  		   }
		  else
		  {
		  	$result = $this->login_model->getCheck();
			if($result!='') {
				redirect('../dashboard');
				}
		  } 
	}
	
	public function forgotpassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
  		
		 if($this->form_validation->run() == FALSE)
   			{
		       $this->load->view('forgotpwd_view');
			} 
		 else
		  {
		  	
			$emailid = $this->input->post('email');
			$this->load->helper('string');
			$rs = random_string('alnum', 10);
			$data = array(
               				'rs' => $rs
              			);
						
			//$this->db->where('emailid', $emailid);
			//$this->db->update('tb_login', $data);
			
				 /*$config = Array(
						  'protocol' => 'smtp',
						  'smtp_host' => 'ssl://smtp.googlemail.com',
						  'smtp_port' => 465,
						  'smtp_user' => 'xxx@gmail.com', // change it to yours
						  'smtp_pass' => 'xxx', // change it to yours
						  'mailtype' => 'html',
						  'charset' => 'iso-8859-1',
						  'wordwrap' => TRUE
						);	*/
				
				$this->email->from('ikz.php@gmail.com', 'Ikz');
				$this->email->to('sajeesh.k@omkarlabs.com');
				$this->email->subject('Get your forgotten Password');
				$this->email->message('Please go to this link to get your password'."<?php echo base_url()?>resetpassword/?code=".$rs );

				$email = $this->email->send();
				
				if($email) {
					$this->db->where('emailid', $emailid);
					$re = $this->db->update('tb_login', $data);
					if($re!='') {
						$this->session->set_flashdata('email_send', 'Password Reset Link is sent to Your email.');
						redirect('../login/forgotpassword');
					}
				  //echo "Please check your email address.";
				  
				}
				else
				{
					show_error($this->email->print_debugger());
				}
				 		
			
		  }	 
	}
	
	public function email_check($str)
      {
	  	
		$query = $this->db->get_where('tb_login', array('emailid' => $str), 1);
 
      	if ($query->num_rows()== 1)
     	 {
             return true;
            }
            else
            {    
             $this->form_validation->set_message('email_check', 'This Email does not exist.');
      		 return false;

      }
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
		$this->session->unset_userdata('company_session_id','');
  	    //$this->session->sess_destroy();
		$this->session->set_flashdata('logout_succes', 'You have been succesfully log out');
		redirect('../login');
		
	  }
	
}

