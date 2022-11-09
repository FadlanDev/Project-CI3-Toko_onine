<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller{

    function __construct(){
		parent::__construct();
		$this->load->model('Global_m');
	}

	public function index()
	{
		$this->load->view ('header_v');
		$this->load->view ('penjualan_v');
		$this->load->view ('footer_v');
	}
    public function getpenjualan(){
		$this->Global_m->getpenjualan(); 
	}

	public function SimpanData() {
		$pelanggan = $this->input->post('pelanggan'); 
		$nm_produk = $this->input->post('nm_produk'); 
		$nomer_hp = $this->input->post('nomer_hp'); 
		$email = $this->input->post('email'); 

		$data= array (
			'pelanggan' => $pelanggan,
			'nm_produk' => $nm_produk,
			'nomer_hp' => $nomer_hp,
            'email' => $email,
		);
		$this->Global_m->input_data($data,'penjualan');
		
		echo '{"Konfirmasi":"Data Berhasil Di simpan"}';
	}
	
	public function UpdateData(){
		$pelanggan = $this->input->post('pelanggan'); 
		$nm_produk = $this->input->post('nm_produk'); 
		$nomer_hp = $this->input->post('nomer_hp'); 
		$email = $this->input->post('email'); 

		$id_pelanggan = $this->input->get('id_pelanggan');

		$data= array (
			'pelanggan' => $pelanggan,
			'nm_produk' => $nm_produk,
			'nomer_hp' => $nomer_hp,
			'email' => $email,
		);

		$where = array (
			'pelanggan' => $id_pelanggan
		);
		$this->Global_m->update_data($where,$data,'penjualan');
		
		echo '{"Konfirmasi":"Data Berhasil Di Ubah"}';
	}
	public function HapusData(){
		$pelanggan = $this->input->post('pelanggan');
		$where = array (
			'pelanggan' => $pelanggan
		);
		$this->Global_m->hapus_data($where,'penjualan');
		echo '{"success":true}';
	}
}
