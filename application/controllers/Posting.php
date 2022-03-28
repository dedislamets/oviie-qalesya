<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Posting extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->model('admin');
	   
	}
	public function index()
	{		
		if($this->admin->logged_id()){

            $data['title'] = 'Posting';
            $data['main'] = 'posting/index';
			$data['js'] = 'script/posting';
			$data['modal'] = 'modal/none';
            $data['config'] = $this->admin->get_array('tb_setting');
			$this->load->view('dashboard',$data,FALSE); 

        }else{

            redirect("login");

        }				  			
	}

    
}
