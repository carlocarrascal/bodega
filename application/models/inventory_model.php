<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory_model extends CI_Model{

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
		$this->db->select('id,name, desc');

		$query = $this->db->get('products');
		
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {

		   		return $query->result();
		   }
		}

	}
	
	public function getproductbyid( $id )
	{
		$this->db->select('id,name, desc');
		$this->db->where('id', $id);
		$query = $this->db->get('products');

		
		if ($query->num_rows() > 0)
		{
		 	$rows = $query->result();  // this returns an object of all results
			return $rows[0]; 
		}

	}

	public function getvariants( $id )
	{
		$this->db->select('id,sku, buy_price, retail_price');
		$this->db->where('id', $id);
		$query = $this->db->get('variants');
		
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {

		   		return $query->result();
		   }
		}

	}

	public function create()
	{
		$data = array('name'=>  $this->input->post('name'),
                'desc'=>$this->input->post('description'));
        $this->db->insert('products', $data);

        $prod_id = $this->db->insert_id();
        $data2 = array('sku'=>  $this->input->post('sku'),
                'product_id'=>$prod_id,
        		'buy_price'=>  $this->input->post('buyprice'),
        		'retail_price'=>  $this->input->post('retailprice'),
        		'wholesale_price'=>  $this->input->post('wholesaleprice'));
        $this->db->insert('variants', $data2);

        echo'<div class="alert alert-success">One record inserted Successfully</div>';
        exit;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */