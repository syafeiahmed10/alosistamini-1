<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Perumahan  Pembangunan Rumah Edit</h3>
            </div>
			<?php echo form_open('perumahan__pembangunan_rumah/edit/'.$perumahan__pembangunan_rumah['id_pembangunan']); ?>
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
									$selected = ($reg__village['id'] == $perumahan__pembangunan_rumah['village_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$reg__village['id'].'" '.$selected.'>'.$reg__village['name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_mbr" class="control-label">Perumahan Dropdown  Mbr</label>
						<div class="form-group">
							<select name="id_mbr" class="form-control">
								<option value="">select perumahan_dropdown__mbr</option>
								<?php 
								foreach($all_perumahan_dropdown__mbr as $perumahan_dropdown__mbr)
								{
									$selected = ($perumahan_dropdown__mbr['id_mbr'] == $perumahan__pembangunan_rumah['id_mbr']) ? ' selected="selected"' : "";

									echo '<option value="'.$perumahan_dropdown__mbr['id_mbr'].'" '.$selected.'>'.$perumahan_dropdown__mbr['mbr'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_imb" class="control-label">Perumahan Dropdown  Imb</label>
						<div class="form-group">
							<select name="id_imb" class="form-control">
								<option value="">select perumahan_dropdown__imb</option>
								<?php 
								foreach($all_perumahan_dropdown__imb as $perumahan_dropdown__imb)
								{
									$selected = ($perumahan_dropdown__imb['id_imb'] == $perumahan__pembangunan_rumah['id_imb']) ? ' selected="selected"' : "";

									echo '<option value="'.$perumahan_dropdown__imb['id_imb'].'" '.$selected.'>'.$perumahan_dropdown__imb['imb'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_pelaksana" class="control-label">Perumahan Dropdown  Pelaksana</label>
						<div class="form-group">
							<select name="id_pelaksana" class="form-control">
								<option value="">select perumahan_dropdown__pelaksana</option>
								<?php 
								foreach($all_perumahan_dropdown__pelaksana as $perumahan_dropdown__pelaksana)
								{
									$selected = ($perumahan_dropdown__pelaksana['id_pelaksana'] == $perumahan__pembangunan_rumah['id_pelaksana']) ? ' selected="selected"' : "";

									echo '<option value="'.$perumahan_dropdown__pelaksana['id_pelaksana'].'" '.$selected.'>'.$perumahan_dropdown__pelaksana['pelaksana'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="unit" class="control-label"><span class="text-danger">*</span>Unit</label>
						<div class="form-group">
							<input type="text" name="unit" value="<?php echo ($this->input->post('unit') ? $this->input->post('unit') : $perumahan__pembangunan_rumah['unit']); ?>" class="form-control" id="unit" />
							<span class="text-danger"><?php echo form_error('unit');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tahun" class="control-label"><span class="text-danger">*</span>Tahun</label>
						<div class="form-group">
							<input type="text" name="tahun" value="<?php echo ($this->input->post('tahun') ? $this->input->post('tahun') : $perumahan__pembangunan_rumah['tahun']); ?>" class="form-control" id="tahun" />
							<span class="text-danger"><?php echo form_error('tahun');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="keterangan" class="control-label"><span class="text-danger">*</span>Keterangan</label>
						<div class="form-group">
							<input type="text" name="keterangan" value="<?php echo ($this->input->post('keterangan') ? $this->input->post('keterangan') : $perumahan__pembangunan_rumah['keterangan']); ?>" class="form-control" id="keterangan" />
							<span class="text-danger"><?php echo form_error('keterangan');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="last_update" class="control-label"><span class="text-danger">*</span>Last Update</label>
						<div class="form-group">
							<input type="text" name="last_update" value="<?php echo ($this->input->post('last_update') ? $this->input->post('last_update') : $perumahan__pembangunan_rumah['last_update']); ?>" class="form-control" id="last_update" />
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