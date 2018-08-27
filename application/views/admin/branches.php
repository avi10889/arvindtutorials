<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Branches</title>
    <?php require_once('head.php');?>
    <script>
        $(function(){

            $("#branch_form").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/add_branch');?>",
                    dataType:"json",
                    data:$("#branch_form").serialize(),
                    beforeSend:function()
                    {
                        $("#branch_btn").prop('disabled',true);
                        $("#branch_resp").html('');
                    },
                    success:function(response){
                        if(response.status=='success')
                        {
                            $("#branch_resp").html(response.desc);
                            location.reload();
                        }
                        else
                        {
                            $("#branch_resp").html(response.desc);
                        }
                        $("#branch_btn").prop('disabled',false);
                    }
                });
                //return false;
            });
        });

        function update_branch(branch_id,branch_name,branch_state,classes_name)
        {
            $("#edit_branch").modal('show');
            $("#branch_id").val(branch_id);
            $("#edit_branch_name").val(branch_name);
            $("#edit_branch_state").val(branch_state);
            $("#edit_classes_name").val(classes_name);
            $("#edit_branch_form").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/update_branch');?>",
                    dataType:"json",
                    data:$("#edit_branch_form").serialize(),
                    beforeSend:function()
                    {
                        $("#edit_branch_btn").prop('disabled',true);
                        $("#edit_branch_resp").html('');
                    },
                    success:function(response){
                        if(response.status=='success')
                        {
                            $("#edit_branch_resp").html(response.desc);
                            location.reload();
                        }
                        else
                        {
                            $("#edit_branch_resp").html(response.desc);
                        }
                        $("#edit_branch_btn").prop('disabled',false);
                    }
                });

            });
        }

        function delete_branch(branch_id)
        {

            if (confirm("Are you sure you want to delete this?"))
            {
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/delete_branch');?>",
                    dataType:"json",
                    data:{branch_id:branch_id},
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

        function update_branch_status(branch_id,status)
        {
            if (confirm("Are you sure you want to Change the Status?"))
            {
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/update_branch_status');?>",
                    dataType:"json",
                    data:{branch_id:branch_id,status:status},
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
                    <h5 class="card-header"><i class="fa fa-table"></i> Branches
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_branch">
                            Add Branch
                        </button>
                    </h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="standards_table" cellspacing="0">
                                <thead class="cf">
                                <tr>
                                    <th>Branch Name</th>
                                    <th>Branch State</th>
                                    <th>Classes Name</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                if(is_array($branches))
                                {
                                    foreach($branches as $branch)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $branch['branch_name']; ?></td>
                                            <td><?php echo $branch['branch_state']; ?></td>
                                            <td><?php echo $branch['classes_name']; ?></td>
                                            <td>
                                                <a href="#" onclick="update_branch('<?php echo $branch['branch_id'] ?>','<?php echo $branch['branch_name']; ?>','<?php echo $branch['branch_state']; ?>','<?php echo $branch['classes_name']; ?>')"><i class=" fa fa-edit"></i> Edit</a><br/>
                                                <a href="#" onclick="delete_branch('<?php echo $branch['branch_id'] ?>')"style="color: red"><i class="fa fa-trash-o"></i> Delete</a>
                                            </td>
                                            <td>
                                                <button type="button" onclick="update_branch_status('<?php echo $branch['branch_id'] ?>','N')" class="btn btn-danger" id="board_active" <?php if($branch['branch_active'] =='N') echo "style='display: none'"; ?>>Set InActive</button>
                                                <button type="button" onclick="update_branch_status('<?php echo $branch['branch_id'] ?>','Y')"class="btn btn-success" id="board_inactive" <?php if($branch['branch_active'] =='Y') echo "style='display: none'"; ?>>Set Active</button>
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
<!-- Add Board Modal -->
<div class="modal fade" id="add_branch" tabindex="-1" role="dialog" aria-labelledby="add_branch" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Branch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="branch_form" method="POST" name="branch_form">
                    <div class="form-group">
                        <label for="Branch Name">Branch Name</label>
                        <input class="form-control" name="branch_name" id="branch_name" type="text" aria-describedby="Branch Name" placeholder="Enter Branch Name">
                    </div>
                    <div class="form-group">
                        <label for="Branch State">Branch State</label>
                        <input class="form-control" name="branch_state" id="branch_state" type="text" aria-describedby="Branch Description" placeholder="Enter Branch State">
                    </div>
                    <div class="form-group">
                        <label for="Classes Name">Classes Name</label>
                        <input class="form-control" name="classes_name" id="classes_name" type="text" aria-describedby="Classes Description" placeholder="Enter Classes Name">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary" id="branch_btn">Save changes</button>
                    </div>
                </form>
            </div>

            <div id="branch_resp"></div>
        </div>

    </div>
</div>

<!-- Edit Board Modal -->
<div class="modal fade" id="edit_branch" tabindex="-1" role="dialog" aria-labelledby="edit_branch" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Branch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_branch_form" method="POST" name="edit_branch_form">
                    <div class="form-group">
                        <label for="Branch Name">Branch Name</label>
                        <input class="form-control" name="edit_branch_name" id="edit_branch_name" type="text">
                    </div>
                    <input type="hidden" name="branch_id" id="branch_id" />
                    <div class="form-group">
                        <label for="Branch State">Branch State</label>
                        <input class="form-control" name="edit_branch_state" id="edit_branch_state" type="text">
                    </div>
                    <div class="form-group">
                        <label for="Classes Name">Classes Name</label>
                        <input class="form-control" name="edit_classes_name" id="edit_classes_name" type="text">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary" id="edit_branch_btn">Save changes</button>
                    </div>
                </form>
            </div>

            <div id="edit_branch_resp"></div>
        </div>

    </div>
</div>
</body>
</html>