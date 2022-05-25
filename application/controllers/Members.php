<?php

defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('memory_limit','2048M'); 
ini_set('max_execution_time', 0); 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once APPPATH.'/third_party/spout/Autoloader/autoload.php';
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

class Members extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->model('admin');
	   	$this->load->model('M_menu','',TRUE);
	   	
	}
	public function index()
	{		
		if($this->admin->logged_id())
    {

			$data['title'] = 'Members';
			$data['main'] = 'users/members';
			$data['js'] = 'script/members';
			$data['modal'] = 'modal/member';
      $data['provinsi'] = $this->db->query("select * from tb_provinsi")->result();
      $data['kelurahan'] = $this->db->query("select distinct kelurahan from master_city")->result();
      $data['alasan'] = $this->admin->getmaster("tb_alasan");
			$this->load->view('dashboard',$data,FALSE); 

    }else{
        redirect("login");

    }				  
						
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
          0=>'id',
          1=>'email',
          2=>'nomor_wa',
          3=>'nama_lengkap',
          4=>'nama_facebook',
          5=>'kelurahan',
          6=>'kecamatan',
          7=>'kota',
          8=>'provinsi',
          9 =>'kode_member'
      );
      $valid_sort = array(
          0=>'id',
          1=>'email',
          2=>'nomor_wa',
          3=>'nama_lengkap',
          4=>'nama_facebook',
          5=>'kelurahan',
          6=>'kecamatan',
          7=>'kota',
          8=>'provinsi',
          9 =>'kode_member'
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
      $this->db->from("members");
      $this->db->where("banned",0);
      // $this->db->join('tb_group_role', 'tb_group_role.id = tb_user.id_role','left');
      $pengguna = $this->db->get();
      $data = array();
      foreach($pengguna->result() as $r)
      {

          $data[] = array( 
                      $r->id,
	    	               $r->kode_member,
                      // $r->email,
                      $r->nomor_wa,
                      $r->nama_lengkap,
                      $r->nama_facebook,
                      $r->kelurahan,
                      $r->kecamatan,
                      $r->kota,
                      $r->provinsi,
                      '<button type="button" rel="tooltip" class="btn btn-success btn-sm " onclick="editmodal(this)"  data-id="'.$r->id.'"  >
                        <i class="icofont icofont-ui-edit"></i>Edit
                      </button>
                      <button type="button" rel="tooltip" class="btn btn-danger btn-sm " onclick="hapus(this)"  data-id="'.$r->id.'" >
                        <i class="fa fa-trash"></i>
                      </button>
                      <button type="button" rel="tooltip" class="btn btn-warning btn-sm " onclick="banned(this)"  data-id="'.$r->id.'" alt="block" >
                        <i class="fa fa-ban"></i>
                      </button> ',
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
      $this->db->from("members");
      $this->db->where("banned",0);
      // $this->db->join('tb_group_role', 'tb_group_role.id = tb_user.id_role','left');
      $query = $this->db->get();
    	$result = $query->row();
    	if(isset($result)) return $result->num;
    	return 0;
  }

  public function dataTableBlacklist()
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
          0=>'id',
          1=>'email',
          2=>'nomor_wa',
          3=>'nama_lengkap',
          4=>'nama_facebook',
          5=>'kecamatan',
          6=>'kota',
          7=>'reason',
          8 =>'kode_member'
      );
      $valid_sort = array(
          0=>'id',
          1=>'email',
          2=>'nomor_wa',
          3=>'nama_lengkap',
          4=>'nama_facebook',
          5=>'kecamatan',
          6=>'kota',
          7=>'reason',
          8 =>'kode_member'
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
      $this->db->from("members");
      $this->db->where("banned",1);
      // $this->db->join('tb_group_role', 'tb_group_role.id = tb_user.id_role','left');
      $pengguna = $this->db->get();
      $data = array();
      foreach($pengguna->result() as $r)
      {

          $data[] = array( 
                      $r->id,
                       $r->kode_member,
                      // $r->email,
                      $r->nomor_wa,
                      $r->nama_lengkap,
                      $r->nama_facebook,
                      $r->kecamatan,
                      $r->kota,
                      $r->reason,
                      '<button type="button" rel="tooltip" class="btn btn-danger btn-sm " onclick="hapusBlacklist(this)"  data-id="'.$r->id.'" >
                        <i class="fa fa-trash"></i> Blacklist
                      </button>',
                 );
      }
      $total_pengguna = $this->totalPenggunaBlacklist($search, $valid_columns);

      $output = array(
          "draw" => $draw,
          "recordsTotal" => $total_pengguna,
          "recordsFiltered" => $total_pengguna,
          "data" => $data
      );
      echo json_encode($output);
      exit();
  }

  public function totalPenggunaBlacklist($search, $valid_columns)
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
      $this->db->from("members");
      $this->db->where("banned",1);
      // $this->db->join('tb_group_role', 'tb_group_role.id = tb_user.id_role','left');
      $query = $this->db->get();
      $result = $query->row();
      if(isset($result)) return $result->num;
      return 0;
  }

  public function dataTableModal()
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
        0=>'nama_user',
        1=>'email',
        
    );
    $valid_sort = array(
        0=>'nama_user',
        1=>'email',
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
    $this->db->select("tb_user.*");
    $this->db->from("tb_user");
    $this->db->where('id_atasan', NULL);

    $pengguna = $this->db->get();
    $data = array();
    foreach($pengguna->result() as $r)
    {

        $data[] = array( 
                    '<input type="checkbox" name="selected_courses[]" value="'.$r->id_user.'">',
                    $r->nama_user,
                    $r->email,
               );
    }
    $total_pengguna = $this->totalPenggunaModal($search, $valid_columns, $this->input->get("id", TRUE));

    $output = array(
        "draw" => $draw,
        "recordsTotal" => $total_pengguna,
        "recordsFiltered" => $total_pengguna,
        "data" => $data
    );
    echo json_encode($output);
    exit();
  }

  public function totalPenggunaModal($search, $valid_columns,$id)
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
    $this->db->from("tb_user");
    $this->db->where('id_atasan', NULL);
   
    $query = $this->db->get();
    $result = $query->row();
    if(isset($result)) return $result->num;
    return 0;
  }

  public function template()
  {
      
    $data = $this->db->query("SELECT DISTINCT kelurahan,kecamatan,kota,province FROM master_city ")->result();
    $writer = WriterFactory::create(Type::XLSX);

    $writer->openToBrowser("Data Members.xlsx");

    $sheet = $writer->getCurrentSheet();
    $sheet->setName('Member');

    $header = [
        'Email',
        'Nomor WA',
        'Nama Lengkap',
        "Nama Facebook",
        'Alamat Lengkap',
        'Kelurahan',
        'Kecamatan',
        'Kota',
        'Provinsi'
    ];
    $writer->addRow($header);

    $sheet = $writer->addNewSheetAndMakeItCurrent();
    $sheet->setName('Wilayah');

    $header = [
        'No',
        'Kelurahan',
        'Kecamatan',
        "Kota",
        'Provinsi'
    ];
    $writer->addRow($header);

    $data_excel   = array(); 
    $no     = 1;

    foreach ($data as $key) {
        $anggota = array(
            $no++,
            $key->kelurahan,
            $key->kecamatan,
            $key->kota,
            $key->province
        );

        array_push($data_excel, $anggota); 
    }

    $writer->addRows($data_excel);

    $writer->close();
  }

  public function export()
  {
    $this->db->from("members");
    
    $data = $this->db->get()->result();

    $writer = WriterFactory::create(Type::XLSX);

    $writer->openToBrowser("Data Members.xlsx");

    $sheet = $writer->getCurrentSheet();
    $sheet->setName('Rekap');

    $header = [
        'No',
        'KODE',
        'NAMA LENGKAP',
        "FACEBOOK",
        'NO WA',
        'Kelurahan',
        'Kecamatan',
        'Kota',
        'Provinsi',
        'Admin',
    ];
    $writer->addRow($header);

    $data_excel   = array(); 
    $no     = 1;

    foreach ($data as $key) {
        $anggota = array(
            $no++,
            $key->kode_member,
            $key->nama_lengkap,
            $key->nama_facebook,
            $key->nomor_wa,
            $key->kelurahan,
            $key->kecamatan,
            $key->kota,
            $key->provinsi,
            '',
        );

        array_push($data_excel, $anggota); 
    }

    $writer->addRows($data_excel);

    $writer->close(); 
  }

  public function export_lama()
  {

      $this->db->from("members");
      $this->db->limit(1000);
      
      $data = $this->db->get()->result();

      $spreadsheet = new Spreadsheet;

      $styleArray = array(
          'borders' => array(
              'outline' => array(
                  'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                  'color' => array('argb' => '000000'),
              ),
          ),
      );

      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'NO')
        ->setCellValue('B1', 'Kode Member')
        ->setCellValue('C1', 'Nomor WA')
        ->setCellValue('D1', 'Nama Lengkap')
        ->setCellValue('E1', 'Facebook')
        ->setCellValue('F1', 'Kelurahan')
        ->setCellValue('G1', 'Kecamatan')
        ->setCellValue('H1', 'Kota')
        ->setCellValue('I1', 'Provinsi');

      $spreadsheet->getActiveSheet()->getStyle('A1:I1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f4f403');

      $spreadsheet->getActiveSheet()->setTitle('Members');

      $i=2; 
      foreach($data as $key=>$row) {

        $spreadsheet->setActiveSheetIndex(0)
          ->setCellValue('A'.$i, $key+1)
          ->setCellValue('B'.$i, $row->kode_member)
          ->setCellValue('C'.$i, $row->nomor_wa)
          ->setCellValue('D'.$i, $row->nama_lengkap)
          ->setCellValue('E'.$i, $row->nama_facebook)
          ->setCellValue('F'.$i, $row->kelurahan)
          ->setCellValue('G'.$i, $row->kecamatan)
          ->setCellValue('H'.$i, $row->provinsi)
          ->setCellValue('I'.$i, $row->kota);

          $spreadsheet->getActiveSheet()->getStyle('A2:I'.$i)->applyFromArray($styleArray);
        $i++;
      }


      foreach (range('A','I') as $col) {
        $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);  
      }

     
      // exit();
      $writer = new Xlsx($spreadsheet);

      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="Data Member.xlsx"');
      header('Cache-Control: max-age=0');

      $writer->save('php://output');
  }
  function Acak($varMsg,$strKey) {
    try {
        $Msg = $varMsg;
        $char_replace="";
        $intLength = strlen($Msg);
        $intKeyLength = strlen($strKey);
        $intKeyOffset = $intKeyLength;
        $intKeyChar = ord(substr($strKey, -1));
        for ($n=0; $n < $intLength ; $n++) { 
            $intKeyOffset = $intKeyOffset + 1;

            if($intKeyOffset > $intKeyLength) {
                $intKeyOffset = 1;
            }
            $intAsc = ord(substr($Msg,$n, 1));

            if($intAsc > 32 && $intAsc < 127){
                $intAsc = $intAsc - 32;
                $intAsc = $intAsc + $intKeyChar;

                while ( $intAsc > 94) {
                   $intAsc = $intAsc - 94;
                }

                $intSkip = $n+1 % 94;
                $intAsc = $intAsc + $intSkip;
                if($intAsc > 94){
                    $intAsc = $intAsc - 94;
                }

                $char_replace .= chr($intAsc + 32);
                
                $Msg = $char_replace . substr($varMsg, $n+1) ;
            }

            $intKeyChar = ord(substr($strKey, $intKeyOffset-1));
        }
        return $Msg;
    } catch (Exception $e) {
        
    }
  }

  public function upload(){
    
    array_map('unlink', array_filter(
            (array) array_merge(glob("./upload/*"))));
  
    $fileName = $_FILES['file']['name'];

    $config['remove_spaces'] = FALSE;
    $config['upload_path'] = './upload/'; //path upload
    $config['file_name'] = $fileName;  // nama file
    $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
    $config['max_size'] = 10000; // maksimal sizze


    $this->load->library('upload'); //meload librari upload
    $this->upload->overwrite = true;
    $this->upload->initialize($config);
      
    if(! $this->upload->do_upload('file') ){
        echo $this->upload->display_errors();exit();
    }
            
    $inputFileName = './upload/'.$fileName;

    
    $reader = ReaderFactory::create(Type::XLSX); //set Type file xlsx
    $reader->open($inputFileName); //open the file           

    echo "<pre>";           
    $i = 0; 

    foreach ($reader->getSheetIterator() as $sheet) {             
        foreach ($sheet->getRowIterator() as $rowData) {
          if($i>0){
            $kec_id = 0;

            if(!empty($rowData[1])){

              $cek_kec_id = $this->admin->get_array('tb_kecamatan',array( 'subdistrict_name' => $rowData[6]));
              if(!empty($cek_kec_id)){
                  $kec_id = $cek_kec_id['subdistrict_id'];
              }

              $this->db->from('members');
              $this->db->order_by('id','desc');
              $this->db->limit(1);
              $get_last = $this->db->get()->row_array();
              $kode = 'QA1';
              if(!empty($get_last)){
                  $urut = preg_replace('/[^0-9]/', '', $get_last['kode_member']);
                  $prefix = preg_replace('/[^a-zA-Z]/', '',$get_last['kode_member']);
                  // print("<pre>".print_r($prefix,true)."</pre>");exit();
        
                  if($urut > 999){
                      ++$prefix;
                      $kode = $prefix . '1';
                  }else{
                      $kode = $prefix . ((int)$urut+1);
                  }
              }

              $data = array(
                  "email"=> $rowData[0],
                  "nomor_wa"=> $rowData[1],
                  "nama_lengkap"=> $rowData[2],
                  "nama_facebook"=> $rowData[3],
                  "alamat"=> $rowData[4],
                  "kelurahan"=> $rowData[5],
                  "kecamatan"=> $rowData[6],
                  "kota"=> $rowData[7],
                  "provinsi"=> $rowData[8],
                  "kec_id" => $kec_id,
                  "kode_member" => $kode
              );

              $exist = $this->admin->get_array('members',array( 'nomor_wa' => $rowData[1]));
              if($kec_id == 0) {
                print_r($rowData[2] . " Kecamatan tidak ditemukan.<br>");
              }elseif(empty($exist)){
                $insert = $this->db->insert("members",$data);
                print_r($rowData);

              }else{
                print_r($rowData[2] . " tidak boleh duplicate.<br>");
              }
            }else{
              goto tutup;
            }
            
             
          }
          ++$i;
        }
    }
    tutup:
    echo "<br> Total Rows : ".($i-1)." <br>";               
    $reader->close();
                   

    echo "Peak memory:", (memory_get_peak_usage(true) / 1024 / 1024), " MB" ,"<br>";
  }
  public function edit(){
      $id = $this->input->get('id');
      $arr_par = array('id' => $id);
      $data['parent'] = $this->admin->getmaster('members',$arr_par);
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
  }

  public function Save()
  {       
    
      $response = [];
      $response['error'] = TRUE; 
      $response['msg']= "Gagal menyimpan.. Terjadi kesalahan pada sistem";
      $recLogin = $this->session->userdata('user_id');

      $kec_id = 0;
      $cek_kec_id = $this->admin->get_array('tb_kecamatan',array( 'subdistrict_name' => $this->input->post('kecamatan',true)));
      if(!empty($cek_kec_id)){
          $kec_id = $cek_kec_id['subdistrict_id'];
      }

      $data = array(
            'email'   => $this->input->post('email',true),
            'nomor_wa'   => $this->input->post('nomor_wa',true),
            'nama_lengkap'   => $this->input->post('nama_lengkap',true),
            'nama_facebook'   => $this->input->post('nama_facebook',true),
            'alamat'   => $this->input->post('alamat_lengkap',true),
            'kelurahan'   => $this->input->post('kelurahan',true),
            'kecamatan'   => $this->input->post('kecamatan',true),
            'kota'   => $this->input->post('kota',true),
            'provinsi'   => $this->input->post('provinsi',true),
            'kec_id' => $kec_id
        );
 
      $this->db->trans_begin();

      if($this->input->post('id') != "") {
          $this->db->set($data);
          $this->db->where('id', $this->input->post('id',TRUE));
          $result  =  $this->db->update('members');  

          if(!$result){
                print("<pre>".print_r($this->db->error(),true)."</pre>");
          }else{
                $response['error']= FALSE;
          }
      }else{  

          $result  = $this->db->insert('members', $data);
            
          if(!$result){
                print("<pre>".print_r($this->db->error(),true)."</pre>");
          }else{
                $response['error']= FALSE;
          }
        }

      $this->db->trans_complete();                      
      $this->output->set_content_type('application/json')->set_output(json_encode($response));
  }
  public function Banned()
  {       
    
      $response = [];
      $response['error'] = TRUE; 
      $response['msg']= "Gagal menyimpan.. Terjadi kesalahan pada sistem";

      $data = array(
            'banned'   => 1,
            'reason'   => $this->input->post('alasan',true),
        );
 
      $this->db->trans_begin();

      if($this->input->post('id_member') != "") {
        $this->db->set($data);
        $this->db->where('id', $this->input->post('id_member',TRUE));
        $result  =  $this->db->update('members');  

        if(!$result){
              print("<pre>".print_r($this->db->error(),true)."</pre>");
        }else{
              $response['error']= FALSE;
        }
      }

      $this->db->trans_complete();                      
      $this->output->set_content_type('application/json')->set_output(json_encode($response));
  }
  public function deleteblacklist()
  {       
    
      $response = [];
      $response['error'] = TRUE; 
      $response['msg']= "Gagal menyimpan.. Terjadi kesalahan pada sistem";

      $data = array(
            'banned'   => 0,
            'reason'   => null,
        );
 
      $this->db->trans_begin();

      $this->db->set($data);
      $this->db->where('id', $this->input->get('id',TRUE));
      $result  =  $this->db->update('members');  

      if(!$result){
            print("<pre>".print_r($this->db->error(),true)."</pre>");
      }else{
            $response['error']= FALSE;
      }
      

      $this->db->trans_complete();                      
      $this->output->set_content_type('application/json')->set_output(json_encode($response));
  }
  public function delete()
  {
    $response = [];
    $response['error'] = TRUE; 
    if($this->admin->deleteTable("id",$this->input->get('id',TRUE), 'members' )){
      $response['error'] = FALSE;
    } 

    $this->output->set_content_type('application/json')->set_output(json_encode($response)); 
  }
}
