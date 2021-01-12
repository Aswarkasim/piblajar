<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">

    <?php foreach ($banner as $key => $row) { ?>
      <li data-target="#myCarousel" data-slide-to="<?= $key; ?>" class=" <?= $key == 0 ? 'active' : '' ?>"></li>
    <?php } ?>
  </ol>
  <div class="carousel-inner">

    <?php foreach ($banner as $key => $row) { ?>

      <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>" style="background-image: url('<?= base_url($row->gambar); ?>">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>Example headline.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-warning shadow-sm" href="#" role="button">Sign up today <i class="fa fa-angle-right"></i></a></p>
          </div>
        </div>
      </div>

    <?php } ?>

  </div>


  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>