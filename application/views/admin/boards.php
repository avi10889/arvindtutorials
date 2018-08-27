<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Boards</title>
    <?php require_once('head.php');?>
    <script>
        $(function(){

            $("#board_form").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/add_board');?>",
                    dataType:"json",
                    data:$("#board_form").serialize(),
                    beforeSend:function()
                    {
                        $("#board_btn").prop('disabled',true);
                        $("#board_resp").html('');
                    },
                    success:function(response){
                        if(response.status=='success')
                        {
                            $("#board_resp").html(response.desc);
                            location.reload();
                        }
                        else
                        {
                            $("#board_resp").html(response.desc);
                        }
                        $("#board_btn").prop('disabled',false);
                    }
                });
                //return false;
            });
        });

        function update_board(board_id,board_name,board_state)
        {
            $("#edit_board").modal('show');
            $("#board_id").val(board_id);
            $("#edit_board_name").val(board_name);
            $("#edit_board_state").val(board_state);
            $("#edit_board_form").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/update_board');?>",
                    dataType:"json",
                    data:$("#edit_board_form").serialize(),
                    beforeSend:function()
                    {
                        $("#edit_board_btn").prop('disabled',true);
                        $("#edit_board_resp").html('');
                    },
                    success:function(response){
                        if(response.status=='success')
                        {
                            $("#edit_board_resp").html(response.desc);
                            location.reload();
                        }
                        else
                        {
                            $("#edit_board_resp").html(response.desc);
                        }
                        $("#edit_board_btn").prop('disabled',false);
                    }
                });

            });
        }

        function delete_board(board_id)
        {

            if (confirm("Are you sure you want to delete this?"))
            {
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/delete_board');?>",
                    dataType:"json",
                    data:{board_id:board_id},
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

        function update_board_status(board_id,status)
        {
            if (confirm("Are you sure you want to Change the Status?"))
            {
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/update_board_status');?>",
                    dataType:"json",
                    data:{board_id:board_id,status:status},
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
                    <h5 class="card-header"><i class="fa fa-table"></i> Boards
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_board">
                            Add Board
                        </button>
                    </h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="standards_table" cellspacing="0">
                                <thead class="cf">
                                <tr>
                                    <th>Board Name</th>
                                    <th>Board State</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                if(is_array($boards))
                                {
                                    foreach($boards as $board)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $board['board_name']; ?></td>
                                            <td><?php echo $board['board_state']; ?></td>
                                            <td>
                                                <a href="#" onclick="update_board('<?php echo $board['board_id'] ?>','<?php echo $board['board_name']; ?>','<?php echo $board['board_state']; ?>')"><i class=" fa fa-edit"></i> Edit</a><br/>
                                                <a href="#" onclick="delete_board('<?php echo $board['board_id'] ?>')"style="color: red"><i class="fa fa-trash-o"></i> Delete</a>
                                            </td>
                                            <td>
                                                <button type="button" onclick="update_board_status('<?php echo $board['board_id'] ?>','N')" class="btn btn-danger" id="board_active" <?php if($board['board_active'] =='N') echo "style='display: none'"; ?>>Set InActive</button>
                                                <button type="button" onclick="update_board_status('<?php echo $board['board_id'] ?>','Y')"class="btn btn-success" id="board_inactive" <?php if($board['board_active'] =='Y') echo "style='display: none'"; ?>>Set Active</button>
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
<div class="modal fade" id="add_board" tabindex="-1" role="dialog" aria-labelledby="add_board" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Board</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="board_form" method="POST" name="board_form">
                    <div class="form-group">
                        <label for="Board Name">Board Name</label>
                        <input class="form-control" name="board_name" id="board_name" type="text" aria-describedby="Board Name" placeholder="Enter Board Name">
                    </div>
                    <div class="form-group">
                        <label for="Board State">Board State</label>
                        <input class="form-control" name="board_state" id="board_state" type="text" aria-describedby="Board Description" placeholder="Enter Board Description">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary" id="board_btn">Save changes</button>
                    </div>
                </form>
            </div>

            <div id="board_resp"></div>
        </div>

    </div>
</div>

<!-- Edit Board Modal -->
<div class="modal fade" id="edit_board" tabindex="-1" role="dialog" aria-labelledby="edit_board" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Board</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_board_form" method="POST" name="edit_board_form">
                    <div class="form-group">
                        <label for="Board Name">Board Name</label>
                        <input class="form-control" name="edit_board_name" id="edit_board_name" type="text">
                        <input type="hidden" name="board_id" id="board_id" />
                    </div>
                    <div class="form-group">
                        <label for="Board State">Board State</label>
                        <input class="form-control" name="edit_board_state" id="edit_board_state">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary" id="edit_board_btn">Save changes</button>
                    </div>
                </form>
            </div>

            <div id="edit_board_resp"></div>
        </div>

    </div>
</div>
</body>
</html>