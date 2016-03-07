<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relationship_model extends CI_Model{

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
	}

	public function getall()
	{
		$this->db->select('id,name, address, contact_person, contact_number, contact_type');

		$query = $this->db->get('accounts');
		
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {

		   		return $query->result();
		   }
		}

	}
	public function getaccountbyid( $id )
	{
		$this->db->select('id,name, address, contact_person, contact_number, contact_type');
		$this->db->where('id', $id);
		$query = $this->db->get('accounts');

		
		if ($query->num_rows() > 0)
		{
		 	$rows = $query->result();  // this returns an object of all results
			return $rows[0]; 
		}

	}

	public function create()
	{
		$data = array('name'=>  $this->input->post('name'),
                'address'=>$this->input->post('address'),
                'contact_person'=>$this->input->post('contactperson'),
                'contact_number'=>$this->input->post('contactnumber'),
                'contact_type'=>$this->input->post('contacttype'));
        $this->db->insert('accounts', $data);
        echo'<div class="alert alert-success">One record inserted Successfully</div>';
        exit;
	}

	public function getaccounttype( $type )
	{
		if($type == 1)
		{
			return "Supplier";
		}
		else{
			return "Customer";
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */