<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class table_images extends CI_Controller{
    
    public function index()
	{
		$this->load->view ('header_v');
        $this->load->view ('table_images_v');
		$this->load->view ('footer_v');
	}
}