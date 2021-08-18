<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Kawasan  Lokasi Kumuh Add</h3>
            </div>
            <?php echo form_open('kawasan__lokasi_kumuh/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="village_id" class="control-label"><span class="text-danger">*</span>Reg  Village</label>
						<div class="form-group">
							<select name="village_id" class="form-control">
								<option value="">select reg__village</option>
								<?php 
								foreach($all_reg__villages as $reg__village)
								{
									$selected = ($reg__village['id'] == $this->input->post('village_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$reg__village['id'].'" '.$selected.'>'.$reg__village['name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('village_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_sk" class="control-label"><span class="text-danger">*</span>Kawasan  Surat Keterangan Kumuh</label>
						<div class="form-group">
							<select name="id_sk" class="form-control">
								<option value="">select kawasan__surat_keterangan_kumuh</option>
								<?php 
								foreach($all_kawasan__surat_keterangan_kumuh as $kawasan__surat_keterangan_kumuh)
								{
									$selected = ($kawasan__surat_keterangan_kumuh['id_sk'] == $this->input->post('id_sk')) ? ' selected="selected"' : "";

									echo '<option value="'.$kawasan__surat_keterangan_kumuh['id_sk'].'" '.$selected.'>'.$kawasan__surat_keterangan_kumuh['sk'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_sk');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="lokasi" class="control-label"><span class="text-danger">*</span>Lokasi</label>
						<div class="form-group">
							<input type="text" name="lokasi" value="<?php echo $this->input->post('lokasi'); ?>" class="form-control" id="lokasi" />
							<span class="text-danger"><?php echo form_error('lokasi');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="luas" class="control-label"><span class="text-danger">*</span>Luas</label>
						<div class="form-group">
							<input type="text" name="luas" value="<?php echo $this->input->post('luas'); ?>" class="form-control" id="luas" />
							<span class="text-danger"><?php echo form_error('luas');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="rt_rw" class="control-label"><span class="text-danger">*</span>Rt Rw</label>
						<div class="form-group">
							<input type="text" name="rt_rw" value="<?php echo $this->input->post('rt_rw'); ?>" class="form-control" id="rt_rw" />
							<span class="text-danger"><?php echo form_error('rt_rw');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="lintang" class="control-label"><span class="text-danger">*</span>Lintang</label>
						<div class="form-group">
							<input type="text" name="lintang" value="<?php echo $this->input->post('lintang'); ?>" class="form-control" id="lintang" />
							<span class="text-danger"><?php echo form_error('lintang');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="bujur" class="control-label"><span class="text-danger">*</span>Bujur</label>
						<div class="form-group">
							<input type="text" name="bujur" value="<?php echo $this->input->post('bujur'); ?>" class="form-control" id="bujur" />
							<span class="text-danger"><?php echo form_error('bujur');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tingkat_kumuh" class="control-label"><span class="text-danger">*</span>Tingkat Kumuh</label>
						<div class="form-group">
							<input type="text" name="tingkat_kumuh" value="<?php echo $this->input->post('tingkat_kumuh'); ?>" class="form-control" id="tingkat_kumuh" />
							<span class="text-danger"><?php echo form_error('tingkat_kumuh');?></span>
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