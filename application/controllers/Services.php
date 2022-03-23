<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Services extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->model('admin');
	    $this->load->model('M_menu','',TRUE);
	   
	}
	public function index()
	{		
		$data['main'] = 'services/index';
		$data['js'] = 'script/no-script';
		$this->load->view('home',$data,FALSE); 			  
						
	}
	
}
