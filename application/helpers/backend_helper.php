<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    function get_string($table,$where=NULL,$equal=NULL,$order=NULL,$cantidad=NULL,$offset=NULL)
    {
        $CI =& get_instance();
		$CI->load->model('Backend_model');
		$result = $CI->Backend_model->select($table,$where,$equal,$order,$cantidad,$offset);
		return $result;
    }
	
	function create_code() {
        $CI =& get_instance();
		$CI->load->helper('string');
		$CI->load->helper('text');
		$code = "BIEULE".random_string('numeric', 4);
		return $code;
	}
	