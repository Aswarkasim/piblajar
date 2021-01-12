<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="box shadow mb-4">
    <div class="box-header">
        <h3 class="box-title">Manajemen Layanan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <p>
            <a href="<?= base_url($add) ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
        </p>

        <table class="table DataTable">
            <thead>
                <tr>
                    <th width="40px">No</th>
                    <th>Nama Layanan</th>
                    <th>Deskripsi</th>
                    <th width="200px">Tindakan</th>
                </tr>
            </thead>
            <tbody id="targetData">
                <?php $no = 1;
                foreach ($layanan as $row) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td>
                            <?= $row->nama_layanan  ?>
                        </td>
                        <td><?= character_limiter($row->deskripsi, '100')  ?></td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="<?= base_url($edit . $row->id_layanan)  ?>"><i class="fa fa-edit"></i> Edit</a>
                            <a class="btn btn-sm btn-danger tombol-hapus" href="<?= base_url($delete . $row->id_layanan)  ?>"><i class="fa fa-trash"></i> Hapus</a>


                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>

    </div>
    <!-- /.card-body -->
</div>


<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $('.DataTable').DataTable();
    });
</script>