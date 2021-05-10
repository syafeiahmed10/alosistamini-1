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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah SK</h6>
                </div>

                <div class="card-body">

                    <?php echo validation_errors(
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
                        '</div>'
                    ) ?>

                    <form action="<?php echo base_url('kawasan/'); ?>sk_kumuh_tambah" method="POST">

                        <div class="form-group">
                            <label for="kabupaten">Kabupaten</label>
                            <select class="selectpicker form-control" data-live-search="true" name="kabupaten" id="kabupaten" required>
                                <?php foreach ($content as $key) : ?>
                                    <option value="<?php echo $key['id'] ?>"> <?php echo $key['name'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="surat_keterangan">Surat Keterangan</label>
                            <input type="text" maxlength="40" class="form-control" name="surat_keterangan" id="surat_keterangan">
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun SK</label>
                            <input type="number" class="form-control" name="tahun" id="tahun">
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-left">Tambah Data</button>
                        <a class="btn btn-danger float-left ml-1" href="<?php echo base_url('kawasan/') ?>">Batal</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>