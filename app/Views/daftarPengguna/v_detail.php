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
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <img src="<?= base_url('assets/user/' . $user['foto']) ?>" width="100%">
                </div>
                <div class="col-sm-8">
                    <div class="col">
                        <table class="form-group table table-bordered table-sm">
                            <tr>
                                <th>Nama</th>
                                <th class="text-center">:</th>
                                <td><?= $user['username'] ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th class="text-center">:</th>
                                <td><?= $user['email'] ?></td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <th class="text-center">:</th>
                                <td><?= $user['password'] ?></td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <th class="text-center">:</th>
                                <td><?= $user['id_role'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="class col">
                        <a href="<?= base_url('DaftarPengguna') ?>" class="btn btn-success">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

</div>
<!-- /.card -->