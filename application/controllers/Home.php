<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->model('admin');
	    $this->load->model('M_menu','',TRUE);
	   
	}
	public function index()
	{		
		$data['main'] = 'home';
		$data['js'] = 'home/js';
		$this->load->view('home',$data,FALSE); 			  
						
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

	
}
