<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Standards</title>
 <?php require_once('head.php');?>
<script>
    $(function(){

        $("#std_form").submit(function(e){
            e.preventDefault();
            $.ajax({
                type:"POST",
                url:"<?php echo site_url(ADMINCP.'/qforms/add_standard');?>",
                dataType:"json",
                data:$("#std_form").serialize(),
                beforeSend:function()
                {
                    $("#std_btn").prop('disabled',true);
                    $("#std_resp").html('');
                },
                success:function(response){
                    if(response.status=='success')
                    {
                        $("#std_resp").html(response.desc);
                        location.reload();
                    }
                    else
                    {
                        $("#std_resp").html(response.desc);
                    }
                    $("#std_btn").prop('disabled',false);
                }
            });
            //return false;
        });
    });

    function update_standard(std_id,std_name,std_desc,std_type)
    {
        $("#edit_standard").modal('show');
        $("#std_id").val(std_id);
        $("#edit_std_name").val(std_name);
        $("#edit_std_desc").val(std_desc);
        $("#edit_std_type").val(std_type);
        $("#edit_std_form").submit(function(e){
            e.preventDefault();
            $.ajax({
                type:"POST",
                url:"<?php echo site_url(ADMINCP.'/qforms/update_standard');?>",
                dataType:"json",
                data:$("#edit_std_form").serialize(),
                beforeSend:function()
                {
                    $("#edit_std_btn").prop('disabled',true);
                    $("#edit_std_resp").html('');
                },
                success:function(response){
                    if(response.status=='success')
                    {
                        $("#edit_std_resp").html(response.desc);
                        location.reload();
                    }
                    else
                    {
                        $("#edit_std_resp").html(response.desc);
                    }
                    $("#edit_std_btn").prop('disabled',false);
                }
            });

        });
    }

    function delete_standard(std_id)
    {

        if (confirm("Are you sure you want to delete this?"))
        {
            $.ajax({
                type:"POST",
                url:"<?php echo site_url(ADMINCP.'/qforms/delete_standard');?>",
                dataType:"json",
                data:{std_id:std_id},
                beforeSend:function()
                {

                },
                success:function(response){
                    if(response.status=='success')
                    {
                        $("#edit_std_resp").html(response.desc);
                        location.reload();
                    }
                    else
                    {

                    }

                }
            });

        }
        else
        {
            return false;
        }

    }

    function update_standard_status(std_id,status)
    {
        if (confirm("Are you sure you want to Change the Status?"))
        {
            $.ajax({
                type:"POST",
                url:"<?php echo site_url(ADMINCP.'/qforms/update_standard_status');?>",
                dataType:"json",
                data:{std_id:std_id,status:status},
                beforeSend:function()
                {

                },
                success:function(response){
                    if(response.status=='success')
                    {
                        location.reload();
                    }
                    else
                    {

                    }

                }
            });

        }
        else
        {
            return false;
        }

    }
	
	$(function(){$("#standards_table").DataTable()});
</script>
<body class="fixed-nav sticky-footer">
<?php require_once('nav_bar.php');?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                
				<div class="card">
					<h5 class="card-header"><i class="fa fa-table"></i> Standards
					<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_standard">
                        Add Standard
                    </button>
					</h5>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="standards_table" cellspacing="0">
								<thead class="cf">
								<tr>
									<th>Standard Name</th>
                                    <th>Standard Description</th>
									<th>Standard Type</th>
									<th>Action</th>
                                    <th>Status</th>
								</tr>
								</thead>
								
								<tbody>
								<?php 
								if(is_array($standards))
								{
									foreach($standards as $std)
									{
								?>
										<tr>
											<td><?php echo $std['std_name']; ?></td>
                                            <td><?php echo $std['std_desc']; ?></td>
											<td><?php echo $std['std_type']; ?></td>
											<td>
												<a href="#" onclick="update_standard('<?php echo $std['std_id'] ?>','<?php echo $std['std_name']; ?>','<?php echo $std['std_desc']; ?>','<?php echo $std['std_type']; ?>')"><i class=" fa fa-edit"></i> Edit</a><br/>
												<a href="#" onclick="delete_standard('<?php echo $std['std_id'] ?>')"style="color: red"><i class="fa fa-trash-o"></i> Delete</a>
											</td>
                                            <td>
                                                <button type="button" onclick="update_standard_status('<?php echo $std['std_id'] ?>','N')" class="btn btn-danger" id="std_active" <?php if($std['std_active'] =='N') echo "style='display: none'"; ?>>Set InActive</button>
                                                <button type="button" onclick="update_standard_status('<?php echo $std['std_id'] ?>','Y')"class="btn btn-success" id="std_inactive" <?php if($std['std_active'] =='Y') echo "style='display: none'"; ?>>Set Active</button>
                                            </td>
										</tr>
								<?php
									}
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
					</div>
			</div>
        </div>
    </div>
<?php require_once('footer.php');?>
</div>
    <!-- Add Standard Modal -->
    <div class="modal fade" id="add_standard" tabindex="-1" role="dialog" aria-labelledby="add_standard" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Standard</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="std_form" method="POST" name="std_form">
                    <div class="form-group">
                        <label for="Standard Name">Standard Name</label>
                            <input class="form-control" name="std_name" id="std_name" type="text" aria-describedby="Standard" placeholder="Enter Standard">
                    </div>
                    <div class="form-group">
                        <label for="Standard Description">Standard Description</label>
                        <input class="form-control" name="std_desc" id="std_desc" type="text" aria-describedby="Standard Description" placeholder="Enter Standard Description">
                    </div>
                    <div class="form-group">
                        <label for="Standard Type">Standard Type</label>
                        <select class="form-control" name="std_type" id="std_type">
                            <option value="">Select</option>
                            <option value="Junior College">Junior College</option>
                            <option value="Degree College">Degree College</option>
                        </select>
                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary" id="std_btn">Save changes</button>
                </div>
                </form>
                </div>

                <div id="std_resp"></div>
            </div>

        </div>
    </div>

    <!-- Edit Standard Modal -->
    <div class="modal fade" id="edit_standard" tabindex="-1" role="dialog" aria-labelledby="edit_standard" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Standard</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_std_form" method="POST" name="edit_std_form">
                        <div class="form-group">
                            <label for="Standard Name">Standard Name</label>
                            <input class="form-control" name="edit_std_name" id="edit_std_name" type="text">
                            <input type="hidden" name="std_id" id="std_id" />
                        </div>
                        <div class="form-group">
                            <label for="Standard Description">Standard Description</label>
                            <input class="form-control" name="edit_std_desc" id="edit_std_desc">
                        </div>
                        <div class="form-group">
                            <label for="Standard Type">Standard Type</label>
                            <select class="form-control" name="edit_std_type" id="edit_std_type">
                                <option value="">Select</option>
                                <option value="Junior College">Junior College</option>
                                <option value="Degree College">Degree College</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary" id="edit_std_btn">Save changes</button>
                        </div>
                    </form>
                </div>

                <div id="edit_std_resp"></div>
            </div>

        </div>
    </div>
</body>
</html>