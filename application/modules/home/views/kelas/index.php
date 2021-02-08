<div class="container mt-5">

  <div class="row">

    <?php foreach ($kelas as $row) { ?>
      <div class="col-md-3">
        <div class="card">
          <img class="card-img-top" src="<?= base_url($row->gambar); ?>" alt="Card image cap">
          <div class="card-body">
            <a href="<?= base_url('home/kelas/detail/' . $row->id_kelas); ?>">
              <h4><strong><?= $row->nama_kelas; ?></strong></h4>
            </a>
            <p class="card-text"><?= character_limiter($row->deskripsi, '100'); ?></p>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>