<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

ini_set('display_errors', 1);
error_reporting(E_ALL);


class Mailing {

    public function __construct()
    {

		$this->CI =& get_instance();
		$this->CI->load->library('email');
		$config["mailtype"]="html"; 
		$this->CI->email->initialize($config);
		$this->CI->config->load('mailing');
    }
	
    
    public function enviar($to,$body,$subject,$attach=NULL) {
    
    		$this->CI->email->from($this->CI->config->item('from'), $this->CI->config->item('fromstr'));
			$this->CI->email->to($to); 
			
			if ( isset($attach)) {
			$this->CI->email->attach($attach);
			}
			
			$this->CI->email->subject($subject);			
			$this->CI->email->message($body);
			if ( $this->CI->email->send()) return true;
            
    }
    
 }
