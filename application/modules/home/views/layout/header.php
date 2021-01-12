<?php

$konfigurasi = $this->Crud_model->listingOne('tbl_konfigurasi', 'id_konfigurasi', '1');

?>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="gagal" data-flashdata="<?= $this->session->flashdata('msg_er') ?>"></div>
<nav class="navbar navbar-expand-md  navbar-white bg-white shadow">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url($konfigurasi->logo); ?>" width="100px" alt=""></a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>"><strong> Home</strong> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('home/kelas'); ?>"><strong> Kelas</strong></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('home/tentang'); ?>"><strong> Tentang</strong></a>
        </li>
      </ul>
      <div class="form-inline mt-2 mt-md-0">
        <a href="#" class="btn btn-outline-primary my-2 my-sm-0" type="submit"> Search</a>
      </div>
    </div>
  </div>
</nav>