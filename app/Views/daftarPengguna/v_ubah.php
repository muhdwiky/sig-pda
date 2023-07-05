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

            <?php
            session();
            $validation = \Config\Services::validation();
            ?>
            <?php echo form_open_multipart('DaftarPengguna/UpdateData/' . $user['id_user']) ?>
            <div class="class form-group">
                <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input name="username" value="<?= $user['username'] ?>" class="form-control" required>
                    <p class="text-danger"><?= $validation->hasError('username') ? $validation->getError('username') : '' ?></p>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input name="email" value="<?= $user['email'] ?>" class="form-control" required>
                    <p class="text-danger"><?= $validation->hasError('email') ? $validation->getError('email') : '' ?></p>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input name="password" value="<?= $user['password'] ?>" class="form-control" required>
                    <p class="text-danger"><?= $validation->hasError('password') ? $validation->getError('password') : '' ?></p>
                </div>
                <div class="form-group">
                    <label>Role Pengguna</label>
                    <select name="id_role" id="id_role" class="form-control select2" required>
                        <option value="">--Pilih Role---</option>
                        <?php foreach ($role as $key => $value) { ?>
                            <option value="<?= $value['id_role'] ?>" <?= $user['id_role'] == $value['id_role'] ? 'selected' : '' ?>><?= $value['nama_role'] ?></option>
                        <?php  } ?>
                    </select>
                    <p class="text-danger"><?= $validation->hasError('id_role') ? $validation->getError('id_role') : '' ?></p>
                </div>
                <div class="form-group">
                    <label>Unggah Foto</label>
                    <div class="custom-file">
                        <input type="file" accept=".jpg, .png" name="foto" value="<?= old('foto') ?>" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile"></label>
                    </div>
                </div>
            </div>
            <div class="form-grup">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <a href="<?= base_url('DaftarPengguna') ?>" class="btn btn-success">Kembali</a>
            </div>
        </div>
        <!-- /.card-body -->
        <?php echo form_close() ?>
    </div>

</div>
<!-- /.card -->

<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>