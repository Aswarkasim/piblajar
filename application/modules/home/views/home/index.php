<?php include('hero.php') ?>


<!-- Marketing messaging and featurettes
  ================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="marketing">
  <div class="container">

    <center>
      <h2 class="mb-5"><strong>LAYANAN</strong></h2>
    </center>
    <div class="row ">

      <?php foreach ($layanan as $row) { ?>
        <div class="col-lg-4">
          <img src="<?= base_url($row->icon); ?>" class="rounded-circle" width="30%" alt="">
          <h3><?= $row->nama_layanan; ?></h3>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
        </div>
      <?php } ?>


    </div><!-- /.row -->
  </div>
</div>


<hr class="featurette-divider">

<div class="container">
  <center>
    <h2 class="mb-5"><strong>KELAS</strong></h2>
  </center>

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


<div class="container pt-5">
  <div class="row">
    <div class="col-md-12">
      <center>
        <h2 class="mb-5"><strong>HUBUNGI KAMI</strong></h2>
      </center>
    </div>
  </div>
</div>




<hr class="featurette-divider">

</div>