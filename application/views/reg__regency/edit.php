<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Reg  Regency Edit</h3>
            </div>
			<?php echo form_open('reg__regency/edit/'.$reg__regency['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="province_id" class="control-label">Province Id</label>
						<div class="form-group">
							<input type="text" name="province_id" value="<?php echo ($this->input->post('province_id') ? $this->input->post('province_id') : $reg__regency['province_id']); ?>" class="form-control" id="province_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="name" class="control-label">Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $reg__regency['name']); ?>" class="form-control" id="name" />
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