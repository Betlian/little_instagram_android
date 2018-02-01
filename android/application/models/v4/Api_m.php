<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Api_m extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();		
	}

	function upload_photo(){
		$temp = [
		'desc'=>$this->input->post('desc'),
		'lat'=>$this->input->post('lat'),
		'lang'=>$this->input->post('lang'),
		'location'=>$this->input->post('location'),
		'date'=>date("Y-m-d H:i:s")
		];
		$this->load->library('upload',$this->config_upload());
		if($this->upload->do_upload('photo')){
			$temp['photo']=$this->upload->data('file_name');
			$result =$this->db->insert('post',$temp);
			if($result){
				$result =['status'=>true,'message'=>$temp['photo']];
				return $result;
			}else{
				$result = ['status'=>false,'message'=>$result];
				return $result;
			}
		}else{
			$result = ['status'=>false,'message'=>$this->upload->display_errors()];
			return $result;
		}
	}

	function get_post(){
		$result = $this->db->order_by('date','desc')->get('post')->result();
		$result = ['status'=>true,'message'=>$result];
		return $result;
	}

	private function config_upload(){
		$config = array(
			'upload_path'=>'./images/post',
			'allowed_types'=>'jpg|png|jpeg',
			'max_size'=>0,
			'encrypt_name'=>true
			);
		return $config;
	}
}
?>