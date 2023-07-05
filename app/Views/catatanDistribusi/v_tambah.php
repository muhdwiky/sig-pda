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
            <?php echo form_open_multipart('CatatanDistribusi/InsertData') ?>
            <div class="class form-group">
                <div class="form-group">
                    <label>Nama Armada</label>
                    <select name="id_user" id="id_user" class="form-control select2" required>
                        <option value="">--Pilih Nama Armada---</option>
                        <?php foreach ($user as $key => $value) { ?>
                            <option value="<?= $value['id_user'] ?>"><?= $value['username'] ?></option>
                        <?php  } ?>
                    </select>
                    <p class="text-danger"><?= $validation->hasError('id_user') ? $validation->getError('id_user') : '' ?></p>
                </div>
                <div class="form-group">
                    <label>Nama Toko</label>
                    <select name="id_toko" id="id_toko" class="form-control select2" required>
                        <option value="">--Pilih Nama Toko---</option>
                        <?php foreach ($toko as $key => $value) { ?>
                            <option value="<?= $value['id_toko'] ?>"><?= $value['nama_toko'] ?></option>
                        <?php  } ?>
                    </select>
                    <p class="text-danger"><?= $validation->hasError('id_toko') ? $validation->getError('id_toko') : '' ?></p>
                </div>
                <!-- Date and time -->
                <!-- <div class="form-group">
                    <label>Date and time:</label>
                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div> -->
                <!-- Date and time range -->
                <!-- <div class="form-group">
                    <label>Date and time range:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                        </div>
                        <input type="text" class="form-control float-right" id="reservationtime">
                    </div>
                </div> -->
                <!-- /.form group -->

                <div class="form-group">
                    <label>Jenis Galon</label>
                    <select name="jenis_galon" id="jenis_galon" class="form-control select2" required>
                        <option value="">--Pilih Jenis Galon---</option>
                        <option value="kran">Kran</option>
                        <option value="tanpa">Tanpa Kran</option>
                    </select>
                    <p class="text-danger"><?= $validation->hasError('jenis_galon') ? $validation->getError('jenis_galon') : '' ?></p>
                </div>
                <div class="form-group">
                    <label>Jumlah Galon</label>
                    <input name="jumlah_galon" value="<?= old('jumlah_galon') ?>" class="form-control" required>
                    <p class="text-danger"><?= $validation->hasError('jumlah_galon') ? $validation->getError('jumlah_galon') : '' ?></p>
                </div>
                <div class="form-group">
                    <label>Status Pembayaran</label>
                    <select name="status_pembayaran" id="status_pembayaran" class="form-control select2" required>
                        <option value="">--Pilih Jenis Galon---</option>
                        <option value="kredit">Kredit</option>
                        <option value="kontan">Kontan</option>
                    </select>
                    <p class="text-danger"><?= $validation->hasError('status_pembayaran') ? $validation->getError('status_pembayaran') : '' ?></p>
                </div>
                <div class="form-group">
                    <label>Unggah Foto Bukti Distribusi</label>
                    <div class="custom-file">
                        <input type="file" accept=".jpg, .png" name="foto" value="<?= old('foto') ?>" class="custom-file-input" id="customFile" required>
                        <label class="custom-file-label" for="customFile"></label>
                    </div>
                </div>
            </div>
            <div class="form-grup">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <a href="<?= base_url('CatatanDistribusi') ?>" class="btn btn-success">Kembali</a>
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

<script>
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({
        icons: {
            time: 'far fa-clock'
        }
    });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY hh:mm A'
        }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
        format: 'LT'
    })
</script>