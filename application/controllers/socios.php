<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Socios extends CI_Controller {

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
		$this->load->library('pagination');
		$this->config->load("sidebar");
		$this->load->library('sidebar',array(
				"contacto"=>NULL,
				"categorias"=>$this->config->item('categorias'),
				"novedades"=>$this->config->item('novedades')
		));
	}
	
	public function index($letra=NULL,$offset=NULL)
	{
				
			$cantidad = 30;
			if (!isset($offset)) $offset = $this->uri->segment(2);
			
			if (isset($letra)) {
				if (is_numeric($letra)) $letra = NULL;
			}
			
			if (empty($letra)) {
				$where = array ("group_id"=>"2");
				$order = array ("apellido"=>"ASC");
				$usuarios = $this->Frontend_model ->select("usuarios",$where,NULL,$order,$cantidad,$offset);
				$total = count($this->Frontend_model ->select("usuarios",$where,NULL,$order));
				$config['base_url'] = base_url("socios");
				$config['uri_segment'] = 2;
			} else {
				$where = array ("group_id"=>"2");
				$equal = array ("apellido"=>$letra);
				$order = array ("apellido"=>"ASC");
				$usuarios = $this->Frontend_model ->select_letra("usuarios",$where,$equal,$order,$cantidad,$offset);
				$total = count($this->Frontend_model ->select_letra("usuarios",$where,$equal,$order));
				$config['base_url'] = base_url("socios/buscar/".$this->uri->segment(3));
				$config['uri_segment'] = 4;
			}
			
			// PAGINADOR
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
			
			
			$meta = array(
							"titulo"=>"Socios en CRCI",
							"section_title" =>"Socios",
							"description"=>"La Corporaci&oacute;n de Rematadores y Corredores Inmobiliarios fue fundada el 25 de Julio de 1931. Tiene su sede en la calle Tte. Gral. Juan Domingo Per&oacute;n 1233 de la Ciudad Aut&oacute;noma de Buenos Aires, donde se llevan a cabo toda clase de remates, judiciales, oficiales y particulares.",
							"url"=>"socios",
							"imagen"=>"fb/logo.jpg"
							);

				
			$content = array(
							"paginador"=>$paginador,
							"usuarios" => $usuarios
							);
			
			$sidebar["content"] = $this->sidebar->main();
			
			
			// Renderizo la vista
			$this->layout->frontend("listado-martilleros",$content,$meta,$sidebar);				

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */