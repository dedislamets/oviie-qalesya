<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sitemap extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->model('admin');
	    $this->load->model('M_menu','',TRUE);
	   
	}
	public function index()
	{		
		// $post = $this->sitemap->create();
 
  //       $data = [
  //           'post'   => $post
  //       ];
         $data=[];   
        $this->load->view('sitemap/index', $data);		  
						
	}
	
}
