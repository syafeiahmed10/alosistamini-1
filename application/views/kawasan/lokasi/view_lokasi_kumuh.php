<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>




    <a class="btn btn-success btn-icon-split mb-3 ml-auto" href="<?php echo base_url() ?>kawasan/lokasi_kumuh_tambah"><span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah</span></a>


    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Alhamdulilllah</strong> Data Berhasil di <?php echo $this->session->flashdata('add'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>


    <!-- DataTales Example -->
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kabupaten</th>
                            <th>Nomor SK</th>
                            <th>Nama Lokasi</th>
                            <th><span class="lat"> Latitude </span> | <span class="long"> Longitude </span></th>
                            <th>Luas</th>
                            <th>Tingkat Kumuh</th>
                            <th>Lingkup Administratif</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kabupaten</th>
                            <th>Nomor SK</th>
                            <th>Nama Lokasi</th>
                            <th><span class="lat"> Latitude </span> | <span class="long"> Longitude </span></th>
                            <th>Luas</th>
                            <th>Tingkat Kumuh</th>
                            <th>Lingkup Administratif</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($lokasikumuh as $lokasi) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $lokasi['kabupaten'] ?></td>
                                <td><?php echo $lokasi['surat_keterangan']['sk'] ?></td>
                                <td><?php echo $lokasi['surat_keterangan']['kawasan']['nama_lokasi'] ?></td>
                                <td>
                                    <span class="lat"><?php echo $lokasi['surat_keterangan']['kawasan']['latitude'] ?></span> |
                                    <span class="long"><?php echo $lokasi['surat_keterangan']['kawasan']['longitude'] ?></span>
                                </td>
                                <td><?php echo $lokasi['surat_keterangan']['kawasan']['luas_awal'] ?></td>
                                <td><?php echo $lokasi['surat_keterangan']['kawasan']['status'] ?></td>
                                <td><?php echo $lokasi['surat_keterangan']['kawasan']['lingkup_administratif'] ?>

                                <td><a class="badge badge-primary" href="<?= base_url(); ?>kawasan/lokasi_kumuh_detail/<?= $lokasi['_id'] ?>">Hapus</a>
                                    <a onclick="return confirm('Anda Yakin Menghapus <?php echo $lokasi['surat_keterangan']['kawasan']['nama_lokasi']  ?>')" class="badge badge-danger" href="<?= base_url(); ?>kawasan/lokasi_kumuh_hapus/<?= $lokasi['_id'] ?>">Hapus</a>
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