<div class="modal" id="modalRekap">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 900px">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Seleksi Item Rekapan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="Form" name="Form" method="POST" class="form-horizontal" action="<?= base_url() ?>order/ubahstatus" role="form">
                <div class="modal-body">
                    <table width="100%" style="margin-bottom: 15px;">
                        <template v-for="(log, index) in list_rekap_modal">
                            <tr>
                                <td>
                                    <table width="100%">
                                        <tr>
                                            <td class="bold">Tanggal</td><td>:</td>
                                            <td>{{ moment(log.tgl_order).lang('id').format("Do MMMM YYYY")}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Jam</td><td>:</td><td>{{log.jam}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Nama Pemesan</td><td>:</td>
                                            <td>
                                                <input type="hidden" name="id_member" :value="log.id_member">
                                                {{log.id_member}} - {{log.nama_lengkap}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table width="100%">
                                        <tr>
                                            <td class="bold">Qty</td><td>:</td><td>{{log.qty}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Berat</td><td>:</td><td>{{log.berat}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Kurir</td><td>:</td>
                                            <td >
                                                <select id="kurir_modal" name="kurir" @change="onChangeModal($event,log.berat, log.id_member, log.kurir)" v-model="log.kurir" class="form-control">
                                                    <option value="">Pilih</option>
                                                    <option value="ide">IDE</option>
                                                    <option value="lion">LION</option>  
                                                    <option value="cod">COD</option>    
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </template>
                    </table>
                    <table id="ViewTable1" class="table" >
                        <thead class="text-primary">
                            <tr>
                                <td style='font-weight:bold;background-color: #f7f7f7;'>ID Posting</td>
                                <td style='font-weight:bold;background-color: #f7f7f7;'>Barang</td>
                                <td style='font-weight:bold;background-color: #f7f7f7;'>Qty</td>
                                <td style='font-weight:bold;background-color: #f7f7f7;'>Berat</td>
                                <td style='font-weight:bold;background-color: #f7f7f7;'>Harga</td>
                                <td style='font-weight:bold;background-color: #f7f7f7;'>Subtotal</td>
                                <td style='font-weight:bold;background-color: #f7f7f7;'>Del</td>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(log, index) in list_rekap_modal">
                              
                                
                                <tr v-for="(row, i) in log.detail">
                                    <td>
                                        <input type="hidden" name="id_rekapan[]" :value="row.id">
                                        {{row.id_posting}}
                                    </td>
                                    <td>{{row.nama_barang}}</td>
                                    <td>{{row.qty}}</td>
                                    <td>{{row.berat}}</td>
                                    <td>{{Number(row.harga).toLocaleString()}}</td>
                                    <td>{{Number(row.harga*row.qty).toLocaleString()}}</td>
                                    <td>
                                        <a href='#' @click="onDeleteNew(event,row.id)">
                                            <span class="fa fa-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;background-color: #f1f0f0;" class="bold">Total</td><td>{{ Number(log.Total).toLocaleString() }}</td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;background-color: #f1f0f0;" class="bold">Ongkir</td><td :id="'ong_'+ log.id_member">
                                        <input type="hidden" name="ongkir" :value="log.ongkir">
                                    {{ Number(log.ongkir).toLocaleString() }}</td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;background-color: #f1f0f0;" class="bold">Admin</td>
                                    <td>
                                        <select name="admin" id="admin_modal" v-model="log.admin" class="form-control">
                                            <option value="">Pilih</option>
                                            <option value="08991994000">Admin 1</option>
                                            <option value="08992994000">Admin 2</option>
                                            <option value="08993994000">Admin 3</option>  
                                        </select>
                                    </td>
                                </tr>
                            </template>
                        </tbody> 
                    </table>
                                  
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="csrf_token" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" >
                   
                    <button type="button" class="btn btn-default mr-2" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" @click="saveDataNew">Proses</button>
                </div>
            </form>
        </div>
    </div>
</div>