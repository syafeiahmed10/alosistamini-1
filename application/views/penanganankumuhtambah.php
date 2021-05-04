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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Penanganan Kumuh</h6>
                </div>

                <div class="card-body">

                    <?php echo validation_errors(
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
                        '</div>'
                    ) ?>

                    <form action="<?php echo base_url('user/'); ?>penanganan_kumuh_tambah" method="POST">

                        <div class="form-group">
                            <label for="proposal">Proposal</label>
                            <input type="text" class="form-control" name="proposal" id="proposal">
                        </div>
                        <div class="form-group">
                            <label for="tahun_penanganan">Tahun Penanganan</label>
                            <input type="number" class="form-control" name="tahun_penanganan" id="tahun_penanganan">
                        </div>
                        <div class="form-group">
                            <label for="kegiatan">Kegiatan</label>
                            <textarea type="text" class="form-control" name="kegiatan" id="kegiatan"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <select class="selectpicker form-control" data-live-search="true" name="lokasi" id="lokasi" required>
                                <?php foreach ($content as $key) : ?>
                                    <option value="<?php echo $key['id_lokasi'] ?>"> <?php echo $key['lokasi'] ?> | <span class="hlsk"><?php echo $key['sk'] ?></span> | <span class="hlkabupaten"><?php echo $key['kabupaten'] ?></span> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="luas_tertangani">Luas</label>
                            <input type="number" step="any" class="form-control" name="luas_tertangani" id="luas_tertangani">
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
                            <label for="sumber_dana">Sumber Dana</label>
                            <select class="selectpicker form-control" data-live-search="true" name="sumber_dana" id="sumber_dana" required>
                                <option value="APBN">APBN</option>
                                <option value="APBD">APBD</option>
                                <option value="KOTAKU">KOTAKU</option>
                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-left">Tambah Data</button>
                        <a class="btn btn-danger float-left ml-1" href="<?php echo base_url('user/penanganan_kumuh') ?>">Batal</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>