<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacto extends CI_Controller {

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
											"buscador"=>$this->config->item('c_buscador'),
											"oportunidades"=>$this->config->item('destacadas'),
											"novedades"=>$this->config->item('noticias'),
											"sociales"=>NULL,
		));
	}
	
	public function index()
	{
				
			$meta = array(
							"titulo"=>"Contactese con Alberto Bieule",
							"section_title" =>"Contacto",
							"description"=>"Complete el siguiente formulario para ponerse en contacto nosotros.",
							"url"=>"contacto",
							"imagen"=>"fb/logo.jpg"
							);
							
			$content = array();
			
			// Renderizo la vista
			$this->layout->frontend("contacto",NULL,$meta,NULL);				

	}
	
	public function clasificado() {
		$msj = $this->input->post("datos");
		$titulo = "Contacto web - ".$msj["clasificado"];
		$this->enviar($titulo);
		
	}
	
	public function enviar($subject=NULL)
	{
			
			if (empty($subject)) $subject = "Web - Contacto";
			
			$this->load->library('Mailing');
			
			$meta = array(
							"titulo"=>"Contactese con nosotros!",
							"section_title" =>"Contacto",
							"description"=>"Complete el siguiente formulario para ponerse en contacto con nosotros.",
							"url"=>"contacto",
							"imagen"=>"fb/logo.jpg"
							);
							
			$msj = $this->input->post("datos");
			$str = "Datos del contacto:<br>";
			
			foreach ($msj as $item=>$value) {
			
			$str .= $item.": ".$value."<br>";
			
			}
			
			if ( $this->mailing->enviar("martin@seemple.com.ar",$str,$subject)) {

			$content = array(
							"titulo"=>"Contacto",
							"mensaje"=>"<p>Su contacto se ha enviado correctamente. A la brevedad nos comunicaremos con usted.</p><p>Muchas Gracias!</p>"
							);
			
			} else {
			
			$content = array(
							"titulo"=>"Contacto",
							"mensaje"=>"<p>Ha ocurrido un error al enviar su mensaje. Intentelo nuevamente o comun&iacute;quese con nosotros telef&oacute;nicamente..</p><p>Muchas Gracias!</p>"
							);
			}
			
			
			// Contenido de la columna derecha
			$sidebar["content"] = $this->sidebar->main();
			
			// Renderizo la vista
			$this->layout->frontend("confirmacion",$content,$meta,$sidebar);				

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */