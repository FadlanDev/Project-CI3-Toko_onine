<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_penjualan extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Global_m');
	}
    
    public function index()
	{
		$this->load->view ('header_v');
		$this->load->view ('lap_penjualan_v');
		$this->load->view ('footer_v');
	}
    public function cetakexcel(){
        $filter=$this->input->get('filter');
        $pelanggan=$this->input->get('pelanggan');
        $nm_produk=$this->input->get('nm_produk');
        
        if($filter=="username"){
            $field='pelanggan';
            $datafield=$pelanggan;
        }else{
            $field='nm_produk';
            $datafield=$nm_produk;
        }

        $where= array(
            $field => $datafield
        );
        $data['laporan']=$this->Global_m->data_laporan($where,'penjualan');
        $data['filter']=$filter;
        $this->load->view('lap_excel2_v',$data);
    }
    public function cetakpdf(){
        $filter=$this->input->get('filter');
        $pelanggan=$this->input->get('pelanggan');
        $nm_produk=$this->input->get('nm_produk');
        
        if($filter=="username"){
            $field='pelanggan';
            $datafield=$pelanggan;
        }else{
            $field='nm_produk';
            $datafield=$nm_produk;

        }
        $where= array(
            $field => $datafield
        );
        $data['laporan']=$this->Global_m->data_laporan($where,'penjualan');
        $data['filter']=$filter;
        $this->load->view('lap_pdf2_v',$data);
    }
}