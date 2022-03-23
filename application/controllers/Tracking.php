<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tracking extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->model('admin');
	    $this->load->model('M_menu','',TRUE);
	   
	}
	public function index()
	{		
		$data['main'] = 'tracking/index';
		$data['js'] = 'script/tracking';
		$this->load->view('home',$data,FALSE); 			  
						
	}
	
}
