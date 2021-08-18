<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Kawasan Dropdown  Tingkat Kumuh Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('kawasan_dropdown__tingkat_kumuh/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Tk</th>
						<th>Tingkat Kumuh</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($kawasan_dropdown__tingkat_kumuh as $k){ ?>
                    <tr>
						<td><?php echo $k['id_tk']; ?></td>
						<td><?php echo $k['tingkat_kumuh']; ?></td>
						<td>
                            <a href="<?php echo site_url('kawasan_dropdown__tingkat_kumuh/edit/'.$k['id_tk']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('kawasan_dropdown__tingkat_kumuh/remove/'.$k['id_tk']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
