<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="box shadow mb-4">
    <div class="box-header">
        <h3 class="box-title"><?= $title ?></h3>
    </div>
    <?php
    echo form_open_multipart($edit . $layanan->id_layanan)
    ?>
    <div class="row">
        <div class="col-md-6">


            <!-- /.box-header -->
            <div class="box-body">
                <?php
                echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ', '</div>');
                ?>



                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right">Nama Layanan</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="nama_layanan" value="<?= $layanan->nama_layanan ?>" placeholder="Nama Layanan" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right">Deskripsi</label>
                        </div>
                        <div class="col-md-9">
                            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi" id="" cols="30" rows="10">
                                    <?= $layanan->deskripsi; ?>
                                </textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right">icon</label>
                        </div>
                        <div class="col-md-9">
                            <input type="file" name="icon" class="form-control" id="">
                            <span class=""></span><br>
                            <img src="<?= base_url($layanan->icon); ?>" width="200px" alt="">
                        </div>
                    </div>
                </div>



            </div>
            <!-- /.box-body -->
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="col-md-9">
                <a href="<?= base_url($back) ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
    <?= form_close() ?>

</div>