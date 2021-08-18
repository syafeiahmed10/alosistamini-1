<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Perumahan  Kepemilikan Rumah Add</h3>
            </div>
            <?php echo form_open('perumahan__kepemilikan_rumah/add'); ?>
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
						<label for="jumlah_kk" class="control-label"><span class="text-danger">*</span>Jumlah Kk</label>
						<div class="form-group">
							<input type="text" name="jumlah_kk" value="<?php echo $this->input->post('jumlah_kk'); ?>" class="form-control" id="jumlah_kk" />
							<span class="text-danger"><?php echo form_error('jumlah_kk');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="rumah_milik_sendiri" class="control-label"><span class="text-danger">*</span>Rumah Milik Sendiri</label>
						<div class="form-group">
							<input type="text" name="rumah_milik_sendiri" value="<?php echo $this->input->post('rumah_milik_sendiri'); ?>" class="form-control" id="rumah_milik_sendiri" />
							<span class="text-danger"><?php echo form_error('rumah_milik_sendiri');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="rumah_sewa" class="control-label"><span class="text-danger">*</span>Rumah Sewa</label>
						<div class="form-group">
							<input type="text" name="rumah_sewa" value="<?php echo $this->input->post('rumah_sewa'); ?>" class="form-control" id="rumah_sewa" />
							<span class="text-danger"><?php echo form_error('rumah_sewa');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="rumah_bebas_sewa" class="control-label"><span class="text-danger">*</span>Rumah Bebas Sewa</label>
						<div class="form-group">
							<input type="text" name="rumah_bebas_sewa" value="<?php echo $this->input->post('rumah_bebas_sewa'); ?>" class="form-control" id="rumah_bebas_sewa" />
							<span class="text-danger"><?php echo form_error('rumah_bebas_sewa');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="rumah_dinas" class="control-label"><span class="text-danger">*</span>Rumah Dinas</label>
						<div class="form-group">
							<input type="text" name="rumah_dinas" value="<?php echo $this->input->post('rumah_dinas'); ?>" class="form-control" id="rumah_dinas" />
							<span class="text-danger"><?php echo form_error('rumah_dinas');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="rumah_lainnya" class="control-label"><span class="text-danger">*</span>Rumah Lainnya</label>
						<div class="form-group">
							<input type="text" name="rumah_lainnya" value="<?php echo $this->input->post('rumah_lainnya'); ?>" class="form-control" id="rumah_lainnya" />
							<span class="text-danger"><?php echo form_error('rumah_lainnya');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="rumah_tapak" class="control-label"><span class="text-danger">*</span>Rumah Tapak</label>
						<div class="form-group">
							<input type="text" name="rumah_tapak" value="<?php echo $this->input->post('rumah_tapak'); ?>" class="form-control" id="rumah_tapak" />
							<span class="text-danger"><?php echo form_error('rumah_tapak');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="rumah_susun" class="control-label"><span class="text-danger">*</span>Rumah Susun</label>
						<div class="form-group">
							<input type="text" name="rumah_susun" value="<?php echo $this->input->post('rumah_susun'); ?>" class="form-control" id="rumah_susun" />
							<span class="text-danger"><?php echo form_error('rumah_susun');?></span>
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
						<label for="keterangan" class="control-label"><span class="text-danger">*</span>Keterangan</label>
						<div class="form-group">
							<input type="text" name="keterangan" value="<?php echo $this->input->post('keterangan'); ?>" class="form-control" id="keterangan" />
							<span class="text-danger"><?php echo form_error('keterangan');?></span>
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