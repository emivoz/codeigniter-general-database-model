<?php
 
class General_model extends CI_Model {

  
  function __construct() 
  {
    /* Call the Model constructor */
    parent::__construct();
  }


	function get_last_item($table_name)
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get($table_name, 1);

		return $query->result();
	}


	function insert_item($table_name,$data)
	{
		$this->db->insert($table_name, $data);
	}

	function remove_item($table_name, $itemid)
	{
		$this->db->delete($table_name, $itemid);
	}


	function get_item($table_name, $id) {
		$this->db->select('*');
		$this->db->where('id', $id);				
		$query = $this->db->get($table_name);
		return $query->row_array();

	}	
  
  	function get_item_where($table_name, $where) {
		$this->db->select('*');
		foreach ($where as $key=> $value)
			{
				$this->db->where($key, $value);				
			}
		$query = $this->db->get($table_name);
		return $query->row_array();
	}	
	
	function get_items_where($table_name, $where) {
		$this->db->select('*');
		foreach ($where as $key=> $value)
			{
				$this->db->where($key, $value);				
			}
		$query = $this->db->get($table_name);
		return $query->result_array();
	}	
	
	function update_item($table_name, $id, $data) {
		$this->db->where('id', $id);
		$this->db->update($table_name, $data); 
	}	

	function get_row_count()
	{
		return $this->db->count_all($this->table);
	}

}