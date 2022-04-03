<div class="sh-pagetitle">
  <div class="input-group">

  </div><!-- input-group -->
  <div class="sh-pagetitle-left">
    <div class="sh-pagetitle-icon"><i class="icon ion-ios-cart mg-t-3"></i></div>
    <div class="sh-pagetitle-title">
      <span>Billing Information</span>
      <h2>Invoice Page</h2>
    </div><!-- sh-pagetitle-left-title -->
  </div><!-- sh-pagetitle-left -->
</div><!-- sh-pagetitle -->

<div class="sh-pagebody">

  <div class="card bd-primary">
    <div class="card-body pd-30 pd-md-60">
      <div class="d-md-flex justify-content-between flex-row-reverse">
        <h1 class="mg-b-0 tx-uppercase tx-gray-400 tx-mont tx-bold">Invoice</h1>
        <div class="mg-t-25 mg-md-t-0">
          <h6 class="tx-primary">Oviie Qalesyashop Boutique</h6>
          <p class="lh-7">
            Perum Grand Cikarang City <br>
            Jl Arjuna 63 Blok G.56 No.17<br>
            Bekasi, Jawa Barat<br>
          HP: 08996994000</p>
        </div>
      </div>

      <div class="row mg-t-20">
        <div class="col-md">
          <label class="tx-uppercase tx-13 tx-bold mg-b-20">Penerima</label>
          <h6 class="tx-inverse"><?= $header['nama_lengkap'] ?></h6>
          <p class="lh-7"><?= $header['alamat'] ?><br>
            <?= $header['kelurahan'] ?>, <?= $header['kecamatan'] ?>, <?= $header['kota'] ?>, <?= $header['provinsi'] ?><br>
            <?= $header['nomor_wa'] ?><br>
        </div><!-- col -->
        <div class="col-md">
          <label class="tx-uppercase tx-13 tx-bold mg-b-20">Invoice Information</label>
          <p class="d-flex justify-content-between mg-b-5">
            <span>Invoice No</span>
            <span><?= $header['kode_inv'] ?></span>
          </p>
          <p class="d-flex justify-content-between mg-b-5">
            <span>Admin</span>
            <span><?= $header['nama_admin'] ?></span>
          </p>
          <p class="d-flex justify-content-between mg-b-5">
            <span>Order Date:</span>
            <span><?= $header['tgl_invoice'] ?></span>
          </p>
        </div><!-- col -->
      </div>

      <div class="table-responsive mg-t-40">
        <a class="btn btn-dark btn-rounded" id="btnAddInv" href="javascript:void(0)"><i class="fa fa-plus"></i>&nbsp; Tambah Invoice</a>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th class="wd-20p">Kode Inv</th>
              <th class="wd-20p">Kode Brg</th>
              <th class="wd-40p">Nama Barang</th>
              <th class="tx-center">Qty</th>
              <th class="tx-right">Harga</th>
              <th class="tx-right">Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($detail as $key => $value) : ?>
                <tr>
                  <td>
                    <a href='javascript:void(0)' data-id="<?= $value['id'] ?>" data-parent="<?= $value['parent_invoice'] ?>" onclick="hapusinvoice(this)">
                        <span class="fa fa-trash"></span>
                    </a>
                  </td>
                  <td><?= $value['kode_inv'] ?></td>
                  <td><?= $value['kode_barang'] ?></td>
                  <td class="tx-12"><?= $value['nama_barang'] ?></td>
                  <td class="tx-center"><?= $value['qty'] ?></td>
                  <td class="tx-right"><?= number_format($value['harga']) ?></td>
                  <td class="tx-right"><?= number_format($value['qty'] * $value['harga']) ?></td>
                </tr>

              <?php
              endforeach;

            ?>
            
            
            <tr>
              <td colspan="4" rowspan="4" class="valign-middle">
                <div class="mg-r-20">
                  <label class="tx-uppercase tx-13 tx-bold mg-b-10">Catatan</label>
                  <p class="tx-13">Ini adalah bukti sah transaksi anda. </p>
                </div>
                <div class="mg-r-20">
                  <div style="font-size: 30px;font-weight: bold;"><?= $header['status'] ?></div>
                </div>
              </td>
              <td class="tx-right">SubTotal</td>
              <td colspan="4" class="tx-right"><?= number_format($header['total'] - $header['ongkir'] - $header['rand']) ?></td>
            </tr>
            <tr>
              <td class="tx-right">Kode Unik</td>
              <td colspan="3"  class="tx-right"><?= $header['rand'] ?></td>
            </tr>
            <tr>
              <td class="tx-right">Ongkir</td>
              <td colspan="3"  class="tx-right"><?= number_format($header['ongkir']) ?></td>
            </tr>
            <tr>
              <td class="tx-right tx-uppercase tx-bold tx-inverse">Total</td>
              <td colspan="3" class="tx-right"><h4 class="tx-primary tx-bold tx-lato"><?= number_format($header['total']) ?></h4>
                <input type="hidden" id="txt-total" value="<?= $header['total'] ?>">
                <input type="hidden" id="id_invoice" value="<?= $header['id'] ?>">
                <input type="hidden" id="no_invoice" value="<?= $header['kode_inv'] ?>">

              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <hr class="mg-b-60">
      <div class="row">
     
        <div class="col-md-6">
          <a href="<?= base_url() ?>order/listinv" id="btnback" class="btn btn-success btn-block"><< Kembali</a>
        </div>
        <div class="col-md-6">
          <a href="<?= base_url() ?>cetak?p=invoice&id=<?= $header['kode_inv'] ?>" target="_blank" class="btn btn-primary btn-block"><span class="fa fa-print"></span>&nbsp;Cetak</a>
        </div>
      </div>
    </div>
  </div>

</div>
