<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ubicacion extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->model('Frontend_model');
		$this->load->library('Layout');
		$this->config->load("sidebar");
		$this->load->library('sidebar',array(
				"contacto"=>NULL,
				"categorias"=>$this->config->item('categorias'),
				"novedades"=>NULL
		));
	}
	
	public function index()
	{
				
			$meta = array(
							"titulo"=>"Donde estamos?",
							"section_title" =>"Ubicacion",
							"description"=>"Sepa como llegar a la CRCI.",
							"url"=>"contacto",
							"imagen"=>"fb/logo.jpg"
							);
							
			$content = array(
							"info"=>"Aca debe in un recordset con info dinamica",
							"buscador"=>"aqui podemos guardar la vista de los buscadores y usarla"
							);
			
			$sidebar["content"] = $this->sidebar->main();
			// Renderizo la vista
			$this->layout->frontend("ubicacion",$content,$meta,$sidebar);				

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */