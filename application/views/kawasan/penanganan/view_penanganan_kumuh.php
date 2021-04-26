<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <a class="btn btn-success btn-icon-split mb-3 ml-auto" href="<?php echo base_url() ?>penanganan_kumuh/tambah"><span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah</span></a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lokasi</th>
                            <th>Kegiatan</th>
                            <th>Luas Penanganan</th>
                            <th>Tahun Penanganan</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                            <th>Sumber Dana</th>
                            <th>SK</th>
                            <th>Kabupaten</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Lokasi</th>
                            <th>Kegiatan</th>
                            <th>Luas Penanganan</th>
                            <th>Tahun Penanganan</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                            <th>Sumber Dana</th>
                            <th>SK</th>
                            <th>Kabupaten</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>

                        <?php foreach ($penanganan as $lokasi) : ?>
                            <?php foreach ($lokasi['surat_keterangan'] as $sk) : ?>
                                <?php foreach ($sk['lokasi_kumuh'] as $lk) : ?>
                                    <?php foreach ($lk['penanganan'] as $pk) : ?>
                                        <?php if ($lk['penanganan']) : ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo $lk['nama_lokasi'] ?></td>
                                                <td><?php echo $pk['kegiatan'] ?></td>
                                                <td><?php echo $pk['luas_penanganan'] ?></td>
                                                <td><?php echo $pk['tahun_penanganan'] ?></td>
                                                <td><?php echo $pk['longitude'] ?></td>
                                                <td><?php echo $pk['latitude'] ?></td>
                                                <td><?php echo $pk['sumber_dana'] ?></td>
                                                <td><?php echo $sk['sk'] ?></td>
                                                <td><?php echo $lokasi['kabupaten'] ?></td>
                                                <td>
                                                    <a onclick="return confirm('Anda Yakin Menghapus <?php echo $lk['nama_lokasi'] ?>')" class="badge badge-danger" href="<?= base_url(); ?>lokasi_kumuh/hapus/<?php echo $lokasi['_id'] ?>/<?php echo $sk['id_sk'] ?>/<?php echo $lk['id_lokasi'] ?>">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->