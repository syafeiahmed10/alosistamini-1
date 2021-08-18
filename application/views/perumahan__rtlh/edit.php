<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Perumahan  Rtlh Edit</h3>
            </div>
			<?php echo form_open('perumahan__rtlh/edit/'.$perumahan__rtlh['id_rtlh']); ?>
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
									$selected = ($reg__village['id'] == $perumahan__rtlh['village_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$reg__village['id'].'" '.$selected.'>'.$reg__village['name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="unit_pbdt" class="control-label"><span class="text-danger">*</span>Unit Pbdt</label>
						<div class="form-group">
							<input type="text" name="unit_pbdt" value="<?php echo ($this->input->post('unit_pbdt') ? $this->input->post('unit_pbdt') : $perumahan__rtlh['unit_pbdt']); ?>" class="form-control" id="unit_pbdt" />
							<span class="text-danger"><?php echo form_error('unit_pbdt');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="unit_dtpfmotm" class="control-label"><span class="text-danger">*</span>Unit Dtpfmotm</label>
						<div class="form-group">
							<input type="text" name="unit_dtpfmotm" value="<?php echo ($this->input->post('unit_dtpfmotm') ? $this->input->post('unit_dtpfmotm') : $perumahan__rtlh['unit_dtpfmotm']); ?>" class="form-control" id="unit_dtpfmotm" />
							<span class="text-danger"><?php echo form_error('unit_dtpfmotm');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="unit_dtks" class="control-label"><span class="text-danger">*</span>Unit Dtks</label>
						<div class="form-group">
							<input type="text" name="unit_dtks" value="<?php echo ($this->input->post('unit_dtks') ? $this->input->post('unit_dtks') : $perumahan__rtlh['unit_dtks']); ?>" class="form-control" id="unit_dtks" />
							<span class="text-danger"><?php echo form_error('unit_dtks');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tahun" class="control-label"><span class="text-danger">*</span>Tahun</label>
						<div class="form-group">
							<input type="text" name="tahun" value="<?php echo ($this->input->post('tahun') ? $this->input->post('tahun') : $perumahan__rtlh['tahun']); ?>" class="form-control" id="tahun" />
							<span class="text-danger"><?php echo form_error('tahun');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="keterangan" class="control-label"><span class="text-danger">*</span>Keterangan</label>
						<div class="form-group">
							<input type="text" name="keterangan" value="<?php echo ($this->input->post('keterangan') ? $this->input->post('keterangan') : $perumahan__rtlh['keterangan']); ?>" class="form-control" id="keterangan" />
							<span class="text-danger"><?php echo form_error('keterangan');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="last_update" class="control-label"><span class="text-danger">*</span>Last Update</label>
						<div class="form-group">
							<input type="text" name="last_update" value="<?php echo ($this->input->post('last_update') ? $this->input->post('last_update') : $perumahan__rtlh['last_update']); ?>" class="form-control" id="last_update" />
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