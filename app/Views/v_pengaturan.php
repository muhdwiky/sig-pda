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
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h6><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('pesan');
                echo '</h6></div>';
            }

            ?>

            <?php echo form_open('Admin/UpdatePengaturan') ?>

            <div class="form-group">
                <label>Nama Website</label>
                <input name="nama_web" value="<?= $web['nama_web'] ?>" class="form-control" placeholder="Nama Website" required>
            </div>
            <div class="row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label>Koordinat Wilayah</label>
                        <input name="koordinat_wilayah" value="<?= $web['koordinat_wilayah'] ?>" class="form-control" placeholder="Koordinat Wilayah" required>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Tampilan Zoom Wilayah</label>
                        <input type="number" name="zoom_view" value="<?= $web['zoom_view'] ?>" min="0" max="20" class="form-control" placeholder="Zoom Wilayah" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select name="id_provinsi" id="id_provinsi" class="form-control select2" style="width: 100%;">
                            <option value="">--Pilih Provinsi---</option>
                            <?php foreach ($provinsi as $key => $value) { ?>
                                <option value="<?= $value['id_provinsi'] ?>" <?= $web['id_provinsi'] == $value['id_provinsi'] ? 'selected' : '' ?>><?= $value['nama_provinsi'] ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kabupaten</label>
                        <select name="id_kabupaten" id="id_kabupaten" class="form-control select2" required>
                            <option value="<?= $web['id_kabupaten'] ?>"><?= $web['nama_kabupaten'] ?></option>

                        </select>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary">Simpan</button>
        </div>

        <?php echo form_close() ?>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<div class="col-sm-12">
    <div id="map" style="width: 100%; height: 600px;"></div>
</div>

<script>
    $(document).ready(function() {
        //Initialize Select2 Elements
        $('.select2').select2();

        $('#id_provinsi').change(function() {
            var id_provinsi = $('#id_provinsi').val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/Kabupaten') ?>",
                data: {
                    id_provinsi: id_provinsi,
                },
                success: function(response) {
                    $('#id_kabupaten').html(response);
                }
            });
        });
    });
</script>

<script>
    var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    var peta5 = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/{style}/{z}/{x}/{y}.{ext}', {
        attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        subdomains: 'abcd',
        style: 'toner',
        ext: 'png'
    });

    var peta6 = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
    });

    const map = L.map('map', {
        center: [<?= $web['koordinat_wilayah'] ?>],
        zoom: <?= $web['zoom_view'] ?>,
        layers: [peta3]
    });

    const baseMaps = {
        'Streets': peta3,
        'CartoDB': peta5,
        'Stamen': peta6,
    };

    var layerControl = L.control.layers(baseMaps).addTo(map);
</script>