<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Sidebar {

    public function __construct($params=NULL)
    {

		$CI =& get_instance();
		$this->_vistas = array();
	
		if (!empty($params)) {
			foreach ($params as $item=>$value) {
				$data = array($item=>$value);
				$this->_vistas[$item]= $CI->load->view("frontend/sidebar/".$item,$data,true);				
			}
		}
				
	}

	public function main() {
		$CI =& get_instance();
		$sidebar = $CI->load->view('frontend/sidebar',array("vistas"=>$this->_vistas),true);
		return $sidebar;
	}
    
    
}

/* End of file sidebar.php */