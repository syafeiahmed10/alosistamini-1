<a href="<?php echo site_url('perumahan__pembangunan_rumah/add'); ?>" class="btn btn-success btn-xs">
    <span class="icon">
        <i class="fas fa-plus"></i>
    </span>
</a>
<div class="table-responsive">
    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead class="bg-primary text-light">
            <tr>
                <th>Id Pembangunan</th>
                <th>Village Id</th>
                <th>Id Mbr</th>
                <th>Id Imb</th>
                <th>Id Pelaksana</th>
                <th>Unit</th>
                <th>Tahun</th>
                <th>Keterangan</th>
                <th>Last Update</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($perumahan__pembangunan_rumah as $p) { ?>
                <tr>
                    <td><?php echo $p['id_pembangunan']; ?></td>
                    <td><?php echo $p['village_id']; ?></td>
                    <td><?php echo $p['id_mbr']; ?></td>
                    <td><?php echo $p['id_imb']; ?></td>
                    <td><?php echo $p['id_pelaksana']; ?></td>
                    <td><?php echo $p['unit']; ?></td>
                    <td><?php echo $p['tahun']; ?></td>
                    <td><?php echo $p['keterangan']; ?></td>
                    <td><?php echo $p['last_update']; ?></td>
                    <td>
                        <a href="<?php echo site_url('perumahan__pembangunan_rumah/edit/' . $p['id_pembangunan']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                        <a href="<?php echo site_url('perumahan__pembangunan_rumah/remove/' . $p['id_pembangunan']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php echo $this->pagination->create_links(); ?>