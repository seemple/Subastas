<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detalle_socios extends CI_Controller {

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
		$this->load->helper('Frontend');
		$this->load->model('Frontend_model');
		$this->load->library('Layout');
		$this->config->load("sidebar");
		$this->load->library('sidebar',array(
				"contacto"=>NULL,
				"categorias"=>$this->config->item('categorias'),
				"novedades"=>$this->config->item('novedades')
		));
	}
	
	public function index($cual)
	{

			// Item seleccionado
			$equal = array ("id"=>$cual);
			$user = $this->Frontend_model->select("usuarios",NULL,$equal,NULL);

			// Selecciono propiedades asociadas al socio
			$equal = array ("idSocio"=>$cual);
			$order = array ("fecha"=>"DESC","tipo"=>"ASC");
			$props = $this->Frontend_model->select("item",NULL,$equal,$order);

			$data = array ("user"=>$user,
						   "props"=>$props);

			if ($user[0]["imagen"]!="") {
				/*$embed="http://i.embed.ly/1/display/crop?height=200&width=200&url=";
				$url= site_url()."fotos/socios/".$user[0]["photo"];
				$key = "&key=cf8715223238467fb3d6c7b4638f4e61";
				$res = $embed.$url.$key;*/
				$res = site_url()."fotos/socios/thumb_".$user[0]["photo"];
			} else {
				$res = site_url()."fb/logo.jpg";
			}

						   
			$meta = array(
							"titulo"=>"Socios - ".$user[0]["nombre"]." ".$user[0]["apellido"],
							"description"=>$user[0]["descrip"],
							"section_title"=>"Socios",
							"url"=>"ampliar",
							"imagen"=>$res
							);
							
			$sidebar["content"] = $this->sidebar->main();

			// Renderizo la vista
			$this->layout->frontend("ficha-martilleros",$data,$meta);				

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */