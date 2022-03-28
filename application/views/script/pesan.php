<script type="text/javascript">

	$(document).ready(function(){  

		$('#ViewTable').DataTable({
			// dom: 'frtip',
			ajax: {		            
	            "url": "pesan/dataTable",
	            "type": "GET"
	        },
	        processing	: true,
			serverSide	: true,			
			"bPaginate": true,	
	    });

	    
	})

	function lihatpesan(val){
		// alert();
		$.get('<?= base_url()?>pesan/wa', {id: $(val).data('id')}, function(data){ 
			$("#pesan").html(data.pesan);
        })
		 $("#modalWA").modal({backdrop: 'static', keyboard: false}) ;  
	}

	
</script>
