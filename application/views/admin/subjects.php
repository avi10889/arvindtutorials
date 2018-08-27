<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Subjects</title>
    <?php require_once('head.php');?>
    <script>
        $(function(){

            $("#sub_form").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/add_subject');?>",
                    dataType:"json",
                    data:$("#sub_form").serialize(),
                    beforeSend:function()
                    {
                        $("#sub_btn").prop('disabled',true);
                        $("#sub_resp").html('');
                    },
                    success:function(response){
                        if(response.status=='success')
                        {
                            $("#sub_resp").html(response.desc);
                            location.reload();
                        }
                        else
                        {
                            $("#sub_resp").html(response.desc);
                        }
                        $("#sub_btn").prop('disabled',false);
                    }
                });
                //return false;
            });
        });

        function get_standard_fields()
        {
            $('#std_field').empty();
            $.ajax({
                type:"POST",
                url:"<?php echo site_url(ADMINCP.'/qforms/get_standard_fields');?>",
                dataType:"json",
                beforeSend:function()
                {
                },
                success:function(response) {
                    if(response.status=='success')
                    {
                        $("#std_field").append('<option value="">' + ' Select ' + '</option>');
                        $.each(response.data, function (index, std_fld) {
                            $("#std_field").append('<option value="' + std_fld.fld_id + '">' + std_fld.fld_name + '</option>');

                        });
                    }
                }
            });
        }

        function get_edit_standard_fields(std_fld_id)
        {
            $('#edit_std_field').empty();
            $.ajax({
                type:"POST",
                url:"<?php echo site_url(ADMINCP.'/qforms/get_standard_fields');?>",
                dataType:"json",
                beforeSend:function()
                {
                },
                success:function(response) {
                    if(response.status=='success')
                    {
                        $("#edit_std_field").append('<option value="">' + ' Select ' + '</option>');
                        $.each(response.data, function (index, std_fld) {
                            if(std_fld.fld_id == std_fld_id)
                            {
                                $("#edit_std_field").append('<option value="' + std_fld.fld_id + '" selected>' + std_fld.fld_name + '</option>');
                            }
                            else
                            {
                                $("#edit_std_field").append('<option value="' + std_fld.fld_id + '">' + std_fld.fld_name + '</option>');
                            }


                        });
                    }
                }
            });
        }
        function update_subject(sub_id,std_fld_id,sub_name)
        {
            get_edit_standard_fields(std_fld_id);
            $("#edit_subject").modal('show');
            $("#sub_id").val(sub_id);
            $("#edit_sub_name").val(sub_name);
            $("#edit_sub_form").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/update_subject');?>",
                    dataType:"json",
                    data:$("#edit_sub_form").serialize(),
                    beforeSend:function()
                    {
                        $("#edit_sub_btn").prop('disabled',true);
                        $("#edit_sub_resp").html('');
                    },
                    success:function(response){
                        if(response.status=='success')
                        {
                            $("#edit_sub_resp").html(response.desc);
                            location.reload();
                        }
                        else
                        {
                            $("#edit_sub_resp").html(response.desc);
                        }
                        $("#edit_sub_btn").prop('disabled',false);
                    }
                });

            });
        }

        function delete_subject(sub_id)
        {

            if (confirm("Are you sure you want to delete this?"))
            {
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/delete_subject');?>",
                    dataType:"json",
                    data:{sub_id:sub_id},
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

        function update_subject_status(sub_id,status)
        {
            if (confirm("Are you sure you want to Change the Status?"))
            {
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/update_subject_status');?>",
                    dataType:"json",
                    data:{sub_id:sub_id,status:status},
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
                    <h5 class="card-header"><i class="fa fa-table"></i> Subjects
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_subject" onclick="get_standard_fields()">
                            Add Subject
                        </button>
                    </h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="standards_table" cellspacing="0">
                                <thead class="cf">
                                <tr>
                                    <th>Subject Name</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                if(is_array($subjects))
                                {
                                    foreach($subjects as $sub)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $sub['subject_name']; ?></td>
                                            <td>
                                                <a href="#" onclick="update_subject('<?php echo $sub['sub_id'] ?>','<?php echo $sub['std_field_id'] ?>','<?php echo $sub['subject_name']; ?>')"><i class=" fa fa-edit"></i> Edit</a><br/>
                                                <a href="#" onclick="delete_subject('<?php echo $sub['sub_id'] ?>')"style="color: red"><i class="fa fa-trash-o"></i> Delete</a>
                                            </td>
                                            <td>
                                                <button type="button" onclick="update_subject_status('<?php echo $sub['sub_id'] ?>','N')" class="btn btn-danger" id="sub_active" <?php if($sub['sub_active'] =='N') echo "style='display: none'"; ?>>Set InActive</button>
                                                <button type="button" onclick="update_subject_status('<?php echo $sub['sub_id'] ?>','Y')"class="btn btn-success" id="sub_inactive" <?php if($sub['sub_active'] =='Y') echo "style='display: none'"; ?>>Set Active</button>
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
<!-- Add Subjects Modal -->
<div class="modal fade" id="add_subject" tabindex="-1" role="dialog" aria-labelledby="add_subject" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="sub_form" method="POST" name="sub_form">
                    <div class="form-group">
                        <label for="Standard Fields">Standard Fields</label>
                        <select class="form-control" name="std_field" id="std_field">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Subject Name">Subject Name</label>
                        <input class="form-control" name="sub_name" id="sub_name" type="text" aria-describedby="Subject Name" placeholder="Enter Subject Name">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary" id="sub_btn">Save changes</button>
                    </div>
                </form>
            </div>

            <div id="sub_resp"></div>
        </div>

    </div>
</div>

<!-- Edit Subject Modal -->
<div class="modal fade" id="edit_subject" tabindex="-1" role="dialog" aria-labelledby="edit_subject" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_sub_form" method="POST" name="edit_sub_form">
                    <div class="form-group">
                        <label for="Standard Fields">Standard Fields</label>
                        <select class="form-control" name="edit_std_field" id="edit_std_field">

                        </select>
                        <input type="hidden" name="sub_id" id="sub_id" />
                    </div>
                    <div class="form-group">
                        <label for="Subject Name">Subject Name</label>
                        <input class="form-control" name="edit_sub_name" id="edit_sub_name" type="text">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary" id="edit_sub_btn">Save changes</button>
                    </div>
                </form>
            </div>

            <div id="edit_sub_resp"></div>
        </div>

    </div>
</div>
</body>
</html>