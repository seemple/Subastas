<?php

if(!class_exists('CI_Model')) { class CI_Model extends Model {} }

class Backend_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	

	function select($table,$where=NULL,$equal=NULL,$order=NULL,$cantidad=NULL,$offset=NULL) {

		$this->db->select();
		
        if (isset($where)) {
			$this->db->or_like($where);
		}

        if (isset($equal)) {
			$this->db->where($equal);
		}

        
        if (isset($order)) {
		
        	foreach ($order as $key => $value) {
        		$this->db->order_by($key, $value);
			}
            
        }
		
		if (empty ($offset)) {
			$offset = 0;
		}
		
		if (isset($cantidad)) {
			$this->db->limit($cantidad,$offset);
		}
		
		
        $cnquery = $this->db->get($table);

		$rs = array();
			
		foreach  ( $cnquery->result_array() as $row => $value) {
		
				$rs[$row] = $value;
		}
	
		$cnquery->free_result();
		return $rs;

	}
	

	
}