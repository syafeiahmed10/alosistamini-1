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

                    <form action="<?php echo base_url('kawasan_permukiman/lokasi_kumuh/add'); ?>" method="POST">


                        <div class="form-group">
                            <label class="control-label" for="surat_keterangan_kumuh">Surat Keterangan Kumuh</label>
                            <select required class="selectpicker form-control" data-live-search="true" name="surat_keterangan_kumuh" id="surat_keterangan_kumuh">
                                <option value="">Pilih</option>
                                <?php foreach ($dataSatu->result_array() as $key => $value) : ?>
                                    <option value="<?php echo $value['id'] ?>|<?php echo $value['id_sk'] ?>"><?php echo $value['sk'] ?></option>
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
                            <label for="rt_rw">RT/RW</label>
                            <input placeholder="Contoh : RT002/RW007" type="text" step="any" maxlength="5" class="form-control" name="rt_rw" id="rt_rw">
                        </div>
                        <div class="form-group">
                            <label for="nama_lokasi">Nama Lokasi</label>
                            <input placeholder="Contoh : Jeruksari" type="text" maxlength="40" class="form-control" name="nama_lokasi" id="nama_lokasi">
                        </div>
                        <div class="form-group">
                            <label for="luas">Luas</label>
                            <input placeholder="Contoh : 13.5" type="text" step="any" maxlength="5" class="form-control" name="luas" id="luas">
                        </div>
                        <div class="form-group">
                            <label for="lintang">Lintang</label>
                            <input placeholder="Contoh : -7.293831" type="text" maxlength="40" class="form-control" name="lintang" id="lintang">
                        </div>
                        <div class="form-group">
                            <label for="bujur">Bujur</label>
                            <input placeholder="Contoh : 110.477544" type="text" maxlength="40" class="form-control" name="bujur" id="bujur">
                        </div>
                        <div class="form-group">
                            <label data-live-search="true" class="control-label" for="tingkat_kumuh">Tingkat Kumuh</label>
                            <select required class="form-control" name="tingkat_kumuh" id="tingkat_kumuh">
                                <option selected>Pilih</option>
                                <option value="Kumuh Ringan">Kumuh Ringan</option>
                                <option value="Kumuh Sedang">Kumuh Sedang</option>
                                <option value="Kumuh Berat">Kumuh Berat</option>
                            </select>
                        </div>

                        <button type="submit" name="tambah" class="btn btn-primary float-left">Tambah</button>
                        <a class="btn btn-danger float-left ml-1" href="<?php echo base_url('kawasan_permukiman/lokasi_kumuh') ?>">Batal</a>
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
        $('select[name="surat_keterangan_kumuh"]').on('change', function() {

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