<h1 class="page-title">Data &gt; <span class="fw-semi-bold">Members</span></h1>


<div class="sh-pagebody">

  <div class="card bd-primary">
    <div class="card-header bg-primary tx-white">
        <div class="pull-right">
            <a class="btn btn-dark btn-rounded" id="btnAdd" href="<?= base_url() ?>barang/create"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
            <a class="btn btn-info" id="btnTemplate" href="<?= base_url() ?>template/templatememberupload.xlsx"><i class="fa fa-download"></i>&nbsp; Download Template</a>
            <a class="btn btn-warning" id="btnUpload" href="javascript:void(0)"><i class="fa fa-upload"></i>&nbsp; Upload Template</a>
        </div>
    </div>

    <div class="card-body pd-sm-30">

      <div id="table-dynamic">
        <table id="ViewTable" class="table table-striped table-editable no-margin mb-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>Kode Member</th>
              <!-- <th>Email</th> -->
              <th>No WA</th>
              <th>Nama Lengkap</th>
              <th>Facebook</th>
              <th>Kelurahan</th>
              <th>Kecamatan</th>
              <th>Kota</th>
              <th>Provinsi</th>
              <th>#</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card-body -->
</div>
