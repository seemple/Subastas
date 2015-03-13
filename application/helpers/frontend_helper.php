<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    function get_string($table,$where=NULL,$equal=NULL,$order=NULL,$cantidad=NULL,$offset=NULL)
    {
        $CI =& get_instance();
		$CI->load->model('Frontend_model');
		$result = $CI->Frontend_model->select($table,$where,$equal,$order,$cantidad,$offset);
		return $result;
    }
	
	function get_socio($id)
    {
		if (isset($id)) {
			$where = array ("id"=>$id);
			$CI =& get_instance();
			$CI->load->model('Frontend_model');
			$data = $CI->Frontend_model->select("usuarios",$where);
			return $data;
		}
    }
	
	function get_imagen($item_id)
    {
		if ( isset($item_id)) {
			$equal = array ("item_id"=>$item_id);
			$CI =& get_instance();
			$CI->load->model('Frontend_model');
			$img = $CI->Frontend_model->selEventos("albumes",$equal);
			return $img;
		}
    }
	
	
	function get_galeria($item_id)
    {
		if ( isset($item_id)) {
			$equal = array ("item_id"=>$item_id);
			$CI =& get_instance();
			$CI->load->model('Frontend_model');
			$album = $CI->Frontend_model->select("albumes",NULL,$equal);
			if (!empty($album)) {
				$idAlbum = $album[0]["id"];
				$where = array ("fotosalbum.idAlbum"=>$idAlbum);
				$order = array ("fotosalbum.orden"=>"ASC");
				$imgs = $CI->Frontend_model->selFotosEventos("fotosalbum",$where,$order);
				return $imgs;
			}
		}
    }

	
	function getMap($data) {
	
		if (isset($data)) {
		
		$address = str_replace(" ", "+", $data);
		$resultado = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&sensor=true');
		$resultado = json_decode($resultado, TRUE);
		$lat = $resultado['results'][0]['geometry']['location']['lat'];
		$lng = $resultado['results'][0]['geometry']['location']['lng'];
		$map["lat"] =$lat;
		$map["lng"] =$lng;
		return $map;
		
		}
		

	}	