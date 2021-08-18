<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Perumahan Dropdown  Pelaksana Edit</h3>
            </div>
			<?php echo form_open('perumahan_dropdown__pelaksana/edit/'.$perumahan_dropdown__pelaksana['id_pelaksana']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="pelaksana" class="control-label">Pelaksana</label>
						<div class="form-group">
							<input type="text" name="pelaksana" value="<?php echo ($this->input->post('pelaksana') ? $this->input->post('pelaksana') : $perumahan_dropdown__pelaksana['pelaksana']); ?>" class="form-control" id="pelaksana" />
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