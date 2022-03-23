<style type="text/css">

</style>
<?php if(isset($error)) { echo $error; }; ?>
<form method="POST" action="<?php echo base_url() ?>index.php/register/daftar">
  <div class="card card-login">
    <div class="card-header ">
      <div class="card-header ">

        <h3 class="header text-center">DAFTAR CUSTOMER BARU PRASTIKA COLLECTION</h3>
        <p style="text-align: center;">Formulir Pendaftaran Prastika Collection</p>
        <?php if ($this->session->flashdata('message')) { ?>
          <div class="alert alert-success" style="font-size: 20px;color: navy;"> <?= $this->session->flashdata('message') ?> </div>
        <?php } ?>
      </div>
    </div>
    <div class="card-body ">
      <div class="input-group">
        <!-- <label style="padding: 10px;font-weight: 500;font-size: 16px;">Email *</label> -->
        <div class="input-group-prepend">
          <span class="input-group-text">
            <!-- <i class="nc-icon nc-single-02"></i> -->
          </span>
        </div>
        <input type="email" name="email" class="form-control" placeholder="Masukkan Email Anda" />
        <?php echo form_error('email'); ?>
      </div>
      <div class="input-group">
        <!-- <label style="padding: 10px;font-weight: 500;font-size: 16px;">Nama Facebook *</label> -->
        <div class="input-group-prepend">
          <span class="input-group-text">
            <!-- <i class="nc-icon nc-key-25"></i> -->
          </span>
        </div>
        <input type="text" name="nama_facebook" class="form-control" placeholder="Nama Facebook" required />
        <?php echo form_error('nama_facebook'); ?>
      </div>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <!-- <i class="nc-icon nc-key-25"></i> -->
          </span>
        </div>
        <input type="text" name="nomor_wa" class="form-control" placeholder="Nomor Whatsapp" required />
        <?php echo form_error('nomor_wa'); ?>
      </div>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <!-- <i class="nc-icon nc-key-25"></i> -->
          </span>
        </div>
        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required />
        <?php echo form_error('nama_lengkap'); ?>
      </div>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <!-- <i class="nc-icon nc-key-25"></i> -->
          </span>
        </div>
        <textarea rows="2" name="alamat_lengkap" class="form-control" placeholder="Alamat Lengkap" required></textarea>
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
          <?php 
          foreach($kota as $row)
          { 
            echo '<option value="'.$row->kota.'">'.$row->kota.'</option>';
          }
          ?>
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
          <?php 
            foreach($kecamatan as $row)
            { 
              echo '<option value="'.$row->kecamatan.'">'.$row->kecamatan.'</option>';
            }
            ?>
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
      
      
      
      <div style="border: solid 1px grey;border-radius: 10px;padding: 10px;background-color: #ececec ">
        LANJUT ORDER DI LIVE, KETIK : <br><br>
        KODE_BARANG.QTY.ID_MEMBER <br><br>
        CONTOH : BG1.1.A1<br><br>

        NOTE : WAJIB MENGGUNAKAN TITIK TANPA ADA SPASI
      </div>
      <br />
      
    </div>
    <div class="card-footer ">
    	<button type="submit" class="btn btn-warning btn-round btn-block mb-3">
        <!-- <i class="ace-icon fa fa-key"></i> -->
        <span class="bigger-110">Submit</span>
      </button>
      
    </div>
  </div>
  <input type="hidden" id="csrf_token" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" >
</form>