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

                    <form action="<?php echo base_url('kawasan_permukiman/lokasi_kumuh/update'); ?>" method="POST">

                        <input type="hidden" required type="text" class="form-control" name="id" id="id" value="<?php echo $lokasi_kumuh_by_id['id_lokasi'] ?>">

                        <div class="form-group">
                            <label for="surat_keterangan_kumuh">Surat Keterangan Kumuh</label>
                            <select class="selectpicker form-control" data-live-search="true" name="surat_keterangan_kumuh" id="surat_keterangan_kumuh" required>
                                <!-- UNTUK MENDAPAT SELECTED DATA -->
                                <?php if (isset($lokasi_kumuh_by_id['id_lokasi'])) : ?>
                                    <option value="<?php echo $lokasi_kumuh_by_id['id_kabupaten'] ?>|<?php echo $lokasi_kumuh_by_id['id_sk'] ?>"><?php echo $lokasi_kumuh_by_id['sk'] ?></option>
                                <?php endif; ?>

                                <?php foreach ($dropdown_surat_keterangan_kumuh as $key) : ?>
                                    <option value="<?php echo $key['id'] ?>|<?php echo $lokasi_kumuh_by_id['id_sk'] ?>"><?php echo $key['sk'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class=" form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <select class="form-control" data-live-search="true" name="kecamatan" id="kecamatan">
                                <!-- UNTUK MENDAPAT SELECTED DATA -->
                                <?php if (isset($lokasi_kumuh_by_id['id_sk'])) : ?>
                                    <option value="<?php echo $lokasi_kumuh_by_id['id_kecamatan'] ?>"><?php echo $lokasi_kumuh_by_id['kecamatan'] ?></option>
                                <?php endif; ?>
                                <?php foreach ($dropdown_kecamatan as $key) : ?>
                                    <option value="<?php echo $key['id'] ?>"> <?php echo $key['name'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan">Kelurahan</label>
                            <select class="form-control" data-live-search="true" name="kelurahan" id="kelurahan">
                                <!-- UNTUK MENDAPAT SELECTED DATA -->
                                <?php if (isset($lokasi_kumuh_by_id['id_lokasi'])) : ?>
                                    <option value="<?php echo $lokasi_kumuh_by_id['id_kelurahan'] ?>"><?php echo $lokasi_kumuh_by_id['kelurahan'] ?></option>
                                <?php endif; ?>
                                <?php foreach ($dropdown_kelurahan as $key) : ?>
                                    <option value="<?php echo $key['id'] ?>"> <?php echo $key['name'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rt_rw">RT/RW</label>
                            <input placeholder="04/09" value="<?= $lokasi_kumuh_by_id['rt_rw'] ?>" type="text" step="any" maxlength="5" class="form-control" name="rt_rw" id="rt_rw">
                        </div>
                        <div class="form-group">
                            <label for="nama_lokasi">Nama Lokasi</label>
                            <input placeholder="Jeruksari" value="<?= $lokasi_kumuh_by_id['nama_lokasi'] ?>" type="text" maxlength="40" class="form-control" name="nama_lokasi" id="nama_lokasi">
                        </div>
                        <div class="form-group">
                            <label for="luas">Luas</label>
                            <input placeholder="13.5" value="<?= $lokasi_kumuh_by_id['luas'] ?>" type="text" step="any" maxlength="5" class="form-control" name="luas" id="luas">
                        </div>
                        <div class="form-group">
                            <label for="lintang">Lintang</label>
                            <input type="text" maxlength="40" class="form-control" name="lintang" id="lintang" disabled>
                        </div>
                        <div class="form-group">
                            <label for="bujur">Bujur</label>
                            <input type="text" maxlength="40" class="form-control" name="bujur" id="bujur" disabled>
                        </div>
                        <div class="form-group">
                            <label data-live-search="true" class="control-label" for="tingkat_kumuh">Tingkat Kumuh</label>
                            <select class="form-control" name="tingkat_kumuh" id="tingkat_kumuh">

                                <!-- UNTUK MENDAPAT SELECTED DATA -->
                                <?php if (isset($lokasi_kumuh_by_id['id_lokasi'])) : ?>
                                    <option value="<?php echo $lokasi_kumuh_by_id['tingkat_kumuh'] ?>"><?php echo $lokasi_kumuh_by_id['tingkat_kumuh'] ?></option>
                                <?php endif; ?>

                                <option value="Rendah">Rendah</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Tinggi">Tinggi</option>
                            </select>
                        </div>

                        <button type="submit" name="ubah" class="btn btn-primary float-left">Ubah</button>
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