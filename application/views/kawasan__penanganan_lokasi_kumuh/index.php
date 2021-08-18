<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Kawasan  Penanganan Lokasi Kumuh Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('kawasan__penanganan_lokasi_kumuh/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Penanganan</th>
						<th>Id Lokasi</th>
						<th>Nominal</th>
						<th>Kegiatan</th>
						<th>Tahun</th>
						<th>Sumber Dana</th>
						<th>Luas Tertangani</th>
						<th>Lng</th>
						<th>Lat</th>
						<th>Last Update</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($kawasan__penanganan_lokasi_kumuh as $k){ ?>
                    <tr>
						<td><?php echo $k['id_penanganan']; ?></td>
						<td><?php echo $k['id_lokasi']; ?></td>
						<td><?php echo $k['nominal']; ?></td>
						<td><?php echo $k['kegiatan']; ?></td>
						<td><?php echo $k['tahun']; ?></td>
						<td><?php echo $k['sumber_dana']; ?></td>
						<td><?php echo $k['luas_tertangani']; ?></td>
						<td><?php echo $k['lng']; ?></td>
						<td><?php echo $k['lat']; ?></td>
						<td><?php echo $k['last_update']; ?></td>
						<td>
                            <a href="<?php echo site_url('kawasan__penanganan_lokasi_kumuh/edit/'.$k['id_penanganan']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('kawasan__penanganan_lokasi_kumuh/remove/'.$k['id_penanganan']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
