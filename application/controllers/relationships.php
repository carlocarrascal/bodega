<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*class Orders extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');

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
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$this->load->view('orders/show', $data);
		}
	}
}*/
class Relationships extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->library('tank_auth');

		$this->_init();
        $this->load->model('relationship_model','person');
    }

    private function _init()
	{
		//$this->output->set_template('simple');

		$this->load->js('assets/bower_components/datatables/media/js/jquery.dataTables.min.js');
		$this->load->js('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js');
		$this->load->js('assets/dist/js/bootstrap-switch.min.js');
		$this->load->js('assets/js/relationships.js');
		$this->load->css('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css');		
		$this->load->css('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css');

	}
 
    public function index()
    {
        $this->output->set_template('simple');
        $this->load->helper('url');
        $this->load->view('relationships/show');
    }
 
    public function accounts($id)
    {
        $data = $this->person->get_by_id($id);
        //print_r($data);
        $this->output->set_template('simple');
        $this->load->helper('url');
        $this->load->view('relationships/accounts', $data);
        $this->load->js('assets/js/accounts.js');
    }
 
    public function ajax_list()
    {
        //print_r($_POST);
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = '<a href="'.base_url().'relationships/accounts/'.$person->id.'">'.$person->name.'</a>';
            $row[] = $person->address;
            
            if($person->contact_type == 1 ){
            	$contact_type = "supplier";
            }else{
            	$contact_type = "customer";
            }

            $row[] = $contact_type;
            $row[] = $person->contact_number;
            $row[] = $person->email;
            $row[] = date("M d Y", strtotime($person->updated_at));
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
                  //<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->person->count_all(),
                        "recordsFiltered" => $this->person->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    
    public function ajax_all()
    {
        $data = $this->person->get_all();
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->person->get_by_id($id);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
        $data = array(
                'name' => $this->input->post('name'),
                'desc' => $this->input->post('desc'),
            );
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'name' => $this->input->post('name'),
                'desc' => $this->input->post('desc'),
            );
        $this->person->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->person->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('name') == '')
        {
            $data['inputerror'][] = 'name';
            $data['error_string'][] = 'Name is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('desc') == '')
        {
            $data['inputerror'][] = 'desc';
            $data['error_string'][] = 'Description is required';
            $data['status'] = FALSE;
        }
 
      /*  if($this->input->post('dob') == '')
        {
            $data['inputerror'][] = 'dob';
            $data['error_string'][] = 'Date of Birth is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('gender') == '')
        {
            $data['inputerror'][] = 'gender';
            $data['error_string'][] = 'Please select gender';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('address') == '')
        {
            $data['inputerror'][] = 'address';
            $data['error_string'][] = 'Addess is required';
            $data['status'] = FALSE;
        }*/
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
 
}