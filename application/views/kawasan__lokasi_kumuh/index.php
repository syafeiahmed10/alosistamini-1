<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Kawasan  Lokasi Kumuh Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('kawasan__lokasi_kumuh/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Lokasi</th>
						<th>Village Id</th>
						<th>Id Sk</th>
						<th>Lokasi</th>
						<th>Luas</th>
						<th>Rt Rw</th>
						<th>Lintang</th>
						<th>Bujur</th>
						<th>Tingkat Kumuh</th>
						<th>Last Update</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($kawasan__lokasi_kumuh as $k){ ?>
                    <tr>
						<td><?php echo $k['id_lokasi']; ?></td>
						<td><?php echo $k['village_id']; ?></td>
						<td><?php echo $k['id_sk']; ?></td>
						<td><?php echo $k['lokasi']; ?></td>
						<td><?php echo $k['luas']; ?></td>
						<td><?php echo $k['rt_rw']; ?></td>
						<td><?php echo $k['lintang']; ?></td>
						<td><?php echo $k['bujur']; ?></td>
						<td><?php echo $k['tingkat_kumuh']; ?></td>
						<td><?php echo $k['last_update']; ?></td>
						<td>
                            <a href="<?php echo site_url('kawasan__lokasi_kumuh/edit/'.$k['id_lokasi']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('kawasan__lokasi_kumuh/remove/'.$k['id_lokasi']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
