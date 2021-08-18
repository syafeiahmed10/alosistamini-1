<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Perumahan  Backlog Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('perumahan__backlog/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Backlog</th>
						<th>District Id</th>
						<th>Backlog Kepemilikan</th>
						<th>Backlog Penghunian</th>
						<th>Tahun</th>
						<th>Keterangan</th>
						<th>Last Update</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($perumahan__backlog as $p){ ?>
                    <tr>
						<td><?php echo $p['id_backlog']; ?></td>
						<td><?php echo $p['district_id']; ?></td>
						<td><?php echo $p['backlog_kepemilikan']; ?></td>
						<td><?php echo $p['backlog_penghunian']; ?></td>
						<td><?php echo $p['tahun']; ?></td>
						<td><?php echo $p['keterangan']; ?></td>
						<td><?php echo $p['last_update']; ?></td>
						<td>
                            <a href="<?php echo site_url('perumahan__backlog/edit/'.$p['id_backlog']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('perumahan__backlog/remove/'.$p['id_backlog']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
