<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Articulos extends CI_Controller {

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
		$this->load->library('Layout');
		$this->load->model('Backend_model');
		$this->load->library('pagination');
	}
	
	public function eliminar() {
				
			if (!$this->ion_auth->logged_in())
			{
					//redirect them to the login page
					redirect('access', 'refresh');
			}

			$cual = $this->input->post("cual");
			
			if ( !isset($cual)) {
				echo "No se pudo eliminar el registro";
			}

			// Selecciono el registro
			$equal = array ("id"=>$cual);
			$data = $this->Backend_model->select("articles",NULL,$equal);
			if ( count($data)==0) {
				echo "No se pudo eliminar el registro";
			} else {
				$this->db->where('id', $cual);
				$this->db->delete("articles");
				echo "Item eliminado.";
			}
		
	}
	
	
	public function subcategorias() {
			// Query listado de subcategorias
			if ( isset($_POST["padre"])) {
				$equal = array ("idPadre"=>$this->input->post("padre"));
			}
			
			if ( isset($_POST["subcate"])) {
				$equal = array ("id"=>$this->input->post("subcate"));
			}

			$result = $this->Backend_model->select("subcategorias",NULL,$equal);
			echo json_encode($result); // Se utiliza el resultado con jquery.

	}
	
	public function listar($orderby=NULL)
	{

			if (!$this->ion_auth->logged_in())
			{
					//redirect them to the login page
					redirect('access', 'refresh');
			}

			$this->load->helper('backend');
			//Cantidad a mostrar
			$cantidad = 15;
			// Seteo el Offset
			$offset = $this->uri->segment(4);
			// Parametros
			$equal = NULL;

			if (isset($orderby)) {
				if (!is_numeric($orderby)){
					$order = array($orderby => "DESC");
				}
			}
			
			$order["created_at"] ="ASC";

			// Query listado de propiedades
			$total = count ($this->Backend_model->select("articles",NULL,$equal,$order));
			$data = $this->Backend_model->select("articles",NULL,$equal,$order,$cantidad,$offset);

			// PAGINADOR
			$config['base_url'] = base_url("backend/articulos/listar");
			$config['uri_segment'] = 4;
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

			// Renderizo la vista
			$this->layout->section("articulos_listar",array("info"=>$data,
												"titulo"=>"Listar articulos",
												"url"=>"listar",
												"paginador" =>$paginador
												));				
	}
	
	public function insertar() {
			

			if (!$this->ion_auth->logged_in())
			{
					//redirect them to the login page
					redirect('access', 'refresh');
			}

			$data = $this->input->post('datos');

			//formateo la fecha
			$date = DateTime::createFromFormat('d/m/Y', $data["created_at"]);
			$data["created_at"] = $date->format('Y-m-d');	

			$imagen = $_FILES["userfile"]["name"];
			
			// Upload Imagen
				if (!empty($imagen)) {
				
					$config['upload_path'] = './fotos/articulos';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '1000';
					
					$config['overwrite'] = false;
					$config['encrypt_name'] = true;
					$config['remove_spaces'] = true;
					$this->load->library('upload', $config);
					
					if ( !$this->upload->do_upload())
					{
							$error = array('error' => $this->upload->display_errors());
							print_r( $error);
					}
					else
					{
						
						// Si subio la imagen
						$infofile = $this->upload->data();
						$data["photo"] = $infofile["file_name"];
						$directory = "fotos/articulos/";
						
						// Hago un thumbnail
						$params = array("fileName"=>$directory.$infofile["file_name"]);
						$this->load->library('Resize',$params); 
						$this->resize->resizeImage(450, 350, "crop");
						$name = "thumb_".$infofile["file_name"];
						$this->resize->saveImage($directory."/".$name, 100); 



					}

				}

			// ADJUNTO
			$adjunto = $_FILES["adjunto"]["name"];

			if (!empty($adjunto)) {
				
				$config['upload_path'] = './descargas';
				$config['allowed_types'] = 'doc|docx|pdf';
				$config['max_size']	= '2000';
				
				$config['overwrite'] = false;
				$config['encrypt_name'] = true;
				$config['remove_spaces'] = true;
				$this->load->library('upload', $config);
				
				if ( !$this->upload->do_upload("adjunto"))
				{
					$error = array('error' => $this->upload->display_errors());
					print_r( $error);
					exit();
				}
				else
				{
					$infofile = $this->upload->data();
					$data["adjunto"] = $infofile["file_name"];
				
				}
			
			}
			
			// INSERT
				if  ($this->db->insert('articles', $data)) {
					$mensaje ="<p class='text-success'>El articulo se ha insertado correctamente.</p>";
				} else {
					$mensaje ="<p class='text-error'>Ha ocurrido un error al insertar el registro. Intentelo nuevamente.</p>";
			
				}; 

			
			// Renderizo la vista
			$this->layout->section("mensaje",array(
												"titulo"=>"Nuevo Articulo",
												"mensaje"=>$mensaje,
												"url"=>"nuevo"
												));				
	
	}

	public function update() {

			if (!$this->ion_auth->logged_in())
			{
					//redirect them to the login page
					redirect('access', 'refresh');
			}

			$id = $this->input->post('id');
			if ( !isset($id)) {
				redirect(base_url("backend/articulos/listar"));
			}

			// Where
			$this->db->where('id',$this->input->post('id'));
			$data = $this->input->post('datos');

			//formateo la fecha
			$date = DateTime::createFromFormat('d/m/Y', $data["created_at"]);
			$data["created_at"] = $date->format('Y-m-d');	

			// Imagen
			$imagen = $_FILES["userfile"]["name"];

			if (!empty($imagen)) {
				
				$config['upload_path'] = './fotos/articulos';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '1000';
				
				$config['overwrite'] = false;
				$config['encrypt_name'] = true;
				$config['remove_spaces'] = true;
				$this->load->library('upload', $config);
				
				if ( !$this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
					print_r( $error);
				}
				else
				{
					
					$infofile = $this->upload->data();
					$data["photo"] = $infofile["file_name"];

					$directory = "fotos/articulos/";

					// Hago un thumbnail
						$params = array("fileName"=>$directory.$infofile["file_name"]);
						$this->load->library('Resize',$params); 
						$this->resize->resizeImage(450, 350, "crop");
						$name = "thumb_".$infofile["file_name"];
						$this->resize->saveImage($directory."/".$name, 100); 

					
				}
			
			}
			
			// ADJUNTO
			$adjunto = $_FILES["adjunto"]["name"];

			if (!empty($adjunto)) {
				
				$config['upload_path'] = './descargas';
				$config['allowed_types'] = 'doc|docx|pdf';
				$config['max_size']	= '2000';
				
				$config['overwrite'] = false;
				$config['encrypt_name'] = true;
				$config['remove_spaces'] = true;
				$this->load->library('upload', $config);
				
				if ( !$this->upload->do_upload("adjunto"))
				{
					$error = array('error' => $this->upload->display_errors());
					print_r( $error);
					exit();
				}
				else
				{
					$infofile = $this->upload->data();
					$data["adjunto"] = $infofile["file_name"];
				
				}
			
			}
			
			if  ($this->db->update('articles', $data)) {
				$mensaje ="<p class='text-success'>El articulo se ha actualizado correctamente.</p>";
			} else {
				$mensaje ="<p class='text-error'>Ha ocurrido un error al actualizar el articulo. Intentelo nuevamente.</p>";
		
			}; 

			// Renderizo la vista
			$this->layout->section("mensaje",array(
												"titulo"=>"Confirmacion",
												"mensaje"=>$mensaje,
												"url"=>"nuevo"
												));				
	
	}
	
	public function nuevo() {
			
			if (!$this->ion_auth->logged_in())
			{
					//redirect them to the login page
					redirect('access', 'refresh');
			}

			$this->load->helper('backend');

			$data= NULL;


			// Renderizo la vista
			$this->layout->section("articulos_editar",array("info"=>$data,
												"titulo"=>"Nuevo Articulo",
												"action"=>"insertar",
												"url"=>"nuevo"
												));				
	
	}
	
	public function editar($cual) {
			

			if (!$this->ion_auth->logged_in())
			{
					//redirect them to the login page
					redirect('access', 'refresh');
			}

			if ( !isset($cual)) {
				redirect(base_url("backend/articulos/listar"));
			}

			// Selecciono el registro
			$equal = array ("id"=>$cual);
			$data = $this->Backend_model->select("articles",NULL,$equal);
			if ( count($data)==0) {
				redirect(base_url("backend/articulos/listar"));
			}

			//formateo la fecha
			$date = DateTime::createFromFormat('Y-m-d', $data[0]["created_at"]);
			$data[0]["created_at"] = $date->format('d/m/Y');	

			// Renderizo la vista
			$this->layout->section("articulos_editar",array("info"=>$data,
												"titulo"=>"Editar articulo",
												"action"=>"update",
												"url"=>"editar"
												));				
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */