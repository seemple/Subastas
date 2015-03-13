<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$CI =& get_instance();
$CI->load->helper('url');
$CI->load->helper('file');
$CI->load->Model('Frontend_model');

//////////////////// GRAL DATA ////////////////////
		
// keywords
$string = read_file('seo/seo.json');
$data = json_decode($string,true);
// Result
$config["meta"] = $data;

//FOOTER
// Ultimos Remates publicadas
$where = array(
	"tipo" => "Remate"
);
$order = array ("fecha"=>"DESC");
$cantidad = 3;
$config["remates"] = $CI->Frontend_model->select("item",$where,NULL,$order,$cantidad);

// Ultimos Remates publicadas
$equal = array(
	"tipo !=" => "Remate"
);
$order = array ("fecha"=>"DESC");
$cantidad = 3;
$config["clasificados"] = $CI->Frontend_model->select("item",NULL,$equal,$order,$cantidad);

