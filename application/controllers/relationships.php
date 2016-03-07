<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Relationships extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		$this->load->model("relationship_model");

		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('simple');

		$this->load->js('assets/bower_components/datatables/media/js/jquery.dataTables.min.js');
		$this->load->js('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js');
		$this->load->js('assets/js/products.js');
		$this->load->css('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css');		
		$this->load->css('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css');

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
	}

	public function index()
	{
		//print_r($this->relationship_model->getall());
		
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			
			$this->data['user_id']	= $this->tank_auth->get_user_id();
			$this->data['username']	= $this->tank_auth->get_username();
			$this->data['accounts'] = $this->relationship_model->getall();
		
			$this->load->view('relationships/show',$this->data);
		}
	}

	public function accounts($id)
	{
		//print_r($this->relationship_model->getall());
		$this->data['accounts'] = $this->relationship_model->getaccountbyid($id);
		
		$this->load->view('relationships/accounts',$this->data);
	}

	public function create()
	{
		//print_r($this->input->post());
		$this->form_validation->set_rules('name', 'Company Name', 'required');
        if ($this->form_validation->run() == FALSE){
           echo'<div class="alert alert-danger">'.validation_errors().'</div>';

           exit;
        }
        else{
            $this->relationship_model->create();
        }
		//$this->load->view('relationships/add');
	}

}