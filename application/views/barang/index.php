<h1 class="page-title">Data &gt; <span class="fw-semi-bold">Barang</span></h1>

<div class="sh-pagebody">

    <div class="card bd-primary">
        <div class="card-header bg-primary tx-white">
            <div class="pull-right">
                <a class="btn btn-dark btn-rounded" id="btnAdd" href="<?= base_url() ?>barang/create"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
                <a class="btn btn-info" id="btnTemplate" href="<?= base_url() ?>barang/template"><i class="fa fa-download"></i>&nbsp; Download Template</a>
                <a class="btn btn-warning" id="btnUpload" href="javascript:void(0)"><i class="fa fa-upload"></i>&nbsp; Upload Template</a>
            </div>
        </div>
        <div class="card-body pd-sm-30">

            <div class="table-wrapper">
                <table id="ViewTable" class="table table-striped">
                    <thead class="text-primary">
                        <tr>
                            <th style="width: 100px">
                              Kode Barang
                            </th>
                            <th style="width: 250px">
                              Nama Barang
                            </th>
                            <th>
                              Warna
                            </th>
                            <th>
                              Spesifikasi
                            </th>
                            <th>
                              Stok
                            </th>
                            <th>
                              Berat(Kg)
                            </th>
                            <th>
                              Harga
                            </th>
                            <th>
                              Status
                            </th>
                            <th>
                              Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
