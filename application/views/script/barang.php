<script type="text/javascript">
	var oTable;
	$(document).ready(function(){  
		
	 oTable = $('#ViewTable').DataTable({
			dom: 'frtip',
			ajax: {		            
	            "url": "Barang/dataTable",
	            "type": "GET"
	        },
	        processing	: true,
			serverSide	: true,			
			"bPaginate": true,	
			"autoWidth": true,

	    });

	})

	$('#btnUpload').on('click', function (event) {
    	$('#ModalAdd').modal({backdrop: 'static', keyboard: false}) ;
    });

	function hapus(val) {
		var r = confirm("Yakin dihapus?");
		if (r == true) {
			
			$.get('Barang/delete', { id: $(val).data('id') }, function(data){ 
				window.location.reload();
			})
		
		}
	}
</script>
