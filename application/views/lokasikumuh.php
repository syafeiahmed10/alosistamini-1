<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tabel SK Kumuh</h1>
    <p class="mb-4"></p> -->




    <a class="btn btn-success btn-icon-split mb-3 ml-auto" href="<?php echo base_url('admin/lokasi_kumuh_tambah') ?>"><span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah</span></a>





    <!-- DataTales Example -->
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lokasi Kumuh</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Lokasi</th>
                            <th>Lingkup Administratif</th>
                            <th>Kabupaten</th>
                            <th>Surat Keterangan</th>
                            <th>Luas</th>
                            <th>Langitude</th>
                            <th>Latitude</th>
                            <th>Tingkat Kumuh</th>
                            <th>Luas Akhir</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Lokasi</th>
                            <th>Lingkup Administratif</th>
                            <th>Kabupaten</th>
                            <th>Surat Keterangan</th>
                            <th>Luas</th>
                            <th>Langitude</th>
                            <th>Latitude</th>
                            <th>Tingkat Kumuh</th>
                            <th>Luas Akhir</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($content as $key) : ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $key['lokasi']; ?></td>
                                <td><?php echo $key['lingkup_administratif']; ?></td>
                                <td><?php echo $key['kabupaten']; ?></td>
                                <td><?php echo $key['sk']; ?></td>
                                <td><?php echo $key['luas']; ?></td>
                                <td><?php echo $key['lng']; ?></td>
                                <td><?php echo $key['lat']; ?></td>
                                <td><?php echo $key['tingkat_kumuh']; ?></td>
                                <td><?php echo $key['luas_akhir']; ?></td>

                                <td>
                                    <a href="<?php echo base_url('admin/lokasi_kumuh_ubah/') ?><?php echo $key['id_lokasi'] ?>"><span class="badge badge-primary">ubah</span></a>
                                    <a href=" <?php echo base_url('admin/lokasi_kumuh_hapus/') ?><?php echo $key['id_lokasi'] ?>"><span class="badge badge-danger" onclick="return confirm('yakin')">hapus</span></a>
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