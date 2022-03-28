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

		$('#btnSubmit').on('click', function (e) {
			var valid = false;
	    	var sParam = $('#Form').serialize();
	    	var validator = $('#Form').validate({
								rules: {
										nama_user: {
								  			required: true
										},
										email: {
								  			required: true
										},
										
									}
								});
		 	validator.valid();
		 	$status = validator.form();
		 	if($status) {
		 		var link = 'users/Save';
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


		$('#ViewTable').DataTable({
			dom: 'frtip',
			ajax: {		            
	            "url": "users/dataTable",
	            "type": "GET"
	        },
	        processing	: true,
			serverSide	: true,			
			"bPaginate": true,	
			// "ordering": false,
			"autoWidth": true,
			
	    });

	    $('#btnAdd').on('click', function (event) {
	    	app.mode = 'new';
			$("#lbl-title").text('Tambah');
			$("#nama_user").val('');
			$("#email").val('');
			$("#password").val('');
			$("#status").prop('checked', false);

			$("#id").val('');

			$('#ModalAdd').modal({ keyboard: false}) ;
		});

	})

	function editmodal(val){

		$.get('users/edit', { id: $(val).data('id') }, function(data){ 
				app.id_atasan = $(val).data('id');
				app.mode = 'edit';
				$("#lbl-title").text("Edit");
         		$("#nama_user").val(data['parent'][0]['nama_user']);
				$("#email").val(data['parent'][0]['email']);

				$("#department").val(data['parent'][0]['department']);
				$("#jenis_kelamin").val(data['parent'][0]['jenis_kelamin']);

				$("#password").val('');
				$("#id_role").val(data['parent'][0]['id_role']);

				if(data['parent'][0]['status'] == 1){
					$("#status").prop('checked', true);
				}else{
					$("#status").removeAttr("checked");
				}

				$("#id").val(data['parent'][0]['id_user']);


           		$('#ModalAdd').modal({backdrop: 'static', keyboard: false}) ;
           
        });

	}
	

	function hapus(val) {
		var r = confirm("Yakin dihapus?");
		if (r == true) {
			
			$.get('users/delete', { id: $(val).data('id') }, function(data){ 
				window.location.reload();
			})
		
		}
	}

	
</script>
