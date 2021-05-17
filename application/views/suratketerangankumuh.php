<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tabel SK Kumuh</h1>
    <p class="mb-4"></p> -->




    <a class="btn btn-success btn-icon-split mb-3 ml-auto" href="<?php echo base_url('kawasan/sk_kumuh_tambah') ?>"><span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah</span></a>

    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('kawasan/import_sk') ?>">
        <div class="form-group custom-file  mb-3">
            <input type="file" name="berkas_excel" class="form-control custom-file-input" id="validatedCustomFile" onchange="this.nextElementSibling.innerText = this.files[0].name">
            <label class="custom-file-label" for="validatedCustomFile">Upload</label>
            <div class="invalid-feedback">Example invalid custom file feedback</div>
        </div>
        <button type="submit" class="btn btn-primary">Import</button>
    </form>







    <!-- DataTales Example -->
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Surat Keterangan Kumuh</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor SK</th>
                            <th>Kabupaten</th>
                            <th>Tahun</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nomor SK</th>
                            <th>Kabupaten</th>
                            <th>Tahun</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($content as $key) : ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $key['sk']; ?></td>
                                <td><?php echo $key['name']; ?></td>
                                <td><?php echo $key['tahun']; ?></td>

                                <td>
                                    <a href="<?php echo base_url('kawasan/sk_kumuh_ubah/') ?><?php echo $key['id_sk'] ?>"><span class="badge badge-primary">ubah</span></a>
                                    <a href=" <?php echo base_url('kawasan/sk_kumuh_hapus/') ?><?php echo $key['id_sk'] ?>"><span class="badge badge-danger" onclick="return confirm('yakin')">hapus</span></a>
                                </td>

                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->