<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Kawasan  Surat Keterangan Kumuh Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('kawasan__surat_keterangan_kumuh/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Sk</th>
						<th>Regency Id</th>
						<th>Sk</th>
						<th>Tahun</th>
						<th>Last Update</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($kawasan__surat_keterangan_kumuh as $k){ ?>
                    <tr>
						<td><?php echo $k['id_sk']; ?></td>
						<td><?php echo $k['regency_id']; ?></td>
						<td><?php echo $k['sk']; ?></td>
						<td><?php echo $k['tahun']; ?></td>
						<td><?php echo $k['last_update']; ?></td>
						<td>
                            <a href="<?php echo site_url('kawasan__surat_keterangan_kumuh/edit/'.$k['id_sk']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('kawasan__surat_keterangan_kumuh/remove/'.$k['id_sk']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
