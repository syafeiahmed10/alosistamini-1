<!-- Begin Page Content -->
<div class="container-fluid">
    <form action="<?php echo base_url('kawasan_permukiman/penanganan_kumuh/delete_selected') ?>" method="POST">
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
            </div>
            <div class="card-body">
                <a class="btn btn-success  mb-3 ml-auto" href="<?php echo base_url('kawasan_permukiman/penanganan_kumuh/add') ?>">
                    <span class="icon">
                        <i class="fas fa-plus"></i>
                    </span>
                </a>
                <button type="submit" class="btn btn-danger  mb-3 ml-auto" value="Delete" onclick="return confirm('Apakah Anda Yakin Mengapus Baris yang Anda Pilih ?')">Hapus Terpilih</button>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th>No</th>
                                <th>Kabupaten</th>
                                <th>Nama Lokasi</th>
                                <th>RT/RW</th>
                                <th>Kelurahan/Desa</th>
                                <th>Kecamatan</th>
                                <th>Luas di Tangani</th>
                                <!-- <th>Lintang</th>
                                <th>Bujur</th> -->
                                <th>Tahun Penanganan</th>
                                <th>Jenis Kegiatan</th>
                                <th>Anggaran / Pembiayaan</th>
                                <th>Sumber Dana</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($penanganan_kumuh as $key) : ?>
                                <tr>
                                    <td><input type="checkbox" name="id[]" value="<?php echo $key['id_penanganan']; ?>"></td>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $key['kabupaten']; ?></td>
                                    <td><?php echo $key['nama_lokasi']; ?></td>
                                    <td><?php echo $key['rt_rw']; ?></td>
                                    <td><?php echo $key['kelurahan']; ?></td>
                                    <td><?php echo $key['kecamatan']; ?></td>
                                    <td><?php echo $key['luas_tertangani']; ?> ha</td>
                                    <!-- <td><?php echo $key['lintang']; ?></td>
                                    <td><?php echo $key['bujur']; ?></td> -->
                                    <td><?php echo $key['tahun']; ?></td>
                                    <td><?php echo $key['kegiatan']; ?></td>
                                    <td><?php echo $key['nominal']; ?></td>
                                    <td><?php echo $key['sumber_dana']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('kawasan_permukiman/penanganan_kumuh/update/') ?><?php echo $key['id_penanganan'] ?>"><span class="badge badge-primary">ubah</span></a>
                                        <a href=" <?php echo base_url('kawasan_permukiman/penanganan_kumuh/delete/') ?><?php echo $key['id_penanganan'] ?>"><span class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin Menghapus <?php echo $key['nama_lokasi'] ?> ?')">hapus</span></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->