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
                <a href="<?= base_url('DaftarPengguna/Tambah') ?>" class="btn btn-primary btn-sm">
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
                        <th>Nama Pengguna</th>
                        <th>E-mail</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Foto</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($joinUserRole as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $value['username'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['password'] ?></td>
                            <td class="text-center"><?= $value['nama_role'] ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/user/' . $value['foto']) ?>" height="100px"></td>
                            <td class="text-center">
                                <a href="<?= base_url('DaftarPengguna/Detail/' . $value['id_user']) ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="<?= base_url('DaftarPengguna/Ubah/' . $value['id_user']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                <a href="<?= base_url('DaftarPengguna/Delete/' . $value['id_user']) ?>" onclick="return confirm('Yakin Anda akan Hapus Data?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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