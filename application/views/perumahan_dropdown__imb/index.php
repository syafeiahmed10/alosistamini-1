<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Perumahan Dropdown  Imb Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('perumahan_dropdown__imb/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Imb</th>
						<th>Imb</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($perumahan_dropdown__imb as $p){ ?>
                    <tr>
						<td><?php echo $p['id_imb']; ?></td>
						<td><?php echo $p['imb']; ?></td>
						<td>
                            <a href="<?php echo site_url('perumahan_dropdown__imb/edit/'.$p['id_imb']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('perumahan_dropdown__imb/remove/'.$p['id_imb']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
