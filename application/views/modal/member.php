<div class="modal" id="ModalAdd">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header back-green" >
	        	
	        	<h4 class="modal-title" id="myModalLabel"><label id="lbl-title"></label> <label> Upload Template</label></h4>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
	      	</div>
			<form id="Form" name="Form" method="POST" class="grab form-horizontal" action="<?= base_url() ?>members/upload" role="form" enctype="multipart/form-data" target="_blank">
				<div class="modal-body">
			
					<div class="form-group">
						<label>File</label>
						<input type="file" id="file" name="file" class="form-control" />
					</div>	
					
									
					<input type="hidden" id="csrf_token" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" >
				</div>
				<div class="modal-footer">
		        	<div class="pull-right">
			            <button type="submit" id="btnSubmit" class="btn btn-primary btn-block">Submit</button>
			        </div>
		        </div>
			</form>
		</div>
	</div>
</div>

<div class="modal" id="ModalEdit">
  	<div class="modal-dialog" role="dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	
	        	<h4 class="modal-title" id="myModalLabel" ><label id="lbl-title"></label> <label> Users</label></h4>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
	      	</div>
    			<form id="FormEdit" name="FormEdit" class="grab form-horizontal" role="form">
    				<div class="modal-body">
    					<div class="row">
    						<div class="col-sm-12">
    							
    							<div class="input-group">
				                    <!-- <label style="padding: 10px;font-weight: 500;font-size: 16px;">Email *</label> -->
				                    <div class="input-group-prepend">
				                      <span class="input-group-text">
				                        <!-- <i class="nc-icon nc-single-02"></i> -->
				                      </span>
				                    </div>
				                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email Anda" />
				                    <?php echo form_error('email'); ?>
				                  </div>
				                  <div class="input-group">
				                    <!-- <label style="padding: 10px;font-weight: 500;font-size: 16px;">Nama Facebook *</label> -->
				                    <div class="input-group-prepend">
				                      <span class="input-group-text">
				                        <!-- <i class="nc-icon nc-key-25"></i> -->
				                      </span>
				                    </div>
				                    <input type="text" id="nama_facebook" name="nama_facebook" class="form-control" placeholder="Nama Facebook" required />
				                    <?php echo form_error('nama_facebook'); ?>
				                  </div>
				                  <div class="input-group">
				                    <div class="input-group-prepend">
				                      <span class="input-group-text">
				                        <!-- <i class="nc-icon nc-key-25"></i> -->
				                      </span>
				                    </div>
				                    <input type="text" id="nomor_wa" name="nomor_wa" class="form-control" placeholder="Nomor Whatsapp" required />
				                    <?php echo form_error('nomor_wa'); ?>
				                  </div>
				                  <div class="input-group">
				                    <div class="input-group-prepend">
				                      <span class="input-group-text">
				                        <!-- <i class="nc-icon nc-key-25"></i> -->
				                      </span>
				                    </div>
				                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required />
				                    <?php echo form_error('nama_lengkap'); ?>
				                  </div>
				                <div class="input-group">
				                    <div class="input-group-prepend">
				                      <span class="input-group-text">
				                        <!-- <i class="nc-icon nc-key-25"></i> -->
				                      </span>
				                    </div>
				                    <textarea rows="2" id="alamat_lengkap" name="alamat_lengkap" class="form-control" placeholder="Alamat Lengkap" required></textarea>
				                    <?php echo form_error('alamat_lengkap'); ?>
				                </div>
    							<div class="input-group">
							        <div class="input-group-prepend">
							          <span class="input-group-text">
							            <!-- <i class="nc-icon nc-key-25"></i> -->
							          </span>
							        </div>
							        <select name="provinsi" id="provinsi" class="form-control" required>
							          <option value="">Pilih Provinsi</option>
							          <?php 
							          foreach($provinsi as $row)
							          { 
							            echo '<option value="'.$row->provinsi.'">'.$row->provinsi.'</option>';
							          }
							          ?>
							        </select>
							        <!-- <input type="text" name="provinsi" class="form-control" placeholder="Provinsi" required/> -->
							        <?php echo form_error('provinsi'); ?>
							      </div>
							      <div class="input-group">
							        <div class="input-group-prepend">
							          <span class="input-group-text">
							            <!-- <i class="nc-icon nc-key-25"></i> -->
							          </span>
							        </div>
							        <select name="kota" id="kota" class="form-control" required>
							          <option value="">Pilih Kota</option>
							          
							        </select>
							        <?php echo form_error('kota'); ?>
							      </div>
							      <div class="input-group">
							        <div class="input-group-prepend">
							          <span class="input-group-text">
							            <!-- <i class="nc-icon nc-key-25"></i> -->
							          </span>
							        </div>
							        <!-- <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" required /> -->
							        <select name="kecamatan" id="kecamatan" class="form-control" required                           >
							          <option value="">Pilih Kecamatan</option>
							          
							        </select>
							        <?php echo form_error('kecamatan'); ?>
							      </div>

							      <div class="input-group">
							        <div class="input-group-prepend">
							          <span class="input-group-text">
							            <!-- <i class="nc-icon nc-key-25"></i> -->
							          </span>
							        </div>
							        <select name="kelurahan" id="kelurahan" class="form-control" required>
							          <option value="">Pilih Kelurahan</option>
							          <?php 
							          foreach($kelurahan as $row)
							          { 
							            echo '<option value="'.$row->kelurahan.'">'.$row->kelurahan.'</option>';
							          }
							          ?>
							        </select>
							        <!-- <input type="text" name="kelurahan" class="form-control" placeholder="Kelurahan" required /> -->
							        <?php echo form_error('kelurahan'); ?>
							      </div>
    							
    						</div>
    						
    					</div>
    					<input type="hidden" name="id" id="id" value="">
    					<input type="hidden" id="csrf_token" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" >
    				</div>
    				<div class="modal-footer">
    		        	<div class="pull-right">
    			            <button type="button" id="btnSubmitEdit" class="btn btn-primary btn-block">Submit</button>
    			        </div>
    		        </div>
    			</form>
		</div>
	</div>
</div>

<div class="modal" id="ModalBan">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header back-green" >
	        	
	        	<h4 class="modal-title" id="myModalLabel"><label id="lbl-title"></label> <label> Alasan Blacklist</label></h4>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
	      	</div>
			<form id="FormBlacklist" name="FormBlacklist" method="POST" class="grab form-horizontal" role="form" >
				<div class="modal-body">
					
					<div class="form-group row">
                        <label class="control-label col-sm-3" for="website">
                            Alasan
                        </label>
                        <div class="col-sm-9">
                            <select name="alasan" id="alasan" class="form-control" required>
					          	<option value="">Pilih Alasan</option>
					          	<?php 
						          foreach($alasan as $row)
						          { 
						            echo '<option value="'.$row->reason.'">'.$row->reason.'</option>';
						          }
						          ?>
					        </select>
                        </div>
                    </div>
					
					
									
					<input type="hidden" id="csrf_token" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" >
				</div>
				<div class="modal-footer">
		        	<div class="pull-right">
		        		<input type="hidden" name="id_member" id="id_member" value="">
			            <button type="submit" id="btnSubmitBanned" class="btn btn-primary btn-block">Submit</button>
			        </div>
		        </div>
			</form>
		</div>
	</div>
</div>
