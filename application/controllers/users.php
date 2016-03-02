<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

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
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('home_view');
	}


	public function add()
	{
		$this->load->view('users/new');
	}

	public function show()
	{
		$this->load->view('home_view');
	}

	public function create()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE){
           echo'<div class="alert alert-danger">'.validation_errors().'</div>';
           exit;
        }
        else{
            $this->user_model->create();
        }
	}

	public function edit()
	{
		$this->load->view('home_view');
	}

	public function delete()
	{
		$this->load->view('home_view');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */