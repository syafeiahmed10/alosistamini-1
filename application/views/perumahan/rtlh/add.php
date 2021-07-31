<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
                </div>

                <div class="card-body">

                    <?php echo validation_errors(
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
                        '</div>'
                    ) ?>

                    <form action="<?php echo base_url('perumahan/rtlh/add'); ?>" method="POST">

                        <div class="form-group">
                            <label for="kabupaten">Kabupaten</label>
                            <select class="selectpicker form-control" data-live-search="true" name="kabupaten" id="kabupaten" required>
                                <?php foreach ($dataSatu->result_array() as $key) : ?>
                                    <option value="<?php echo $key['id'] ?>"> <?php echo $key['name'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="kecamatan">Kecamatan</label>

                            <select required class="form-control" name="kecamatan" id="kecamatan">
                                <option selected>Pilih</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="kelurahan">Kelurahan</label>
                            <select required class="form-control" name="kelurahan" id="kelurahan">
                                <option selected>Pilih</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="unit_pbdt">Unit PBDT</label>
                            <input type="number" maxlength="100" class="form-control" name="unit_pbdt" id="unit_pbdt">
                        </div>
                        <div class="form-group">
                            <label for="unit_dtpfmotm">Unit DTPFMOTM</label>
                            <input type="number" maxlength="100" class="form-control" name="unit_dtpfmotm" id="unit_dtpfmotm">
                        </div>
                        <div class="form-group">
                            <label for="unit_dtks">Unit DTKS</label>
                            <input type="number" maxlength="100" class="form-control" name="unit_dtks" id="unit_dtks">
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="number" maxlength="100" class="form-control" name="tahun" id="tahun">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" maxlength="100" class="form-control" name="keterangan" id="keterangan">
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-left">Tambah</button>
                        <a class="btn btn-danger float-left ml-1" href="<?php echo base_url('perumahan/rtlh') ?>">Batal</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Petunjuk Pengisian</h6>
                </div>
                <div class="card-body">
                    <p>Silahkan masukkan sk kumuh di kolom sebelah kanan, anda dapat memilih kabupaten </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/jquery.js') ?>"> </script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="kabupaten"]').on('change', function() {

            var stateID = $(this).val().split("|");
            stateID = stateID[0];
            if (stateID) {
                $.ajax({
                    url: '<?php echo base_url() ?>kawasan_permukiman/helper_kawasan/get_kecamatan/' + stateID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        $('select[name="kecamatan"]').empty();
                        $('select[name="kecamatan"]').append('<option selected="selected">Pilih</option>');
                        $.each(data, function(key, value) {

                            $('select[name="kecamatan"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                            $('select[name="kelurahan"]').empty();
                        });
                    }
                });
            } else {
                $('select[name="kecamatan"]').empty();
                $('select[name="kelurahan"]').empty();

            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="kecamatan"]').on('change', function() {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    url: '<?php echo base_url() ?>kawasan_permukiman/helper_kawasan/get_kelurahan/' + stateID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        $('select[name="kelurahan"]').empty();
                        $('select[name="kelurahan"]').append('<option selected="selected">Pilih</option>');

                        $.each(data, function(key, value) {

                            $('select[name="kelurahan"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="kelurahan"]').empty();
            }
        });
    });
</script>