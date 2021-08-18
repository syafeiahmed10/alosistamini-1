<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Kawasan Dropdown  Tingkat Kumuh Edit</h3>
            </div>
			<?php echo form_open('kawasan_dropdown__tingkat_kumuh/edit/'.$kawasan_dropdown__tingkat_kumuh['id_tk']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="tingkat_kumuh" class="control-label">Tingkat Kumuh</label>
						<div class="form-group">
							<input type="text" name="tingkat_kumuh" value="<?php echo ($this->input->post('tingkat_kumuh') ? $this->input->post('tingkat_kumuh') : $kawasan_dropdown__tingkat_kumuh['tingkat_kumuh']); ?>" class="form-control" id="tingkat_kumuh" />
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