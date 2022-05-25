<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->model('admin');
	   
	}
	public function index()
	{		
		if($this->admin->logged_id()){

            $data['title'] = 'Home';
            $data['main'] = 'dashboard';
			$data['js'] = 'dashboard/js';
            $data['modal'] = 'modal/none';
            $data['config'] = $this->admin->get_array('tb_setting');

            $this->db->select('sum(total+ongkir) omset');
            $this->db->from('invoice');
            $this->db->join('tb_admin U', 'U.nohp = invoice.hp_admin');
            // if($this->session->userdata('role') == 'Admin'){
            //     $this->db->where('id_user',$this->session->userdata('user_id'));
            // }
            $this->db->where_in('invoice.status',array('Paid','Delivery'));
            $query = $this->db->get();
            $data['omset'] = $query->row_array(); 

            $this->db->from('rekapan');
            $this->db->join('members', 'members.kode_member = rekapan.id_member');
            $this->db->where('id_invoice',NULL);
            $data['booking'] = $this->db->get()->num_rows();

            $this->db->from('members');
            $data['members'] = $this->db->get()->num_rows();

            $this->db->from('invoice');
            $this->db->join('tb_admin U', 'U.nohp = invoice.hp_admin');
            // if($this->session->userdata('role') == 'Admin'){
            //     $this->db->where('id_user',$this->session->userdata('user_id'));
            // }
            $this->db->where_in('invoice.status',array('Cancel'));
            $data['cancel'] = $this->db->get()->num_rows();

            $this->db->select('DATE(invoice.tgl_invoice) AS tgl, sum(qty) AS jml');
            $this->db->from('invoice');
            $this->db->join('tb_admin U', 'U.nohp = invoice.hp_admin');
            $this->db->group_by('DATE(invoice.tgl_invoice)');
            // if($this->session->userdata('role') == 'Admin'){
            //     $this->db->where('id_user',$this->session->userdata('user_id'));
            // }
            $this->db->where_in('invoice.status',array('Paid','Delivery'));
            $records = $this->db->get()->result_array();

            $data_label=array();
            $data_total=array();
            foreach($records as $row) {
                array_push($data_label,date('d M',strtotime($row['tgl'])));
                array_push($data_total,$row['jml']);
            }
            $data['chart_label'] = json_encode($data_label);
            $data['chart_total'] = json_encode($data_total);
            
            $this->db->select('nama_lengkap,kode_inv,system_date,description,module,amount');
            $this->db->from('invoice');
            $this->db->join('members U', 'U.kode_member = invoice.id_member');
            $this->db->join('mutasi', 'mutasi.id = invoice.id_mutasi');
            $data['last_mutasi'] = $this->db->get()->result_array();

            // print("<pre>".print_r($data,true)."</pre>");exit();

			$this->load->view('dashboard',$data,FALSE); 

        }else{

            redirect("login");

        }				  			
	}

    public function notifikasi($id){
        $this->db->from('tb_notifikasi');
        $this->db->where('read',0);
        $query = $this->db->where('sent_to', $id)->get();
        $data['notifikasi'] = $query->result();
        $data['notifikasi_count'] = $query->num_rows();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
	
}
