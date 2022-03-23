<script type="text/javascript">
	var app = new Vue({
	    el: "#app",
	    mounted: function () {
	      // this.loadHistory();
	      
	    },
	
	    data: {
	      history: [],
	      overlay: false,
	      status_update:'',
	      id: '',
	      last_status:''
	    },
	    methods: {
	    	loadHistory: function () {
		        var that = this;

		        jQuery.ajax({
		          type: "GET",
		          cache:false,
		          url: 'https://www.wmlogistics.id/esys/trace/tracking',
		          data: {id: $("#no_route").val()},
		          success: function(response) {          
		              	that.history = response;
		              	
		          },
		        });
		    },
	    }
	})

	$("#btnShowLink").click(function(e, params){
    	app.id = $("#no_route").val();
		$.get('https://www.wmlogistics.id/esys/trace/info', { id: $("#no_route").val() }, function(data){ 
				if(data.data.no_routing == null) app.id= '';
				$("#nomor_spk").text(data['data']['spk_no']);
				$("#moda").text(data['moda']['moda_name'] + '-' + data['moda']['moda_kategori'] + '-' + data['moda']['moda_subkategori']);
				$("#project").text(data['data']['nama_project']);
				$("#tgl_routing").text(data['data']['CreatedDate']);

				$("#attn_pengirim").text(data['data']['attn_pengirim']);
				$("#nama_pengirim").text((data['data']['pengirim'] !=  null ? data['data']['pengirim']['cust_name'] : ''));
				$("#alamat_pengirim").text(data['data']['alamat_pengirim']);
				$("#kota_pengirim").text(data['data']['kota_pengirim']);
				$("#kec_pengirim").text(data['data']['kec_pengirim']);
				$("#zip_pengirim").text(data['data']['zip_pengirim']);
				$("#hp_pengirim").text(data['data']['hp_pengirim']);

				$("#attn_penerima").text(data['data']['attn_penerima']);
				$("#nama_penerima").text((data['data']['penerima'] !=  null ? data['data']['penerima']['cust_name'] : ''));
				$("#alamat_penerima").text(data['data']['alamat_penerima']);
				$("#kota_penerima").text(data['data']['kota_penerima']);
				$("#kec_penerima").text(data['data']['kec_penerima']);
				$("#zip_penerima").text(data['data']['zip_penerima']);
				$("#hp_penerima").text(data['data']['hp_penerima']);

				app.loadHistory()

		})
	})
</script>