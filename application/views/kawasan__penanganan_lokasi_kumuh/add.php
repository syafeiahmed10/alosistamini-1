<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Kawasan  Penanganan Lokasi Kumuh Add</h3>
            </div>
            <?php echo form_open('kawasan__penanganan_lokasi_kumuh/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_lokasi" class="control-label">Kawasan  Lokasi Kumuh</label>
						<div class="form-group">
							<select name="id_lokasi" class="form-control">
								<option value="">select kawasan__lokasi_kumuh</option>
								<?php 
								foreach($all_kawasan__lokasi_kumuh as $kawasan__lokasi_kumuh)
								{
									$selected = ($kawasan__lokasi_kumuh['id_lokasi'] == $this->input->post('id_lokasi')) ? ' selected="selected"' : "";

									echo '<option value="'.$kawasan__lokasi_kumuh['id_lokasi'].'" '.$selected.'>'.$kawasan__lokasi_kumuh['lokasi'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nominal" class="control-label"><span class="text-danger">*</span>Nominal</label>
						<div class="form-group">
							<input type="text" name="nominal" value="<?php echo $this->input->post('nominal'); ?>" class="form-control" id="nominal" />
							<span class="text-danger"><?php echo form_error('nominal');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="kegiatan" class="control-label"><span class="text-danger">*</span>Kegiatan</label>
						<div class="form-group">
							<input type="text" name="kegiatan" value="<?php echo $this->input->post('kegiatan'); ?>" class="form-control" id="kegiatan" />
							<span class="text-danger"><?php echo form_error('kegiatan');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tahun" class="control-label"><span class="text-danger">*</span>Tahun</label>
						<div class="form-group">
							<input type="text" name="tahun" value="<?php echo $this->input->post('tahun'); ?>" class="form-control" id="tahun" />
							<span class="text-danger"><?php echo form_error('tahun');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="sumber_dana" class="control-label"><span class="text-danger">*</span>Sumber Dana</label>
						<div class="form-group">
							<input type="text" name="sumber_dana" value="<?php echo $this->input->post('sumber_dana'); ?>" class="form-control" id="sumber_dana" />
							<span class="text-danger"><?php echo form_error('sumber_dana');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="luas_tertangani" class="control-label"><span class="text-danger">*</span>Luas Tertangani</label>
						<div class="form-group">
							<input type="text" name="luas_tertangani" value="<?php echo $this->input->post('luas_tertangani'); ?>" class="form-control" id="luas_tertangani" />
							<span class="text-danger"><?php echo form_error('luas_tertangani');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="lng" class="control-label"><span class="text-danger">*</span>Lng</label>
						<div class="form-group">
							<input type="text" name="lng" value="<?php echo $this->input->post('lng'); ?>" class="form-control" id="lng" />
							<span class="text-danger"><?php echo form_error('lng');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="lat" class="control-label"><span class="text-danger">*</span>Lat</label>
						<div class="form-group">
							<input type="text" name="lat" value="<?php echo $this->input->post('lat'); ?>" class="form-control" id="lat" />
							<span class="text-danger"><?php echo form_error('lat');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="last_update" class="control-label"><span class="text-danger">*</span>Last Update</label>
						<div class="form-group">
							<input type="text" name="last_update" value="<?php echo $this->input->post('last_update'); ?>" class="form-control" id="last_update" />
							<span class="text-danger"><?php echo form_error('last_update');?></span>
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