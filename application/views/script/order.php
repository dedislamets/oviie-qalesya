<script type="text/javascript">
	var oTable;
	var oTableModalGrouping;
	$(document).ready(function(){ 
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

		$('#btnsubmit').on('click', function (event) {
	        var checked_courses = $('#ModalTableUser').find('input[name="selected_courses[]"]:checked').length;
	        if (checked_courses != 0) {
	            CheckedTrue();
	            
	        } else {
	            alert("Silahkan pilih terlebih dahulu");
	        }

	    });
	})

	var app = new Vue({
	    el: "#app",
	    mounted: function () {
	    	this.loadRekap();
	    },
	    updated: function () {
	      var that = this;
	      
	    },
	    data: {
	      id: '', 
	      list_rekap: [],
	      list_rekap_modal: [],
		  tanggal:'',
		  member:''
	    },
	    methods: {
	
	      	ganti(event){
	    		this.loadRekap();
	      	},
	      	cari(event){
	    		this.loadRekap();
	      	},
	      	saveData(tgl_order, id_member, kurir, admin){
	      		if(kurir == ""){
	      			alert('Kurir belum dipilih');
	      			return;
	      		}
	      		if(admin == ""){
		      		alert('Admin belum dipilih');
		      		return;
		      	}
		        var that = this;
		        const param = { tgl_order: tgl_order, id_member: id_member, kurir: kurir, admin: admin };
		        axios.post("<?= base_url()?>order/kirim", param)
		        .then(response => {
		          
		          that.loadRekap();
		        });
	      	},
	      	saveDataNew(){
	      		if($("#kurir_modal").val() == ""){
	      			alert('Kurir belum dipilih');
	      			return;
	      		}
	      		if($("#admin_modal").val() == ""){
		      		alert('Admin belum dipilih');
		      		return;
		      	}
		        var that = this;
		        const param = $("#Form").serialize();
		        axios.post("<?= base_url()?>order/kirimnew", param)
		        .then(response => {
		        	alertOK('','Rekapan berhasil di Invoice');
		          	$("#modalRekap").modal('hide');
		          	that.loadRekap();
		        });
	      	},
	      	openModal(tgl, id_member){
	      		this.loadRekapModal(tgl,id_member);
	      		
	      	},
	      	onChange(event, tgl_order, id_member) {

	            const param = { tgl_order: tgl_order, id_member: id_member, kurir: event.target.value };
		        axios.post("<?= base_url()?>order/kurir", param)
		        .then(response => {
		        	if(response.data.error==false){
		        		for (let val of app.list_rekap) {
		        			if(val.id_member == id_member && val.tgl_order == tgl_order){
		        				val.ongkir = response.data.ongkir ;
		        			}	
		        		}
		        	}else{
		        		alert(response.data.msg);
		        		for (let val of app.list_rekap) {
		        			if(val.id_member == id_member && val.tgl_order == tgl_order){
		        				val.kurir = '' ;
		        				val.ongkir = 0 ;
		        			}
		        		}
		        	}
		        });
          	},
          	onChangeModal(event, berat, id_member, kurir) {

	            const param = { berat: berat, id_member: id_member, kurir: event.target.value };
		        axios.post("<?= base_url()?>order/new_kurir", param)
		        .then(response => {
		        	if(response.data.error==false){
		        		for (let val of app.list_rekap_modal) {
		        			if(val.id_member == id_member){
		        				val.ongkir = response.data.ongkir ;
		        			}	
		        		}
		        	}else{
		        		alert(response.data.msg);
		        		for (let val of app.list_rekap_modal) {
		        			if(val.id_member == id_member){
		        				val.kurir = '' ;
		        				val.ongkir = 0 ;
		        			}
		        		}
		        	}
		        });
          	},
          
          	onDelete(event, id){
          		Swal.fire({
				  title: 'Yakin menghapus item ini?',
				  showCancelButton: true,
				  confirmButtonText: 'Yakin',
				}).then((result) => {
				  	if (result.isConfirmed) {

				        axios.get("<?= base_url()?>order/removeitm/", {params: { id_rekap: id }})
				        .then(response => {
					    	Swal.fire('Saved!', '', 'success')
					    	window.location.reload();
				        });

				  	} else if (result.isDenied) {
				    	Swal.fire('Changes are not saved', '', 'info')
				  	}
				})
          	},
          	onDeleteNew(event, id){
          		var that = this;
          		$.each(that.list_rekap_modal[0].detail, function(i, val) {
	    			if(val.id==id){
	    				that.list_rekap_modal[0].berat = (parseFloat(that.list_rekap_modal[0].berat) - (parseFloat(val.berat)*parseFloat(val.qty))).toFixed(1);
	    				that.list_rekap_modal[0].qty -= parseInt(val.qty);
	    				that.list_rekap_modal[0].detail.splice(i,1);
	    			}
	    		})
          	},
	      	async loadRekap(){
		        var that = this;
		        var sParam = {};
		        if(that.tanggal != "") {
		        	sParam['tgl'] = that.tanggal;
		        }
		        if(that.member != "") {
		        	sParam['member']= that.member;
		        }
		        try {
		          await axios.get('<?= base_url()?>order/list', { params: sParam })
		          .then(response => {
		          	// debugger;
		            that.list_rekap = response.data.rekapan;

		            let alphabet1 = "abcdefgh".split('');
		            let alphabet2 = "ijklmnop".split('');
	    			for (let val of that.list_rekap) {
		    			if(alphabet1.includes(val.nama_lengkap.toLowerCase().charAt(0)) ){
		    				val.admin = '08991994000';
		    			}else if( alphabet2.includes(val.nama_lengkap.toLowerCase().charAt(0)) ){
		    				val.admin = '08992994000';
		    			}else{
		    				val.admin = '08993994000';
		    			}
		    		}
		          });

		        }catch(e) {
		          alert(e);
		        }
	      	},
	    	async loadRekapModal(tgl,member){
		        var that = this;
		        var sParam = {};
		        if(tgl != "") {
		        	sParam['tgl'] = tgl;
		        }
		        if(member != "") {
		        	sParam['member']= member;
		        }
		        try {
		          await axios.get('<?= base_url()?>order/list', { params: sParam })
		          .then(response => {
		            that.list_rekap_modal = response.data.rekapan;
		            console.log(response.data.rekapan);

		            let alphabet1 = "abcdefgh".split('');
		            let alphabet2 = "ijklmnop".split('');
	    			for (let val of that.list_rekap_modal) {
		    			if(alphabet1.includes(val.nama_lengkap.toLowerCase().charAt(0)) ){
		    				val.admin = '08991994000';
		    			}else if( alphabet2.includes(val.nama_lengkap.toLowerCase().charAt(0)) ){
		    				val.admin = '08992994000';
		    			}else{
		    				val.admin = '08993994000';
		    			}
		    		}
		    		$("#modalRekap").modal({backdrop: 'static', keyboard: false}) ;
		          });

		        }catch(e) {
		          alert(e);
		        }
	      	},
	    }
	});


	$('#btnUbah').on('click', function (event) {
        $('#modalUbah').modal({backdrop: 'static', keyboard: false}) ;
        $("#total").val($("#txt-total").val());
        $("#id_inv").val($("#id_invoice").val());
        $("#no_inv").val($("#no_invoice").val());
        $("#dibayar").val(0);
        $('#dibayar').focus();
    });

    $("#btnCancel").on('click', function (event) {

      	Swal.fire({
		  title: 'Yakin mengbatalkan order ini?',
		  showCancelButton: true,
		  confirmButtonText: 'Yakin',
		}).then((result) => {
		  if (result.isConfirmed) {
	        axios.get("<?= base_url()?>order/cancel/", {params: { id_inv: $("#id_invoice").val() }})
	        .then(response => {
		    	Swal.fire('Saved!', '', 'success')
		    	window.location.reload();
	        });

		  } else if (result.isDenied) {
		    Swal.fire('Changes are not saved', '', 'info')
		  }
		})
          
    })

    $("#btnAddInv").on('click', function (event) {
    	$('#ModalUser').modal({backdrop: 'static', keyboard: false}) ;
    }) 

    $(document).on('blur', "[id=dibayar]", function(){
		if($("#dibayar").val() >= $("#total").val()){
			$("#status_bayar").val('Paid');
		}else{
			$("#status_bayar").val('Deposit');
		}
	});	

	function CheckedTrue() {
        var b = $("#txtSelected");
        b.val('');
        var str = "";
        var rowcollection = oTableModalGrouping.$(':checkbox', { "page": "all" });
      
        rowcollection.each(function () {
            if (this.checked) {
                str += this.value + ";";
            }
        });
        b.val(str);  
        $.ajax({
            type: "GET",
            url: "<?= base_url() ?>order/addinvoicegroup",
            data: {id: str,inv: $("#no_invoice").val()},
            dataType: "json",
            traditional: true,	            
           	beforeSend: function(){
				
			},
		    success: function (data) {
				$('#ModalUser').modal('hide');
	            window.location.reload();
	        },
        });
        
    }

    function hapusinvoice(val) {
		var r = confirm("Yakin dihapus?");
		if (r == true) {
			
			$.get('<?= base_url() ?>order/deleteinvgroup', { id: $(val).data('id'), parent: $(val).data('parent') }, function(data){ 
				window.location.reload();
			})
		
		}
	}
</script>
