<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Perumahan Dropdown  Pelaksana Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('perumahan_dropdown__pelaksana/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Pelaksana</th>
						<th>Pelaksana</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($perumahan_dropdown__pelaksana as $p){ ?>
                    <tr>
						<td><?php echo $p['id_pelaksana']; ?></td>
						<td><?php echo $p['pelaksana']; ?></td>
						<td>
                            <a href="<?php echo site_url('perumahan_dropdown__pelaksana/edit/'.$p['id_pelaksana']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('perumahan_dropdown__pelaksana/remove/'.$p['id_pelaksana']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
