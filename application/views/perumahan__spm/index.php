<a href="<?php echo site_url('perumahan__spm/add'); ?>" class="btn btn-success btn-xs">
    <span class="icon">
        <i class="fas fa-plus"></i>
    </span>
</a>
<div class="table-responsive">
    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead class="bg-primary text-light">
            <tr>
                <th>Id Spm</th>
                <th>Village Id</th>
                <th>Id Pekerjaan Spm</th>
                <th>Tahun</th>
                <th>Jml Rumah Ditangani</th>
                <th>Keterangan</th>
                <th>Last Update</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($perumahan__spm as $p) { ?>
                <tr>
                    <td><?php echo $p['id_spm']; ?></td>
                    <td><?php echo $p['village_id']; ?></td>
                    <td><?php echo $p['id_pekerjaan_spm']; ?></td>
                    <td><?php echo $p['tahun']; ?></td>
                    <td><?php echo $p['jml_rumah_ditangani']; ?></td>
                    <td><?php echo $p['keterangan']; ?></td>
                    <td><?php echo $p['last_update']; ?></td>
                    <td>
                        <a href="<?php echo site_url('perumahan__spm/edit/' . $p['id_spm']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                        <a href="<?php echo site_url('perumahan__spm/remove/' . $p['id_spm']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php echo $this->pagination->create_links(); ?>