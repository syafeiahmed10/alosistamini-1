<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Perumahan  Spm Edit</h3>
            </div>
			<?php echo form_open('perumahan__spm/edit/'.$perumahan__spm['id_spm']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="village_id" class="control-label">Reg  Village</label>
						<div class="form-group">
							<select name="village_id" class="form-control">
								<option value="">select reg__village</option>
								<?php 
								foreach($all_reg__villages as $reg__village)
								{
									$selected = ($reg__village['id'] == $perumahan__spm['village_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$reg__village['id'].'" '.$selected.'>'.$reg__village['name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_pekerjaan_spm" class="control-label">Perumahan Dropdown  Pekerjaan Spm</label>
						<div class="form-group">
							<select name="id_pekerjaan_spm" class="form-control">
								<option value="">select perumahan_dropdown__pekerjaan_spm</option>
								<?php 
								foreach($all_perumahan_dropdown__pekerjaan_spm as $perumahan_dropdown__pekerjaan_spm)
								{
									$selected = ($perumahan_dropdown__pekerjaan_spm['id_pekerjaan_spm'] == $perumahan__spm['id_pekerjaan_spm']) ? ' selected="selected"' : "";

									echo '<option value="'.$perumahan_dropdown__pekerjaan_spm['id_pekerjaan_spm'].'" '.$selected.'>'.$perumahan_dropdown__pekerjaan_spm['pekerjaan'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tahun" class="control-label">Tahun</label>
						<div class="form-group">
							<input type="text" name="tahun" value="<?php echo ($this->input->post('tahun') ? $this->input->post('tahun') : $perumahan__spm['tahun']); ?>" class="form-control" id="tahun" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="jml_rumah_ditangani" class="control-label">Jml Rumah Ditangani</label>
						<div class="form-group">
							<input type="text" name="jml_rumah_ditangani" value="<?php echo ($this->input->post('jml_rumah_ditangani') ? $this->input->post('jml_rumah_ditangani') : $perumahan__spm['jml_rumah_ditangani']); ?>" class="form-control" id="jml_rumah_ditangani" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="keterangan" class="control-label">Keterangan</label>
						<div class="form-group">
							<input type="text" name="keterangan" value="<?php echo ($this->input->post('keterangan') ? $this->input->post('keterangan') : $perumahan__spm['keterangan']); ?>" class="form-control" id="keterangan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="last_update" class="control-label">Last Update</label>
						<div class="form-group">
							<input type="text" name="last_update" value="<?php echo ($this->input->post('last_update') ? $this->input->post('last_update') : $perumahan__spm['last_update']); ?>" class="form-control" id="last_update" />
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