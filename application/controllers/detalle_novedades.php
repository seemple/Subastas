<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detalle_novedades extends CI_Controller {

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
				"novedades"=>$this->config->item('novedades')
		));
	}
	
	public function index($cual)
	{

			// Item seleccionado
			$equal = array ("id"=>$cual);
			$order = array ("created_at"=>"DESC");
			$data = $this->Frontend_model->select("articles",NULL,$equal,$order);

			if ($data[0]["photo"]!="") {
				/*$embed="http://i.embed.ly/1/display/crop?height=200&width=200&url=";
				$url= site_url()."fotos/articulos/".$data[0]["photo"];
				$key = "&key=cf8715223238467fb3d6c7b4638f4e61";
				$res = $embed.$url.$key;*/
				$res = site_url()."fotos/articulos/thumb_".$data[0]["photo"];
			} else {
				$res = site_url()."fb/logo.jpg";
			}
			
			$meta = array(
							"titulo"=>$data[0]["title"],
							"section_title" =>"Novedades",
							"description"=>$data[0]["deck"],
							"url"=>"ampliar",
							"imagen"=>$res
							);
							
			$sidebar["content"] = $this->sidebar->main();

			// Renderizo la vista
			$this->layout->frontend("ficha-novedades",$data,$meta,$sidebar);				

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */