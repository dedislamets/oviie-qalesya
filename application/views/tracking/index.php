<style type="text/css">
	@media (max-width: 575px){
		.about-low-area {
		     display: block; 
		     padding: 20px;
		}
	}
	.z-depth-0 {
	    -webkit-box-shadow: 0 0 25px 5px #ccc, 0 1px 5px 0 rgb(0 0 0 / 10%), 0 0 0 0 rgb(0 0 0 / 0%) !important;
	    box-shadow: 0 0 25px 5px #ccc, 0 1px 5px 0 rgb(0 0 0 / 10%), 0 0 0 0 rgb(0 0 0 / 0%) !important;
	}
	.card {
	    background-color: #FFFFFF;
	    /* padding: 10px 0 20px; */
	    width: 100%;
	}

	.card {
	    border-radius: 5px;
	    -webkit-box-shadow: 0 1px 20px 0 rgb(69 90 100 / 8%);
	    box-shadow: 0 1px 20px 0 rgb(69 90 100 / 8%);
	    border: none;
	    margin-bottom: 30px;
	}
	.card .card-header span {
	    color: #919aa3;
	    display: block;
	    font-size: 13px;
	    margin-top: 5px;
	}
	.m-r-0 {
	    margin-right: 0px;
	}

	.m-l-0 {
	    margin-left: 0px;
	}
	.bg-c-lite-green {
	    background: linear-gradient(to right, #E40405, #FA3B3B);
	}
	.b-b-default {
	    border-bottom: 1px solid #e0e0e0;
	}
	.m-b-20 {
	    margin-bottom: 20px;
	}
	.p-b-5 {
	    padding-bottom: 5px !important;
	}
	.card-block {
	    padding: 1.25rem;
	}
</style>


<div class="about-low-area section-padding30"  id="app">
	<div class="container">
		<div class="row">
			
			<div class="col-lg-12 col-md-12">
				<div class="card z-depth-0">
		            <div class="card-header" style="background-color: #404E67;color:#fff">
		                <div class="row">
		                    <div class="col-xl-12">
		                        <h4 style="text-align: center;color: #fff;">Trace & Tracking</h4>
		                        <span style="text-align: center;">Halaman ini menampilkan data routing dan mengupdate status nya</span>
		                    </div>
		                    
		                </div>
		            </div>
		            <div class="card-block" style="padding-top: 10px;padding-bottom: 10px;">		                
		                <div class="row seacrh-header">
		                    <div class="col-lg-4 offset-lg-4 offset-sm-3 col-sm-6 offset-sm-1 col-xs-12">
	                           	<div class="form-group row">
	                              	<div class="col-sm-12" >
		                                <div class="input-group input-group-button m-b-0">

		                                  <input type="text" class="form-control" id="no_route" name="no_route" value="" placeholder="Masukkan No Tracking">
		                                  <div class="input-group-addon btn btn-grd-inverse" id="btnShowLink" style="border-width: 0;background-color: #01a9ac;padding: 10px;line-height: initial;">
		                                    Cari
		                                  </div>
		                                </div>

	                              	</div>
	                            </div>
		                    </div>		                    
		                </div>
		            </div>
		        </div>   
		    </div>

		</div>

		<div class="row" id="pengirim" v-if="id != ''">
	        <div class="card z-depth-bottom-1">
	            <div class="card-block panels-wells">
	                <div class="col-sm-12">
	                    <div class="card">
	                    
	                        <div class="card-header" style="padding-bottom: 10px;background-color: #f3f3f3;">
	                            <div class="row">
	                                <div class="col-sm-12">
	                                    <div class="row">
	                                        <div class="col-sm-6">
	                                            <h5 class="card-header-text" style="display: block;">SPK/DO : <label id="nomor_spk"></label></h5>
	                                        </div>
	                                        <div class="col-sm-6">
	                                            <h5 class="card-header-text" style="display: block;">Project : <label id="project"></label></h5>
	                                        </div>
	                                        <div class="col-sm-6">
	                                            <h5 class="card-header-text" style="display: block;">Tanggal Routing : <label id="tgl_routing"></label></h5>
	                                        </div>
	                                        <div class="col-sm-6">
	                                            <h5 class="card-header-text" style="display: block;">Moda : <label id="moda"></label></h5>
	                                        </div>

	                                    </div>
	                                    
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row m-l-0 m-r-0">
	                            <div class="col-sm-6 bg-c-lite-green">
	                              <div class="card-block text-white">
	                                <div class="row b-b-default m-b-20 p-b-5">
	                                  <div class="col-sm-6  f-w-600">Pengirim</div>
	                                  <div class="col-sm-6">
	                                  </div>
	                                </div>
	                                <div class="row">
	                                  <div class="col-sm-10 col-sm-offset-1">
	                                    <h3 id="attn_pengirim" style="color: #fff;line-height: 1;"></h3>
	                                    <h3 id="nama_pengirim" style="color: #fff;"></h3>
	                                    <h5 id="alamat_pengirim" style="color: #fff;line-height:1"></h5>
	                                    <p class="m-b-0" id="kota_pengirim" style="color: #fff;"></p>
	                                    <p class="m-b-0" id="kec_pengirim" style="color: #fff;line-height: 1"><span id="zip_pengirim"></span></p>
	                                    <p class="m-b-0" id="hp_pengirim" style="color: #fff;"></p>
	                                  </div>
	                                </div>
	                              </div>
	                            </div>
	                            <div class="col-sm-6" style="background: linear-gradient(to right, #546D77, #3F5159);color: #fff;">
	                              <div class="card-block">
	                                  <div class="row b-b-default m-b-20 p-b-5">
	                                    <div class="col-sm-6  f-w-600">Penerima</div>
	                                    <div class="col-sm-6">
	                                      
	                                    </div>
	                                  </div>
	                                  <div class="row">
	                                    <div class="col-sm-10 col-sm-offset-1">
	                                      <h3 id="attn_penerima" style="color: #fff;line-height: 1;"></h3>
	                                      <h3 id="nama_penerima" style="color: #fff;"></h3>
	                                      <h5 id="alamat_penerima" style="color: #fff;line-height: 1"></h5>
	                                      <p class="m-b-0" id="kota_penerima" style="color: #fff;"></p>
	                                      <p class="m-b-0" id="kec_penerima" style="color: #fff;line-height: 1"><span id="zip_penerima"></span></p>
	                                      <p class="m-b-0" id="hp_penerima" style="color: #fff;"></p>
	                                    </div>
	                                  </div>
	                              </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="row" v-if="id != ''">
	        <h4 class="info-text" style="margin-top: 30px;padding-left: 10px;">Riwayat Pengiriman
	        </h4>
	        <div class="card z-depth-bottom-1">
	            <div class="card-block panels-wells">
	                <div class="col-md-12 timeline-dot">
	                	<div v-for="log in history">
	                        <div class="social-timelines p-relative" >
	                            <div class="row timeline-right p-t-35">

	                                <div class="col-12 col-sm-12 col-xl-12 p-l-5 p-b-10">
	                                    
	                                        <div class="card card-border-danger">
	                                          <div class="card-block">
	                                            <div class="row">
	                                              <div class="col-sm-12">
	                                                <div class="well m-b-0 p-10">
	                                                  <div class="row">
	                                                    <div class="col-sm-9">
	                                                      <p style="font-style: italic;line-height: 1">{{ log.remark }}</p>
	                                                      <p class="m-b-0" style="line-height: 1">Updated by: {{ log.created_by }}</p>
	                                                      
	                                                      <p class="task-due"><strong> Time Updated : </strong><strong class="label label-primary">{{ log.created_date }}</strong></p>
	                                                    </div>
	                                               
	                                                    <div class="col-sm-3">
	                                                      <div style="font-size: 1.5rem;padding: 10px;text-align: center;font-weight: bold;">{{ log.status }}</div>
	                                                    </div> 
	                                                  </div>
	                                                </div>
	                                              </div>
	                                              
	                                            </div>
	                                          </div>
	                                      
	                                        </div>
	                                    
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
