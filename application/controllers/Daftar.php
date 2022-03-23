<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Daftar extends CI_Controller {
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

		$this->load->view('register',$data,FALSE); 			  
						
	}
	
	public function getKota()
    {
        $data = $this->db->query("select distinct city_id,city_name,type from tb_kota where province='" . $this->input->get('prov',true) ."'")->result();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function getKecamatan()
    {
        $arr = explode('. ', $this->input->get('kota',true)) ;

        $data = $this->db->query("select distinct subdistrict_id,subdistrict_name from tb_kecamatan where city='" . $arr[1] ."' and type='" . $arr[0] ."'")->result();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function getKelurahan()
    {
        $data = $this->db->query("select distinct kelurahan from master_city where kecamatan='" . $this->input->get('kec',true) ."'")->result();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function getAll()
    {
    	$kel = $this->input->get('kel',true);
        $data['kecamatan'] = $this->db->query("select distinct kecamatan from master_city where kelurahan='" . $kel."' ")->row_array();
        $data['kota'] = $this->db->query("select distinct concat(type,'. ',city)as kota,type,city from tb_kecamatan where subdistrict_name='" . $data['kecamatan']['kecamatan'] ."' ")->row_array();
        $data['provinsi'] = $this->db->query("select distinct province from tb_kecamatan where city='" . $data['kota']['city'] ."' and type='" . $data['kota']['type'] ."' ")->row_array();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

}
