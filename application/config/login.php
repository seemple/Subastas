<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$CI =& get_instance();

////////////////////// LOGIN /////////////////////
$CI->load->library('Ion_auth');
$config["boton"] = $CI->ion_auth->bt_status();		
