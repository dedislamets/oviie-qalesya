<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('max_execution_time', 0); 
ini_set('memory_limit','2048M');

class Order extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('Mutasi',null, 'mutasi');
		$this->load->model('admin');
	}

	public function callback(){
		// $data = $this->mutasi->callback();
		// if(isset($data['status']) && $data['status']==true){
			//do something with this data
			file_put_contents('log-mutasi.txt',file_get_contents('php://input')."\n", FILE_APPEND);

			$response = json_decode(file_get_contents('php://input'));

			/*foreach($response['data'] as $key => $value) {
          $curl = curl_init();

          curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://pro.rajaongkir.com/api/subdistrict?key=6257ae210b00dfa4d6cda76747341c7a&city=' . $value->city_id,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
          ));

          $response = curl_exec($curl);
          $response = json_decode($response, true);

          curl_close($curl);
          foreach($response['rajaongkir']['results'] as $k => $val) {
          // print("<pre>".print_r($val,true)."</pre>");exit();
            $data = array(
              'subdistrict_id'  => $val['subdistrict_id'],
              'province_id'   => $val['province_id'],
              'province'   => $val['province'],
              'city_id'   => $val['city_id'],
              'city'   => $val['city'],
              'type'   => $val['type'],
              'subdistrict_name'   => $val['subdistrict_name'],
            );

			      $result  = $this->db->insert('tb_kecamatan', $data);
          }
		  }
      exit; */


      $data_mutasi= $response->data_mutasi;

      foreach($data_mutasi as $key_mutasi => $value_mutasi) {
        $cek_mutasi = $this->admin->get_array('mutasi',array( 'id' => $value_mutasi->id));
        if(empty($cek_mutasi)){
          // print("<pre>".print_r($value_bank,true)."</pre>");exit();

          //Insert Log Mutasi
          $data = array(
              'id'                => $value_mutasi->id,
              'system_date'       => $value_mutasi->system_date,
              'transaction_date'  => $value_mutasi->transaction_date,
              'description'       => $value_mutasi->description,
              'type'              => $value_mutasi->type,
              'amount'            => $value_mutasi->amount,
              'balance'           => $value_mutasi->balance,
              'module'            => $response->module,
              'saldo_update'      => $response->balance,
              'account_id'        => $response->account_id,
              'account_name'      => $response->account_name,
              'account_number'    => $response->account_number,
          );
          $result  = $this->db->insert('mutasi', $data);

          //Update Status Rekapan
          $credit = $value_mutasi->amount;

          $cek_kode = $this->admin->get_array('invoice',array( 'total' => (float)$credit, 'status' => 'Billing'));

          if(!empty($cek_kode) && $value_mutasi->type == 'CR'){
              
            $data = array(
                // 'metode_bayar'  => $response->module,
                // 'payment_date' => $value_mutasi->system_date,
                'status'         => 'Paid',
                'id_mutasi'   => $value_mutasi->id
            );

            $this->db->set($data);
            $this->db->where('kode_inv', $cek_kode['kode_inv']);
            $result  =  $this->db->update('invoice');  

            $member = $this->admin->get_array('members',array( 'kode_member' => $cek_kode['id_member'] ));
            $msg = "*Pembayaran Diterima*
                    -----------------------------------
                    NO INVOICE : ". $cek_kode['kode_order'] ."
                    BANK: ". $response->module ."
                    TANGGAL: ". $value_mutasi->system_date ."
                    DESC : ". $value_mutasi->description ."
                    TOTAL : ". number_format($credit) ."

                    ------------------------------------
                    *Note : Pembayaran berhasil, pesanan anda akan segera kami proses.*

                    _Tim Prastika Collection_";
            $this->admin->simpan_wa($member['nomor_wa'], $msg);

          }
        }
      }
  
	}

	public function get_user_info(){
		$data = $this->mutasi->user_info();
		file_put_contents('log-mutasi.txt',json_encode($data)."\n", FILE_APPEND);
	}

	public function index()
	{		
		if($this->admin->logged_id())
	    {
			$data['title'] = 'Penjualan';
			$data['main'] = 'order/index';
			$data['js'] = 'script/order';
      $data['modal'] = 'modal/none';
      $data['rekapan'] = array();

			$this->load->view('dashboard',$data,FALSE); 

	    }else{
	        redirect("login");

	    }				  						
	}

  public function list()
  {
    
    $this->db->select("rekapan.id_posting,MAX(order_date) tgl_order,rekapan.id_member,nama_lengkap,SUM(rekapan.qty) AS qty, SUM(rekapan.total) Total , SUM(rekapan.qty*barang.berat) AS berat");
    $this->db->from("rekapan");
    $this->db->join("barang","barang.kode_barang=rekapan.kode_product");
    $this->db->join("members","members.kode_member=rekapan.id_member");
    $this->db->join("invoice","members.kode_member=invoice.id_member and invoice.id_posting=rekapan.id_posting","left");
    $this->db->group_by('rekapan.id_posting,rekapan.id_member,nama_lengkap');
    $this->db->where('kirim is null');
    $this->db->where("rekapan.status <> 'Cancel'");
    if(!empty($this->input->get("tgl",true))){
      $this->db->where('DATE(order_date)', $this->input->get("tgl",true));
    }
    if(!empty($this->input->get("member",true))){
      $this->db->where('members.kode_member', $this->input->get("member",true));
    }
    $data['rekapan'] = $this->db->get()->result_array();
    // echo $this->db->last_query();exit();

    foreach ($data['rekapan'] as $key => $value) {
      $member = $this->admin->get_array('members',array( 'kode_member' => $value['id_member']));
      // $results_ongkir = $this->admin->cek_ongkir('746',$member['kec_id'],floatval($value['berat']));
      // $data['rekapan'][$key]['ongkir'] = $results_ongkir['costs'][0]['cost'][0]['value'];
      $data['rekapan'][$key]['ongkir'] = 0;
      $data['rekapan'][$key]['kurir'] = '';
      $data['rekapan'][$key]['admin'] = '';
      $this->db->select("rekapan.id,kode_order,kode_barang,nama_barang,qty,berat,harga");
      $this->db->from("rekapan");
      $this->db->join("barang","barang.kode_barang=rekapan.kode_product");
      $this->db->where(
        array("id_posting" => $value['id_posting'], 
              "id_member" => $value['id_member']));
      $this->db->where("rekapan.status <> 'Cancel'");
      $detail = $this->db->get()->result_array();

      $data['rekapan'][$key]['detail'] = $detail;
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($data));
  }

  public function kurir()
  {
    try {
      $jsonArray = json_decode(file_get_contents('php://input'),true); 
      $this->db->select("id_posting,MAX(order_date) tgl_order,id_member,nama_lengkap,SUM(qty) AS qty, SUM(total) Total , SUM(qty*berat) AS berat");
      $this->db->from("rekapan");
      $this->db->join("barang","barang.kode_barang=rekapan.kode_product");
      $this->db->join("members","members.kode_member=rekapan.id_member");
      $this->db->group_by('id_posting,id_member,nama_lengkap');
      $this->db->where(array(
                          "id_posting" => $jsonArray['id_posting'], 
                          "id_member" => $jsonArray['id_member']
                        ));
      $rekap = $this->db->get()->row_array();

      $member = $this->admin->get_array('members',array( 'kode_member' => $rekap['id_member']));
      $results_ongkir = $this->admin->cek_ongkir('746',$member['kec_id'],floatval($rekap['berat']), $jsonArray['kurir']);
        // print("<pre>".print_r($results_ongkir,true)."</pre>");exit();
      if(empty($results_ongkir['costs'])){
        $response['error']= true;
        $response['msg']= 'Ongkir tidak ditemukan.!!';
      }else{
        $ongkir = $results_ongkir['costs'][0]['cost'][0]['value'];

        $response['error']= FALSE;
        $response['ongkir']= $ongkir;
        $response['kurir']= $jsonArray['kurir'];
      }
      

    } catch (Exception $e) {
      $response['error']= true;
      $response['msg']= 'Terjadi kesalahan..';
    }
    
    $this->output->set_content_type('application/json')->set_output(json_encode($response));
  }
  public function kirim()
  {

    random:
    $kode_rand = rand(100,500); 

    $cek_kode = $this->admin->get_array('invoice',array( 'rand' => $kode_rand, 'status' => 'Billing'));
    if(!empty($cek_kode)){
        goto random;
    }

    $kode = "INV" . date("ymd-his");
    $jsonArray = json_decode(file_get_contents('php://input'),true); 
    $this->db->select("id_posting,MAX(order_date) tgl_order,id_member,nama_lengkap,SUM(qty) AS qty, SUM(total) Total , SUM(qty*berat) AS berat");
    $this->db->from("rekapan");
    $this->db->join("barang","barang.kode_barang=rekapan.kode_product");
    $this->db->join("members","members.kode_member=rekapan.id_member");
    $this->db->group_by('id_posting,id_member,nama_lengkap');
    $this->db->where(array(
                        "id_posting" => $jsonArray['id_posting'], 
                        "id_member" => $jsonArray['id_member']
                      ));
    $rekap = $this->db->get()->row_array();

    $member = $this->admin->get_array('members',array( 'kode_member' => $rekap['id_member']));
    $results_ongkir = $this->admin->cek_ongkir('746',$member['kec_id'],floatval($rekap['berat']), $jsonArray['kurir']);
      // print("<pre>".print_r($results_ongkir,true)."</pre>");exit();
    $ongkir = $results_ongkir['costs'][0]['cost'][0]['value'];
    $tgl =date("Y-m-d H:i:s");
    $exp = date('Y-m-d H:i:s', strtotime($tgl. ' + 1 days'));
    $data = array(
        'kode_inv'      => $kode,
        'tgl_invoice'   => $tgl ,
        'exp_date'      => $exp,
        'id_posting'    => $jsonArray['id_posting'],
        'id_member'     => $jsonArray['id_member'],
        'qty'           => $rekap['qty'],
        'berat'   => $rekap['berat'],
        'total'   => $rekap['Total']+ $ongkir + $kode_rand,
        'ongkir'  => $ongkir,
        'kurir'   => $jsonArray['kurir'],
        'kirim'   => 1,
        'rand'    => $kode_rand,
        'hp_admin' => $jsonArray['admin'],
    );

    $this->db->trans_begin();

    $result  = $this->db->insert('invoice', $data);
    $last_id = $this->db->insert_id();
    if(!$result){
        print("<pre>".print_r($this->db->error(),true)."</pre>");
    }else{
        $response['error']= FALSE;

        $this->db->select("kode_order,kode_barang,nama_barang,qty,berat,harga");
        $this->db->from("rekapan");
        $this->db->join("barang","barang.kode_barang=rekapan.kode_product");
        $this->db->where(array("id_posting" => $jsonArray['id_posting'], "id_member" => $jsonArray['id_member']));
        $detail = $this->db->get()->result_array();
        $msg_detail="";
        $subtotal=0;
        foreach ($detail as $key => $value) {
          $msg_detail .=" 
        ". $value['kode_barang'] ." ". $value['nama_barang'] ."
        ". $value['qty'] ." x ". number_format($value['harga']) ." 
        ";
          $subtotal += $value['harga'];
        }

$msg = "
*INVOICE ". $kode ."*
-----------------------------------
ID MEMBER : ". $jsonArray['id_member'] ."
NAMA: ". $rekap['nama_lengkap'] ."
TANGGAL: ". $tgl ."
-----------------------------------
";
$msg .= $msg_detail;  

$msg .="
------------------------------------
SUBTOTAL : ". number_format($subtotal) ."
ONGKIR : ". number_format($ongkir) ."
KD UNIQ : ". $kode_rand ."
TOTAL DIBAYAR : ". number_format($rekap['Total']+ $ongkir + $kode_rand) ."
------------------------------------

Bank Transfer

BCA 3431619707 - HELMY SUSANTO
BRI 053701038298507 - HELMY SUSANTO
MANDIRI 1560014788048 - HELMY SUSANTO
BJB 0008996994000 - HELMY SUSANTO
(otomatis sekitar 5 - 10 menit)
Rp ". number_format($rekap['Total']+ $ongkir + $kode_rand) ."

Invoice expired ". $exp ."

*Note : SILAHKAN TRANSFER SEKARANG,. TRANSFER SESUAI KODE UNIK CONTOH ( TRANSFER 100.001). 
BATAS TRF BESOK JAM 07.00 WIB YANG PHP LANGSUNG KAMI BLOKIR PERMANEN DARI SERVER NYA . 
TRIMAKASIH BUNDA.*

_Tim Oviie Qalesya Shop Boutique_";
        $this->admin->simpan_wa($jsonArray['admin'], $msg);
    }

    $this->db->trans_complete();   
    $this->output->set_content_type('application/json')->set_output(json_encode($response));
  }

	public function dataTable()
  {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $order = $this->input->get("order");
      $search= $this->input->get("search");
      $search = $search['value'];
      $col = 10;
      $dir = "";

      if(!empty($order))
      {
          foreach($order as $o)
          {
              $col = $o['column'];
              $dir= $o['dir'];
          }
      }

      if($dir != "asc" && $dir != "desc")
      {
          $dir = "desc";
      }

      $valid_columns = array(
          0=>'kode_inv',
          1=>'tgl_invoice',
          2=>'exp_date',
          3=>'nama_lengkap',
          4=>'qty',
          5=>'berat',
          6 => 'total',
          7 => 'ongkir',
          8 => 'status'
      );
      $valid_sort = array(
          0=>'kode_inv',
          1=>'tgl_invoice',
          2=>'exp_date',
          3=>'nama_lengkap',
          4=>'qty',
          5=>'berat',
          6 => 'total',
          7 => 'ongkir',
          8 => 'status'
      );
      if(!isset($valid_sort[$col]))
      {
          $order = null;
      }
      else
      {
          $order = $valid_sort[$col];
      }
      if($order !=null)
      {
          $this->db->order_by($order, $dir);
      }
      
      if(!empty($search))
      {
          $x=0;
          foreach($valid_columns as $sterm)
          {
              if($x==0)
              {
                  $this->db->like($sterm,$search);
              }
              else
              {
                  $this->db->or_like($sterm,$search);
              }
              $x++;
          }                 
      }
      $this->db->limit($length,$start);
      $this->db->select("invoice.*,members.nama_lengkap,TIMESTAMPDIFF(DAY,now(), TIMESTAMP(exp_date)) AS days, 
        MOD(TIMESTAMPDIFF(HOUR,  NOW(), TIMESTAMP(exp_date)), 24) AS hours, MOD(TIMESTAMPDIFF(MINUTE,NOW() ,TIMESTAMP(exp_date)), 60) AS minutes");
      $this->db->from("invoice");
      $this->db->join("members","members.kode_member=invoice.id_member");
      $this->db->where("status",'Billing');
      $this->db->order_by("tgl_invoice DESC");
      $pengguna = $this->db->get();
      $data = array();
      foreach($pengguna->result() as $r)
      {
          $data[] = array( 
                      $r->kode_inv,
                      $r->tgl_invoice,
                      $r->days ." Hari ". $r->hours ." Jam ". $r->minutes . " Menit",
                      $r->id_member .' - '. $r->nama_lengkap,
                      $r->qty,
                      $r->berat,
                      number_format($r->ongkir),
                      number_format($r->total),
                      $r->status,
                      '<a href="'. base_url() .'order/invoice/'. $r->kode_inv .'" class="btn btn-warning btn-sm " >
                        <i class="icofont icofont-ui-edit"></i>Detail
                      </a>
                      <button type="button" rel="tooltip" class="btn btn-danger btn-sm " onclick="hapus(this)"  data-id="'.$r->id.'" >
                        <i class="icofont icofont-trash"></i>Hapus
                      </button>
                      <button type="button" rel="tooltip" class="btn btn-success btn-sm " onclick="renewal(this)"  data-id="'.$r->id.'" >
                        <i class="icofont icofont-refresh"></i>Renewal
                      </button>',
                 );
      }
      $total_pengguna = $this->totalPengguna($search, $valid_columns);

      $output = array(
          "draw" => $draw,
          "recordsTotal" => $total_pengguna,
          "recordsFiltered" => $total_pengguna,
          "data" => $data
      );
      echo json_encode($output);
      exit();
  }

	public function totalPengguna($search, $valid_columns)
	{
  	$query = $this->db->select("COUNT(*) as num");
  	if(!empty($search))
    	{
        $x=0;
        foreach($valid_columns as $sterm)
        {
            if($x==0)
            {
                $this->db->like($sterm,$search);
            }
            else
            {
                $this->db->or_like($sterm,$search);
            }
            $x++;
        }                 
    	}

    $this->db->from("invoice");
    $this->db->join("members","members.kode_member=invoice.id_member");
    $this->db->where("status",'Billing');
    $query = $this->db->get();
    $result = $query->row();
    if(isset($result)) return $result->num;
    return 0;
	}

  public function dataTableDeposit()
  {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $order = $this->input->get("order");
      $search= $this->input->get("search");
      $search = $search['value'];
      $col = 10;
      $dir = "";

      if(!empty($order))
      {
          foreach($order as $o)
          {
              $col = $o['column'];
              $dir= $o['dir'];
          }
      }

      if($dir != "asc" && $dir != "desc")
      {
          $dir = "desc";
      }

      $valid_columns = array(
          0=>'kode_inv',
          1=>'tgl_invoice',
          2=>'exp_date',
          3=>'nama_lengkap',
          4=>'qty',
          5=>'berat',
          6 => 'total',
          7 => 'ongkir',
          8 => 'status'
      );
      $valid_sort = array(
          0=>'kode_inv',
          1=>'tgl_invoice',
          2=>'exp_date',
          3=>'nama_lengkap',
          4=>'qty',
          5=>'berat',
          6 => 'total',
          7 => 'ongkir',
          8 => 'status'
      );
      if(!isset($valid_sort[$col]))
      {
          $order = null;
      }
      else
      {
          $order = $valid_sort[$col];
      }
      if($order !=null)
      {
          $this->db->order_by($order, $dir);
      }
      
      if(!empty($search))
      {
          $x=0;
          foreach($valid_columns as $sterm)
          {
              if($x==0)
              {
                  $this->db->like($sterm,$search);
              }
              else
              {
                  $this->db->or_like($sterm,$search);
              }
              $x++;
          }                 
      }
      $this->db->limit($length,$start);
      $this->db->select("invoice.*,members.nama_lengkap");
      $this->db->from("invoice");
      $this->db->join("members","members.kode_member=invoice.id_member");
      $this->db->where("status",'Deposit');
      $this->db->order_by("tgl_invoice DESC");
      $pengguna = $this->db->get();
      $data = array();
      foreach($pengguna->result() as $r)
      {
          $data[] = array( 
                      $r->kode_inv,
                      $r->tgl_invoice,
                      $r->exp_date,
                      $r->id_member .' - '. $r->nama_lengkap,
                      $r->qty,
                      $r->berat,
                      number_format($r->ongkir),
                      number_format($r->total),
                      $r->status,
                      '<a href="'. base_url() .'order/invoice/'. $r->kode_inv .'" class="btn btn-warning btn-sm " >
                        <i class="icofont icofont-ui-edit"></i>Detail
                      </a>
                      ',
                 );
      }
      $total_pengguna = $this->totalPenggunaDeposit($search, $valid_columns);

      $output = array(
          "draw" => $draw,
          "recordsTotal" => $total_pengguna,
          "recordsFiltered" => $total_pengguna,
          "data" => $data
      );
      echo json_encode($output);
      exit();
  }

  public function totalPenggunaDeposit($search, $valid_columns)
  {
    $query = $this->db->select("COUNT(*) as num");
    if(!empty($search))
      {
        $x=0;
        foreach($valid_columns as $sterm)
        {
            if($x==0)
            {
                $this->db->like($sterm,$search);
            }
            else
            {
                $this->db->or_like($sterm,$search);
            }
            $x++;
        }                 
      }

    $this->db->from("invoice");
    $this->db->join("members","members.kode_member=invoice.id_member");
    $this->db->where("status",'Deposit');
    $query = $this->db->get();
    $result = $query->row();
    if(isset($result)) return $result->num;
    return 0;
  }

  public function dataTablePaid()
  {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $order = $this->input->get("order");
      $search= $this->input->get("search");
      $search = $search['value'];
      $col = 10;
      $dir = "";

      if(!empty($order))
      {
          foreach($order as $o)
          {
              $col = $o['column'];
              $dir= $o['dir'];
          }
      }

      if($dir != "asc" && $dir != "desc")
      {
          $dir = "desc";
      }

      $valid_columns = array(
          0=>'kode_inv',
          1=>'tgl_invoice',
          2=>'exp_date',
          3=>'nama_lengkap',
          4=>'qty',
          5=>'berat',
          6 => 'total',
          7 => 'ongkir',
          8 => 'status'
      );
      $valid_sort = array(
          0=>'kode_inv',
          1=>'tgl_invoice',
          2=>'exp_date',
          3=>'nama_lengkap',
          4=>'qty',
          5=>'berat',
          6 => 'total',
          7 => 'ongkir',
          8 => 'status'
      );
      if(!isset($valid_sort[$col]))
      {
          $order = null;
      }
      else
      {
          $order = $valid_sort[$col];
      }
      if($order !=null)
      {
          $this->db->order_by($order, $dir);
      }
      
      if(!empty($search))
      {
          $x=0;
          foreach($valid_columns as $sterm)
          {
              if($x==0)
              {
                  $this->db->like($sterm,$search);
              }
              else
              {
                  $this->db->or_like($sterm,$search);
              }
              $x++;
          }                 
      }
      $this->db->limit($length,$start);
      $this->db->select("invoice.*,members.nama_lengkap");
      $this->db->from("invoice");
      $this->db->join("members","members.kode_member=invoice.id_member");
      $this->db->where("status",'Paid');
      $this->db->order_by("tgl_invoice DESC");
      $pengguna = $this->db->get();
      $data = array();
      foreach($pengguna->result() as $r)
      {
          $data[] = array( 
                      $r->kode_inv,
                      $r->tgl_invoice,
                      $r->exp_date,
                      $r->id_member .' - '. $r->nama_lengkap,
                      $r->qty,
                      $r->berat,
                      number_format($r->ongkir),
                      number_format($r->total),
                      $r->status,
                      '<a href="'. base_url() .'order/invoice/'. $r->kode_inv .'" class="btn btn-warning btn-sm " >
                        <i class="icofont icofont-ui-edit"></i>Detail
                      </a>
                      ',
                 );
      }
      $total_pengguna = $this->totalPenggunaPaid($search, $valid_columns);

      $output = array(
          "draw" => $draw,
          "recordsTotal" => $total_pengguna,
          "recordsFiltered" => $total_pengguna,
          "data" => $data
      );
      echo json_encode($output);
      exit();
  }

  public function totalPenggunaPaid($search, $valid_columns)
  {
    $query = $this->db->select("COUNT(*) as num");
    if(!empty($search))
      {
        $x=0;
        foreach($valid_columns as $sterm)
        {
            if($x==0)
            {
                $this->db->like($sterm,$search);
            }
            else
            {
                $this->db->or_like($sterm,$search);
            }
            $x++;
        }                 
      }

    $this->db->from("invoice");
    $this->db->join("members","members.kode_member=invoice.id_member");
    $this->db->where("status",'Paid');
    $query = $this->db->get();
    $result = $query->row();
    if(isset($result)) return $result->num;
    return 0;
  }

  public function dataTableCancel()
  {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $order = $this->input->get("order");
      $search= $this->input->get("search");
      $search = $search['value'];
      $col = 10;
      $dir = "";

      if(!empty($order))
      {
          foreach($order as $o)
          {
              $col = $o['column'];
              $dir= $o['dir'];
          }
      }

      if($dir != "asc" && $dir != "desc")
      {
          $dir = "desc";
      }

      $valid_columns = array(
          0=>'kode_inv',
          1=>'tgl_invoice',
          2=>'exp_date',
          3=>'nama_lengkap',
          4=>'qty',
          5=>'berat',
          6 => 'total',
          7 => 'ongkir',
          8 => 'status'
      );
      $valid_sort = array(
          0=>'kode_inv',
          1=>'tgl_invoice',
          2=>'exp_date',
          3=>'nama_lengkap',
          4=>'qty',
          5=>'berat',
          6 => 'total',
          7 => 'ongkir',
          8 => 'status'
      );
      if(!isset($valid_sort[$col]))
      {
          $order = null;
      }
      else
      {
          $order = $valid_sort[$col];
      }
      if($order !=null)
      {
          $this->db->order_by($order, $dir);
      }
      
      if(!empty($search))
      {
          $x=0;
          foreach($valid_columns as $sterm)
          {
              if($x==0)
              {
                  $this->db->like($sterm,$search);
              }
              else
              {
                  $this->db->or_like($sterm,$search);
              }
              $x++;
          }                 
      }
      $this->db->limit($length,$start);
      $this->db->select("invoice.*,members.nama_lengkap");
      $this->db->from("invoice");
      $this->db->join("members","members.kode_member=invoice.id_member");
      $this->db->where("status",'Cancel');
      $this->db->order_by("tgl_invoice DESC");
      $pengguna = $this->db->get();
      $data = array();
      foreach($pengguna->result() as $r)
      {
          $data[] = array( 
                      $r->kode_inv,
                      $r->tgl_invoice,
                      $r->exp_date,
                      $r->id_member .' - '. $r->nama_lengkap,
                      $r->qty,
                      $r->berat,
                      number_format($r->ongkir),
                      number_format($r->total),
                      $r->status,
                      '<a href="'. base_url() .'order/invoice/'. $r->kode_inv .'" class="btn btn-warning btn-sm " >
                        <i class="icofont icofont-ui-edit"></i>Detail
                      </a>
                      ',
                 );
      }
      $total_pengguna = $this->totalPenggunaCancel($search, $valid_columns);

      $output = array(
          "draw" => $draw,
          "recordsTotal" => $total_pengguna,
          "recordsFiltered" => $total_pengguna,
          "data" => $data
      );
      echo json_encode($output);
      exit();
  }

  public function totalPenggunaCancel($search, $valid_columns)
  {
    $query = $this->db->select("COUNT(*) as num");
    if(!empty($search))
      {
        $x=0;
        foreach($valid_columns as $sterm)
        {
            if($x==0)
            {
                $this->db->like($sterm,$search);
            }
            else
            {
                $this->db->or_like($sterm,$search);
            }
            $x++;
        }                 
      }

    $this->db->from("invoice");
    $this->db->join("members","members.kode_member=invoice.id_member");
    $this->db->where("status",'Cancel');
    $query = $this->db->get();
    $result = $query->row();
    if(isset($result)) return $result->num;
    return 0;
  }

  public function dataTableDelivery()
  {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $order = $this->input->get("order");
      $search= $this->input->get("search");
      $search = $search['value'];
      $col = 10;
      $dir = "";

      if(!empty($order))
      {
          foreach($order as $o)
          {
              $col = $o['column'];
              $dir= $o['dir'];
          }
      }

      if($dir != "asc" && $dir != "desc")
      {
          $dir = "desc";
      }

      $valid_columns = array(
          0=>'kode_inv',
          1=>'tgl_invoice',
          2=>'exp_date',
          3=>'nama_lengkap',
          4=>'qty',
          5=>'berat',
          6 => 'total',
          7 => 'ongkir',
          8 => 'status'
      );
      $valid_sort = array(
          0=>'kode_inv',
          1=>'tgl_invoice',
          2=>'exp_date',
          3=>'nama_lengkap',
          4=>'qty',
          5=>'berat',
          6 => 'total',
          7 => 'ongkir',
          8 => 'status'
      );
      if(!isset($valid_sort[$col]))
      {
          $order = null;
      }
      else
      {
          $order = $valid_sort[$col];
      }
      if($order !=null)
      {
          $this->db->order_by($order, $dir);
      }
      
      if(!empty($search))
      {
          $x=0;
          foreach($valid_columns as $sterm)
          {
              if($x==0)
              {
                  $this->db->like($sterm,$search);
              }
              else
              {
                  $this->db->or_like($sterm,$search);
              }
              $x++;
          }                 
      }
      $this->db->limit($length,$start);
      $this->db->select("invoice.*,members.nama_lengkap");
      $this->db->from("invoice");
      $this->db->join("members","members.kode_member=invoice.id_member");
      $this->db->where("status",'Delivery');
      $this->db->order_by("tgl_invoice DESC");
      $pengguna = $this->db->get();
      $data = array();
      foreach($pengguna->result() as $r)
      {
          $data[] = array( 
                      $r->kode_inv,
                      $r->tgl_invoice,
                      $r->exp_date,
                      $r->id_member .' - '. $r->nama_lengkap,
                      $r->qty,
                      $r->berat,
                      number_format($r->ongkir),
                      number_format($r->total),
                      $r->status,
                      '<a href="'. base_url() .'order/invoice/'. $r->kode_inv .'" class="btn btn-warning btn-sm " >
                        <i class="icofont icofont-ui-edit"></i>Detail
                      </a>
                      ',
                 );
      }
      $total_pengguna = $this->totalPenggunaDelivery($search, $valid_columns);

      $output = array(
          "draw" => $draw,
          "recordsTotal" => $total_pengguna,
          "recordsFiltered" => $total_pengguna,
          "data" => $data
      );
      echo json_encode($output);
      exit();
  }

  public function totalPenggunaDelivery($search, $valid_columns)
  {
    $query = $this->db->select("COUNT(*) as num");
    if(!empty($search))
      {
        $x=0;
        foreach($valid_columns as $sterm)
        {
            if($x==0)
            {
                $this->db->like($sterm,$search);
            }
            else
            {
                $this->db->or_like($sterm,$search);
            }
            $x++;
        }                 
      }

    $this->db->from("invoice");
    $this->db->join("members","members.kode_member=invoice.id_member");
    $this->db->where("status",'Delivery');
    $query = $this->db->get();
    $result = $query->row();
    if(isset($result)) return $result->num;
    return 0;
  }

	public function invoice($id)
	{   
  	if($this->admin->logged_id())
    	{
    		$data['title'] = 'Edit Barang';
    		$data['main'] = 'order/invoice';
    		$data['js'] = 'script/order';
    		$data['mode'] = 'Edit';
        $data['modal'] = 'modal/invoice';


    		$this->db->select("invoice.*,nama_lengkap,alamat,kelurahan,kecamatan,kota,provinsi,nomor_wa");
        $this->db->from("invoice");
      	// $this->db->join("barang","barang.kode_barang=rekapan.kode_product");
      	$this->db->join("members","members.kode_member=invoice.id_member");
      	$this->db->where("kode_inv",$id);
      	$data['header'] = $this->db->get()->row_array();

        $this->db->select("kode_order,kode_barang,nama_barang,qty,berat,harga");
        $this->db->from("rekapan");
        $this->db->join("barang","barang.kode_barang=rekapan.kode_product");
        $this->db->where(array("id_posting" => $data['header']['id_posting'], "id_member" => $data['header']['id_member']));
        $data['detail'] = $this->db->get()->result_array();
    
    		$this->load->view('dashboard',$data,FALSE); 

    	}else{
      	redirect("login");

    	}                 
	}

  public function listinv()
  {   
    if($this->admin->logged_id())
    {
      $data['title'] = 'Invoice';
      $data['main'] = 'order/listinvoice';
      $data['js'] = 'script/listinvoice';
      $data['modal'] = 'modal/none';
      $data['rekapan'] = array();

      $this->load->view('dashboard',$data,FALSE); 

    }
  }

  public function delete()
  {
    $response = [];
    $response['error'] = TRUE; 
    if($this->admin->deleteTable("id",$this->input->get('id'), 'invoice' )){
      $response['error'] = FALSE;
    } 

    $this->output->set_content_type('application/json')->set_output(json_encode($response)); 
  }

  public function renewal()
  {
    $response = [];
    $response['error'] = TRUE; 


    $tgl =date("Y-m-d H:i:s");
    $exp = date('Y-m-d H:i:s', strtotime($tgl. ' + 1 days'));

    $data = array(
        'tgl_invoice'   => $tgl ,
        'exp_date'      => $exp,
      );


    $this->db->set($data);
    $this->db->where('id', $this->input->get('id',true));
    $result  =  $this->db->update('invoice'); 
    if(!$result){
      print("<pre>".print_r($this->db->error(),true)."</pre>");
    }else{
      $response['error']= FALSE;
    }

    $this->output->set_content_type('application/json')->set_output(json_encode($response)); 
  }

  public function ubahstatus()
  {   


    $this->form_validation->set_rules('dibayar', 'dibayar', 'required');
    $this->form_validation->set_rules('status_bayar', 'status_bayar', 'required');

    $this->form_validation->set_message('required', '<div class="alert alert-danger" >
        <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

    //cek validasi
    if ($this->form_validation->run() == TRUE) {
        $dibayar = $this->input->post("dibayar", TRUE);
        if($dibayar=="0"){
          $status = "Billing";
        }else{
          $status = $this->input->post('status_bayar', true);
        }
        
        $this->db->set(array("dibayar" => $dibayar, "status" => $status));
        $this->db->where('id', $this->input->post('id_inv',true));
        $result  =  $this->db->update('invoice'); 
        // echo $this->db->last_query(); exit();
        redirect("order/invoice/". $this->input->post('no_inv',true));

    }
  }

  public function cancel()
  {   
    $response = [];
    $response['error'] = TRUE; 
    
    $this->db->set(array("status" => "Cancel"));
    $this->db->where('id', $this->input->get('id_inv',true));
    $result  =  $this->db->update('invoice'); 
    if(!$result){
      print("<pre>".print_r($this->db->error(),true)."</pre>");
    }else{
      $response['error']= FALSE;
    }

    $this->output->set_content_type('application/json')->set_output(json_encode($response)); 
  }

  public function removeitm()
  {

    $response = [];
    $response['error'] = TRUE; 
 
    $data = array(
      'status'        => 'Cancel',       
    );

    $this->db->set($data);
    $this->db->where(
      array( 
        "id" => $this->input->get('id_rekap') 
      ));
    $result = $this->db->update('rekapan');

    if(!$result){
      print("<pre>".print_r($this->db->error(),true)."</pre>");
    }else{
      $response['error']= FALSE;
    }

    $this->output->set_content_type('application/json')->set_output(json_encode($response)); 
  }
}