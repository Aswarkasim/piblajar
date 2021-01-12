<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // is_logged_in_admin();
  }

  public function index()
  {
    $kelas = $this->Crud_model->listing('tbl_kelas');

    $data = [
      'title'   => 'Manajemen Kelas',
      'kelas'    => $kelas,
      'add'      => 'admin/kelas/add',
      'edit'      => 'admin/kelas/edit/',
      'delete'      => 'admin/kelas/delete/',
      'title'     => 'Kelas',
      'content'   => 'admin/kelas/index'
    ];

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function add()
  {

    $this->load->helper('string');


    $required = '%s tidak boleh kosong';
    $valid = $this->form_validation;
    $valid->set_rules('nama_kelas', 'Nama', 'required', ['required' => $required]);
    if ($valid->run()) {
      if (!empty($_FILES['gambar']['name'])) {
        $config['upload_path']   = './assets/uploads/images/';
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('gambar')) {
          $data = [
            'title'    => 'Tambah Kelas',
            'add'    => 'admin/kelas/add',
            'back'    => 'admin/kelas',
            'error'     => $this->upload->display_errors(),
            'content'  => 'admin/kelas/add'
          ];
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
          $upload_data = ['uploads' => $this->upload->data()];

          $i = $this->input;

          $data = [
            'id_kelas'      => random_string(),
            'nama_kelas'    => $i->post('nama_kelas'),
            'pengajar'         => $i->post('pengajar'),
            'alamat'         => $i->post('alamat'),
            'biaya'         => $i->post('biaya'),
            'deskripsi'         => $i->post('deskripsi'),
            'start_daftar'         => $i->post('start_daftar'),
            'end_daftar'         => $i->post('end_daftar'),
            'gambar'            => $config['upload_path'] . $upload_data['uploads']['file_name']
          ];
          $this->Crud_model->add('tbl_kelas', $data);
          $this->session->set_flashdata('msg', 'Kelas ditambahkan');
          redirect('admin/kelas');
        }
      }
    }
    $data = [
      'title'    => 'Tambah Kelas',
      'add'    => 'admin/kelas/add',
      'back'    => 'admin/kelas',
      'content'  => 'admin/kelas/add'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }



  function edit($id_kelas)
  {
    $kelas = $this->Crud_model->listingOne('tbl_kelas', 'id_kelas', $id_kelas);

    $valid = $this->form_validation;

    $required = '%s tidak boleh kosong';
    $valid = $this->form_validation;
    $valid->set_rules('nama_kelas', 'Nama Kelas', 'required', ['required' => $required]);
    if ($valid->run()) {
      if (!empty($_FILES['gambar']['name'])) {
        $config['upload_path']   = './assets/uploads/images/';
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['max_size']      = '24000'; // KB 
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('gambar')) {
          $data = [
            'title'    => 'Edit Kelas ' . $kelas->nama_kelas,
            'edit'    => 'admin/kelas/edit/' . $kelas->id_kelas,
            'back'    => 'admin/kelas',
            'kelas'    => $kelas,
            'error'     => $this->upload->display_errors(),
            'content'  => 'admin/kelas/edit'
          ];
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
          if ($kelas->gambar != '') {
            unlink($kelas->gambar);
          }

          $upload_data = ['uploads' => $this->upload->data()];

          $i = $this->input;

          $data = [
            'id_kelas'      => $id_kelas,
            'nama_kelas'    => $i->post('nama_kelas'),
            'pengajar'         => $i->post('pengajar'),
            'alamat'         => $i->post('alamat'),
            'biaya'         => $i->post('biaya'),
            'deskripsi'         => $i->post('deskripsi'),
            'start_daftar'         => $i->post('start_daftar'),
            'end_daftar'         => $i->post('end_daftar'),
            'gambar'            => $config['upload_path'] . $upload_data['uploads']['file_name']
          ];
          $this->Crud_model->edit('tbl_kelas', 'id_kelas', $id_kelas, $data);
          $this->session->set_flashdata('msg', 'Kelas diubah');
          redirect('admin/kelas/edit/' . $id_kelas);
        }
      } else {
        $i = $this->input;

        $data = [
          'id_kelas'      => $id_kelas,
          'nama_kelas'    => $i->post('nama_kelas'),
          'pengajar'         => $i->post('pengajar'),
          'alamat'         => $i->post('alamat'),
          'biaya'         => $i->post('biaya'),
          'deskripsi'         => $i->post('deskripsi'),
          'start_daftar'         => $i->post('start_daftar'),
          'end_daftar'         => $i->post('end_daftar'),
        ];
        $this->Crud_model->edit('tbl_kelas', 'id_kelas', $id_kelas, $data);
        $this->session->set_flashdata('msg', 'Kelas diubah');
        redirect('admin/kelas/edit/' . $id_kelas);
      }
    }
    $data = [
      'title'    => 'Edit Kelas ' . $kelas->nama_kelas,
      'edit'    => 'admin/kelas/edit/' . $kelas->id_kelas,
      'back'    => 'admin/kelas',
      'kelas'    => $kelas,
      'content'  => 'admin/kelas/edit'
    ];
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  function delete($id_kelas)
  {

    $kelas = $this->Crud_model->listingOne('tbl_kelas', 'id_kelas', $id_kelas);
    if ($kelas->gambar != '') {
      unlink($kelas->gambar);
    }

    $this->Crud_model->delete('tbl_kelas', 'id_kelas', $id_kelas);
    $this->session->set_flashdata('msg', 'dihapus');
    redirect('admin/kelas');
  }
}
