<?php 
// $GLOBALS['user_access_lists'] = $user_access_lists;

// echo "<pre>";
// print_r($users);
// exit();

function isSelect($value) {
    $result = '';
    if(array_key_exists($value, $GLOBALS['user_access_lists'])) {
        $result = $GLOBALS['user_access_lists'][$value];
    }
    return $result;
}

$gur = $this->session->userdata('user_role'); 

?>
<div class="right_col" role="main" id="{pageId}">
    <div class="row" id="table-list">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h2>{title}</h2>
                    </div>
                    <div class="col-md-6">
                        <?php 
                            if($gur->users_add) {
                        ?>
                        <a href="{base_url}users/add" class="btn btn-success pull-right">Add User</a>
                        <?php } ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="x_content">
                    <table id="users-table" class="table table-striped users-table-lists">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Department</th>
								<th>Role type</th>
								<th>Date Created</th>
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $item) { ?>
                            <tr>
                                <td><?=$item->username?></td>
                                <td><?=$item->firstname?></td>
                                <td><?=$item->lastname?></td>
                                <td><?=$item->email?></td>
                                <td><?=$item->department?></td>
                                <td><?=$item->user_role_name?>
                                    <?php
                                        // $user_role = json_decode($item->user_role_id);
                                        // if($user_role) {
                                        //     $count = count($user_role);
                                        //     foreach ($user_role as $key => $role) {
                                        //         echo isSelect($role);
                                        //         if($key != $count - 1) {
                                        //             echo ", ";
                                        //         }
                                        //     }
                                        // }                                        
                                    ?>  
								</td>
								<td><?=date('m/d/Y', strtotime( $item->date_created ) )?></td>
                                <td class="action">
                                    <?php 
                                        // write access
                                        if($gur->users_update) {
                                    ?>
                                    <a href="{base_url}users/edit/<?=$item->user_id?>" class="btn btn-info btn-xs">
                                    <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <?php 
                                        if($gur->users_update) {
                                    ?>
                                    <a class="btn btn-danger btn-xs" id="deleteUserBtn" data-toggle="modal" data-target="#deleteUser" data-id="<?=$item->user_id?>">
                                    <i class="fa fa-trash"></i> Delete
                                    </a>
                                    <?php }
                                    } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-7" id="retiree-table-pagination">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Delete modal -->
        <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{base_url}users/delete" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="exampleModalLabel">Delete Confirmation</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this user?</p>
                        </div>
                        <div class="modal-footer">
                            <input id="del_userId" type="hidden" name="userid">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end.Delete modal -->
    </div>
</div>
<!-- <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <a href="{base_url}users/delete"></a>
      </div>
    </div>
    </div> -->
