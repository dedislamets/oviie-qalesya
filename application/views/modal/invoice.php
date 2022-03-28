<div class="modal" id="modalUbah">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ubah Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="Form" name="Form" method="POST" class="form-horizontal" action="<?= base_url() ?>order/ubahstatus" role="form">
                <div class="modal-body">
                    
                        <div role="group" class="form-group">
                            <label for="email" class="d-block">Total Invoice</label>
                            <div>
                                <div role="group" class="input-group">
                                    <input id="total" name="total" type="number" readonly value="0" class="form-control input-transparent pl-3">
                                </div>
                            </div>
                        </div>
                        <div role="group" class="form-group">
                            <label for="email" class="d-block">Dibayar</label>
                            <div>
                                <div role="group" class="input-group">
                                    <input id="dibayar" name="dibayar" type="number" required="required" value="0" class="form-control input-transparent pl-3">
                                </div>
                            </div>
                        </div>
                        <div role="group" class="form-group">
                            <label for="email" class="d-block">Status</label>
                            <div>
                                <div role="group" class="input-group">
                                    <input id="status_bayar" name="status_bayar" type="text" required="required" value="Paid" class="form-control input-transparent pl-3" readonly>
                                </div>
                            </div>
                        </div>           
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="csrf_token" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" >
                    <input type="hidden" name="id_inv" id="id_inv" value="">
                    <input type="hidden" name="no_inv" id="no_inv" value="">
                    <button type="button" class="btn btn-default mr-2" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Commit</button>
                </div>
            </form>
        </div>
    </div>
</div>