<?php 
$GLOBALS['user_access_key'] = json_decode($user[0]->user_role_id);

function isSelect($value) {
    $result = '';
    if(in_array($value, $GLOBALS['user_access_key'])) {
        $result = 'selected';
    }
    return $result;
}
const __SALT = 'npM579vQ';

?>
<div class="right_col" role="main" id="{pageId}">
    <div class="row">
        <div class="col-md-7 col-sm-7 col-xs-12">
            <div class="x_panel" id="basic-info">
                <div class="x_title">
                    <h2>{title}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content add-users">
                    <form id="formUsers" class="form-horizontal form-label-left" action="{base_url}users/update" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Username:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="username" value="<?=$user[0]->username?>">
                                <div class="messages"></div>
                            </div>
						</div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">New Password:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="password" class="form-control" name="npassword" value="">
                                <div class="messages"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Firstname:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="firstname" value="<?=$user[0]->firstname?>">
                                <div class="messages"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Lastname:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="lastname" value="<?=$user[0]->lastname?>">
                                <div class="messages"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="email" value="<?=$user[0]->email?>">
                                <div class="messages"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Department:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="select2_single form-control" tabindex="-1" name="department">
                                    <option disabled value="" selected></option>
                                    <?php foreach ($department_lists as $key => $department) { ?>
                                    <option <?= ($user[0]->department == $department->department_id)? 'selected':'' ?> value="<?=$department->department_id?>"><?=$department->department_name?></option>
                                    <?php } ?>
                                </select>
                                <div class="messages"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">User role</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                
                                <select class="select2_single form-control" tabindex="-1" name="user_role">
                                    <option disabled value="" selected></option>
                                    <?php foreach ($user_access_lists as $item) { ?>
                                    <option <?= ($user[0]->user_role_id == $item->user_role_id)? 'selected':'' ?> value="<?=$item->user_role_id?>"><?=$item->user_role_name?></option>
                                    <?php } ?>
                                </select>
                                <div class="messages"></div>
                            </div>
                        </div>
                        <input type="hidden" name="userid" value="{id}">
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
<?php 
    function gs($name, $value) {
      $result = '';
      if($name == $value) {
        $result = 'selected';
      }
      return $result;
    }
    
    ?>
