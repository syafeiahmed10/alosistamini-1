<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Kawasan  Surat Keterangan Kumuh Edit</h3>
            </div>
			<?php echo form_open('kawasan__surat_keterangan_kumuh/edit/'.$kawasan__surat_keterangan_kumuh['id_sk']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="regency_id" class="control-label">Reg  Regency</label>
						<div class="form-group">
							<select name="regency_id" class="form-control">
								<option value="">select reg__regency</option>
								<?php 
								foreach($all_reg__regencies as $reg__regency)
								{
									$selected = ($reg__regency['id'] == $kawasan__surat_keterangan_kumuh['regency_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$reg__regency['id'].'" '.$selected.'>'.$reg__regency['name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="sk" class="control-label"><span class="text-danger">*</span>Sk</label>
						<div class="form-group">
							<input type="text" name="sk" value="<?php echo ($this->input->post('sk') ? $this->input->post('sk') : $kawasan__surat_keterangan_kumuh['sk']); ?>" class="form-control" id="sk" />
							<span class="text-danger"><?php echo form_error('sk');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tahun" class="control-label"><span class="text-danger">*</span>Tahun</label>
						<div class="form-group">
							<input type="text" name="tahun" value="<?php echo ($this->input->post('tahun') ? $this->input->post('tahun') : $kawasan__surat_keterangan_kumuh['tahun']); ?>" class="form-control" id="tahun" />
							<span class="text-danger"><?php echo form_error('tahun');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="last_update" class="control-label"><span class="text-danger">*</span>Last Update</label>
						<div class="form-group">
							<input type="text" name="last_update" value="<?php echo ($this->input->post('last_update') ? $this->input->post('last_update') : $kawasan__surat_keterangan_kumuh['last_update']); ?>" class="form-control" id="last_update" />
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