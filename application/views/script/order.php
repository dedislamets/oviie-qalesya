<script type="text/javascript">
	var oTable;
	$(document).ready(function(){  
		
	 // oTable = $('#InvoiceList').DataTable({
		// 	dom: 'frtip',
		// 	ajax: {		            
	 //            "url": "order/dataTable",
	 //            "type": "GET"
	 //        },
	 //        processing	: true,
		// 	serverSide	: true,			
		// 	"bPaginate": true,	
		// 	"autoWidth": true,

	 //    });

		
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
	      saveData(id_posting, id_member, kurir, admin){
	      	if(kurir == ""){
	      		alert('Kurir belum dipilih');
	      		return;
	      	}
	      	if(admin == ""){
	      		alert('Admin belum dipilih');
	      		return;
	      	}
	        var that = this;
	        const param = { id_posting: id_posting, id_member: id_member, kurir: kurir, admin: admin };
	        axios.post("<?= base_url()?>order/kirim", param)
	        .then(response => {
	          
	          that.loadRekap();
	        });
	      },
	      onChange(event, id_posting, id_member) {

            const param = { id_posting: id_posting, id_member: id_member, kurir: event.target.value };
	        axios.post("<?= base_url()?>order/kurir", param)
	        .then(response => {
	        	if(response.data.error==false){
	        		for (let val of app.list_rekap) {
	        			if(val.id_member == id_member){
	        				val.ongkir = response.data.ongkir ;
	        			}	
	        		}
	        	}else{
	        		alert(response.data.msg);
	        		for (let val of app.list_rekap) {
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

    $(document).on('blur', "[id=dibayar]", function(){
		if($("#total").val() == $("#dibayar").val()){
			$("#status_bayar").val('Paid');
		}else{
			$("#status_bayar").val('Deposit');
		}
	});	
</script>
