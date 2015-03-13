<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Novedades extends CI_Controller {

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
		$this->load->library('pagination');
		$this->load->library('Layout');
		$this->config->load("sidebar");
		$this->load->library('sidebar',array(
				"contacto"=>NULL,
				"categorias"=>$this->config->item('categorias'),
				"novedades"=>$this->config->item('novedades')
		));

	}
	
	public function index($seccion)
	{
				
			$cantidad = 12;
			// Seteo el Offset
			$offset = $this->uri->segment(2);
			$equal = array ("seccion"=>$seccion);
			$order = array ("created_at"=>"DESC","title"=>"ASC");
			$data = $this->Frontend_model ->select("articles",$equal,NULL,$order,$cantidad,$offset);
			$total = count($this->Frontend_model ->select("articles",$equal,NULL,$order));
			
			// PAGINADOR
			$config['base_url'] = base_url($this->uri->segment(1));
			$config['uri_segment'] = 2;
			$config['full_tag_open'] = "<ul>";
			$config['full_tag_close'] = '</ul>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['next_tag_open'] = "<li>";
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = "<li>";
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='active'><a>";
			$config['cur_tag_close'] = '</a></li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['total_rows'] = $total;
			$config['per_page'] = $cantidad;
			$config['num_links'] = 3;
			$this->pagination->initialize($config);
			$paginador = $this->pagination->create_links();

			$novedades = $this->load->view('modules/novedades',array("data"=>$data),true);

			$meta = array(
							"titulo"=>"Novedades en CRCI",
							"section_title" =>"Novedades",
							"description"=>"Novedades del sector, Articulos relacionados y Capacitacion de la CRCI.",
							"url"=>"novedades",
							"imagen"=>"fb/logo.jpg"
							);
							
			$content = array(
							"novedades"=>$novedades,
							"paginador"=>$paginador
							);
			
			$sidebar["content"] = $this->sidebar->main();
			// Renderizo la vista
			$this->layout->frontend("novedades",$content,$meta,$sidebar);				

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */