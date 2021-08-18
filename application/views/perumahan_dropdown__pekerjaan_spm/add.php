<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Perumahan Dropdown  Pekerjaan Spm Add</h3>
            </div>
            <?php echo form_open('perumahan_dropdown__pekerjaan_spm/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="pekerjaan" class="control-label">Pekerjaan</label>
						<div class="form-group">
							<input type="text" name="pekerjaan" value="<?php echo $this->input->post('pekerjaan'); ?>" class="form-control" id="pekerjaan" />
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