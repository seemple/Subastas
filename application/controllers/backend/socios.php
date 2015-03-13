<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ini_set('display_errors', 1);
error_reporting(E_ALL);

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
		$this->load->library('Layout');
		$this->load->model('Backend_model');
		$this->load->library('pagination');

		if (!$this->ion_auth->logged_in())
		{
					//redirect them to the login page
					redirect('access', 'refresh');
	    }

	}
	
	public function eliminar() {
				
			$cual = $this->input->post("cual");
			
			if ( !isset($cual)) {
				echo "No se pudo eliminar el registro";
			}

			// Selecciono el registro
			$equal = array ("id"=>$cual);
			$data = $this->Backend_model->select("usuarios",NULL,$equal);
			if ( count($data)==0) {
				echo "No se pudo eliminar el registro";
			} else {
				$this->db->where('id', $cual);
				$this->db->delete("usuarios");
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

			$this->load->helper('backend');
			//Cantidad a mostrar
			$cantidad = 15;
			// Seteo el Offset
			$offset = $this->uri->segment(4);
			// Parametros
			$equal = array ("group_id"=>2);

			$order["apellido"] ="ASC";
	
			// Query listado de propiedades
			$total = count ($this->Backend_model->select("usuarios",NULL,$equal,$order));
			$data = $this->Backend_model->select("usuarios",NULL,$equal,$order,$cantidad,$offset);

			// PAGINADOR
			$config['base_url'] = base_url("backend/socios/listar");
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
			$this->layout->section("socios_listar",array("info"=>$data,
												"titulo"=>"Listar socios",
												"url"=>"listar",
												"paginador" =>$paginador
												));				
	}
	
	public function insertar() {
			
			$data = $this->input->post('datos');
			// averiguo si ya existe ese usuario
			$equal = array ("email"=>$data["email"]);
			$user = $this->Backend_model->select("usuarios",NULL,$equal);

			if ( count($user)>0) {

					$mensaje ="<p class='text-error'>La direccion de email que intenta ingresar ya existe. Por favor, ingrese otra.</p>";
			
			} else {

				$imagen = $_FILES["userfile"]["name"];

				// Imagen
				if (!empty($imagen)) {
					$config['upload_path'] = './fotos/socios';
					$config['allowed_types'] = 'gif|jpg';
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
						$data["imagen"] = $infofile["file_name"];


						$directory = "fotos/socios";

						// Hago un thumbnail
							$params = array("fileName"=>$directory.$infofile["file_name"]);
							$this->load->library('Resize',$params); 
							$this->resize->resizeImage(400, 350, "crop");
							$name = "thumb_".$infofile["file_name"];
							$this->resize->saveImage($directory."/".$name, 100); 
					}
				}
				
				// INSERT
				
				if  ($this->db->insert('usuarios', $data)) {
					$mensaje ="<p class='text-success'>El socio se ha insertado correctamente.</p>";
				} else {
					$mensaje ="<p class='text-error'>Ha ocurrido un error al insertar el registro. Intentelo nuevamente.</p>";
			
				}; 
			}
			
			// Renderizo la vista
			$this->layout->section("mensaje",array(
												"titulo"=>"Nuevo Socio",
												"mensaje"=>$mensaje,
												"url"=>"nuevo"
												));				
	
	}

	public function update() {

			$id = $this->input->post('id');
			if ( !isset($id)) {
				redirect(base_url("backend/socios/listar"));
			}

			// Where
			$this->db->where('id',$this->input->post('id'));
			$data = $this->input->post('datos');
			
			// Imagen
			$imagen = $_FILES["userfile"]["name"];

			if (!empty($imagen)) {
				
				$config['upload_path'] = './fotos/socios';
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
					$data["imagen"] = $infofile["file_name"];

					$directory = "fotos/socios/";

					// Hago un thumbnail
						$params = array("fileName"=>$directory.$infofile["file_name"]);
						$this->load->library('Resize',$params); 
						$this->resize->resizeImage(400, 350, "crop");
						$name = "thumb_".$infofile["file_name"];
						$this->resize->saveImage($directory."/".$name, 100); 

						
				}
			
			}
			
			if  ($this->db->update('usuarios', $data)) {
				$mensaje ="<p class='text-success'>El socio se ha actualizado correctamente.</p>";
			} else {
				$mensaje ="<p class='text-error'>Ha ocurrido un error al actualizar el socio. Intentelo nuevamente.</p>";
		
			}; 

			// Renderizo la vista
			$this->layout->section("mensaje",array(
												"titulo"=>"Confirmacion",
												"mensaje"=>$mensaje,
												"url"=>"nuevo"
												));				
	
	}
	
	public function nuevo() {
			

			$this->load->helper('backend');

			$data= NULL;
			// Listado de categorias
			$order= array ("nombre"=>"ASC");
			$categorias = $this->Backend_model->select("categorias",NULL,NULL,$order);
			
			// Listado de socios
			$order= array ("apellido"=>"ASC");
			$socios = $this->Backend_model->select("usuarios",NULL,NULL,$order);

			// Renderizo la vista
			$this->layout->section("socios_editar",array("info"=>$data,
												"titulo"=>"Nuevo Socio",
												"categorias"=>$categorias,
												"socios"=>$socios,
												"action"=>"insertar",
												"url"=>"nuevo"
												));				
	
	}
	
	public function editar($cual) {
			


			if ( !isset($cual)) {
				redirect(base_url("backend/socios/listar"));
			}

			// Selecciono el registro
			$equal = array ("id"=>$cual);
			$data = $this->Backend_model->select("usuarios",NULL,$equal);
			if ( count($data)==0) {
				redirect(base_url("backend/socios/listar"));
			}


			// Renderizo la vista
			$this->layout->section("socios_editar",array("info"=>$data,
												"titulo"=>"Editar Socio",
												"action"=>"update",
												"url"=>"editar"
												));				
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */