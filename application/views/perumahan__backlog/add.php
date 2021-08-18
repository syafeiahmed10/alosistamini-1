<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Perumahan  Backlog Add</h3>
            </div>
            <?php echo form_open('perumahan__backlog/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="district_id" class="control-label">Reg  District</label>
						<div class="form-group">
							<select name="district_id" class="form-control">
								<option value="">select reg__district</option>
								<?php 
								foreach($all_reg__districts as $reg__district)
								{
									$selected = ($reg__district['id'] == $this->input->post('district_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$reg__district['id'].'" '.$selected.'>'.$reg__district['name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="backlog_kepemilikan" class="control-label"><span class="text-danger">*</span>Backlog Kepemilikan</label>
						<div class="form-group">
							<input type="text" name="backlog_kepemilikan" value="<?php echo $this->input->post('backlog_kepemilikan'); ?>" class="form-control" id="backlog_kepemilikan" />
							<span class="text-danger"><?php echo form_error('backlog_kepemilikan');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="backlog_penghunian" class="control-label"><span class="text-danger">*</span>Backlog Penghunian</label>
						<div class="form-group">
							<input type="text" name="backlog_penghunian" value="<?php echo $this->input->post('backlog_penghunian'); ?>" class="form-control" id="backlog_penghunian" />
							<span class="text-danger"><?php echo form_error('backlog_penghunian');?></span>
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