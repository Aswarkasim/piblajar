<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $layanan = $this->Crud_model->listing('tbl_layanan');
        $data = [
            'add'      => 'admin/layanan/add',
            'edit'      => 'admin/layanan/edit/',
            'delete'      => 'admin/layanan/delete/',
            'layanan'      => $layanan,
            'content'   => 'admin/layanan/index'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


    public function add()
    {

        $this->load->helper('string');

        $required = '%s tidak boleh kosong';
        $valid = $this->form_validation;
        $valid->set_rules('nama_layanan', 'Nama Layanan', 'required', ['required' => $required]);
        $valid->set_rules('deskripsi', 'Deskripsi', 'required', ['required' => $required]);
        if ($valid->run()) {
            if (!empty($_FILES['icon']['name'])) {
                $config['upload_path']   = './assets/uploads/images/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '24000'; // KB 
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('icon')) {
                    $data = [
                        'title'     => 'Tambah Layanan',
                        'add'       => 'admin/layanan/add',
                        'back'      => 'admin/layanan',
                        'error'     => $this->upload->display_error(),
                        'content'   => 'admin/layanan/add'
                    ];
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                } else {
                    $upload_data = ['uploads' => $this->upload->data()];

                    $i = $this->input;
                    $data = [
                        'id_layanan'      => random_string(),
                        'nama_layanan'    => $i->post('nama_layanan'),
                        'deskripsi'     => $i->post('deskripsi'),
                        'icon'          => $config['upload_path'] . $upload_data['uploads']['file_name']
                    ];
                    $this->Crud_model->add('tbl_layanan', $data);
                    $this->session->set_flashdata('msg', 'Layanan ditambahkan');
                    redirect('admin/layanan');
                }
            }
        }
        $data = [
            'title'     => 'Tambah Layanan',
            'add'       => 'admin/layanan/add',
            'back'      => 'admin/layanan',
            'content'   => 'admin/layanan/add'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


    function edit($id_layanan)
    {
        $i = $this->input;
        $required = '%s tidak boleh kosong';
        $valid = $this->form_validation;
        $valid->set_rules('nama_layanan', 'Nama Layanan', 'required', ['required' => $required]);
        $valid->set_rules('deskripsi', 'Deskripsi', 'required', ['required' => $required]);

        $layanan = $this->Crud_model->listingOne('tbl_layanan', 'id_layanan', $id_layanan);
        if ($valid->run()) {
            if (!empty($_FILES['icon']['name'])) {
                $config['upload_path']   = './assets/uploads/images/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '100000'; // KB 
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('icon')) {

                    $data = [
                        'title'     => 'Edit Layanan ' . $layanan->nama_layanan,
                        'edit'       => 'admin/layanan/edit/',
                        'back'      => 'admin/layanan',
                        'layanan'     => $layanan,
                        'error'     => $this->upload->display_errors(),
                        'content'   => 'admin/layanan/edit'
                    ];
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                } else {

                    if ($layanan->icon != "") {
                        unlink($layanan->icon);
                    }
                    $upload_data = ['uploads' => $this->upload->data()];
                    $data = [
                        'id_layanan'      => $id_layanan,
                        'nama_layanan'    => $i->post('nama_layanan'),
                        'deskripsi'     => $i->post('deskripsi'),
                        'icon'          => $config['upload_path'] . $upload_data['uploads']['file_name']
                    ];
                    $this->Crud_model->edit('tbl_layanan', 'id_layanan', $id_layanan, $data);
                    $this->session->set_flashdata('msg', 'Akta Cerai diupload');
                    redirect('admin/layanan/edit/' . $id_layanan);
                }
            } else {
                $data = [
                    'id_layanan'      => $id_layanan,
                    'nama_layanan'    => $i->post('nama_layanan'),
                    'deskripsi'     => $i->post('deskripsi')
                ];
                $this->Crud_model->edit('tbl_layanan', 'id_layanan', $id_layanan, $data);
                $this->session->set_flashdata('msg', 'Layanan Diedit');
                redirect('admin/layanan/edit/' . $id_layanan);
            }
        } else {
            $data = [
                'title'     => 'Edit Layanan ' . $layanan->nama_layanan,
                'edit'       => 'admin/layanan/edit/',
                'back'      => 'admin/layanan',
                'layanan'     => $layanan,
                'content'   => 'admin/layanan/edit'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        }
    }



    function delete($id_layanan)
    {
        $layanan = $this->Crud_model->listingOne('tbl_layanan', 'id_layanan', $id_layanan);
        if ($layanan->icon != "") {
            unlink($layanan->icon);
        }
        $this->Crud_model->delete('tbl_layanan', 'id_layanan', $id_layanan);
        $this->session->set_flashdata('msg', 'dihapus');
        redirect('admin/layanan');
    }
}
