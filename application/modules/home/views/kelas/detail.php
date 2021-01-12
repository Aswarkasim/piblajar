<div class="container my-5">
  <div class="row">
    <div class="col-md-12">
      <div class="text-center">
        <h4><strong><?= $kelas->nama_kelas; ?></strong></h4>
      </div>

      <div class="row mt-5">
        <div class="col-md-6">
          <img src="<?= base_url($kelas->gambar); ?>" width="100%" alt="">

          <div class="form-group mt-2">
            <?php include('daftar.php') ?>
          </div>
        </div>

        <div class="col-md-6">

          <div class="form-group">
            <label for=""><strong>Tentang Kelas</strong></label>
            <p><?= $kelas->deskripsi; ?></p>
          </div>

          <div class="form-group">
            <label for=""><strong>Pengajar</strong></label>
            <p><?= $kelas->pengajar; ?></p>
          </div>

          <div class="form-group">
            <label for=""><strong>Alamat</strong></label>
            <p><?= $kelas->alamat; ?></p>
          </div>
          <div class="form-group">
            <label for=""><strong>Timeline Pendaftaran</strong></label>
            <p><?= format_indo($kelas->start_daftar) . ' <b>-</b> ' . format_indo($kelas->end_daftar); ?></p>
          </div>

          <div class="form-group">
            <label for=""><strong>Persayaratan</strong></label>
            <p><?= $kelas->persyaratan; ?></p>
          </div>


        </div>
      </div>

    </div>
  </div>