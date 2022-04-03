<div id="ModalUser" class="modal" >
  <div class="modal-dialog" role="dialog" style="margin: 10% auto;">
      <div class="modal-content" id="app">
        <div class="modal-header" >
            <h4 class="modal-title" id="myModalLabel" ><label >Pilih Invoice</label> <label id="lbl-title-cust"></label></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body" >
          <div class="dt-responsive table-responsive">
            <table id="ModalTableUser" class="table table-striped" style="width: 100%">
                <thead class="text-primary">
                    <tr>
                      <th>Pilih</th>
                      <th>No Invoice</th>
                      <th>Nama Customer</th>
                    </tr>
                </thead>
                <tbody>
                  
                </tbody>
            </table>
          </div>
          <div style="display: none">
              <input type="text" id="txtSelected" name="txtSelected">
          </div>
        </div>
        <div class="modal-footer" >
            <input type="hidden" id="csrf_token" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" >
            <button type="button" class="btn btn-success" id="btnsubmit">Submit</button>
        </div>
      </div>
  </div>
</div>