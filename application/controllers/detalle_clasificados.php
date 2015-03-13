<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detalle_clasificados extends CI_Controller {

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
		$this->load->Helper('Frontend');
		$this->load->model('Frontend_model');
		$this->load->library('Layout');
		$this->config->load("sidebar");
		$this->load->library('sidebar',array(
											"interesa"=>NULL,
											"contacto"=>NULL,
											"buscador"=>$this->config->item('c_buscador'),
											"oportunidades"=>$this->config->item('destacadas'),
											"novedades"=>$this->config->item('noticias'),
											"sociales"=>NULL,
		));
	}
	
	public function index($cual=NULL)
	{
				
			// Item seleccionado
			$equal = array ("id"=>$cual);
			$order = array ("fecha"=>"DESC","tipo"=>"ASC");
			$data = $this->Frontend_model->select("item",NULL,$equal,$order);


			// Imagen para el tag
			$imagenes = get_galeria($data[0]["id"]);
			
			/*$embed="http://i.embed.ly/1/display/crop?height=200&width=200&url=";
			$url= site_url()."fotos-galeria/thumb_".$imagenes[0]["nombre"];
			$key = "&key=cf8715223238467fb3d6c7b4638f4e61";
			*/
			$res = site_url()."fotos-galeria/thumb_".$imagenes[0]["nombre"];


			$meta = array(
							"titulo"=> ucfirst($data[0]["tipo"])." - ".$data[0]["titulo"],
							"description"=>$data[0]["descrip"],
							"section_title" =>"Clasificados",
							"url" =>"ampliar",
							"imagen"=>$res
							);
							

			$sidebar["content"] = $this->sidebar->main();
			
			// Renderizo la vista
			$this->layout->frontend("ficha",$data,$meta,$sidebar);				

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */