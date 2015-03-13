<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sitemap extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->helper('Frontend');
		$this->load->model('Frontend_model');
	}

	public function index()
	{
	
	$equal = array ("tipo"=>"Remate");
	$order = array ("fecha"=>"DESC","tipo"=>"ASC");
	$remates = $this->Frontend_model->select("item",NULL,$equal,$order);

	$equal = array ("tipo !="=>"Remate");
	$clasificados = $this->Frontend_model->select("item",NULL,$equal,$order);


	$data = array (
		"remates" => $remates,
		"clasificados" => $clasificados
	);
	
	$this->load->view('sitemap',$data); //llamada a la vista general	
	
	}

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */