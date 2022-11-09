<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller{

	public function index()
	{
		$this->load->view ('header_v');
		$this->load->view ('dashboard_v');
		$this->load->view ('footer_v');
	}
}