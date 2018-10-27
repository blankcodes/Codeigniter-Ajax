<!-- CONTROLLER -->
<?php 
	public function add_bitcoin_address() {
		$data = array(
			'input_name'=>$this->input->post('input_name'),
		);

		$checkData = $this->model_name->methodName($data); //check data
		 
		if ($checkData == 0) {
			$getData = $this->model_name->methodName($data); // insert data
			echo json_encode($getData['databaeeField']); //necessary for ajax
		}
		else {
			$this->bitcoinAddressFailed('bitcoinAddressFailed', '', ''); // alert message if data is already saved in database
		}
		
	}
 ?>


<!-- MODEL -->
<?php
	public function check_method($data) { //check btc address
		return $this->db->WHERE($data)
						->GET('table-name')->row_array();
	}

	public function insert_method($data) { // insert data
		return $this->db->INSERT('table-name', $data);
	}

	
?>


 <!-- VIEW -->
 <!-- With modal -->
 <script>
//Save data
$('#btn_id').on('click',function(){ //submit button id
	var bitcoin_address = $('#input_id').val();//input id

	if (!bitcoin_address) { //validation if input is NULL
        const toast = swal.mixin({ // Sweet alert
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 6000
		});

		toast({
			type: 'error',
			title: 'Please Enter Bitcoin Address!'
		});
		return false
 	}

    var bitcoin_address = $('#bitcoin_address').val(); //input id

	    $.ajax({
	    type : 'POST',
	    url  : '<?=site_url('ontrollernName/methodName')?>',
	    dataType : 'JSON',
	    data : { input_name:input_name },

	    success: function(data){ // Sweet alert
	        const toast = swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 6000
			});

			toast({
				type: 'success',
				title: 'Alert Message!'
			});
			$('#modal_id').modal('hide'); // modal ID

	       }
	    });
    return false;
});
</script>