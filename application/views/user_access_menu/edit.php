<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">User Access Menu Edit</h3>
            </div>
			<?php echo form_open('user_access_menu/edit/'.$user_access_menu['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="role_id" class="control-label">Role Id</label>
						<div class="form-group">
							<input type="text" name="role_id" value="<?php echo ($this->input->post('role_id') ? $this->input->post('role_id') : $user_access_menu['role_id']); ?>" class="form-control" id="role_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="menu_id" class="control-label">Menu Id</label>
						<div class="form-group">
							<input type="text" name="menu_id" value="<?php echo ($this->input->post('menu_id') ? $this->input->post('menu_id') : $user_access_menu['menu_id']); ?>" class="form-control" id="menu_id" />
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