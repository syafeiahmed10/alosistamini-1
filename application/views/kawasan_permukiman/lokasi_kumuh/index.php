<!-- Begin Page Content -->
<div class="container-fluid">
    <form action="<?php echo base_url('kawasan_permukiman/lokasi_kumuh/delete_selected') ?>" method="POST">
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
            </div>
            <div class="card-body">
                <a class="btn btn-success  mb-3 ml-auto" href="<?php echo base_url('kawasan_permukiman/lokasi_kumuh/add') ?>">
                    <span class="icon">
                        <i class="fas fa-plus"></i>
                    </span>
                </a>
                <button type="submit" class="btn btn-danger  mb-3 ml-auto" value="Delete" onclick="return confirm('Apakah Anda Yakin Mengapus Baris yang Anda Pilih ?')">Hapus Terpilih</button>

                <button type="button" class="btn btn-info mb-3 ml-auto" data-toggle="modal" data-target="#modaldownloadformat">
                    Download Format
                </button>
                <button type="button" class="btn btn-secondary mb-3 ml-auto" data-toggle="modal" data-target="#modalimport">
                    Import
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTabl" width="100%" cellspacing="0">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th>No</th>
                                <th>Kabupaten</th>
                                <th>Nama Lokasi</th>
                                <th>Luas</th>
                                <th>RT/RW</th>
                                <th>Kelurahan/Desa</th>
                                <th>Kecamatan</th>
                                <th>Lintang</th>
                                <th>Bujur</th>
                                <th>Tingkat Kumuh</th>
                                <th>No SK</th>
                                <th>Kode Lokasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($dataSatu->result_array() as $key) : ?>
                                <tr>
                                    <td><input type="checkbox" name="id[]" value="<?php echo $key['id_lokasi']; ?>"></td>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $key['kabupaten']; ?></td>
                                    <td><?php echo $key['nama_lokasi']; ?></td>
                                    <td><?php echo $key['luas']; ?> ha</td>
                                    <td><?php echo $key['rt_rw']; ?></td>
                                    <td><?php echo $key['kelurahan']; ?></td>
                                    <td><?php echo $key['kecamatan']; ?></td>
                                    <td><?php echo $key['lintang']; ?></td>
                                    <td><?php echo $key['bujur']; ?></td>
                                    <td><?php echo $key['tingkat_kumuh']; ?></td>
                                    <td><?php echo $key['sk']; ?></td>
                                    <td><?php echo $key['id_lokasi']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('kawasan_permukiman/lokasi_kumuh/update/') ?><?php echo $key['id_lokasi'] ?>/<?php echo $key['id_kabupaten'] ?>/<?php echo $key['id_kecamatan'] ?>"><span class="badge badge-primary">ubah</span></a>
                                        <a href=" <?php echo base_url('kawasan_permukiman/lokasi_kumuh/delete/') ?><?php echo $key['id_lokasi'] ?>"><span class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin Menghapus <?php echo $key['nama_lokasi'] ?> ?')">hapus</span></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Modal Import -->
<div class="modal fade" id="modalimport" tabindex="-1" role="dialog" aria-labelledby="modalimportLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url('kawasan_permukiman/helper_kawasan/import') ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalimportLabel">Import Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="file" name="berkas_excel">
                        <div class="form-group">
                            <input value="<?php echo $this->uri->segment(2) ?>" type="hidden" name="path" id="path">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="import" id="import" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Download Format -->
<div class="modal fade" id="modaldownloadformat" tabindex="-1" role="dialog" aria-labelledby="modaldownloadformatLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url('kawasan_permukiman/helper_kawasan/download')  ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaldownloadformatLabel">Download Format</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input value="<?php echo $this->uri->segment(2) ?>" type="hidden" name="path" id="path">
                    </div>
                    <div class="form-group">
                        <label for="kabupaten">Kabupaten</label>
                        <select class="selectpicker form-control" data-live-search="true" name="kabupaten" id="kabupaten" required>
                            <?php foreach ($dataDua->result_array() as $key) : ?>
                                <option value="<?php echo $key['name'] ?>"> <?php echo $key['name'] ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="download" id="download" class="btn btn-primary">Download</button>
                </div>
            </form>
        </div>
    </div>
</div>