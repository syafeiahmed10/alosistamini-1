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

                    <form action="<?php echo base_url('kawasan_permukiman/surat_keterangan_kumuh/add'); ?>" method="POST">

                        <div class="form-group">
                            <label for="kabupaten">Kabupaten</label>
                            <select class="selectpicker form-control" data-live-search="true" name="kabupaten" id="kabupaten" required>
                                <?php foreach ($dataSatu->result_array() as $key) : ?>
                                    <option value="<?php echo $key['id'] ?>"> <?php echo $key['name'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="surat_keterangan_kumuh">Surat Keterangan Kumuh</label>
                            <input type="text" maxlength="100" class="form-control" name="surat_keterangan_kumuh" id="surat_keterangan_kumuh">
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun Penanganan</label>
                            <input type="number" maxlength="4" class="form-control" name="tahun" id="tahun">
                        </div>
                        <div class="form-group">
                            <label for="status_sk">Status SK</label>
                            <select class="selectpicker form-control" data-live-search="true" name="status_sk" id="status_sk" required>
                                <?php foreach ($dataDua->result_array() as $key) : ?>
                                    <option value="<?php echo $key['id_ssk'] ?>"> <?php echo $key['status_sk'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-left">Tambah</button>
                        <a class="btn btn-danger float-left ml-1" href="<?php echo base_url('kawasan_permukiman/surat_keterangan_kumuh') ?>">Batal</a>
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
                    <p>Silahkan masukkan sk kumuh di kolom sebelah kanan, anda dapat memilih status_sk </p>
                </div>
            </div>
        </div>
    </div>
</div>