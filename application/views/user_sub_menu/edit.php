<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">User Sub Menu Edit</h3>
            </div>
			<?php echo form_open('user_sub_menu/edit/'.$user_sub_menu['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="menu_id" class="control-label">Menu Id</label>
						<div class="form-group">
							<input type="text" name="menu_id" value="<?php echo ($this->input->post('menu_id') ? $this->input->post('menu_id') : $user_sub_menu['menu_id']); ?>" class="form-control" id="menu_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="title" class="control-label">Title</label>
						<div class="form-group">
							<input type="text" name="title" value="<?php echo ($this->input->post('title') ? $this->input->post('title') : $user_sub_menu['title']); ?>" class="form-control" id="title" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="url" class="control-label">Url</label>
						<div class="form-group">
							<input type="text" name="url" value="<?php echo ($this->input->post('url') ? $this->input->post('url') : $user_sub_menu['url']); ?>" class="form-control" id="url" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="icon" class="control-label">Icon</label>
						<div class="form-group">
							<input type="text" name="icon" value="<?php echo ($this->input->post('icon') ? $this->input->post('icon') : $user_sub_menu['icon']); ?>" class="form-control" id="icon" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="is_active" class="control-label">Is Active</label>
						<div class="form-group">
							<input type="text" name="is_active" value="<?php echo ($this->input->post('is_active') ? $this->input->post('is_active') : $user_sub_menu['is_active']); ?>" class="form-control" id="is_active" />
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