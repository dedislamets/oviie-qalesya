<script type="text/javascript">
	var oTable;
	var oTableModalGrouping;

	$(document).ready(function(){  
		$("#btnAdd").on('click', function (event) {
	    	$('#ModalUser').modal({backdrop: 'static', keyboard: false}) ;
	    }) 



	    $('#btnsubmit').on('click', function (event) {
	        var checked_courses = $('#ModalTableUser').find('input[name="selected_courses[]"]:checked').length;
	        if (checked_courses != 0) {
	            CheckedTrue();
	            
	        } else {
	            alert("Silahkan pilih terlebih dahulu");
	        }

	    });

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
	    oTablePaid = $('#InvoiceListPaid').DataTable({
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

	    oTableGroup = $('#InvoiceListGroup').DataTable({
			dom: 'frtip',
			ajax: {		            
	            "url": "<?= base_url() ?>order/dataTableGroup",
	            "type": "GET"
	        },
	        processing	: true,
			serverSide	: true,			
			"bPaginate": true,	
			"autoWidth": true,
			"destroy": true,
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
		oTableModalGrouping = $('#ModalTableUser').DataTable({
			dom: 'frtip',
			ajax: {		            
	            "url": "<?= base_url() ?>order/loadInvoice",
	            "type": "GET"
	        },
	        processing	: true,
			serverSide	: true,			
			"bPaginate": true,	
			"autoWidth": true,
			"destroy": true,
            
	    });
	})

	function CheckedTrue() {
        var b = $("#txtSelected");
        b.val('');
        var str = "";
        var rowcollection = oTableModalGrouping.$(':checkbox', { "page": "all" });
        // if(rowcollection.length > 1){
        // 	alertError("Hanya 1 Invoice diijinkan!!");
        // 	return;
        // }
        rowcollection.each(function () {
            if (this.checked) {
                str += this.value + ";";
            }
        });
        b.val(str);   
        $.ajax({
            type: "GET",
            url: "<?= base_url() ?>order/copyinvoice",
            data: {id: str},
            dataType: "json",
            traditional: true,	            
           	beforeSend: function(){
				
			},
		    success: function (data) {
				$('#ModalUser').modal('hide');
	            oTableGroup = $('#InvoiceListGroup').DataTable({
					dom: 'frtip',
					ajax: {		            
			            "url": "<?= base_url() ?>order/dataTableGroup",
			            "type": "GET"
			        },
			        processing	: true,
					serverSide	: true,			
					"bPaginate": true,	
					"autoWidth": true,
					"destroy": true,
			    });

			    oTableModalGrouping = $('#ModalTableUser').DataTable({
					dom: 'frtip',
					ajax: {		            
			            "url": "<?= base_url() ?>order/loadInvoice",
			            "type": "GET"
			        },
			        processing	: true,
					serverSide	: true,			
					"bPaginate": true,	
					"autoWidth": true,
					"destroy": true,
		            
			    });
	        },
        });
        
    }

	function hapus(val) {
		var r = confirm("Yakin dihapus?");
		if (r == true) {
			
			$.get('<?= base_url() ?>order/delete', { id: $(val).data('id') }, function(data){ 
				window.location.reload();
			})
		
		}
	}
	function hapusgroup(val) {
		var r = confirm("Yakin dihapus?");
		if (r == true) {
			
			$.get('<?= base_url() ?>order/deletegroup', { id: $(val).data('id'), parent: $(val).data('parent') }, function(data){ 
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
