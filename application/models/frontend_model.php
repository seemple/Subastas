<?php

if(!class_exists('CI_Model')) { class CI_Model extends Model {} }

class Frontend_model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function selCountCategory($categoria) {

		$this->db->select("count(item.sub) as cantidad , subcategorias.nombre, subcategorias.id");
	  	$this->db->join('subcategorias', 'item.sub = subcategorias.id',"left");
	  	$this->db->order_by("subcategorias.nombre","ASC");	  	
		$this->db->where("categoria",$categoria);
		$this->db->group_by("subcategorias.nombre");
        $cnquery = $this->db->get("item");

		$rs = array();
			
		foreach  ( $cnquery->result_array() as $row => $value) {
		
				$rs[$row] = $value;
		}
	
		$cnquery->free_result();
		return $rs;

	}
	
	function selFotosEventos($table,$where=NULL,$order=NULL) {

		$this->db->select("fotosalbum.id as id, fotosalbum.nombre as nombre, fotosalbum.idAlbum as idAlbum, fotosalbum.caption as caption, A.nombre as album, A.descrip");
	  	$this->db->join('albumes as A', 'fotosalbum.idAlbum = A.id');

        if (isset($where)) {
			$this->db->where($where);
		}
        
        if (isset($order)) {
		
        	foreach ($order as $key => $value) {
        		$this->db->order_by($key, $value);
			}
            
        }

        
        $cnquery = $this->db->get($table);

		$rs = array();
			
		foreach  ( $cnquery->result_array() as $row => $value) {
		
				$rs[$row] = $value;
		}
	
		$cnquery->free_result();
		return $rs;

	}
	
	function selEventos($table,$where=NULL,$order=NULL,$cantidad=NULL,$offset=NULL) {

		$this->db->select("albumes.nombre as nombre, albumes.descrip as descrip, albumes.fecha as fecha, albumes.id as id, A.nombre AS imagen");
	  	$this->db->join('(select * from fotosalbum order by orden ASC) as A', 'A.idAlbum = albumes.id',"left");
	  	$this->db->order_by("albumes.fecha","DESC");
	  	$this->db->group_by("albumes.id");
		
        if (isset($where)) {
			$this->db->where($where);
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


	function getRemates() {
		
			$where = array ("tipo"=>"Remate");
			$order = array ("fecha"=>"DESC");
			$cantidad = 4;
			$result = $this->select("item",$where,NULL,$order,$cantidad);
			return $result;
	
	}
	
	function select($table,$where=NULL,$equal=NULL,$order=NULL,$cantidad=NULL,$offset=NULL) {

		$this->db->select();
		
		
        if (isset($where)) {
        	foreach ($where as $key => $value) {
				$this->db->or_like($key,$value);
			}
		}

        if (isset($equal)) {
        	foreach ($equal as $key => $value) {
				if ($value!="") {
				$this->db->where($key,$value);
				}
			}
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
	
	function select_letra($table,$where=NULL,$equal=NULL,$order=NULL,$cantidad=NULL,$offset=NULL) {

		$this->db->select();
		
		
        if (isset($where)) {
        	foreach ($where as $key => $value) {
				$this->db->where($key,$value);
			}
		}

        if (isset($equal)) {
        	foreach ($equal as $key => $value) {
				if ($value!="") {
				$this->db->or_like($key,$value,"after");
				}
			}
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