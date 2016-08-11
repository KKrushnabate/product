<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Helper_model extends CI_Model {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
	}

	public function insert($tableName,$data)
	{
		return $this->db->insert($tableName, $data);
	}

	public function insertid($tableName,$data)
	{
		 $this->db->insert($tableName, $data);
		 $insert_id = $this->db->insert_id();
		 return $insert_id;
	}

	public function update($tableName,$data,$columnName,$value)
	{
		$this->db->where($columnName, $value);
		return $this->db->update($tableName, $data);
	}

	public function select($select,$tableName,$columnName,$value)
	{
		$this->db->select($select);
		$this->db->from($tableName);
		$this->db->where($columnName, $value);
		$query = $this->db->get();
		return $query->result();
	}

	public function selectrow($select,$tableName,$where)
	{
		$this->db->select($select);
		$this->db->from($tableName);
		$this->db->where($where);
		//echo $this->db->_compile_select();
		$query = $this->db->get();
		return $query->row();
	}

	public function selectGroupId($select,$tableName,$where)
	{
		$this->db->select($select);
		$this->db->from($tableName);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->row();
	}

	public function selectAll($select,$tableName)
	{
		$this->db->select($select);
		$this->db->from($tableName);
		$query = $this->db->get();
		return $query->result();
	}

	public function selectQuery($query)
	{
		$this->db->select($select);
		$this->db->from($tableName);
		$query = $this->db->get();
		return $query->result();
	}

	public function delete($tableName,$columnName,$value)
	{
		$this->db->where($columnName, $value);
   		return $this->db->delete($tableName); 
	}



	public function showDate($originalDate){
		$newDate = date("d-m-Y", strtotime($originalDate));
		return $newDate;
	}

	public function dbDate($originalDate){
		$newDate = date("Y-m-d", strtotime($originalDate));
		return $newDate;
	}
}
