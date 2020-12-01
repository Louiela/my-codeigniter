<div class="right_col" role="main" id="{pageId}">
    <div class="row">
        <div class="col-md-7 col-sm-7 col-xs-12">
            <div class="x_panel" id="basic-info">
                <div class="x_title">
                    <h2>{title}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content add-users">                    
                    <?php if($this->session->flashdata('msg_basic')): ?>
                    <div class="alert alert-<?php echo $this->session->flashdata('msg_basic'); ?> alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>
                        <?php 
                            switch ($this->session->flashdata('msg_basic')) {
                              case 'success':
                                $msg = 'User role has been added successfully!';
                                break;
                              case 'warning':
                                $msg = 'Failed to add user role, Please try again.';
                                break;
                            }
                            echo $msg; 
                            ?>
                        </strong>
                    </div>
                    <?php endif; ?>
					<form id="formUsers" class="form-horizontal form-label-left" action="{base_url}users/createrole" method="POST" enctype="multipart/form-data">
					
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Role name:</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="text" class="form-control" name="role_name">
                                <div class="messages"></div>
                            </div>
						</div>
						<input type="checkbox" id="selectall" name="selectall"> Select All
						
						<div class="form-group">
							<div class="ln_solid" style="clear:both;"></div>
							<h2>Manage Users Management</h2>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="users"> View all users
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="users_add"> Add user
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="users_update"> Update/Delete user
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="user_role"> Add/Update user role
									</label>
								</div>
							</div>
						</div>
						
                        <div class="ln_solid" style="clear:both;"></div>
                        <div class="form-group">
							<div class="col-md-9 col-sm-9 col-xs-12">
                                <button type="submit" class="btn btn-success" style="width:100%">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


