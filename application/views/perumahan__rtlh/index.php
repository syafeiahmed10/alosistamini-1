<a href="<?php echo site_url('perumahan__rtlh/add'); ?>" class="btn btn-success btn-xs">
    <span class="icon">
        <i class="fas fa-plus"></i>
    </span>
</a>
<div class="table-responsive">
    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
        <thead class="bg-primary text-light">
            <tr>
                <th>Id Rtlh</th>
                <th>Village Id</th>
                <th>Unit Pbdt</th>
                <th>Unit Dtpfmotm</th>
                <th>Unit Dtks</th>
                <th>Tahun</th>
                <th>Keterangan</th>
                <th>Last Update</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($perumahan__rtlh as $p) { ?>
                <tr>
                    <td><?php echo $p['id_rtlh']; ?></td>
                    <td><?php echo $p['village_id']; ?></td>
                    <td><?php echo $p['unit_pbdt']; ?></td>
                    <td><?php echo $p['unit_dtpfmotm']; ?></td>
                    <td><?php echo $p['unit_dtks']; ?></td>
                    <td><?php echo $p['tahun']; ?></td>
                    <td><?php echo $p['keterangan']; ?></td>
                    <td><?php echo $p['last_update']; ?></td>
                    <td>
                        <a href="<?php echo site_url('perumahan__rtlh/edit/' . $p['id_rtlh']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                        <a href="<?php echo site_url('perumahan__rtlh/remove/' . $p['id_rtlh']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php echo $this->pagination->create_links(); ?>