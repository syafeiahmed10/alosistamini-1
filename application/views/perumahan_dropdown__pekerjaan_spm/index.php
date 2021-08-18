<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Perumahan Dropdown  Pekerjaan Spm Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('perumahan_dropdown__pekerjaan_spm/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Pekerjaan Spm</th>
						<th>Pekerjaan</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($perumahan_dropdown__pekerjaan_spm as $p){ ?>
                    <tr>
						<td><?php echo $p['id_pekerjaan_spm']; ?></td>
						<td><?php echo $p['pekerjaan']; ?></td>
						<td>
                            <a href="<?php echo site_url('perumahan_dropdown__pekerjaan_spm/edit/'.$p['id_pekerjaan_spm']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('perumahan_dropdown__pekerjaan_spm/remove/'.$p['id_pekerjaan_spm']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
