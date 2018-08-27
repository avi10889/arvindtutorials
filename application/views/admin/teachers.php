<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Teachers</title>
    <?php require_once('head.php');?>
    <script>
        $(function(){

            $("#teacher_form").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/add_teacher');?>",
                    dataType:"json",
                    data:$("#teacher_form").serialize(),
                    beforeSend:function()
                    {
                        $("#teacher_btn").prop('disabled',true);
                        $("#teacher_resp").html('');
                    },
                    success:function(response){
                        if(response.status=='success')
                        {
                            $("#teacher_resp").html(response.desc);
                            location.reload();
                        }
                        else
                        {
                            $("#teacher_resp").html(response.desc);
                        }
                        $("#teacher_btn").prop('disabled',false);
                    }
                });
                //return false;
            });
        });

        function update_teacher(teacher_id,teacher_name,teacher_desc)
        {
            $("#edit_teacher").modal('show');
            $("#teacher_id").val(teacher_id);
            $("#edit_teacher_name").val(teacher_name);
            $("#edit_teacher_desc").val(teacher_desc);
            $("#edit_teacher_form").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/update_teacher');?>",
                    dataType:"json",
                    data:$("#edit_teacher_form").serialize(),
                    beforeSend:function()
                    {
                        $("#edit_teacher_btn").prop('disabled',true);
                        $("#edit_teacher_resp").html('');
                    },
                    success:function(response){
                        if(response.status=='success')
                        {
                            $("#edit_teacher_resp").html(response.desc);
                            location.reload();
                        }
                        else
                        {
                            $("#edit_teacher_resp").html(response.desc);
                        }
                        $("#edit_teacher_btn").prop('disabled',false);
                    }
                });

            });
        }

        function delete_teacher(teacher_id)
        {

            if (confirm("Are you sure you want to delete this?"))
            {
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/delete_teacher');?>",
                    dataType:"json",
                    data:{teacher_id:teacher_id},
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

        function update_teacher_status(teacher_id,status)
        {
            if (confirm("Are you sure you want to Change the Status?"))
            {
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/update_teacher_status');?>",
                    dataType:"json",
                    data:{teacher_id:teacher_id,status:status},
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
                    <h5 class="card-header"><i class="fa fa-table"></i> Teachers
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_teacher">
                            Add Teacher
                        </button>
                    </h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="standards_table" cellspacing="0">
                                <thead class="cf">
                                <tr>
                                    <th>Teacher Name</th>
                                    <th>Teacher Description</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                if(is_array($teachers))
                                {
                                    foreach($teachers as $teach)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $teach['teacher_name']; ?></td>
                                            <td><?php echo $teach['teacher_desc']; ?></td>
                                            <td>
                                                <a href="#" onclick="update_teacher('<?php echo $teach['teacher_id'] ?>','<?php echo $teach['teacher_name']; ?>','<?php echo $teach['teacher_desc']; ?>')"><i class=" fa fa-edit"></i> Edit</a><br/>
                                                <a href="#" onclick="delete_teacher('<?php echo $teach['teacher_id'] ?>')"style="color: red"><i class="fa fa-trash-o"></i> Delete</a>
                                            </td>
                                            <td>
                                                <button type="button" onclick="update_teacher_status('<?php echo $teach['teacher_id'] ?>','N')" class="btn btn-danger" id="teacher_active" <?php if($teach['teacher_active'] =='N') echo "style='display: none'"; ?>>Set InActive</button>
                                                <button type="button" onclick="update_teacher_status('<?php echo $teach['teacher_id'] ?>','Y')"class="btn btn-success" id="teacher_inactive" <?php if($teach['teacher_active'] =='Y') echo "style='display: none'"; ?>>Set Active</button>
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
<!-- Add Chapter Modal -->
<div class="modal fade" id="add_teacher" tabindex="-1" role="dialog" aria-labelledby="add_teacher" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="teacher_form" method="POST" name="teacher_form">
                    <div class="form-group">
                        <label for="Standard Name">Teacher Name</label>
                        <input class="form-control" type="text" name="teacher_name" id="teacher_name" />
                    </div>
                    <div class="form-group">
                        <label for="Subject Name">Teacher Description</label>
                        <input class="form-control" type="text" name="teacher_desc" id="teacher_desc" />
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary" id="teacher_btn">Save changes</button>
                    </div>
                </form>
            </div>

            <div id="teacher_resp"></div>
        </div>

    </div>
</div>

<!-- Edit Chapter Modal -->
<div class="modal fade" id="edit_teacher" tabindex="-1" role="dialog" aria-labelledby="edit_teacher" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_teacher_form" method="POST" name="edit_teacher_form">
                    <div class="form-group">
                        <label for="Standard Name">Teacher Name</label>
                        <input class="form-control" type="text" name="edit_teacher_name" id="edit_teacher_name" />
                        <input class="form-control" type="hidden" name="teacher_id" id="teacher_id" />
                    </div>
                    <div class="form-group">
                        <label for="Subject Name">Teacher Description</label>
                        <input class="form-control" type="text" name="edit_teacher_desc" id="edit_teacher_desc" />
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary" id="edit_teacher_btn">Save changes</button>
                    </div>
                </form>
            </div>

            <div id="edit_teacher_resp"></div>
            </div>
        </div>

    </div>
</div>
</body>
</html>