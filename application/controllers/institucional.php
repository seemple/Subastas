<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Institucional extends CI_Controller {

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
		
		//////////////////// Libreria para levantar Sidebar ////////////////////
		$this->load->library('sidebar',array(
				"contacto"=>NULL,
				"categorias"=>$this->config->item('categorias'),
				"novedades"=>$this->config->item('novedades')
		));

	}
	
	public function index($cual=NULL)
	{
				
			$meta = array(
							"titulo"=>"Corporacion de Rematadores y Corredores Inmobiliarios",
							"section_title" =>"Fundada el 25 de Julio de 1931",
							"description"=>"La Corporaci&oacute;n de Rematadores y Corredores Inmobiliarios fue fundada el 25 de Julio de 1931. Tiene su sede en la calle Tte. Gral. Juan Domingo Per&oacute;n 1233 de la Ciudad Aut&oacute;noma de Buenos Aires, donde se llevan a cabo toda clase de remates, judiciales, oficiales y particulares.",
							"url"=>"institucional",
							"imagen"=>"fb/logo.jpg"
			);
							
			$content = array(
							"info"=>"Aca debe in un recordset con info dinamica",
							"buscador"=>"aqui podemos guardar la vista de los buscadores y usarla"
							);
			// Contenido de la columna derecha
			$sidebar["content"] = $this->sidebar->main();
			
			// Renderizo la vista
			$this->layout->frontend($cual,$content,$meta,$sidebar);				

	}
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */