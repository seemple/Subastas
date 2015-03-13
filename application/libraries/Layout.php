<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

ini_set('display_errors', 1);
error_reporting(E_ALL);


class Layout {

    public function __construct()
    {

		$this->CI =& get_instance();

    }
	
    
    public function section($section,$content) {
    
		$template = $this->CI->load->view("backend/_header",NULL,true);
		$template .= $this->CI->load->view("backend/_menu",NULL,true);
		$template .= $this->CI->load->view("backend/_open",NULL,true);
		$template .= $this->CI->load->view("backend/_sidebar",NULL,true);
		$template .= $this->CI->load->view("backend/".$section,array("data"=>$content),true);
		$template .= $this->CI->load->view("backend/_close",NULL,true);
	
		/// Renderizo la seccion
		$this->CI->load->view("backend/_layout",array("template"=>$template));

    }


    public function frontend($section,$content,$meta,$sidebar=NULL) {
    
		$template = $this->CI->load->view("frontend/includes/header",array("data"=>$meta),true);
		$template .= $this->CI->load->view("frontend/includes/menu",NULL,true);
		if ($section=="home") $template .= $this->CI->load->view("frontend/includes/head-home",NULL,true);
		$template .= $this->CI->load->view("frontend/includes/open",array("url"=>$meta["url"]),true);
		$template .= $this->CI->load->view("frontend/".$section,array("data"=>$content),true);
		if (isset($sidebar)) $template .= $this->CI->load->view("frontend/includes/left-sidebar",array("data"=>$sidebar),true);
		$template .= $this->CI->load->view("frontend/includes/close",NULL,true);
		
		$remates = $this->CI->config->item('remates');
		$template .= $this->CI->load->view("frontend/includes/footer",array("data"=>$remates),true);
		$template .= $this->CI->load->view("frontend/includes/scripts",NULL,true);
		
		/// Renderizo la seccion
		$this->CI->load->view("frontend/_layout",array("template"=>$template));

    }


 }
