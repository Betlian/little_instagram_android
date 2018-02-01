<?php 
	function load(){
		$fname = "data";
		$json = file_get_contents($fname);
		return json_decode($json);
	}

	function save($data){
		$fname = "data";
		$arr = load();
		$arr[] = $data;
		$json = json_encode($arr);
		file_put_contents($fname, $json)
	}

	function unggah_teks($get_or_post){
		$teks = isset($_GET['t']) ? $_GET['t']:null;
		if($teks!=null){
			$teksDecode = urldecode($teks);
			save($teksDecode);
			$temp = [
				'status'=>1,
				'message'=>'Teks Telah Disimpan'
			];
			echo json_encode($temp);
		}
	}

	function unduh_teks(){
		$data = load();
		$temp = array(
			'status'=>1,
			'message'=>'Data Berhasil Diunduh',
			'data'=>$data
		);
		echo json_encode($temp);
	}

	function find_methode($get_or_post){
		$m=isset($_GET['m']) ? $_GET['m']:null;
		if($m=='unggah_teks'){
			return 'unggah_teks';
		}else if($m=='unduh_teks'){
			return 'unduh_teks';
		}else{
			return null;
		}
	}

	function main(){
		$methode=find_methode($_GET);
		if($methode!=null){
			$methode($_GET);
		}else{
			$temp=[
				'status'=>0,
				'message'=>'Unknow Methode Name'
			];
			echo json_encode($temp);
		}	
	}

	main();
 ?>