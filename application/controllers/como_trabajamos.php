<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Como_trabajamos extends CI_Controller {

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
		$this->load->helper('form');
		$this->load->Helper('Frontend');
		$this->config->load("sidebar");
		
		//////////////////// Libreria para levantar Sidebar ////////////////////
		$this->load->library('sidebar',array(
											"contacto"=>NULL,
											"oportunidades"=>$this->config->item('destacadas'),
											"novedades"=>$this->config->item('noticias'),
											"sociales"=>NULL,
											));

	}
	
	public function index()
	{
			// Data para buscadores
			$order = array ("nombre"=>"ASC");
			$categorias = $this->Frontend_model ->select("categorias",NULL,NULL,$order);
			
			$today = date("Y-m-d");
			$equal = array(
					"fecha >=" => $today,
					"tipo" => "Remate"
			
			);
			
			$order = array ("fecha"=>"ASC");
			$remates = $this->Frontend_model ->select("item",NULL,$equal,$order);
			
			
			$equal = array(
				"tipo !=" => "Remate"
			);
			
		
			
			// Contenido de los tags meta
			$meta = array(
							"titulo"=>"Como Trabajamos",
							"section_title" =>"INICIO",
							"description"=>"La firma Alberto Bieule cuenta con 65 a&ntilde;os de experiencia en el mercado inmobiliario. En el a&ntilde;o 1950 abre sus oficinas en la calle San Mart&iacute;n 987, Capital Federal y comienza con la administraci&oacute;n de edificios en propiedad horizontal, ademas de su actividad inmobiliaria.",
							"url"=>"error",
							"imagen"=>"fb/logo.jpg"
			);


			// Contenido de la columna derecha
			$sidebar["content"] = $this->sidebar->main();
			$content = array();
			// Renderizo la vista
			$this->layout->frontend("como_trabajamos",NULL,$meta,$sidebar);				

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */