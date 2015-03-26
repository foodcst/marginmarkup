<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testkitchen_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
	
	public function all_category()
	{
		$this->db->select('*');
		$this->db->from('category');
		$query = $this->db->get('');
		$row = $query->result();
		return $row;
	}
	
	public function insert_category($cat_name)
	{
		$data = array(
		        'cat_name' =>  $cat_name
		       );
		if($cat_name !='') {	   
		$this->db->insert('category',$data);
		}	   
	}
	
	public function update_category($cat_id,$cat_name)
	{
		$data = array(
		        'cat_name' =>  $cat_name
		       );
		$this->db->where('cat_id',$cat_id);	   
		$this->db->update('category',$data);
		
	}
	
	public function menucategory_all()
	{
	  $this->db->select('*');
	  $this->db->from('category');
	  $query = $this->db->get();
	  $row = $query->result();
	  return $row;
	}
	
	public function getrow_syncdata($sync_id)
	{
	  $this->db->select('*');
	  $this->db->from('sync_data');
	  $this->db->where('sync_id',$sync_id);
	  $query = $this->db->get();
	  $row = $query->result();
	 
	  return $row;
	}
	
}

