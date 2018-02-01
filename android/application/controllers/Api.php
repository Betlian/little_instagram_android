<?php 
class Api extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('v4/Api_m','api');
	}

	function index(){
		$allowedMethods = array(
			'upload_photo',
			'get_post'
			);
		$methodName = isset($_POST['m']) ? $_POST['m'] : '';
		$this->run($methodName, $allowedMethods);
	}

	private function run($method, array $allowedMethods){
		$allowed = array_search($method, $allowedMethods);
		if($allowed !== false){
			$this->{$method}();
		}else{
			$this->_api(404, "Cannot found method '{$method}'");
		}
	}

	private function upload_photo(){
		$result=$this->api->upload_photo();
		if($result['status']){
			$this->_api('200','OK');
		}else{
			$this->_api('304','Not Modified',$result['message']);
		}
	}

	private function get_post(){
		$result=$this->api->get_post();
		if($result['status']){
			$this->_api('200','OK',$result['message']);
		}else{
			$this->_api('304','Not Modified',$result['message']);
		}
	}

	private function _api($code, $message, $data=""){
		$api = array(
			'code'=> $code,
			'message' => $message,
			'data'=> $data
			);
		echo json_encode($api);
	}
}
?>