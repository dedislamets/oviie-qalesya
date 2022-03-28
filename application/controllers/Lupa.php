<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lupa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->model('admin');
	    $this->load->model('M_menu','',TRUE);
	   
	}
	public function index()
	{		
		$data['main'] = 'daftar/index';
		$data['js'] = 'script/no-script';
		$data['provinsi'] = $this->db->query("select * from tb_provinsi")->result();
		$data['kelurahan'] = $this->db->query("select distinct kelurahan from master_city")->result();

		$this->load->view('forgot',$data,FALSE); 			  
						
	}

    public function ubah_alamat()
    {       
        $data['main'] = 'daftar/index';
        $data['js'] = 'script/no-script';
        $data['provinsi'] = $this->db->query("select * from tb_provinsi")->result();
        $data['kelurahan'] = $this->db->query("select distinct kelurahan from master_city")->result();

        $this->load->view('alamat',$data,FALSE);              
                        
    }

    public function save_alamat(){
        $kec_id = 0;
        $cek_kec_id = $this->admin->get_array('tb_kecamatan',array( 'subdistrict_name' => $this->input->post('kecamatan',true)));
        if(!empty($cek_kec_id)){
            $kec_id = $cek_kec_id['subdistrict_id'];
        }

        $data = array(
            
            'alamat'   => nl2br($this->input->post('alamat_lengkap',true)),
            'kelurahan'   => $this->input->post('kelurahan',true),
            'kecamatan'   => $this->input->post('kecamatan',true),
            'kota'   => $this->input->post('kota',true),
            'provinsi'   => $this->input->post('provinsi',true),
            'kec_id' => $kec_id
        );
        $this->db->set($data);
        $this->db->where('kode_member', $this->input->post('kode_member',true));
        $result  =  $this->db->update('members'); 
        
        $this->session->set_flashdata('message','Alamat anda sudah berhasil di update..');
        redirect("ubah-alamat");
    }
	
	public function cek()
    {
      $data = $this->admin->get_row("members" ,array('nomor_wa' => $this->input->get('no',true) ));
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function cek_member_id()
    {
      $data = $this->admin->get_row("members" ,array('nomor_wa' => $this->input->get('no',true), 
        'kode_member' => $this->input->get('id',true) ));
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

}
