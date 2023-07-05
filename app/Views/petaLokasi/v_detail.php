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
                <div class="col-sm-8">
                    <div id="map" style="width: 100%; height: 500px;"></div>
                </div>
                <div class="col-sm-4">
                    <div class="col">
                        <img src="<?= base_url('assets/toko/' . $toko['foto_toko']) ?>" width="100%">
                    </div>
                    <div class="col">
                        <table class="form-group table table-bordered table-sm">
                            <tr>
                                <th>Nama Toko</th>
                                <th class="text-center">:</th>
                                <td><?= $toko['nama_toko'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama Pemilik</th>
                                <th class="text-center">:</th>
                                <td><?= $toko['nama_pemilik'] ?></td>
                            </tr>
                            <tr>
                                <th>No. Telepon</th>
                                <th class="text-center">:</th>
                                <td><?= $toko['no_telepon'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat Toko</th>
                                <th class="text-center">:</th>
                                <td><?= $toko['alamat_toko'] ?>, Kec. <?= $toko['nama_kecamatan'] ?>, Kab. <?= $toko['nama_kabupaten'] ?>, <?= $toko['nama_provinsi'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="class col">
                        <a href="<?= base_url('PetaLokasi') ?>" class="btn btn-success">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
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
        center: [<?= $toko['koordinat_toko'] ?>],
        zoom: <?= $web['zoom_view'] ?>,
        layers: [peta3]
    });

    const baseMaps = {
        'Streets': peta3,
        'CartoDB': peta5,
        'Stamen': peta6,
    };

    L.geoJSON(<?= $toko['geojson'] ?>, {
            fillColor: '<?= $toko['warna'] ?>',
            fillOpacity: 0.5,
        })
        .bindPopup("<b><?= $toko['nama_wilayah'] ?></b>")
        .addTo(map);

    var layerControl = L.control.layers(baseMaps).addTo(map);
    L.marker([<?= $toko['koordinat_toko'] ?>]).addTo(map);
</script>