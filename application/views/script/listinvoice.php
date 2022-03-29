<script type="text/javascript">
	var oTable;
	$(document).ready(function(){  
		
	 	oTable = $('#InvoiceList').DataTable({
			dom: 'frtip',
			ajax: {		            
	            "url": "<?= base_url() ?>order/dataTable",
	            "type": "GET"
	        },
	        processing	: true,
			serverSide	: true,			
			"bPaginate": true,	
			"autoWidth": true,

	    });

	    oTableDeposit = $('#InvoiceListDeposit').DataTable({
			dom: 'frtip',
			ajax: {		            
	            "url": "<?= base_url() ?>order/dataTableDeposit",
	            "type": "GET"
	        },
	        processing	: true,
			serverSide	: true,			
			"bPaginate": true,	
			"autoWidth": true,

	    });
	    oTableDeposit = $('#InvoiceListPaid').DataTable({
			dom: 'frtip',
			ajax: {		            
	            "url": "<?= base_url() ?>order/dataTablePaid",
	            "type": "GET"
	        },
	        processing	: true,
			serverSide	: true,			
			"bPaginate": true,	
			"autoWidth": true,

	    });

	    oTableDelivery = $('#InvoiceListDelivery').DataTable({
			dom: 'frtip',
			ajax: {		            
	            "url": "<?= base_url() ?>order/dataTableDelivery",
	            "type": "GET"
	        },
	        processing	: true,
			serverSide	: true,			
			"bPaginate": true,	
			"autoWidth": true,

	    });

	    oTableCancel = $('#InvoiceListCancel').DataTable({
			dom: 'frtip',
			ajax: {		            
	            "url": "<?= base_url() ?>order/dataTableCancel",
	            "type": "GET"
	        },
	        processing	: true,
			serverSide	: true,			
			"bPaginate": true,	
			"autoWidth": true,

	    });

		
	})

	function hapus(val) {
		var r = confirm("Yakin dihapus?");
		if (r == true) {
			
			$.get('<?= base_url() ?>order/delete', { id: $(val).data('id') }, function(data){ 
				window.location.reload();
			})
		
		}
	}
	function renewal(val) {
		var r = confirm("Yakin diperpanjang?");
		if (r == true) {
			
			$.get('<?= base_url() ?>order/renewal', { id: $(val).data('id') }, function(data){ 
				window.location.reload();
			})
		
		}
	}
	
</script>
