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
            <?php echo form_open_multipart('PetaLokasi/InsertData') ?>
            <div class="row">
                <div class="col-sm-7">
                    <!-- peta -->
                    <div id="map" style="width: 100%; height: 800px;"></div>
                    <!-- end peta -->
                </div>
                <div class="col-sm-5">

                    <div class="form-group">
                        <label>Nama Toko</label>
                        <input name="nama_toko" value="<?= old('nama_toko') ?>" class="form-control" required>
                        <p class="text-danger"><?= $validation->hasError('nama_toko') ? $validation->getError('nama_toko') : '' ?></p>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label>Nama Pemilik</label>
                                <input name="nama_pemilik" value="<?= old('nama_pemilik') ?>" class="form-control" required>
                                <p class="text-danger"><?= $validation->hasError('nama_pemilik') ? $validation->getError('nama_pemilik') : '' ?></p>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>No. Telepon</label>
                                <input name="no_telepon" value="<?= old('no_telepon') ?>" class="form-control" required>
                                <p class="text-danger"><?= $validation->hasError('no_telepon') ? $validation->getError('no_telepon') : '' ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select name="id_provinsi" id="id_provinsi" class="form-control select2" style="width: 100%" required>
                            <option value="">--Pilih Provinsi--</option>
                            <?php foreach ($provinsi as $key => $value) { ?>
                                <option value="<?= $value['id_provinsi'] ?>"><?= $value['nama_provinsi'] ?></option>
                            <?php  } ?>
                        </select>
                        <p class="text-danger"><?= $validation->hasError('id_provinsi') ? $validation->getError('id_provinsi') : '' ?></p>
                    </div>
                    <div class="form-group">
                        <label>Kabupaten</label>
                        <select name="id_kabupaten" id="id_kabupaten" class="form-control select2" style="width: 100%" required>
                            <option value="">--Pilih Kabupaten--</option>
                        </select>
                        <p class="text-danger"><?= $validation->hasError('id_kabupaten') ? $validation->getError('id_kabupaten') : '' ?></p>
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <select name="id_kecamatan" id="id_kecamatan" class="form-control select2" style="width: 100%" required>
                            <option value="">--Pilih Kecamatan--</option>
                        </select>
                        <p class="text-danger"><?= $validation->hasError('id_kecamatan') ? $validation->getError('id_kecamatan') : '' ?></p>
                    </div>
                    <div class="form-group">
                        <label>Alamat Toko</label>
                        <textarea name="alamat_toko" class="form-control" rows="4" required></textarea>
                        <p class="text-danger"><?= $validation->hasError('alamat_toko') ? $validation->getError('alamat_toko') : '' ?></p>
                    </div>
                    <div class="form-group">
                        <label>Koordinat Toko</label>
                        <div id="map" style="width: 100%;"></div>
                        <input name="koordinat_toko" id="Koordinat" value="<?= old('koordinat') ?>" placeholder="Koordinat Lokasi" class="form-control" readonly>
                        <p class="text-danger"><?= $validation->hasError('koordinat_toko') ? $validation->getError('koordinat_toko') : '' ?></p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Wilayah Administrasi</label>
                                <select name="id_wilayah" id="id_wilayah" class="form-control select2" required>
                                    <option value="">--Pilih Wilayah---</option>
                                    <?php foreach ($wilayah as $key => $value) { ?>
                                        <option value="<?= $value['id_wilayah'] ?>"><?= $value['nama_wilayah'] ?></option>
                                    <?php  } ?>
                                </select>
                                <p class="text-danger"><?= $validation->hasError('id_wilayah') ? $validation->getError('id_wilayah') : '' ?></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Unggah Foto</label>
                                <div class="custom-file">
                                    <input type="file" accept=".jpg, .png" name="foto" value="<?= old('foto') ?>" class="custom-file-input" id="customFile" required>
                                    <label class="custom-file-label" for="customFile"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-grup">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="<?= base_url('PetaLokasi') ?>" class="btn btn-success">Kembali</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
        <?php echo form_close() ?>
    </div>

</div>
<!-- /.card -->

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

    var coordinatInput = document.querySelector("[name=koordinat]");

    var curLocation = [<?= $web['koordinat_wilayah'] ?>];
    map.attributionControl.setPrefix(false);
    var marker = new L.marker(curLocation, {
        draggable: 'true',
    });

    //mengambil koordinat saat marker di geser
    marker.on('dragend', function(e) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            curLocation
        }).bindPopup(position).update();
        $("#Koordinat").val(position.lat + "," + position.lng);
    });

    //mengambil koordinat saat map onclik
    map.on("click", function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
        } else {
            marker.setLatLng(e.latlng);
        }
        coordinatInput.value = lat + ',' + lng;
    });
    map.addLayer(marker);
</script>

<script>
    $(document).ready(function() {
        //Initialize Select2 Elements
        $('.select2').select2();

        $('#id_provinsi').change(function() {
            var id_provinsi = $('#id_provinsi').val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('PetaLokasi/Kabupaten') ?>",
                data: {
                    id_provinsi: id_provinsi,
                },
                success: function(response) {
                    $('#id_kabupaten').html(response);
                }
            });
        });

        $('#id_kabupaten').change(function() {
            var id_kabupaten = $('#id_kabupaten').val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('PetaLokasi/Kecamatan') ?>",
                data: {
                    id_kabupaten: id_kabupaten,
                },
                success: function(response) {
                    $('#id_kecamatan').html(response);
                }
            });
        });
    });
</script>

<!-- Script Unggah file -->
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>