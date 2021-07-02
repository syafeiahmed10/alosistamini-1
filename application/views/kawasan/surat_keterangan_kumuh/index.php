<!-- Begin Page Content -->
<div class="container-fluid">
    <form action="<?php echo base_url('kawasan/remove_sk') ?>" method="POST">
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
            </div>


            <a class="badge mb-3 ml-auto" href="<?php echo base_url('kawasan/sk_kumuh_tambah') ?>"><span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah</span></a>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th>No</th>
                                <th>Nomor SK</th>
                                <th>Kabupaten</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($content as $key) : ?>
                                <tr>
                                    <td><input type="checkbox" name="id[]" value="<?php echo $key['id_sk']; ?>"></td>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $key['sk']; ?></td>
                                    <td><?php echo $key['name']; ?></td>
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
    </form>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->