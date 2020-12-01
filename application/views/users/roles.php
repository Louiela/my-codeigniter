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
                            $gur = $this->session->userdata('user_role'); 
                            // write access
                            if($gur->user_role) {
                        ?>
						<!-- <a data-toggle="modal" data-target="#addcourier" class="btn btn-success pull-right">Add User Roles</a> -->
						<a href="{base_url}users/addroles" class="btn btn-success pull-right">Add User Roles</a>
                        <?php } ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="x_content">
                    <table id="courier-table" class="table table-striped courier-table-lists">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role name</th>
                                <th>Added by</th>
								<th>Added date</th>
                                <th class="actions" style="width:20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php 
							$counter = 1;
							foreach ($data as $item) { ?>
							<tr>
								<td><?=$counter?></td>
                                <td><?=$item->user_role_name?></td>
								<td><?=$item->firstname?> <?=$item->lastname?></td>
								<td><?=date('m/d/Y', strtotime( $item->date_added ) )?></td>
								<td style="text-align:center">
                                    <?php if($gur->user_role) { ?>
									<a href="{base_url}users/updateroles/<?=$item->user_role_id?>" class="btn btn-info btn-xs">
                                    	<i class="fa fa-edit"></i> Edit
                                    </a>
									<a class="btn btn-danger btn-xs" id="deleteUserBtn" data-toggle="modal" data-target="#deleteUser" data-id="<?=$item->user_role_id?>">
										<i class="fa fa-trash"></i> Delete
									</a>
                                    <?php } ?>
								</td>
                            </tr>
						<?php 
							$counter++;
							} 
						?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-7" id="recipients-table-pagination">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
