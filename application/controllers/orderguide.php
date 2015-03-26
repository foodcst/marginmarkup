<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orderguide extends CI_Controller {

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
		
		//$data['orderdata'] = $this->grocery_model->get_all_grocerylist();
		//echo "<pre>";print_r($data['orderdata']); exit;

		$this->load->view('dashboard/header',$data);
		$this->load->view('dashboard/order_guide',$data); 
		$this->load->view('dashboard/footer');
				
	}
	
	public function cat()
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
		
		$data['cat_id'] =  $this->uri->segment(3);
        if (!is_numeric($data['cat_id'])) {
            show_404();
        }
		
		$data['group_cat']  = $this->purveyors_model->get_all_group();
		
		$data['purveyors']  = $this->purveyors_model->get_all_purveyors();
		
		//echo "<pre>"; print_r($data['purveyors']); exit;
		
		$data['orderdata'] = $this->grocery_model->get_all_grocerylist($data['cat_id']);
		
		$data['purveyordata'] = $this->purveyors_model->get_all_purveyors_list($data['cat_id']);
		
		$data['last_update'] = $this->grocery_model->grocery_last_update_time();
		//echo "<pre>";print_r($data['orderdata']); exit;

		$this->load->view('dashboard/header',$data);
		
		$this->load->view('dashboard/order_guide',$data); 
		$this->load->view('dashboard/footer');
				
	}
	
	public function totalvalue()
	{
		//echo "<pre>"; print_r($_POST['check_purv']); exit;
		for($i=0; $i<count($_POST['check_purv']);$i++)
		{
		 $data2[] = $this->grocery_model->get_ajax_totalvalue($_POST['check_purv'][$i]);
		 //echo "<pre>"; print_r($data['result']); 
		}
		//echo "<pre>"; print_r($data); 
		foreach($data2 as $d)
		{
		 $v[] =  $d->total;
		 $c[] =  $d->company_name;
		 $n[] = $d->contact_number;
		}
		//$q = array_keys($v,min($v));
		asort($v);
		//print_r($v); 
		$l = array_keys($v);
		$v[$l[0]]; 
		
		//$l = arsort($v);
		//print_r($l); exit;
		//echo min($v);
		//$company = $q[0];
		 $company = $c[$l[0]];
		for($i=0;$i<count($l);$i++)
		{
			$data[] = array('company_name'=> $c[$l[$i]] ,'phone_number'=> $n[$l[$i]] ,'mintotal'=>$v[$l[$i]]);
		}
		//$data[] = array('company_name'=> $c[$l[0]] ,'phone_number'=> $n[$l[0]] ,'mintotal'=>$v[$l[0]]);
		echo json_encode($data);
		//print_r($data);
		
		exit;
	}
	
	public function check_purveyordata()
	{
	
	    $cat_id =  $_POST['cat_id'];
	
	    
		for($i=0; $i<count($_POST['purv_chk']); $i++)
		{
		  $company_id = $_POST['purv_chk'][$i];
		  $data[] = $this->grocery_model->get_ajax_pricevalue($company_id,$cat_id);
		}
		
		//$data['price'] = $this->grocery_model->get_ajax_pricevalue($_POST);
		//echo json_encode($data['price']);
		echo json_encode($data);
		/*foreach($data as $re) {
		  $t_min[] = $re->total;
		 }
		$min =  min($t_min);
		echo $min;*/
	}
	
	public function pdfgenerate()
	{
	  
	   $purv_id = explode(",",$_POST['s']);
	 // print_r($purv_id); exit;
		for($i=0; $i<count($purv_id); $i++)
		 { 
		  
		 // echo $purv_id[$i];
		
		 }
		 
	  // echo "<pre>"; print_r($purv_id);
		//exit;
		 // $this->grocery_model->syncdata_get_all();
		$j=0; 
		for($i=0;$i<count($_POST['pricecount']);$i++)
		{
		   
			if($_POST['pricecount'][$i])
			{ 
				$order = $_POST['order'][$i]." ";
				$item = $_POST['grocery_item'][$i]." ";
				//$company =  $_POST['company'][$i]." ";
				$company =  @$purv_id[$j]; 
				$price = $_POST['price'][$i]." ";
				$grocery_id = $_POST['grocery_id'][$i];
				$data['company_name'] = $this->grocery_model->get_company_name($company);
				//echo "<pre>"; print_r($data['company_name']);
				$data['order'] = $order;
				$data['syncpdf'] = $this->grocery_model->pdfsyncdata($company,$grocery_id);
				//echo "<pre>"; print_r($data['syncpdf']);
				$this->pdfview($data); 
				//$db_data[] = array('item' => $item, 'order' => $order,'price' => $price,'company'=> $company,'grocery_id' => $grocery_id );
				$j = $j+1;
			}
			
			
		}
		//echo "<pre>";print_r($data['syncpdf']);	
		//exit;
	}
	
	public function pdfview($data='')
	{
	//echo "<pre>"; echo $data['order']; print_r($data['order']); exit;
	    $file_name = $data['company_name']->company_name;
		$this->load->library('html2pdf');
	    
	   
	    $this->html2pdf->folder('./assets/pdf/');
	    
	   
	    $this->html2pdf->filename("$file_name.pdf");
	    
	  
	    $this->html2pdf->paper('a4', 'portrait');
	   
		//$data['syncpdf'] = $data['syncpdf'];
	   /* $data = array(
	    	'title' => $data['company_name']->company_name
	    	
	    );*/
	    
	    //Load html view
	    $this->html2pdf->html($this->load->view('pdf', $data, true));
	    
	     $this->html2pdf->create('save');
	   
		
	}
	
	
	public function checked_in()
	{
	  $logged_in =	$this->session->userdata('logged_in');
	  if($logged_in == FALSE){
	   redirect('../login');
	  }
	}
	
	function hello_world()
	{
		     //Load the library
	    $this->load->library('html2pdf');
	    
	    //Set folder to save PDF to
	    $this->html2pdf->folder('./assets/pdf/');
	    
	    //Set the filename to save/download as
	    $this->html2pdf->filename('test.pdf');
	    
	    //Set the paper defaults
	    $this->html2pdf->paper('a4', 'portrait');
	    
	    $data = array(
	    	'title' => 'PDF Created',
	    	'message' => 'Hello World!'
	    );
	    
	    //Load html view
	    $this->html2pdf->html($this->load->view('pdf', $data, true));
	    
	    if($this->html2pdf->create('save')) {
	    	//PDF was successfully saved or downloaded
	    	echo 'PDF saved';
	    }

	}
	
	function test()
	{
		 $this->load->library('cezpdf');

		$db_data[] = array('item' => 'Avocado Hass Fresh ', 'order' => '1');
		$db_data[] = array('item' => 'Strawberry Fresh', 'order' => '0.4');
		$db_data[] = array('item' => 'Lemon Choice 140 Count Size Fresh','order' => '14');
		
		$col_names = array(
			'item' => 'Item',
			'order' => 'Order'
			
		);
		$this->cezpdf->ezText("Sysco", 10);
		$this->cezpdf->ezTable($db_data, $col_names, 'Order List', array('width'=>550));
		$this->cezpdf->ezStream(array('Content-Disposition'=>'just_random_filename.pdf'));
	}
	
	public function mail_pdf()
    {
		//Load the library
	    $this->load->library('html2pdf');
	    
	    $this->html2pdf->folder('./assets/pdfs/');
	    $this->html2pdf->filename('email_test.pdf');
	    $this->html2pdf->paper('a4', 'portrait');
	    
	    $data = array(
	    	'title' => 'PDF Created',
	    	'message' => 'Hello World!'
	    );
	    //Load html view
	    $this->html2pdf->html($this->load->view('pdf', $data, true));
	    
	    //Check that the PDF was created before we send it
	    if($path = $this->html2pdf->create('save')) {
	    	
			$this->load->library('email');

			$this->email->from('your@example.com', 'Your Name');
			$this->email->to('someone@example.com'); 
			
			$this->email->subject('Email PDF Test');
			$this->email->message('Testing the email a freshly created PDF');	

			$this->email->attach($path);

			$this->email->send();
			
			echo $this->email->print_debugger();
						
	    }
	    
    } 
	
		
}

