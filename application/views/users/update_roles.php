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
                                $msg = 'User role has been updated successfully!';
                                break;
                              case 'warning':
                                $msg = 'Failed to update user role, Please try again.';
                                break;
                            }
                            echo $msg; 
                            ?>
                        </strong>
                    </div>
                    <?php endif; ?>
					<form id="formUsers" class="form-horizontal form-label-left" action="{base_url}users/updateroleaction" method="POST" enctype="multipart/form-data">
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Role name:</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="text" class="form-control" name="role_name" value="<?=$data[0]->user_role_name?>">
                                <div class="messages"></div>
                            </div>
						</div>
						<input type="checkbox" id="selectall" name="selectall"> Select All
						<div class="form-group">
							<div class="ln_solid" style="clear:both;"></div>
							<h2>Recipients Management</h2>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="checkbox">
									<label>
									<input type="checkbox" value="1" name="recipient_all" <?=($data[0]->recipient_all == 1) ? 'checked' : ''?>> View all recipients
									</label>
								</div>
								<div class="checkbox">
									<label>
									<input type="checkbox" value="1" name="recipient_monthly" <?=($data[0]->recipient_monthly == 1) ? 'checked' : ''?>> View recipients monthly
									</label>
								</div>
								<div class="checkbox">
									<label>
									<input type="checkbox" value="1" name="recipient_add" <?=($data[0]->recipient_add == 1) ? 'checked' : ''?>> Add recipients
									
									</label>
								</div>
								<div class="checkbox">
									<label>
									<input type="checkbox" value="1" name="recipient_update" <?=($data[0]->recipient_update == 1) ? 'checked' : ''?>> Update recipients
									</label>
								</div>
								<div class="checkbox">
									<label>
									<input type="checkbox" value="1" name="recipient_request" <?=($data[0]->recipient_request == 1) ? 'checked' : ''?>> View request approval list
									</label>
								</div>
								<div class="checkbox">
									<label>
									<input type="checkbox" value="1" name="recipient_approverequest" <?=($data[0]->recipient_approverequest == 1) ? 'checked' : ''?>> Approve request approval list
									</label>
								</div>
								<div class="checkbox">
									<label>
									<input type="checkbox" value="1" name="recipient_archived" <?=($data[0]->recipient_archived == 1) ? 'checked' : ''?>> View archived recipients
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="ln_solid" style="clear:both;"></div>
							<h2>Maps</h2>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="checkbox">
									<label>
									<input type="checkbox" value="1" name="maps" <?=($data[0]->maps == 1) ? 'checked' : ''?>> View Maps
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="ln_solid" style="clear:both;"></div>
							<h2>Gifts Management</h2>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="package" <?=($data[0]->package == 1) ? 'checked' : ''?>> View package list
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="package_add" <?=($data[0]->package_add == 1) ? 'checked' : ''?>> Add package
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="package_update" <?=($data[0]->package_update == 1) ? 'checked' : ''?>> Update package
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="package_delete" <?=($data[0]->package_delete == 1) ? 'checked' : ''?>> Delete package
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="orders" <?=($data[0]->orders == 1) ? 'checked' : ''?>> View Orders
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="orders_add" <?=($data[0]->orders_add == 1) ? 'checked' : ''?>> Add Orders
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="orders_update" <?=($data[0]->orders_update == 1) ? 'checked' : ''?>> Update Orders
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="deploy_update" <?=($data[0]->deploy_update == 1) ? 'checked' : ''?>> View deployment
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="deploy_add" <?=($data[0]->deploy_add == 1) ? 'checked' : ''?>> Add deployment
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="ln_solid" style="clear:both;"></div>
							<h2>Courier Management</h2>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="courier" <?=($data[0]->courier == 1) ? 'checked' : ''?>> View courier
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="courier_add" <?=($data[0]->courier_add == 1) ? 'checked' : ''?>> Add courier
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="courier_update" <?=($data[0]->courier_update == 1) ? 'checked' : ''?>> Update courier
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="ln_solid" style="clear:both;"></div>
							<h2>Reports Management</h2>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="report_recipient" <?=($data[0]->report_recipient == 1) ? 'checked' : ''?>> View recipients report
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="report_recipient_print" <?=($data[0]->report_recipient_print == 1) ? 'checked' : ''?>> Print recipients report
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="report_barangay" <?=($data[0]->report_barangay == 1) ? 'checked' : ''?>> View barangay report
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="report_barangay_report" <?=($data[0]->report_barangay_report == 1) ? 'checked' : ''?>> Print barangay report
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="report_courier" <?=($data[0]->report_courier == 1) ? 'checked' : ''?>> View courier report
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="report_courier_print" <?=($data[0]->report_courier_print == 1) ? 'checked' : ''?>> Print courier report
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="ln_solid" style="clear:both;"></div>
							<h2>Manage Users Management</h2>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="users" <?=($data[0]->users == 1) ? 'checked' : ''?>> View all users
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="users_add" <?=($data[0]->users_add == 1) ? 'checked' : ''?>> Add user
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="users_update" <?=($data[0]->users_update == 1) ? 'checked' : ''?>> Update user
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="user_role" <?=($data[0]->user_role == 1) ? 'checked' : ''?>> Add/Update user role
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="ln_solid" style="clear:both;"></div>
							<h2>Record Management</h2>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="api" <?=($data[0]->api == 1) ? 'checked' : ''?>> Generate API
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="import_export" <?=($data[0]->import_export == 1) ? 'checked' : ''?>> Import/Export data
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="truncate_data" <?=($data[0]->truncate_data == 1) ? 'checked' : ''?>> Truncate data
									</label>
								</div>
							</div>
						</div>
						
                        <div class="ln_solid" style="clear:both;"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<input type="hidden" name="user_role_id" value="<?=$data[0]->user_role_id?>">
                                <button type="submit" class="btn btn-success" style="width:100%">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

