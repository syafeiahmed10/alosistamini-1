<!-- Begin Page Content -->
<div class="container-fluid">
    <form action="<?php echo base_url('perumahan/spm/delete_selected') ?>" method="POST">
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
            </div>
            <div class="card-body">
                <?php echo $this->session->flashdata('message'); ?>
                <a class="btn btn-success  mb-3 ml-auto" href="<?php echo base_url('perumahan/spm/add') ?>">
                    <span class="icon">
                        <i class="fas fa-plus"></i>
                    </span>
                </a>
                <button type="submit" class="btn btn-danger  mb-3 ml-auto" value="Delete" onclick="return confirm('Apakah Anda Yakin Mengapus Baris yang Anda Pilih ?')">Hapus Terpilih</button>


                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th>No</th>
                                <th>Kabupaten</th>
                                <th>Kecamatan</th>
                                <th>Jumlah KK</th>
                                <th>Rumah Milik Sendiri</th>
                                <th>Rumah Sewa</th>
                                <th>Rumah Bebas Sewa</th>
                                <th>Rumah Dinas</th>
                                <th>Rumah Lainnya</th>
                                <th>Rumah Tapak</th>
                                <th>Rumah Susun / Apartemen</th>
                                <th>Tahun</th>
                                <th>Keterangan</th>
                                <th>Last_update</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($dataSatu->result_array() as $key) : ?>
                                <tr>

                                    <td><input type="checkbox" name="id[]" value="<?php echo $key['id_kepemilikan']; ?>"></td>
                                    <td><?php echo ++$start; ?></td>
                                    <td><?php echo $key['kabupaten']; ?></td>
                                    <td><?php echo $key['kecamatan']; ?></td>
                                    <td><?php echo $key['jumlah_kk']; ?></td>
                                    <td><?php echo $key['rumah_milik_sendiri']; ?></td>
                                    <td><?php echo $key['rumah_sewa']; ?></td>
                                    <td><?php echo $key['rumah_bebas_sewa']; ?></td>
                                    <td><?php echo $key['rumah_dinas']; ?></td>
                                    <td><?php echo $key['rumah_lainnya']; ?></td>
                                    <td><?php echo $key['rumah_tapak']; ?></td>
                                    <td><?php echo $key['rumah_susun']; ?></td>
                                    <td><?php echo $key['tahun']; ?></td>
                                    <td><?php echo $key['keterangan']; ?></td>
                                    <td><?php echo $key['last_update']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('perumahan/kepemilikan_rumah/update/') ?><?php echo $key['id_kepemilikan'] ?>"><span class="badge badge-primary">ubah</span></a>
                                        <a href=" <?php echo base_url('perumahan/kepemilikan_rumah/delete/') ?><?php echo $key['id_kepemilikan'] ?>"><span class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin Menghapus ?')">hapus</span></a>
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
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url('perumahan/helper_perumahan/import') ?>">
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