<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pesan extends CI_Controller {
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

			$data['title'] = 'Whatsapp Pending';
			$data['main'] = 'pesan/index';
      $data['modal'] = 'modal/wa';
			$data['js'] = 'script/pesan';
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
          1=>'no_hp',
          2=>'pesan',
          3=>'created',
          4=>'sent',
      );
      $valid_sort = array(
          0=>'id',
          1=>'no_hp',
          2=>'pesan',
          3=>'created',
          4=>'sent',
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
      $this->db->from("job_pesan");
      // $this->db->where("sent",0);
      $pengguna = $this->db->get();
      $data = array();
      foreach($pengguna->result() as $r)
      {

          $data[] = array( 
                      $r->id,
                      $r->no_hp,
                      '<a href="#" data-id="'. $r->id .'" onclick="lihatpesan(this)">Lihat Pesan</a>',
                      $r->sent,
                      $r->created,
                      $r->created,
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
      $this->db->from("job_pesan");
      // $this->db->where("sent",0);
      $query = $this->db->get();
    	$result = $query->row();
    	if(isset($result)) return $result->num;
    	return 0;
  }

  public function wa()
  {
      $data = $this->admin->get_row("job_pesan" ,array('id' => $this->input->get('id',true) ));
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
  }
    
}
