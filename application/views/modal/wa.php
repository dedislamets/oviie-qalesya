<div class="modal" id="modalWA">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Pesan WA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
      
                <div class="modal-body">
                    <div id="pesan"></div>   
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="csrf_token" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" >
                    <button type="button" class="btn btn-default mr-2" data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>