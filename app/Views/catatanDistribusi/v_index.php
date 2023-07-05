<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <a href="<?= base_url('CatatanDistribusi/Tambah') ?>" class="btn btn-primary btn-sm">
                    <i class="fas fa-folder-plus"></i>
                </a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <!-- //Pesan Data Berhasil Ditambahkan -->
            <?php
            // Notification untuk Tambah Data
            if (session()->getFlashdata('insert')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h6><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('insert');
                echo '</h6></div>';
            }

            // Notification untuk Ubah Data
            if (session()->getFlashdata('update')) {
                echo '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h6><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('update');
                echo '</h6></div>';
            }

            // Notification untuk Hapus Data
            if (session()->getFlashdata('delete')) {
                echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h6><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('delete');
                echo '</h6></div>';
            }
            ?>

            <table id="example1" class="table table-sm table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th width="30px">No</th>
                        <th>Nama Armada</th>
                        <th>Nama Toko</th>
                        <!-- <th>Waktu</th> -->
                        <th>Jenis Galon</th>
                        <th>Jumlah Galon</th>
                        <th>Status Pembayaran</th>
                        <th>Foto</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($joinForAll as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['username'] ?></td>
                            <td class="text-center"><?= $value['nama_toko'] ?></td>
                            <td class="text-center"><?= $value['jenis_galon'] ?></td>
                            <td class="text-center"><?= $value['jumlah_galon'] ?></td>
                            <td class="text-center"><?= $value['status_pembayaran'] ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/catatan/' . $value['foto']) ?>" width="100px"></td>
                            <td class="text-center">
                                <a href="" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                <a href="" onclick="return confirm('Yakin Anda akan Hapus Data?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>