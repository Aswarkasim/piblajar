<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $banner = $this->Crud_model->listing('tbl_banner');
        $layanan = $this->Crud_model->listing('tbl_layanan');
        $kelas = $this->Crud_model->listing('tbl_kelas');
        $data = [
            'banner'   => $banner,
            'kelas'   => $kelas,
            'layanan'   => $layanan,
            'content'  => 'home/home/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
    }
}
