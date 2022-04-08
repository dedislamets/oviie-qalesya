<script type="text/javascript">
	var app = new Vue({
	    el: "#app",
	    mounted: function () {
	      // this.loadHistory();
	      
	    },
	    updated: function () {
	    	
	    },
	    data: {
	      history: [],
	      show: false,
	      mode : 'new',
	      totalrow: 1,
	      id_atasan: '',
	      myTable2: '',
	      myTable:''
	    },
	    methods: {
	    	loadData: function(id){
		    	var that = this;

		    }
	    }
	})
	

	$(document).ready(function(){  
		$(".select2").select2();
		var modal_lv = 0;
		$('.modal').on('shown.bs.modal', function (e) {
		    $('.modal-backdrop:last').css('zIndex',1051+modal_lv);
		    $(e.currentTarget).css('zIndex',1052+modal_lv);
		    modal_lv++
		});

		$('.modal').on('hidden.bs.modal', function (e) {
		    modal_lv--
		});
		$(document).on('hidden.bs.modal', function (event) {
		  
		})

		$('#ViewTable').DataTable({
			dom: 'frtip',
			ajax: {		            
	            "url": "alasan/dataTable",
	            "type": "GET"
	        },
	        processing	: true,
			serverSide	: true,			
			"bPaginate": true,	
			"autoWidth": true,
	    });

	    $('#btnAdd').on('click', function (event) {
			$("#lbl-title").text('Tambah');
			$("#alasan").val('');
			$("#id").val('');

			$('#ModalEdit').modal({ keyboard: false}) ;
		});

		$('#btnUpload').on('click', function (event) {
	    	$('#ModalAdd').modal({backdrop: 'static', keyboard: false}) ;
	    });
	})

    

	function editmodal(val){
		$.get('alasan/edit', { id: $(val).data('id') }, function(data){ 
			$("#lbl-title").text("Edit");
     		$("#alasan").val(data['parent'][0]['reason']);
     		$("#id").val(data['parent'][0]['id']);

       		$('#ModalEdit').modal({backdrop: 'static', keyboard: false}) ;
       
        });

	}

	
	$('#btnSubmit').on('click', function (e) {
		var valid = false;
    	var sParam = $('#FormEdit').serialize();
    	var validator = $('#FormEdit').validate({
							rules: {
									alasan: {
							  			required: true
									},
								}
							});
	 	validator.valid();
	 	$status = validator.form();
	 	if($status) {
	 		var link = 'alasan/Save';
	 		$.post(link,sParam, function(data){
				if(data.error==false){									
					window.location.reload();
				}else{	
					$("#lblMessage").remove();
					$("<div id='lblMessage' class='alert alert-danger' style='display: inline-block;float: left;width: 68%;padding: 10px;text-align: left;'><strong><i class='ace-icon fa fa-times'></i> "+data.msg+"!</strong></div>").appendTo(".modal-footer");
											  					  	
				}
			},'json');
	 	}
        
    });

   
	function hapus(val) {
		var r = confirm("Yakin dihapus?");
		if (r == true) {
			
			$.get('alasan/delete', { id: $(val).data('id') }, function(data){ 
				window.location.reload();
			})
		
		}
	}
	

	
</script>
