<style type="text/css">
    #ViewTable td {
        padding: 0.45rem;
    }
    .status-wa{
        text-align: center;
        font-weight: 300;
        font-style: italic;
        padding-top: 6px;
    }

    
</style>
<div class="sh-pagetitle">
    <div class="input-group"></div>
    <div class="sh-pagetitle-left">
        <div class="sh-pagetitle-icon"><i class="icon ion-ios-list"></i></div>
        <div class="sh-pagetitle-title">
            <h2>Data Invoice</h2>
        </div>
    </div>
</div>

<div class="sh-pagebody">
    <div class="card bd-primary mg-t-20">
      <div class="card-header bg-primary">
        
      </div><!-- card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
                <div class="clearfix">
                  <ul class="nav nav-tabs float-left mb-0" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#basic" role="tab" aria-controls="basic" aria-expanded="true" aria-selected="true">Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#assumtion" role="tab" aria-controls="assumtion" aria-expanded="false" aria-selected="false">Deposit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="paid-tab" data-toggle="tab" href="#paid" role="tab" aria-controls="assumtion" aria-expanded="false" aria-selected="false">Paid</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="delivery-tab" data-toggle="tab" href="#assumtion" role="tab" aria-controls="assumtion" aria-expanded="false" aria-selected="false">Delivery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="cancel-tab" data-toggle="tab" href="#cancel" role="tab" aria-controls="assumtion" aria-expanded="false" aria-selected="false">
                            Cancel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="group-tab" data-toggle="tab" href="#group" role="tab" aria-controls="group" aria-expanded="false" aria-selected="false">
                            Grouping
                        </a>
                    </li>
                  </ul>
                </div>
                <div class="tab-content shadow rounded-bottom mb-lg" id="myTabContent">
                    <div role="tabpanel" class="tab-pane in clearfix active" id="basic" aria-labelledby="basic-tab" aria-expanded="true">
                      <div class="table-wrapper">
                          <table id="InvoiceList" class="table table-striped" width="100%">
                              <thead class="text-primary">
                                  <tr>
                                      <th style="width: 100px">
                                        No Invoice
                                      </th>
                                      <th>
                                        Tgl Invoice
                                      </th>
                                      <th>
                                        Expired
                                      </th>
                                      <th>
                                        Pemesan
                                      </th>
                                      
                                      <th>
                                        Qty
                                      </th>
                                      <th>
                                        Berat
                                      </th>
                                      <th>
                                        Ongkir
                                      </th>
                                      <th>
                                        Expedisi
                                      </th>
                                      <th>
                                        Subtotal
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
                    <div class="tab-pane" id="assumtion" role="tabpanel" aria-labelledby="assumtion-tab" aria-expanded="false">
                      <div class="table-wrapper">
                          <table id="InvoiceListDeposit" class="table table-striped" width="100%">
                              <thead class="text-primary">
                                  <tr>
                                      <th style="width: 100px">
                                        No Invoice
                                      </th>
                                      <th>
                                        Tgl Invoice
                                      </th>
                                      <th>
                                        Expired
                                      </th>
                                      <th>
                                        Nama Pemesan
                                      </th>
                                      
                                      <th>
                                        Qty
                                      </th>
                                      <th>
                                        Berat
                                      </th>
                                      <th>
                                        Ongkir
                                      </th>
                                      <th>
                                        Subtotal
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
                    <div class="tab-pane" id="paid" role="tabpanel" aria-labelledby="paid-tab" aria-expanded="false">
                      <div class="table-wrapper">
                          <table id="InvoiceListPaid" class="table table-striped" width="100%">
                              <thead class="text-primary">
                                  <tr>
                                      <th style="width: 100px">
                                        No Invoice
                                      </th>
                                      <th>
                                        Tgl Invoice
                                      </th>
                                      <th>
                                        Expired
                                      </th>
                                      <th>
                                        Nama Pemesan
                                      </th>
                                      
                                      <th>
                                        Qty
                                      </th>
                                      <th>
                                        Berat
                                      </th>
                                      <th>
                                        Ongkir
                                      </th>
                                      <th>
                                        Subtotal
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
                    <div class="tab-pane" id="delivery" role="tabpanel" aria-labelledby="delivery-tab" aria-expanded="false">
                      <div class="table-wrapper">
                          <table id="InvoiceListDelivery" class="table table-striped" width="100%">
                              <thead class="text-primary">
                                  <tr>
                                      <th style="width: 100px">
                                        No Invoice
                                      </th>
                                      <th>
                                        Tgl Invoice
                                      </th>
                                      <th>
                                        Expired
                                      </th>
                                      <th>
                                        Nama Pemesan
                                      </th>
                                      
                                      <th>
                                        Qty
                                      </th>
                                      <th>
                                        Berat
                                      </th>
                                      <th>
                                        Ongkir
                                      </th>
                                      <th>
                                        Subtotal
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
                    <div class="tab-pane" id="cancel" role="tabpanel" aria-labelledby="cancel-tab" aria-expanded="false">
                        <div class="table-wrapper">
                          <table id="InvoiceListCancel" class="table table-striped" width="100%">
                              <thead class="text-primary">
                                  <tr>
                                      <th style="width: 100px">
                                        No Invoice
                                      </th>
                                      <th>
                                        Tgl Invoice
                                      </th>
                                      <th>
                                        Expired
                                      </th>
                                      <th>
                                        Nama Pemesan
                                      </th>
                                      
                                      <th>
                                        Qty
                                      </th>
                                      <th>
                                        Berat
                                      </th>
                                      <th>
                                        Ongkir
                                      </th>
                                      <th>
                                        Subtotal
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
                    <div class="tab-pane" id="group" role="tabpanel" aria-labelledby="group-tab" aria-expanded="false">
                        <div class="table-wrapper">
                          <div class="card bd-primary" style="margin-bottom: 10px;">
                            <div class="card-header bg-primary tx-white">
                              <div class="pull-right">
                                <a class="btn btn-dark btn-rounded" id="btnAdd" href="javascript:void(0)"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
                              </div>
                            </div>
                          </div>
                          <table id="InvoiceListGroup" class="table table-striped" width="100%" >
                              <thead class="text-primary">
                                  <tr>
                                      <th style="width: 100px">
                                        No Invoice
                                      </th>
                                      <th>
                                        Tgl Invoice
                                      </th>
                                      <th>
                                        Expired
                                      </th>
                                      <th>
                                        Nama Pemesan
                                      </th>
                                      
                                      <th>
                                        Qty
                                      </th>
                                      <th>
                                        Berat
                                      </th>
                                      <th>
                                        Ongkir
                                      </th>
                                      <th>
                                        Subtotal
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
        </div>
        
      </div><!-- card-body -->
    </div>

</div>

