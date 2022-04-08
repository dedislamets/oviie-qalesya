<div class="modal" id="ModalEdit">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header back-green" >
	        	
	        	<h4 class="modal-title" id="myModalLabel"><label id="lbl-title"></label> <label> Alasan Blacklist</label></h4>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
	      	</div>
			<form id="FormEdit" name="FormEdit" method="POST" class="grab form-horizontal" role="form" >
				<div class="modal-body">
					
					<div class="form-group row">
                        <label class="control-label col-sm-3" for="website">
                            Alasan
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="alasan" name="alasan" class="form-control" required="required">
                        </div>
                    </div>
					
					
									
					<input type="hidden" id="csrf_token" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" >
				</div>
				<div class="modal-footer">
		        	<div class="pull-right">
		        		<input type="hidden" name="id" id="id" value="">
			            <button type="submit" id="btnSubmit" class="btn btn-primary btn-block">Submit</button>
			        </div>
		        </div>
			</form>
		</div>
	</div>
</div>
