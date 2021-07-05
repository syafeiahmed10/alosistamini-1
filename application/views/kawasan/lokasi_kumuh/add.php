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
                            <select class="selectpicker form-control" data-live-search="true" name="selected_sk" id="selected_sk">
                                <option value="">Pilih</option>
                                <?php foreach ($dropdown_surat_keterangan_kumuh as $key => $value) : ?>
                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['sk'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label data-live-search="true" class="control-label" for="kecamatan">Kecamatan</label>
                            <select class="form-control" name="kecamatan" id="kecamatan">

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_lokasi">Nama Lokasi</label>
                            <input type="text" maxlength="40" class="form-control" name="nama_lokasi" id="nama_lokasi">
                        </div>
                        <div class="form-group">
                            <label for="luas">Luas</label>
                            <input type="text" maxlength="40" class="form-control" name="luas" id="luas">
                        </div>
                        <div class="form-group">
                            <label for="rt_rw">RT/RW</label>
                            <input type="text" maxlength="40" class="form-control" name="rt_rw" id="rt_rw">
                        </div>
                        <div class="form-group">
                            <label for="kelurahan">Kelurahan</label>
                            <select class="selectpicker form-control" data-live-search="true" name="kelurahan" id="kelurahan" required>
                                <?php foreach ($dropdown_kelurahan_kecamatan as $key) : ?>
                                    <option value="<?php echo $key['id_kelurahan'] ?>"> <?php echo $key['kelurahan'] ?> | <?php echo $key['kecamatan'] ?> | <?php echo $key['kabupaten'] ?></option>
                                <?php endforeach; ?>
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



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="selected_sk"]').on('change', function() {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    url: '<?php echo base_url() ?>kawasan_permukiman/lokasi_kumuh/myformajax/' + stateID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        $('select[name="kecamatan"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="kecamatan"]').append('<option value="' + value.id + '">' + value['name'] + '</option>');
                            // document.getElementById("kecamatan").innerHTML += "<option>hehe</option>"
                        });
                    }
                });
            } else {
                $('select[name="kecamatan"]').empty();
            }
        });
    });
</script>