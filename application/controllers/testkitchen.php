<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testkitchen extends CI_Controller {

	 public function __construct()
       {
            parent::__construct();
			$this->checked_in();
			
       }
	
	public function index()
	{
		
		$data['logged_in'] =  $this->session->userdata('login_id'); 
		$data['emailid']   =  $this->session->userdata('emailid');
		
		if($data['logged_in'] !='') {
			$data['details'] = $this->profile_model->select_data($data['logged_in']);
		}
		
		if($data['logged_in'] =='')
		{
			redirect('../login');
		}
		
		
		
		$data['result'] = $this->testkitchen_model->all_category();
	    //echo "<pre>";print_r($data['result']); exit;

		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/testkitchen_product',$data); 
		$this->load->view('dashboard/footer');
				
	}
	
	public function ajax_submit()
	{
		$cat_name =  $this->input->post('cat_name');
		$this->testkitchen_model->insert_category($cat_name);
		
		$data['result'] = $this->testkitchen_model->all_category();
		
		echo '<table border="0" cellpadding="4" cellspacing="5">';
	    echo '<tr><th> Sl.No </th><th> Category </th> <th> </th> <th></th> <th> Action </th></tr>';
	    $i=1;
	    foreach($data['result'] as $re) { 
	    echo '<tr> <td>'. $i.'</td> <td>'. $re->cat_name.'</td>';
	    echo '<td >';
	    echo '<input type="text" class="cat_name" name="cat_name[]" style="display:none;" value="'. $re->cat_name.'" />';
		echo '<input type="hidden" class="cat_id" name="cat_id[]" value="'. $re->cat_id.'" />';
		echo '</td> ';
		echo '<td><input type="button" class="saveRow" value="Update" style="display:none;" />';
		echo '</td>';
	    echo '<td> <input type="button" value="Edit" class="editRow" /> </td> </tr>';
	    $i++; }
	    echo '</table>';
	}
	
	public function ajax_update()
	{
		 $cat_name =  $this->input->post('cat_name'); 
		 $cat_id   =  $this->input->post('cat_id'); 
		 $this->testkitchen_model->update_category($cat_id,$cat_name);
		 
		 $data['result'] = $this->testkitchen_model->all_category();
		// echo "<pre>"; print_r($data['result']);
		echo '<table border="0" cellpadding="4" cellspacing="5">';
	    echo '<tr><th> Sl.No </th><th> Category </th> <th> </th> <th></th> <th> Action </th></tr>';
	    $i=1;
	    foreach($data['result'] as $re) { 
	    echo '<tr> <td>'. $i.'</td> <td>'. $re->cat_name.'</td>';
	    echo '<td >';
	    echo '<input type="text" class="cat_name" name="cat_name[]" style="display:none;" value="'. $re->cat_name.'" />';
		echo '<input type="hidden" class="cat_id" name="cat_id[]" value="'. $re->cat_id.'" />';
		echo '</td> ';
		echo '<td><input type="button" class="saveRow" value="Update" style="display:none;" />';
		echo '</td>';
	    echo '<td> <input type="button" value="Edit" class="editRow" /> </td> </tr>';
	    $i++; }
	    echo '</table>';
		
	}
	
	public function checked_in()
	{
	  $logged_in =	$this->session->userdata('logged_in');
	  if($logged_in == FALSE){
	   redirect('../login');
	  }
	}
	
		
}

