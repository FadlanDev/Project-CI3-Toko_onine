<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Global_m');
	}

	public function index()
	{
        $this->load->view ('header_v');
		$this->load->view ('product_v');
        $this->load->view ('footer_v');
	}

	public function getproduct(){
		$this->Global_m->getproduct(); 
	}

	public function SimpanData() {
		$kd_barang = $this->input->post('kd_barang'); 
		$nm_barang = $this->input->post('nm_barang'); 
		$satuan = $this->input->post('satuan'); 
		$stok = $this->input->post('stok'); 
		$stokmin = $this->input->post('stokmin'); 
		$stokmax = $this->input->post('stokmax');
		$harga_product = $this->input->post('harga_product');

		$data= array (
			'kd_barang' => $kd_barang,
			'nm_barang' => $nm_barang,
			'satuan' => $satuan,
			'stok' => $stok,
			'stokmin' => $stokmin,
			'stokmax' => $stokmax,
			'harga_product' => $harga_product,
		);
		$this->Global_m->input_data($data,'barang');
		
		echo '{"Konfirmasi":"Data Berhasil Disimpan"}';
	}
	
	public function UpdateData(){
		$kd_barang = $this->input->post('kd_barang'); 
		$nm_barang = $this->input->post('nm_barang'); 
		$satuan = $this->input->post('satuan'); 
		$stok = $this->input->post('stok'); 
		$stokmin = $this->input->post('stokmin'); 
		$stokmax = $this->input->post('stokmax');
		$harga_product = $this->input->post('harga_product');

		$id_kd_barang = $this->input->get('id_kd_barang');

		$data= array (
			'kd_barang' => $kd_barang,
			'nm_barang' => $nm_barang,
			'satuan' => $satuan,
			'stok' => $stok,
			'stokmin' => $stokmin,
			'stokmax' => $stokmax,
			'harga_product' => $harga_product,
		);

		$where = array (
			'kd_barang' => $id_kd_barang
		);
		$this->Global_m->update_data($where,$data,'barang');
		
		echo '{"Konfirmasi":"Data Berhasil Di Update"}';
	}
	public function HapusData(){
		$kd_barang = $this->input->post('kd_barang');
		$where = array (
			'kd_barang' => $kd_barang
		);
		$this->Global_m->hapus_data($where,'barang');
		echo '{"success":true}';
	}
}