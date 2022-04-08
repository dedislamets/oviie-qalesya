<style type="text/css">
  select.selectpicker{display:none !important}
</style>
<h1 class="page-title">Data &gt; <span class="fw-semi-bold">Members</span></h1>
<div class="sh-pagebody">

  <div class="card bd-primary">
    <div class="card-header bg-primary tx-white">
        <div class="pull-right">
            <a class="btn btn-dark btn-rounded" id="btnAdd" href="javascript:void(0)"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
            <a class="btn btn-info" id="btnTemplate" href="<?= base_url() ?>template/templatememberupload.xlsx"><i class="fa fa-download"></i>&nbsp; Download Template</a>
            <a class="btn btn-warning" id="btnUpload" href="javascript:void(0)"><i class="fa fa-upload"></i>&nbsp; Upload Template</a>
        </div>
    </div>

    <div class="card-body pd-sm-30">
      <ul class="nav nav-tabs float-left mb-0" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#basic" role="tab" aria-controls="basic" aria-expanded="true" aria-selected="true">Member</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#assumtion" role="tab" aria-controls="assumtion" aria-expanded="false" aria-selected="false">Blacklist</a>
        </li>
        
      </ul>
    </div>
    <div class="tab-content shadow rounded-bottom mb-lg" id="myTabContent">
        <div role="tabpanel" class="tab-pane in clearfix active" id="basic" aria-labelledby="basic-tab" aria-expanded="true">
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
                  <th width="100">#</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
          </div>
         
        </div>
        <div class="tab-pane" id="assumtion" role="tabpanel" aria-labelledby="assumtion-tab" aria-expanded="false">
          <div id="table-dynamic">
            <table id="ViewTableBlacklist" class="table table-striped table-editable no-margin mb-sm" style="width: 100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Kode Member</th>
                  <!-- <th>Email</th> -->
                  <th>No WA</th>
                  <th>Nama Lengkap</th>
                  <th>Facebook</th>
                  <th>Kecamatan</th>
                  <th>Kota</th>
                  <th>Alasan</th>
                  <th width="10%">#</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
          </div>
        </div>    
    </div>
      
  </div>
</div>
