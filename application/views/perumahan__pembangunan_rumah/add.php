<div class="row">
	<div class="col-md-12">
		<div class="box box-info">

			<?php echo form_open('perumahan__pembangunan_rumah/add'); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="regency_id" class="control-label">Reg Regency</label>
						<div class="form-group">
							<select name="regency_id" class="selectpicker form-control" data-live-search="true">
								<option value="">select reg__regency</option>
								<?php
								foreach ($all_reg__regencies as $reg__regency) {
									$selected = ($reg__regency['id'] == $this->input->post('regency_id')) ? ' selected="selected"' : "";

									echo '<option value="' . $reg__regency['id'] . '" ' . $selected . '>' . $reg__regency['name'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label class="control-label" for="kecamatan">Kecamatan</label>
						<div class="form-group">
							<select required class="form-control" name="kecamatan" id="kecamatan">
								<option selected>Pilih</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label class="control-label" for="kelurahan">Kelurahan</label>
						<div class="form-group">
							<select required class="form-control" name="kelurahan" id="kelurahan">
								<option selected>Pilih</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_mbr" class="control-label">Perumahan Dropdown Mbr</label>
						<div class="form-group">
							<select name="id_mbr" class="form-control">
								<option value="">select perumahan_dropdown__mbr</option>
								<?php
								foreach ($all_perumahan_dropdown__mbr as $perumahan_dropdown__mbr) {
									$selected = ($perumahan_dropdown__mbr['id_mbr'] == $this->input->post('id_mbr')) ? ' selected="selected"' : "";

									echo '<option value="' . $perumahan_dropdown__mbr['id_mbr'] . '" ' . $selected . '>' . $perumahan_dropdown__mbr['mbr'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_imb" class="control-label">Perumahan Dropdown Imb</label>
						<div class="form-group">
							<select name="id_imb" class="form-control">
								<option value="">select perumahan_dropdown__imb</option>
								<?php
								foreach ($all_perumahan_dropdown__imb as $perumahan_dropdown__imb) {
									$selected = ($perumahan_dropdown__imb['id_imb'] == $this->input->post('id_imb')) ? ' selected="selected"' : "";

									echo '<option value="' . $perumahan_dropdown__imb['id_imb'] . '" ' . $selected . '>' . $perumahan_dropdown__imb['imb'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_pelaksana" class="control-label">Perumahan Dropdown Pelaksana</label>
						<div class="form-group">
							<select name="id_pelaksana" class="form-control">
								<option value="">select perumahan_dropdown__pelaksana</option>
								<?php
								foreach ($all_perumahan_dropdown__pelaksana as $perumahan_dropdown__pelaksana) {
									$selected = ($perumahan_dropdown__pelaksana['id_pelaksana'] == $this->input->post('id_pelaksana')) ? ' selected="selected"' : "";

									echo '<option value="' . $perumahan_dropdown__pelaksana['id_pelaksana'] . '" ' . $selected . '>' . $perumahan_dropdown__pelaksana['pelaksana'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="unit" class="control-label"><span class="text-danger">*</span>Unit</label>
						<div class="form-group">
							<input type="text" name="unit" value="<?php echo $this->input->post('unit'); ?>" class="form-control" id="unit" />
							<span class="text-danger"><?php echo form_error('unit'); ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tahun" class="control-label"><span class="text-danger">*</span>Tahun</label>
						<div class="form-group">
							<input type="text" name="tahun" value="<?php echo $this->input->post('tahun'); ?>" class="form-control" id="tahun" />
							<span class="text-danger"><?php echo form_error('tahun'); ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="keterangan" class="control-label"><span class="text-danger">*</span>Keterangan</label>
						<div class="form-group">
							<input type="text" name="keterangan" value="<?php echo $this->input->post('keterangan'); ?>" class="form-control" id="keterangan" />
							<span class="text-danger"><?php echo form_error('keterangan'); ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="last_update" class="control-label"><span class="text-danger">*</span>Last Update</label>
						<div class="form-group">
							<input type="text" name="last_update" value="<?php echo $this->input->post('last_update'); ?>" class="form-control" id="last_update" />
							<span class="text-danger"><?php echo form_error('last_update'); ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<script src="<?= base_url('assets/js/jquery.js') ?>"> </script>
<script type="text/javascript">
	$(document).ready(function() {
		$('select[name="regency_id"]').on('change', function() {

			var stateID = $(this).val().split("|");
			stateID = stateID[0];
			if (stateID) {
				$.ajax({
					url: '<?php echo base_url() ?>kawasan_permukiman/helper_kawasan/get_kecamatan/' + stateID,
					type: "GET",
					dataType: "json",
					success: function(data) {

						$('select[name="kecamatan"]').empty();
						$('select[name="kecamatan"]').append('<option selected="selected">Pilih</option>');
						$.each(data, function(key, value) {

							$('select[name="kecamatan"]').append('<option value="' + value.id + '">' + value.name + '</option>');
							$('select[name="kelurahan"]').empty();
						});
					}
				});
			} else {
				$('select[name="kecamatan"]').empty();
				$('select[name="kelurahan"]').empty();

			}
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('select[name="kecamatan"]').on('change', function() {
			var stateID = $(this).val();
			if (stateID) {
				$.ajax({
					url: '<?php echo base_url() ?>kawasan_permukiman/helper_kawasan/get_kelurahan/' + stateID,
					type: "GET",
					dataType: "json",
					success: function(data) {

						$('select[name="kelurahan"]').empty();
						$('select[name="kelurahan"]').append('<option selected="selected">Pilih</option>');

						$.each(data, function(key, value) {

							$('select[name="kelurahan"]').append('<option value="' + value.id + '">' + value.name + '</option>');
						});
					}
				});
			} else {
				$('select[name="kelurahan"]').empty();
			}
		});
	});
</script>