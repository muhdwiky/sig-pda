<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>

            <div class="card-tools">
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

            <?php echo form_open('Wilayah/TambahData') ?>
            <div class="row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label>Nama Wilayah</label>
                        <input name="nama_wilayah" value="<?= old('nama_wilayah') ?>" class="form-control" required>
                        <p class="text-danger"><?= $validation->hasError('nama_wilayah') ? $validation->getError('nama_wilayah') : '' ?></p>
                    </div>
                </div>
                <div class="col-sm-2">
                    <!-- Color Picker -->
                    <div class="form-group">
                        <label>Warna Wilayah</label>
                        <input name="warna" <?= old('warna') ?> class="form-control my-colorpicker1" placeholder="Format HEX..." required>
                        <p class="text-danger"><?= $validation->hasError('warna') ? $validation->getError('warna') : '' ?></p>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                </div>
            </div>

            <div class="form-group">
                <label>GeoJson Wilayah</label>
                <textarea name="geojson" <?= old('geojson') ?> class="form-control" rows="6" required></textarea>
                <p class="text-danger"><?= $validation->hasError('geojson') ? $validation->getError('geojson') : '' ?></p>
            </div>


            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="<?= base_url('Wilayah') ?>" class="btn btn-success">Kembali</a>
        </div>

        <?php echo form_close() ?>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<script>
    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()
</script>