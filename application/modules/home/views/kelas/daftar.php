<a type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">
  <i class="fa fa-user-plus"></i> Daftar di kelas ini
</a>



<?= form_open('home/kelas/daftar/' . $kelas->id_kelas) ?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Daftar di kelas <?= $kelas->nama_kelas; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="" class="pull-right">Nama Lengkap</label>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control" name="namalengkap" placeholder="Nama Lengkap" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="" class="pull-right">Tanggal Lahir</label>
            </div>
            <div class="col-md-9">
              <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="" class="pull-right">Email</label>
            </div>
            <div class="col-md-9">
              <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="" class="pull-right">No. Hp/WA</label>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control" name="no_hp" placeholder="Cth: 085......" required>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
<?= form_close() ?>