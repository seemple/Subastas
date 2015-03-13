<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access extends CI_Controller {

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
											"novedades"=>NULL
											));

	}
	
	public function index()
	{
				
			if ($this->ion_auth->logged_in())
			{
					//redirect them to the login page
					redirect('backend/item/listar', 'refresh');
			}

			// Contenido de los tags meta
			$content = array(
							"titulo"=>"LOGIN - Panel de administracion",
							"description"=>"Panel de administracion de contenidos.",
							"cliente"=>"Alberto Bieule Propiedades"
							);
			
			
			// Renderizo la vista
			$this->load->view("backend/login",array("content"=>$content));				

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/access.php */