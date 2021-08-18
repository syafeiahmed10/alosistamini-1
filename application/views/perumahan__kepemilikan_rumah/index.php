<a href="<?php echo site_url('perumahan__kepemilikan_rumah/add'); ?>" class="btn btn-success btn-sm">
	<span class="icon">
		<i class="fas fa-plus"></i>
	</span>
</a>
<div class="table-responsive">
	<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
		<thead class="bg-primary text-light">
			<tr>
				<th>Id Kepemilikan</th>
				<th>Village Id</th>
				<th>Jumlah Kk</th>
				<th>Rumah Milik Sendiri</th>
				<th>Rumah Sewa</th>
				<th>Rumah Bebas Sewa</th>
				<th>Rumah Dinas</th>
				<th>Rumah Lainnya</th>
				<th>Rumah Tapak</th>
				<th>Rumah Susun</th>
				<th>Tahun</th>
				<th>Keterangan</th>
				<th>Last Update</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($perumahan__kepemilikan_rumah as $p) { ?>
				<tr>
					<td><?php echo $p['id_kepemilikan']; ?></td>
					<td><?php echo $p['village_id']; ?></td>
					<td><?php echo $p['jumlah_kk']; ?></td>
					<td><?php echo $p['rumah_milik_sendiri']; ?></td>
					<td><?php echo $p['rumah_sewa']; ?></td>
					<td><?php echo $p['rumah_bebas_sewa']; ?></td>
					<td><?php echo $p['rumah_dinas']; ?></td>
					<td><?php echo $p['rumah_lainnya']; ?></td>
					<td><?php echo $p['rumah_tapak']; ?></td>
					<td><?php echo $p['rumah_susun']; ?></td>
					<td><?php echo $p['tahun']; ?></td>
					<td><?php echo $p['keterangan']; ?></td>
					<td><?php echo $p['last_update']; ?></td>
					<td>
						<a href="<?php echo site_url('perumahan__kepemilikan_rumah/edit/' . $p['id_kepemilikan']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
						<a href="<?php echo site_url('perumahan__kepemilikan_rumah/remove/' . $p['id_kepemilikan']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php echo $this->pagination->create_links(); ?>