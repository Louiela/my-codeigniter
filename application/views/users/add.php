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
                                $msg = 'User has been added successfully!';
                                break;
                              case 'warning':
                                $msg = 'Failed to add User, Please try again.';
                                break;
                            }
                            echo $msg; 
                            ?>
                        </strong>
                    </div>
                    <?php endif; ?>                    
                    <?php if($this->session->flashdata('password_msg')): ?>
                    <div class="alert alert-warning alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong> <?= $this->session->flashdata('password_msg') ?> </strong>
                    </div>
                    <?php endif; ?>
                    <form id="formUsers" class="form-horizontal form-label-left" action="{base_url}users/create" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Firstname:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="firstname">
                                <div class="messages"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Lastname:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="lastname">
                                <div class="messages"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="email" class="form-control" name="email" required>
                                <div class="messages"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Department:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="select2_single form-control" tabindex="-1" name="department">
                                    <option disabled value="" selected> Select depoartment</option>
                                    <?php foreach ($department_lists as $key => $department) { ?>
                                    <option value="<?=$department->department_id?>"><?=$department->department_name?></option>
                                    <?php } ?>
                                </select>
                                <div class="messages"></div>
                            </div>
                        </div>                      
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">User role</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="select2_single form-control" tabindex="-1" name="user_role">
                                    <option disabled value="" selected>Select user role</option>
                                    <?php foreach ($user_access_lists as $item) { ?>
                                    <option value="<?=$item->user_role_id?>"><?=$item->user_role_name?></option>
                                    <?php } ?>
                                </select>
                                <div class="messages"></div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Username:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="username" required>
                                <div class="messages"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="password" class="form-control" name="password" required>
                                <div class="messages"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirm password:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="password" class="form-control" name="cpassword" required>
                                <div class="messages"></div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <a href="{base_url}users" class="btn btn-default">Back</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>