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
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Lokasi Kumuh</h6>
                </div>

                <div class="card-body">

                    <?php echo validation_errors(
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
                        '</div>'
                    ) ?>

                    <form action="<?php echo base_url('kawasan/'); ?>lokasi_kumuh_aksi_ubah" method="POST">

                        <input type="hidden" required type="text" class="form-control" name="id_lokasi" id="id_lokasi" value="<?php echo $content2['id_lokasi'] ?>">
                        <div class="form-group">
                            <label for="nama_lokasi">Nama Lokasi</label>
                            <input required type="text" class="form-control" name="nama_lokasi" id="nama_lokasi" value="<?php echo $content2['lokasi'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="lingkup_administratif">Lingkup Administratif</label>
                            <textarea required type="text" class="form-control" name="lingkup_administratif" id="lingkup_administratif"><?php echo $content2['lingkup_administratif'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="surat_keterangan">Surat Keterangan</label>
                            <select class="selectpicker form-control" data-live-search="true" name="surat_keterangan" id="surat_keterangan" required>

                                <!-- UNTUK MENDAPAT SELECTED DATA -->
                                <?php if (isset($content2['id_sk'])) : ?>
                                    <option value="<?php echo $content2['id_sk'] ?>"><?php echo $content2['sk'] ?> | <?php echo $content2['kabupaten'] ?></option>
                                <?php endif; ?>
                                <?php foreach ($content as $key) : ?>
                                    <option value="<?php echo $key['id_sk'] ?>"> <?php echo $key['sk'] ?> | <?php echo $key['name'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="luas">Luas</label>
                            <input type="number" step="any" class="form-control" name="luas" id="luas" value="<?php echo $content2['luas'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="lng">Langitude</label>
                            <input type="number" step="any" class="form-control" name="lng" id="lng" value="<?php echo $content2['lng'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="lat">Latitude</label>
                            <input type="number" step="any" class="form-control" name="lat" id="lat" value="<?php echo $content2['lat'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="tingkat_kumuh">Tingkat kumuh</label>
                            <select class="selectpicker form-control" data-live-search="true" name="tingkat_kumuh" id="tingkat_kumuh" required>
                                <option value="Rendah">Rendah</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Tinggi">Tinggi</option>
                            </select>
                        </div>

                        <button type=" submit" name="tambah" class="btn btn-primary float-left">Ubah Data</button>
                        <a class="btn btn-danger float-left ml-1" href="<?php echo base_url('kawasan/lokasi_kumuh') ?>">Batal</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>