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

                    <form action="<?php echo base_url('kawasan_permukiman/surat_keterangan_kumuh/update'); ?>" method="POST">

                        <input type="hidden" required type="text" class="form-control" name="id" id="id" value="<?php echo $surat_keterangan_kumuh_join_reg_regencies_by_id['id_sk'] ?>">

                        <div class="form-group">
                            <label for="kabupaten">Kabupaten</label>
                            <select class="selectpicker form-control" data-live-search="true" name="kabupaten" id="kabupaten" required>
                                <!-- UNTUK MENDAPAT SELECTED DATA -->


                                <?php foreach ($dropdown_kabupaten as $key) : ?>
                                    <option value="<?php echo $key['id'] ?>" <?php if ($key['id'] == $surat_keterangan_kumuh_join_reg_regencies_by_id['id']) echo 'selected="selected"'; ?>><?php echo $key['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="surat_keterangan_kumuh">Surat Keterangan Kumuh</label>
                            <input type="text" maxlength="40" class="form-control" name="surat_keterangan_kumuh" id="surat_keterangan_kumuh" value="<?= $surat_keterangan_kumuh_join_reg_regencies_by_id['sk'] ?>">
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-left">Ubah</button>
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
                    <p>Silahkan masukkan sk kumuh di kolom sebelah kanan, anda dapat memilih kabupaten </p>
                </div>
            </div>
        </div>
    </div>
</div>