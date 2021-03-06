<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class My_model extends CI_Model
	{
		// them users
		function create($data = array())
		{
			if($this->db->insert($this->table, $data))
				return true;
			else
				return false;
		}

		// list users
		function getAll()
		{
			$query = $this->db->get($this->table);
			return $query->result_array();
		}

		// check exists
		public function getByField($field, $value, $id='')
		{
			$this->db->select('*')
					->from($this->table)
					->where($field, $value);
			if (!empty($id)) {
				$this->db->where('id != '.$id);
			}
			$query =$this->db->get();
			return $query->result_array();
		}

		// delete
		public function delete($id)
		{
			if(!$id) {
				return false;
			}
			if(is_numeric($id)) {
				$this->db->where("id", $id)
						 ->delete($this->table);
			}
		}
	}
?>