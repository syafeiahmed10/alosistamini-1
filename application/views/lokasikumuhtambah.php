<div class="container-fluid">
    <div class="row">
        <!-- <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Petunjuk Pengisian</h6>
                </div>
                <div class="card-body">
                    <p>Silahkan masukkan sk kumuh di kolom sebelah kanan, anda dapat memilih kabupaten </p>
                </div>
            </div>
        </div> -->
        <div class="col-lg-6">
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Lokasi Kumuh</h6>
                </div>

                <div class="card-body">

                    <?php echo validation_errors(
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
                        '</div>'
                    ) ?>

                    <form action="<?php echo base_url('user/'); ?>lokasi_kumuh_tambah" method="POST">

                        <div class="form-group">
                            <label for="surat_keterangan">Nama Lokasi</label>
                            <input type="text" class="form-control" name="lokasi" id="lokasi">
                        </div>
                        <div class="form-group">
                            <label for="surat_keterangan">Lingkup Administratif</label>
                            <textarea type="text" class="form-control" name="lingkup_administratif" id="lingkup_administratif"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="surat_keterangan">Surat Keterangan Kumuh</label>
                            <select class="selectpicker form-control" data-live-search="true" name="sk" id="sk" required>
                                <?php foreach ($content as $key) : ?>
                                    <option value="<?php echo $key['id_sk'] ?>"> <?php echo $key['sk'] ?> | <?php echo $key['name'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="luas">Luas</label>
                            <input type="number" step="any" class="form-control" name="luas" id="luas">
                        </div>
                        <div class="form-group">
                            <label for="lng">Langitude</label>
                            <input type="number" step="any" class="form-control" name="lng" id="lng">
                        </div>
                        <div class="form-group">
                            <label for="lat">Latitude</label>
                            <input type="number" step="any" class="form-control" name="lat" id="lat">
                        </div>
                        <div class="form-group">
                            <label for="tingkat_kumuh">Tingkat kumuh</label>
                            <select class="selectpicker form-control" data-live-search="true" name="tingkat_kumuh" id="tingkat_kumuh" required>
                                <option value="Rendah">Rendah</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Tinggi">Tinggi</option>
                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-left">Tambah Data</button>
                        <a class="btn btn-danger float-left ml-1" href="<?php echo base_url('user/lokasi_kumuh') ?>">Batal</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>