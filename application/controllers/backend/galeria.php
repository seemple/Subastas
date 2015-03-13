<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Galeria extends CI_Controller {

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
			$data = $this->Backend_model->select("albumes",NULL,$equal);
			if ( count($data)==0) {
				echo "No se pudo eliminar el registro";
			} else {
				$this->db->where('id', $cual);
				$this->db->delete("albumes");
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

			$order["fecha"] ="DESC";

			// Query listado de propiedades
			$total = count ($this->Backend_model->select("albumes",NULL,$equal,$order));
			$data = $this->Backend_model->select("albumes",NULL,$equal,$order,$cantidad,$offset);

			// PAGINADOR
			$config['base_url'] = base_url("backend/galeria/listar");
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
			$this->layout->section("galeria_listar",array("info"=>$data,
												"titulo"=>"Listar Album",
												"url"=>"galeria",
												"paginador" =>$paginador
												));				
	}

	public function listar_fotos($cual)
	{

			if (!$this->ion_auth->logged_in())
			{
					//redirect them to the login page
					redirect('access', 'refresh');
			}

			if ( !isset($cual)) {
				redirect(base_url("backend/galeria/listar"));
			}


			$this->load->helper('backend');
			//Cantidad a mostrar
			$cantidad = 15;
			// Seteo el Offset
			$offset = $this->uri->segment(5);
			// Parametros
			$equal = array ("idAlbum"=>$cual);
			
			if (isset($orderby)) {
				if (!is_numeric($orderby)){
					$order = array($orderby => "DESC");
				}
			}
			
			$order["orden"] ="ASC";

			// Query listado de propiedades
			$total = count ($this->Backend_model->select("fotosalbum",NULL,$equal,$order));
			$data = $this->Backend_model->select("fotosalbum",NULL,$equal,$order,$cantidad,$offset);

			// PAGINADOR
			$config['base_url'] = base_url("backend/galeria/listar_fotos/".$cual);
			$config['uri_segment'] = 5;
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
			$this->layout->section("fotos_listar",array("info"=>$data,
												"titulo"=>"Listar Fotos",
												"idalbum"=>$cual,
												"accion"=>"update_fotos",
												"url"=>"listar_fotos",
												"paginador" =>$paginador
												));				
	}
	
	public function update_fotos() {
	

	if (!$this->ion_auth->logged_in())
	{
					//redirect them to the login page
					redirect('access', 'refresh');
	}

	extract ($_POST);

	if (isset($_POST["id_album"])) {
	

		// Selecciono el album
		$equal = array ("idAlbum"=>$_POST["id_album"]);
		$order = array ("orden"=>"ASC");
		$data = $this->Backend_model->select("fotosalbum",NULL,$equal,$order);
		
		if (count($data>0)) {
			
			// Recorro el caption aunque podria ser el orden tambien. Ambos tienen como indice el id de cada foto.
			foreach ( $caption as $item=>$value )	{
			
			   $id_foto=$item;
			   			   
			   $datos["caption"] = $value;
			   $datos["orden"] = $orden[$item];

			   $this->db->where('id',$id_foto);
			   $this->db->update('fotosalbum', $datos);
			   
			   

			}

			$mensaje ="La actualizacion de fotos se ha realizado correctamente.";
			

		}

			// Renderizo la vista
			$this->layout->section("mensaje",array(
												"titulo"=>"Confirmacion",
												"mensaje"=>$mensaje,
												"url"=>"listar_fotos"
												));				

	}
	
	
	}
	
	public function borrar_foto() {
	
			if (!$this->ion_auth->logged_in())
			{
					//redirect them to the login page
					redirect('access', 'refresh');
			}

		if (isset($_POST["idFoto"])) {
			
			// Selecciono el registro
			$equal = array ("id"=>$_POST["idFoto"]);
			$data = $this->Backend_model->select("fotosalbum",NULL,$equal);
			if ( count($data)==0) {
				echo "No se pudo eliminar el registro";
			} else {
				$this->db->where('id', $_POST["idFoto"]);
				$this->db->delete("fotosalbum");
				echo "Item eliminado.";
			}

		}
	}
	
	
	public function insertar() {

			if (!$this->ion_auth->logged_in())
			{
					//redirect them to the login page
					redirect('access', 'refresh');
			}

			if (!$this->ion_auth->logged_in())
			{
					//redirect them to the login page
					redirect('access', 'refresh');
			}

			$data = $this->input->post('datos');

			// Chequeo que no exista album para esa propiedad
			$equal = array ("item_id"=>$data["item_id"]);
			$info = $this->Backend_model->select("albumes",NULL,$equal);
			
			// SI EXISTE
			if ( count($info)>0) {
				$mensaje ="<p class='text-error'>La operacion seleccionada ya posee un album de fotos. No se puede crear otro.</p>";
			} else {


				//formateo la fecha
				$date = DateTime::createFromFormat('d/m/Y', $data["fecha"]);
				$data["fecha"] = $date->format('Y-m-d');	
	
				if  ($this->db->insert('albumes', $data)) {
					$mensaje ="<p class='text-success'>El item se ha insertado correctamente.</p>";
				} else {
					$mensaje ="<p class='text-error'>Ha ocurrido un error al insertar el registro. Intentelo nuevamente.</p>";
			
				}; 

			};
			
			// Renderizo la vista
			$this->layout->section("mensaje",array(
												"titulo"=>"Confirmacion",
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
				redirect(base_url("backend/galeria/listar"));
			}

			// Where
			$this->db->where('id',$this->input->post('id'));
			$data = $this->input->post('datos');
			
			//formateo la fecha
			$date = DateTime::createFromFormat('d/m/Y', $data["fecha"]);
			$data["fecha"] = $date->format('Y-m-d');	

			if  ($this->db->update('albumes', $data)) {
				$mensaje ="<p class='text-success'>El album se ha actualizado correctamente.</p>";
			} else {
				$mensaje ="<p class='text-error'>Ha ocurrido un error al actualizar el registro. Intentelo nuevamente.</p>";
		
			}; 

			// Renderizo la vista
			$this->layout->section("mensaje",array(
												"titulo"=>"Confirmacion",
												"mensaje"=>$mensaje,
												"url"=>"nuevo"
												));				
	
	}

	public function upload_fotos($album){
	
			if (!$this->ion_auth->logged_in())
			{
					//redirect them to the login page
					redirect('access', 'refresh');
			}

			$config['upload_path'] = './fotos-galeria/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1000';
			
			$config['overwrite'] = false;
			$config['encrypt_name'] = true;
			$config['remove_spaces'] = true;
			$this->load->library('upload', $config);
			$imagen = "Filedata";
			
			if ( !$this->upload->do_upload($imagen))
			{
				$error = array('error' => $this->upload->display_errors());
				print_r( $error);
			}
			else
			{
				$infofile = $this->upload->data();
				
				// Guardo el registro de la imagen en la BDD
				$data["nombre"] = $infofile["file_name"];
				$data["idAlbum"] = $album;
				$this->db->insert('fotosalbum', $data);
				
				$directory = "fotos-galeria/";

				// Hago Thumbnail
				$params = array("fileName"=>$directory.$infofile["file_name"]);
				$this->load->library('Resize',$params); 
				$this->resize->resizeImage(400, 400, "crop");
				$name = "thumb_".$infofile["file_name"];
				$this->resize->saveImage($directory."/".$name, 100); 


			}
			
		
	}
	
	public function subir_fotos($cual) {
			
			if (!$this->ion_auth->logged_in())
			{
					//redirect them to the login page
					redirect('access', 'refresh');
			}

			$this->load->helper('backend');

			$data= NULL;
			// Listado de categorias
			$order= array ("nombre"=>"ASC");
			$categorias = $this->Backend_model->select("categorias",NULL,NULL,$order);
			
			// Renderizo la vista
			$this->layout->section("subir_fotos",array("info"=>$data,
												"titulo"=>"Subir fotos",
												"idalbum"=>$cual,
												"url"=>"subir_fotos"
												));				
	
	}
	

	public function nuevo() {
			
			if (!$this->ion_auth->logged_in())
			{
					//redirect them to the login page
					redirect('access', 'refresh');
			}

			if (!$this->ion_auth->logged_in())
			{
					//redirect them to the login page
					redirect('access', 'refresh');
			}

			$this->load->helper('backend');

			$data= NULL;
			// Listado de categorias
			$order= array ("nombre"=>"ASC");
			$categorias = $this->Backend_model->select("categorias",NULL,NULL,$order);
			
			// Listado de items
			$order= array ("titulo"=>"ASC");
			$items = $this->Backend_model->select("item",NULL,NULL,$order);

			// Renderizo la vista
			$this->layout->section("galeria_editar",array("info"=>$data,
												"titulo"=>"Nuevo Album",
												"categorias"=>$categorias,
												"items"=>$items,
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
				redirect(base_url("backend/galeria/listar"));
			}

			// Selecciono el registro
			$equal = array ("id"=>$cual);
			$data = $this->Backend_model->select("albumes",NULL,$equal);
			if ( count($data)==0) {
				redirect(base_url("backend/galeria/listar"));
			}

			//formateo la fecha
			$date = DateTime::createFromFormat('Y-m-d', $data[0]["fecha"]);
			$data[0]["fecha"] = $date->format('d/m/Y');	


			// Listado de categorias
			$order= array ("nombre"=>"ASC");
			$categorias = $this->Backend_model->select("categorias",NULL,NULL,$order);

			// Listado de items
			$order= array ("titulo"=>"ASC");
			$items = $this->Backend_model->select("item",NULL,NULL,$order);

			// Renderizo la vista
			$this->layout->section("galeria_editar",array("info"=>$data,
												"titulo"=>"Editar Album",
												"categorias"=>$categorias,
												"items"=>$items,
												"action"=>"update",
												"url"=>"editar"
												));				
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */