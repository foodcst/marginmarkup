<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function do_upload(){
	
		
		$config = array(
		'upload_path' => "./uploads/csv/",
		'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|xls|xlsx",
		'overwrite' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		'max_height' => "768",
		'max_width' => "1024"
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
		$data = array('upload_data' => $this->upload->data());
		$this->load->view('upload_success',$data);
		}
		else
		{
		$error = array('error' => $this->upload->display_errors());
		$this->load->view('welcome_message', $error);
		}
		}
		
	public function test()
	 {
	 	$target_path = "uploads/";
		$target_path = $target_path . basename( $_FILES['userfile']['name']);
		if(move_uploaded_file($_FILES['userfile']['tmp_name'], $target_path)) {
		
         }
		 $this->load->library('csvreader');
		
		$data['csvData'] = $this->csvreader->parse_file($target_path);
		print_r($data['csvData']); exit;
		foreach($data['csvData'] as $cd){
			echo $cd['Earrings'];
		} exit;
	 }	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */