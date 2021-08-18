<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Perumahan Dropdown  Pekerjaan Spm Edit</h3>
            </div>
			<?php echo form_open('perumahan_dropdown__pekerjaan_spm/edit/'.$perumahan_dropdown__pekerjaan_spm['id_pekerjaan_spm']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="pekerjaan" class="control-label">Pekerjaan</label>
						<div class="form-group">
							<input type="text" name="pekerjaan" value="<?php echo ($this->input->post('pekerjaan') ? $this->input->post('pekerjaan') : $perumahan_dropdown__pekerjaan_spm['pekerjaan']); ?>" class="form-control" id="pekerjaan" />
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