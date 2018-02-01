$(document).ready(function() {
	render();
});

function render(){
	load_form(1);

	$('#jumlah-submit').click(function(event) {
		event.preventDefault();
		load_form($('#jumlah-form').val())
	});

	function load_form(jumlah){
		var url = parent.base_url+'ike/tampil_form';
		var data = {'jumlah':jumlah};
		ajaxCall(url, data, tampil_form);
	}

	function tampil_form(data){
		$("#form").append(data);
	}

	$("#submit-form").click(function(event) {
		event.preventDefault();
		var form = document.getElementsByClassName('form-kanban');
		for (var i = 0; i < form.length; i++) {
			var data = {
				'code':document.getElementsByName('code')[i].value,
				'kind':document.getElementsByName('kind')[i].value,
				'size':document.getElementsByName('size')[i].value,
				'color':document.getElementsByName('color')[i].value,
				'mesin':document.getElementsByName('mesin')[i].value
			};
			var url = parent.base_url+'ike/input_form';
			ajaxCall(url, data, callback_submit);
		}
	});

	function callback_submit(data){
		var json = $.parseJSON(data);
		if(json.code==0){
			window.open(parent.base_url+'ike');
		}else{
			alert(json.message);
		}
	}

	function ajaxCall(url, data, callback){
		$.ajax({
			url: url,
			type: 'POST',
			data: data,
			success:function(data){
				callback(data);
			},
			error:function(data){
				console.log(data);
			}
		});		
	}
}