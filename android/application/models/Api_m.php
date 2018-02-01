<?php 
	/**
	* 
	*/
	class Api_m extends CI_Model
	{
		
		function __construct(){
			parent::__construct();
			$this->load->database();
		}


		function check_login(){
			$key['username']=$this->security->xss_clean($this->input->post('username'));
			$key['password']=$this->security->xss_clean($this->input->post('password'));
			return $this->db->where($key)->get('users')->row();
		}

		function upload_status(){
			$data['content'] = $this->input->post('content');
			$data['user_id'] = $this->input->post('user_id');
			$data['date']=date("Y-m-d H:i:s");
			return $this->db->insert('status',$data);
		}

		function download_all_status(){
			$key['user_id']=$this->input->post('user_id');
			return $this->db->where($key)->get('status')->result();
		}

		function signup(){
			$data['username']=$this->input->post('username');
			$data['password']=$this->input->post('password');
			$data['full_name']=$this->input->post('full_name');
			return $this->db->insert('users',$data);
		}

		function upload_photo(){
			$config=[
				'upload_path'=>'./images/',
				'max_size'=>'2048',
				'allowed_types'=>'png|jpg'
			];
			$this->load->library('upload',$config);
			if($this->upload->do_upload('image')){
				$result['status']=true;
				$result['data']= $this->upload->data();
			}else{
				$result['status']=false;
				$result['data']= $this->upload->display_errors();
			}
			return $result;
		}
	}
 ?>