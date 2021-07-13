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

                    <form action="<?php echo base_url('kawasan_permukiman/penanganan_kumuh/add'); ?>" method="POST">

                        <div class="form-group">
                            <label for="lokasi_kumuh">Lokasi Kumuh</label>
                            <select class="selectpicker form-control" data-live-search="true" name="lokasi_kumuh" id="lokasi_kumuh" required>
                                <?php foreach ($dropdown_lokasi_kumuh as $key) : ?>
                                    <option value="<?php echo $key['id_lokasi'] ?>"> <?php echo $key['lokasi'] ?> | <?php echo $key['sk'] ?> | <?php echo "RT/RW" ?> <?php echo $key['rt_rw'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="luas_tertangani">Luas di Tangani</label>
                            <input type="text" maxlength="5" class="form-control" name="luas_tertangani" id="luas_tertangani">
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun Penanganan</label>
                            <input type="number" maxlength="4" class="form-control" name="tahun" id="tahun">
                        </div>
                        <div class="form-group">
                            <label for="kegiatan">Jenis Kegiatan</label>
                            <input type="text" maxlength="40" class="form-control" name="kegiatan" id="kegiatan">
                        </div>
                        <div class="form-group">
                            <label for="nominal">Anggaran / Pembiayaan</label>
                            <input type="text" maxlength="16" class="form-control" name="nominal" id="nominal">
                        </div>
                        <div class="form-group">
                            <label for="sumber_dana">Sumber Dana</label>
                            <select required class="form-control" name="sumber_dana" id="sumber_dana">
                                <option selected>Pilih</option>
                                <option value="APBN Reguler">APBN Reguler</option>
                                <option value="Kotaku">Kotaku</option>
                                <option value="NUSP">NUSP</option>
                                <option value="APBD Provinsi">APBD Provinsi</option>
                                <option value="APBD Kabupaten/Kota">APBD Kabupaten/Kota</option>
                                <option value="Sumber Dana Lain">Sumber Dana Lain</option>
                            </select>

                        </div>

                        <button type="submit" name="tambah" class="btn btn-primary float-left">Tambah</button>
                        <a class="btn btn-danger float-left ml-1" href="<?php echo base_url('kawasan_permukiman/penanganan_kumuh') ?>">Batal</a>
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