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
	            "url": "members/dataTable",
	            "type": "GET"
	        },
	        processing	: true,
			serverSide	: true,			
			"bPaginate": true,	
			"autoWidth": true,
	    });
	    $('#ViewTableBlacklist').DataTable({
			dom: 'frtip',
			ajax: {		            
	            "url": "members/dataTableBlacklist",
	            "type": "GET"
	        },
	        processing	: true,
			serverSide	: true,			
			"bPaginate": true,	
			"autoWidth": true,
	    });

	    $('#btnAdd').on('click', function (event) {
			$("#lbl-title").text('Tambah');
			$("#nama_lengkap").val('');
			$("#nama_facebook").val('');
			$("#nama_lengkap").val('');
			$("#alamat_lengkap").val('');
			$("#email").val('');
			$("#nomor_wa").val('');
			$("#provinsi").val('');
			$("#kecamatan").val('');
			$("#kota").val('');
			$("#kelurahan").val('');

			$("#id").val('');

			$('#ModalEdit').modal({ keyboard: false}) ;
		});

		$('#btnUpload').on('click', function (event) {
	    	$('#ModalAdd').modal({backdrop: 'static', keyboard: false}) ;
	    });
	})

    $("#provinsi").change(function(e, params){ 
    	getKota($('#provinsi').val(),'kota');
  	});
  	$("#kota").change(function(e, params){   
      	getKecamatan($('#kota').val(),'kecamatan');
  	});
  	$("#kecamatan").change(function(e, params){   
      	getKelurahan($('#kecamatan').val(),'kelurahan');
  	});

  	function getKota(val,name,selected="", selected_kec =""){
    	$.get('<?= base_url() ?>register/getKota', { prov: val  }, function(data){ 

          	$('#' + name).empty();
          	var kota_def = ''; var kota_selected = '';
          	$.each(data,function(i,value){
            	if(i==0) kota_def = value.type + '. ' + value.city_name;
            	if(selected !="" && (value.type + '. ' + value.city_name) == selected) {
            		kota_selected="selected";
            	}else{
            		kota_selected="";
            		kota_def=selected;
            	}
            	$('#' + name).append('<option value="'+ value.type + '. ' + value.city_name +'" '+ kota_selected +'>'+ value.type + ' ' + value.city_name +'</option>');

          	})
  			if(selected_kec != ""){
  				getKecamatan(kota_def,'kecamatan',selected_kec);
  			}else{
          		getKecamatan(kota_def,'kecamatan');
  			}

    	});
     
  	}
  	function getKecamatan(val,name,selected=""){
    	$.get('<?= base_url() ?>register/getKecamatan', { kota: val  }, function(data){ 

      		$('#' + name).empty();
      		$('#kecamatan').append('<option value="">Pilih Kecamatan</option>');
      		var kota_selected = '';
      		$.each(data,function(i,value){
      			if(selected !="" && value.subdistrict_name == selected) {
            		kota_selected="selected";
            	}else{
            		kota_selected="";
            	}
              	$('#' + name).append('<option value="'+value.subdistrict_name+'" '+ kota_selected +'>'+value.subdistrict_name+'</option>');
          	})
      	});

      	$('#kelurahan').empty();
      	$('#kelurahan').append('<option value="">Pilih Kelurahan</option>');
  	}
  	function getKelurahan(val,name,selected_kel=""){
    	$.get('<?= base_url() ?>register/getKelurahan', { kec: val  }, function(data){ 

      		$('#' + name).empty();
      		var selected = '';
        	$.each(data,function(i,value){
        		if(selected_kel !="" && value.kelurahan == selected_kel) {
            		selected="selected";
            	}else{
            		selected="";
            	}
              $('#' + name).append('<option value="'+value.kelurahan+'" '+ selected +'>'+value.kelurahan+'</option>');
          	})
      	});
  	}

	function editmodal(val){
		$.get('members/edit', { id: $(val).data('id') }, function(data){ 
			$("#lbl-title").text("Edit");
     		$("#nama_lengkap").val(data['parent'][0]['nama_lengkap']);
     		$("#nama_facebook").val(data['parent'][0]['nama_facebook']);
			$("#email").val(data['parent'][0]['email']);

			$("#nomor_wa").val(data['parent'][0]['nomor_wa']);
			$("#alamat_lengkap").html(data['parent'][0]['alamat'].replace(/<br *\/?>/gi, ''));

			$("#provinsi").val(data['parent'][0]['provinsi']);
			getKota($('#provinsi').val(),'kota',data['parent'][0]['kota'],data['parent'][0]['kecamatan']);
			// $("#kota").val(data['parent'][0]['kota']);
			getKecamatan($('#kota').val(),'kecamatan',data['parent'][0]['kecamatan']);
			// $("#kecamatan").val(data['parent'][0]['kecamatan']);
			getKelurahan(data['parent'][0]['kecamatan'],'kelurahan',data['parent'][0]['kelurahan']);
			// $("#kelurahan").val(data['parent'][0]['kelurahan']);
			$("#id").val(data['parent'][0]['id']);


       		$('#ModalEdit').modal({backdrop: 'static', keyboard: false}) ;
       
        });

	}

	
	$('#btnSubmitEdit').on('click', function (e) {
		var valid = false;
    	var sParam = $('#FormEdit').serialize();
    	var validator = $('#FormEdit').validate({
							rules: {
									nama_lengkap: {
							  			required: true
									},
									nomor_wa: {
							  			required: true
									},
									alamat_lengkap: {
							  			required: true
									},
									kelurahan: {
							  			required: true
									},
								}
							});
	 	validator.valid();
	 	$status = validator.form();
	 	if($status) {
	 		var link = 'members/Save';
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

    $('#btnSubmitBanned').on('click', function (e) {
    	e.preventDefault();
    	var valid = false;
    	var sParam = $('#FormBlacklist').serialize();
    	var validator = $('#FormBlacklist').validate({
							rules: {
									alasan: {
							  			required: true
									},
								}
							});
	 	validator.valid();
	 	$status = validator.form();
	 	if($status) {
			$.post('members/banned', sParam, function(data){ 
				if(data.error==false){									
					window.location.reload();
				}
			})
		}
    })

	function hapus(val) {
		var r = confirm("Yakin dihapus?");
		if (r == true) {
			
			$.get('members/delete', { id: $(val).data('id') }, function(data){ 
				window.location.reload();
			})
		
		}
	}
	function hapusBlacklist(val) {
		var r = confirm("Yakin dihapus?");
		if (r == true) {
			
			$.get('members/deleteblacklist', { id: $(val).data('id') }, function(data){ 
				window.location.reload();
			})
		
		}
	}

	function banned(val) {
		$("#id_member").val($(val).data('id'));
		$('#ModalBan').modal({ keyboard: false}) ;
	}

	
</script>
