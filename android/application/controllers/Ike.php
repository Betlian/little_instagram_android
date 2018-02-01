<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ike extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function index()
	{
		$this->load->view('ike');
	}

	function tampil_form(){
		$jumlah = $this->input->post('jumlah', TRUE);
		for ($i=0; $i <$jumlah ; $i++) {
			$this->load->view('ike-form');
		}
	}

	function input_form(){
		$data=[
		'code'=>$this->input->post('code', TRUE),
		'kind'=>$this->input->post('kind', TRUE),
		'size'=>$this->input->post('size', TRUE),
		'color'=>$this->input->post('color', TRUE),
		'mesin'=>$this->input->post('mesin', TRUE),
		];
		$this->db->insert("kanban",$data);
		$result=$this->db->error();
		echo json_encode($result);
	}
}

/* End of file Ike.php */
/* Location: ./application/controllers/Ike.php */