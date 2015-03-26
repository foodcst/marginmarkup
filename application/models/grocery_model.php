<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grocery_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	public function insert_data($post ='')
	{ 
	 // echo  $this->input->post('cat_id'); exit;
		if($_POST)
		{ 
		 for($i=0;$i<count($_POST['description']);$i++)
			
			 { 
			   $data = array(
			   			'grocery_desc'          => $this->input->post('description')[$i],
						'grocery_pack'          => $this->input->post('pack')[$i],
						'grocery_size'          => $this->input->post('size')[$i],
						'grocery_purcunit'      => $this->input->post('purchaseunit')[$i],
						'grocery_um'            => $this->input->post('um')[$i],
						'grocery_ruperpu'       => $this->input->post('ruperpu')[$i], 
						'grocery_yiled'         => $this->input->post('yield')[$i],
						'group_id'  			=> $this->input->post('cat_id'),
						'reg_date'              => date('Y-m-d H:i:s')
			   			);
				$grocery_id =  $this->input->post('grocery_id')[$i]; 	
				//echo "<pre>"; print_r($data); exit;
				if($grocery_id !="") { 
				$this->db->where('grocery_id',$grocery_id);
				$this->db->update('grocery_list',$data);
				} else {
				  $this->db->insert('grocery_list',$data);
				}
				
				
				//$if_exist = $this->db->get_where('grocery_list', array('grocery_desc' => $this->input->post('description')[$i]), 1)->result();
				
				//if(!$if_exist) {
				 //$grocery_id =  $this->db->insert('grocery_list',$data);	
				//}
						
			 } 
			 /*if(@$grocery_id) {
			    $this->session->set_flashdata('success',"Your information updated succesfuly...");
			    redirect('../grocery/cat/'.$this->input->post('cat_id'));
			  }
			  else {
			   $this->session->set_flashdata('failure',"Error Occured...");
			    redirect('../grocery/cat/'.$this->input->post('cat_id'));
			  }*/
			
	   }
	  
	     echo "1"; exit;
		//return "1";
		 	 
	}
	
	public function syncdata_get_all()
	{
		for($i=0; $i < count($_POST['order']);$i++)
		{
		   echo $_POST['order'][$i]." ";
		}
		
		
		for($i=0; $i<count($_POST['check_purv']); $i++)
		{
			echo $_POST['check_purv'][$i];
			$data[] = $this->get_all_sync($_POST['check_purv'][$i]);
		}
		echo "<pre>";print_r($data);
		exit;
	}
	
	public function get_all_sync($company_id='')
	{
	  $this->db->select('*');
	  $this->db->from('sync_data');
	  $this->db->where('sync_company_id');
	  $query = $this->db->get('');
	  $row = $query->result();
	  return $row;
	}
	
	public function get_cat_wise_grocery($group_id = '')
	{
	   $this->db->select('*');
	   $this->db->from('grocery_list');
	   $this->db->where('group_id',$group_id);
	   $query = $this->db->get();
	   
	   $row = $query->result();
	  
	   return $row;
	}
	
	public function get_all()
	{
		  
	   $this->db->select('*');
	   $this->db->from('grocery_list');
	   
	   $query = $this->db->get();
	   
	   $row = $query->result();
	   //echo "<pre>"; print_r($row);exit;
	   return $row;
	} 
	
	public function get_all_grocery_purveyors()
	{
		  
	   $this->db->select('*');
	   $this->db->from('grocery_list');
	   //$this->db->join('purveyors_csv_data','purveyors_csv_data.group_id = grocery_list.group_id','right');
	   $query = $this->db->get();
	   
	  	  
	   $row = $query->result();
	   //echo "<pre>"; print_r($grocdata);exit;
	   return $row;
	} 
	
	public function getAllPurv($csv_id='')
	{
	   $this->db->select('*');
	   $this->db->from('purveyors_csv_data');
	   $this->db->where('csv_id',$csv_id);
	   $query = $this->db->get();
	   $row = $query->result();
	   return $row;
	}
	
	public function grocery_count_all()
	{
	 
	   $num_rows = $this->db->count_all_results('grocery_list');
	   return $num_rows;
	}
	
	public function grocery_last_update() 
	{
	  $this->db->where("reg_date < DATE_SUB(NOW(),INTERVAL 1 HOUR)", NULL, FALSE)
				
                ->from('grocery_list');
			$result =  	$this->db->get()->result();
		return $result;		
	   
	}
	
	public function grocery_last_update_time() 
	{
	  $this->db->where("reg_date < DATE_SUB(NOW(),INTERVAL 1 HOUR)", NULL, FALSE)
				
                ->from('grocery_list');
			$result =  	$this->db->get()->result();
		return $result;		
	   
	}
	
	
	/*public function get_all_by_company($company_id='')
	{
		  
	   $this->db->select('*');
	   $this->db->from('grocery_list');
	   $this->db->where('');
	   $query = $this->db->get();
	   
	   $row = $query->result();
	   //echo "<pre>"; print_r($row);exit;
	   return $row;
	}*/
	
	public function grocery_cat_insert($cat='')
	{
		$data['group_name'] = $cat; 

		$res = $this->db->insert('purveyors_group',$data);	
		//echo $this->db->last_query(); exit;
		if($res)
		{
			echo "1"; exit;
		}
		else
		{
			echo "0"; exit;
		}
	}

	public function grocery_cat_delete($group_id='')
	{
		$tables = array('purveyors_group', 'grocery_list');
		$this->db->where('group_id', $group_id);
		$res = $this->db->delete($tables);
		echo "1"; exit;
		
	}
	
	public function get_all_grocerylist($cat_id = '')
	{
		$this->db->select('*');
		$this->db->from('grocery_list');
		$this->db->where('group_id',$cat_id);
		
		$query = $this->db->get('');
		$row = $query->result();
		return $row;
	}
	
	public function pdfsyncdata($company='',$grocery_id ='')
	{ 
	   	$this->db->select('*');
		$this->db->from('sync_data');
		$this->db->where('sync_company_id',$company);
		//$this->db->where('sync_grocery_id',$grocery_id);
		$this->db->join('grocery_list','grocery_list.grocery_id = sync_data.sync_grocery_id');
		$query = $this->db->get('');
		
		$row = $query->result();
		return $row;
		
	}
	
	public function get_company_name($company ='')
	{
		$this->db->select('company_name');
		$this->db->from('purveyors_company_info');
		$this->db->where('company_id',$company);
		$query = $this->db->get('');
		
		$row = $query->row();
		return $row;
	}
	
	public function current_price($grocery_id = '')
	{
	    $this->db->select('*');
		$this->db->from('sync_data');
		$this->db->where('sync_grocery_id',$grocery_id);
		//$this->db->join('purveyors_csv_data','purveyors_csv_data.csv_id = sync_data.sync_csv_id');
		$query = $this->db->get('');
		$row = $query->result();
		//echo "<pre>"; print_r($row); exit;
		return $row;
	}

   public function all_current_price($grocery_id ='')
   {
   	 $this->db->select('*');
	 $this->db->from('purveyors_csv_data');
	 $this->db->where('grocery_id',$grocery_id);
	 $query = $this->db->get('');
	 $row = $query->result();
		//echo "<pre>"; print_r($row); exit;
	 return $row;
   }
   
   public function all_grocery_factor($csv_id = '')
   {
    
   	 $this->db->select('*');
	 $this->db->from('sync_data');
	 $this->db->where('sync_csv_id',$csv_id);
	 $query = $this->db->get('');
	 $row = $query->result();
	 return $row;
   }
   
   public function get_ajax_totalvalue($company_id='')
   {
   	 $this->db->select('sum(sync_price) as total,purveyors_company_info.*');
	 
	  $this->db->from('sync_data');
	  $this->db->where('sync_company_id',$company_id);
	  $this->db->join('purveyors_company_info','purveyors_company_info.company_id = sync_data.sync_company_id');
	  $query = $this->db->get('');
	  $row = $query->row();
	  return $row;
	 
   }
   
   public function get_ajax_pricevalue($company_id = '',$cat_id='')
   {
    
      $this->db->select('sum(price) as total,purveyors_company_info.*');
	 
	  $this->db->from('purveyors_csv_data');
	  $this->db->where('purveyors_csv_data.company_id',$company_id);
	  $this->db->where('group_id',$cat_id);
	  $this->db->join('purveyors_company_info','purveyors_company_info.company_id = purveyors_csv_data.company_id');
	  //$this->db->where('purveyors_company_info.company_id',$company_id);
	  $query = $this->db->get('');
	  $row = $query->row();
	  return $row;
	  
   }
   
   public function menu_syncdata_all()
   {
   		$this->db->select('*');
		$this->db->from('sync_data');
		$this->db->join('purveyors_csv_data','purveyors_csv_data.csv_id=sync_data.sync_csv_id');
		$query = $this->db->get();
		$row = $query->result();
		 return $row;
   }

}

