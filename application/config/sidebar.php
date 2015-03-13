<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$CI =& get_instance();
$CI->load->helper('url');
$CI->load->library('parser');
$CI->load->model('Frontend_model');

//////////////////// SIDEBAR DATA ////////////////////

// Data para buscador
$order = array ("nombre"=>"ASC");
$config["c_buscador"] = $CI->Frontend_model->select("categorias",NULL,NULL,$order);


// Propiedades destacadas
$order=array("id"=>"DESC");
$where = array ("destacado"=>"1");
$cantidad = 5;
$destacadas = $CI->Frontend_model ->select("item",null,$where,$order,$cantidad);
$config["destacadas"] = $destacadas;

// RSS de noticias
$info = file_get_contents('http://contenidos.lanacion.com.ar/herramientas/rss/categoria_id=1363');
$result = $CI->parser->xml2array($info);
$data = $result['feed']["entry"];


for ($i=0; $i<5; $i++) {
 	   		$feed[$i]["titulo"] = $data[$i]['title']["value"];
 	   		$feed[$i]["link"] = $data[$i]['link']["attr"]["href"];
 	   		$feed[$i]["fecha"] = $data[$i]['updated']["value"];
			if (!empty($data[$i]['content']["div"]["value"])) $feed[$i]["copete"] = $data[$i]['content']["div"]["value"];
}

$config["noticias"] = $feed;

