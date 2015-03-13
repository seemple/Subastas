<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
if ( ! class_exists('Controller'))
{
	class Controller extends CI_Controller {}
}

*/
class Auth extends CI_Controller {


	protected $the_user;

    function __construct() {
        parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('session');
		$this->load->library('parser');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('url');
    }

    function index() {
        redirect('/');
    }

    /**
     * Global Login function to log user in and direct to proper area
     *
     * @return void
     * @author Jonathan Johnson
     **/
    function login() {

		$this->data['title'] = "Login";

		if ($this->ion_auth->logged_in())
		{
			//already logged in so no need to access this page
			redirect($this->config->item('base_url'), 'refresh');
		}


		if ($_POST)
		{ //check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');
			$group_id = array ("group_id"=>"1");
			if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember, $group_id))
			{ //if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				// Guardo los datos de login en variables
				redirect($this->input->post('prevurl'), 'refresh');
			}
			else
			{ //if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				$this->session->set_flashdata('error',1);
				$this->session->flashdata('message');
				redirect('access', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{  //the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
				'type' => 'text'
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password'
			);

			redirect('access', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
		}
}
    /**
     * Global logout function to destroy user session
     *
     * @return void
     * @author Jonathan Johnson
     **/
	//log the user out
	
	function logout()
	{
		$this->data['title'] = "Logout";

		//log the user out
		$logout = $this->ion_auth->logout();

		//redirect them back to the page they came from
		redirect('access', 'refresh');
	}
	
}
