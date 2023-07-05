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
                <a href="<?= base_url('Wilayah/Tambah') ?>" class="btn btn-primary btn-sm">
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
                        <th width="20px">No</th>
                        <th>Nama Wilayah</th>
                        <th>Warna</th>
                        <th width="80px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($wilayah as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $value['nama_wilayah'] ?></td>
                            <td style="background-color: <?= $value['warna'] ?>;"></td>
                            <td class="text-center">
                                <a href="<?= base_url('Wilayah/Ubah/' . $value['id_wilayah']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                <a href="<?= base_url('Wilayah/Delete/' . $value['id_wilayah']) ?>" onclick="return confirm('Yakin Anda akan Hapus Data?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
<div class="col-md-12">
    <div id="map" style="width: 100%; height: 600px;"></div>
</div>

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

    <?php foreach ($wilayah as $key => $value) { ?>
        L.geoJSON(<?= $value['geojson'] ?>, {
                fillColor: '<?= $value['warna'] ?>',
                fillOpacity: 0.5,
            })
            .bindPopup("<b><?= $value['nama_wilayah'] ?></b>")
            .addTo(map);
    <?php } ?>
</script>

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