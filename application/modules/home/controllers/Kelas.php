<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

  public function index()
  {
    $kelas = $this->Crud_model->listing('tbl_kelas');
    $data = [
      'kelas'    => $kelas,
      'content'  => 'home/kelas/index'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function detail($id_kelas)
  {
    $kelas = $this->Crud_model->listingOne('tbl_kelas', 'id_kelas', $id_kelas);
    $data = [
      'kelas'    => $kelas,
      'content'  => 'home/kelas/detail'
    ];
    $this->load->view('home/layout/wrapper', $data, FALSE);
  }

  function daftar($id_kelas)
  {

    $this->load->helper('string');

    $data = [
      'id_daftar'   => random_string(),
      'id_kelas'    => $id_kelas,
      'namalengkap' => $this->input->post('namalengkap'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'email' => $this->input->post('email'),
      'no_hp' => $this->input->post('no_hp')
    ];

    $this->Crud_model->add('tbl_daftar', $data);
    $this->session->set_flashdata('msg', 'Data anda telah terkirim');
    redirect('home/kelas/detail/' . $id_kelas, 'refresh');
  }
}

/* End of file Controllername.php */
