<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscar extends CI_Controller {

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
		$this->load->library('pagination');
		$this->load->library('sidebar',array(
											"contacto"=>NULL,
											"buscador"=>$this->config->item('c_buscador'),
											"oportunidades"=>$this->config->item('destacadas'),
											"novedades"=>$this->config->item('noticias'),
											"sociales"=>NULL,
		));

	}
	
	public function index($cual)
	{
			

			$equal = $this->input->post("datos");


			if ($cual =="remates") {
				$equal["tipo"] = "Remate";
			};
			
			$cantidad = 16;
			// Seteo el Offset
			$offset = $this->uri->segment(3);
			$where = NULL;
			//$equal = NULL;
			
			$order = array ("fecha"=>"DESC","tipo"=>"ASC");
			$data = $this->Frontend_model->select("item",$where,$equal,$order,$cantidad,$offset);
			$total = count($this->Frontend_model->select("item",$where,$equal,$order));

			// PAGINADOR
			$config['base_url'] = base_url("clasificados");
			$config['uri_segment'] = 3;
			$config['full_tag_open'] = "<ul class='pagination'>";
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
							"titulo"=>"Buscador de Operaciones",
							"section_title" =>"Buscador",
							"description"=>"Consulte cuales son los ultimos remates u otras operaciones disponibles.",
							"url"=>"buscar",
							"imagen"=>"fb/logo.jpg"
							);
							
			$content = array(
							"clasificados"=>$data,
							"total"=>$total,
							"actual"=>($offset+count($data)),
							"paginador" =>$paginador
							);
			
			$sidebar["content"] = $this->sidebar->main();
			
			// Renderizo la vista
			$this->layout->frontend("listado",$content,$meta,$sidebar);				

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */