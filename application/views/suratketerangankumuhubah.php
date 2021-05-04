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
                    <h6 class="m-0 font-weight-bold text-primary">Ubah SK</h6>
                </div>

                <div class="card-body">

                    <?php echo validation_errors(
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
                        '</div>'
                    ) ?>

                    <form action="<?php echo base_url('user/'); ?>sk_kumuh_aksi_ubah" method="POST">

                        <input type="hidden" required type="text" class="form-control" name="id_sk" id="id_sk" value="<?php echo $content2['id_sk'] ?>">

                        <div class="form-group">
                            <label for="kabupaten">Kabupaten</label>
                            <select class="selectpicker form-control" data-live-search="true" name="kabupaten" id="kabupaten" required>
                                <!-- UNTUK MENDAPAT SELECTED DATA -->
                                <?php if (isset($content2['id'])) : ?>
                                    <option value="<?php echo $content2['id'] ?>"><?php echo $content2['name'] ?></option>
                                <?php endif; ?>

                                <?php foreach ($content as $key) : ?>
                                    <option value="<?php echo $key['id'] ?>"> <?php echo $key['name'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="surat_keterangan">Surat Keterangan</label>
                            <input required type="text" class="form-control" name="surat_keterangan" id="surat_keterangan" value="<?php echo $content2['sk'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun SK</label>
                            <input required type="number" class="form-control" name="tahun" id="tahun" value="<?php echo $content2['tahun'] ?>">
                        </div>

                        <button type=" submit" name="tambah" class="btn btn-primary float-left">Ubah Data</button>
                        <a class="btn btn-danger float-left ml-1" href="<?php echo base_url('user/sk_kumuh') ?>">Batal</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>