<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Chapters</title>
    <?php require_once('head.php');?>
    <script>
        $(function(){

            $("#chap_form").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/add_chapter');?>",
                    dataType:"json",
                    data:$("#chap_form").serialize(),
                    beforeSend:function()
                    {
                        $("#chap_btn").prop('disabled',true);
                        $("#chap_resp").html('');
                    },
                    success:function(response){
                        if(response.status=='success')
                        {
                            $("#chap_resp").html(response.desc);
                            location.reload();
                        }
                        else
                        {
                            $("#chap_resp").html(response.desc);
                        }
                        $("#chap_btn").prop('disabled',false);
                    }
                });
                //return false;
            });
        });

        function get_standard_subject_list()
        {
            $('#std_name').empty();
            $("#sub_name").empty();
            $.ajax({
                type:"POST",
                url:"<?php echo site_url(ADMINCP.'/qforms/get_standard_subject_list');?>",
                dataType:"json",
                beforeSend:function()
                {
                },
                success:function(response) {
                    if(response.status=='success')
                    {
                        $("#std_name").append('<option value="">' + ' Select ' + '</option>');
                        $.each(response.standards, function (index, std) {
                            $("#std_name").append('<option value="' + std.std_id + '">' + std.std_name + '</option>');

                        });

                        $("#sub_name").append('<option value="">' + ' Select ' + '</option>');
                        $.each(response.subjects, function (index, sub) {
                            $("#sub_name").append('<option value="' + sub.sub_id + '">' + sub.subject_name + '</option>');

                        });
                    }
                }
            });
        }

        function get_edit_standard_subject_list(sub_id,std_id)
        {
            $('#edit_std_name').empty();
            $("#edit_sub_name").empty();
            $.ajax({
                type:"POST",
                url:"<?php echo site_url(ADMINCP.'/qforms/get_standard_subject_list');?>",
                dataType:"json",
                beforeSend:function()
                {
                },
                success:function(response) {
                    if(response.status=='success')
                    {
                        $("#edit_std_name").append('<option value="">' + ' Select ' + '</option>');
                        $.each(response.standards, function (index, std) {
                            if(std.std_id==std_id)
                            {
                                $("#edit_std_name").append('<option value="' + std.std_id + '" selected>' + std.std_name + '</option>');
                            }
                            else
                            {
                                $("#edit_std_name").append('<option value="' + std.std_id + '">' + std.std_name + '</option>');
                            }


                        });

                        $("#edit_sub_name").append('<option value="">' + ' Select ' + '</option>');
                        $.each(response.subjects, function (index, sub) {
                            if(sub.sub_id==sub_id)
                            {
                                $("#edit_sub_name").append('<option value="' + sub.sub_id + '" selected>' + sub.subject_name + '</option>');
                            }
                            else
                            {
                                $("#edit_sub_name").append('<option value="' + sub.sub_id + '">' + sub.subject_name + '</option>');
                            }


                        });
                    }
                }
            });
        }
        function update_chapter(chap_id,sub_id,std_id,chap_name)
        {
            get_edit_standard_subject_list(sub_id,std_id);
            $("#edit_chapter").modal('show');
            $("#chap_id").val(chap_id);
            $("#edit_chap_name").val(chap_name);
            $("#edit_chap_form").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/update_chapter');?>",
                    dataType:"json",
                    data:$("#edit_chap_form").serialize(),
                    beforeSend:function()
                    {
                        $("#edit_chap_btn").prop('disabled',true);
                        $("#edit_chap_resp").html('');
                    },
                    success:function(response){
                        if(response.status=='success')
                        {
                            $("#edit_chap_resp").html(response.desc);
                            location.reload();
                        }
                        else
                        {
                            $("#edit_chap_resp").html(response.desc);
                        }
                        $("#edit_chap_btn").prop('disabled',false);
                    }
                });

            });
        }

        function delete_chapter(chap_id)
        {

            if (confirm("Are you sure you want to delete this?"))
            {
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/delete_chapter');?>",
                    dataType:"json",
                    data:{chap_id:chap_id},
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

        function update_chapter_status(chap_id,status)
        {
            if (confirm("Are you sure you want to Change the Status?"))
            {
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/update_chapter_status');?>",
                    dataType:"json",
                    data:{chap_id:chap_id,status:status},
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
                    <h5 class="card-header"><i class="fa fa-table"></i> Chapters
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_chapter" onclick="get_standard_subject_list()">
                            Add Chapter
                        </button>
                    </h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="standards_table" cellspacing="0">
                                <thead class="cf">
                                <tr>
                                    <th>Chapter Name</th>
                                    <th>Subject Name</th>
                                    <th>Standard Name</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                if(is_array($chapters))
                                {
                                    foreach($chapters as $chap)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $chap['chap_title']; ?></td>
                                            <td><?php echo $chap['subject_name']; ?></td>
                                            <td><?php echo $chap['std_name']; ?></td>
                                            <td>
                                                <a href="#" onclick="update_chapter('<?php echo $chap['chap_id'] ?>','<?php echo $chap['sub_id'] ?>','<?php echo $chap['std_id'] ?>','<?php echo $chap['chap_title']; ?>')"><i class=" fa fa-edit"></i> Edit</a><br/>
                                                <a href="#" onclick="delete_chapter('<?php echo $chap['chap_id'] ?>')"style="color: red"><i class="fa fa-trash-o"></i> Delete</a>
                                            </td>
                                            <td>
                                                <button type="button" onclick="update_chapter_status('<?php echo $chap['chap_id'] ?>','N')" class="btn btn-danger" id="chap_active" <?php if($chap['chap_active'] =='N') echo "style='display: none'"; ?>>Set InActive</button>
                                                <button type="button" onclick="update_chapter_status('<?php echo $chap['chap_id'] ?>','Y')"class="btn btn-success" id="chap_inactive" <?php if($chap['chap_active'] =='Y') echo "style='display: none'"; ?>>Set Active</button>
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
<div class="modal fade" id="add_chapter" tabindex="-1" role="dialog" aria-labelledby="add_chapter" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Chapter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="chap_form" method="POST" name="chap_form">
                    <div class="form-group">
                        <label for="Standard Name">Standard Name</label>
                        <select class="form-control" name="std_name" id="std_name">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Subject Name">Subject Name</label>
                        <select class="form-control" name="sub_name" id="sub_name">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Chapter Name">Chapter Name</label>
                        <input class="form-control" name="chap_name" id="chap_name" type="text" aria-describedby="Chapter Name" placeholder="Enter Chapter Name">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary" id="chap_btn">Save changes</button>
                    </div>
                </form>
            </div>

            <div id="chap_resp"></div>
        </div>

    </div>
</div>

<!-- Edit Chapter Modal -->
<div class="modal fade" id="edit_chapter" tabindex="-1" role="dialog" aria-labelledby="edit_chapter" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Chapter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_chap_form" method="POST" name="edit_chap_form">
                    <div class="form-group">
                        <label for="Standard Name">Standard Name</label>
                        <select class="form-control" name="edit_std_name" id="edit_std_name">

                        </select>
                        <input type="hidden" name="chap_id" id="chap_id" />
                    </div>
                    <div class="form-group">
                        <label for="Subject Name">Subject Name</label>
                        <select class="form-control" name="edit_sub_name" id="edit_sub_name">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Chapter Name">Chapter Name</label>
                        <input class="form-control" name="edit_chap_name" id="edit_chap_name" type="text">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary" id="edit_chap_btn">Save changes</button>
                    </div>
                </form>
            </div>

            <div id="edit_chap_resp"></div>
        </div>

    </div>
</div>
</body>
</html>