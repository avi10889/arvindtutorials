<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Question Generator - Add Question</title>
    <?php require_once('head.php');?>

    <script>
        $(function(){
            $("#test_datetime").datetimepicker({});

            $("#standard_fld").change(function(e){
                var standard_fld = $("#standard_fld").val();
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/get_subjects');?>",
                    dataType:"html",
                    data:{standard_fld:standard_fld},
                    success:function(response){
                        var resp = response.split('|@|');

                        if(resp[0]=='success')
                        {
                            $("#subject").html(resp[1]);
                        }
                        else
                        {
                            alert(resp[1]);
                        }
                    }
                });
                //return false;
            });

            $("#subject").change(function(e){
                var standard = $("#standard").val();
                var subject = $("#subject").val();
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/qforms/get_chapters');?>",
                    dataType:"html",
                    data:{standard:standard,subject:subject},
                    /*beforeSend:function()
                     {
                     $("#login_btn").prop('disabled',true);
                     $("#login_resp").html('');
                     },*/
                    success:function(response){
                        var resp = response.split('|@|');

                        if(resp[0]=='success')
                        {
                            $("#chapter").html(resp[1]);
                        }
                        else
                        {
                            alert(resp[1]);
                        }
                    }
                });
                //return false;
            });

            $("#test_add_btn").click(function(){
                form_data = $("#test_add_form").serialize();
                $.ajax({
                    type:"POST",
                    url:"<?php echo site_url(ADMINCP.'/admin/submit_test_schedule');?>",
                    dataType:"json",
                    data:form_data,
                    beforeSend:function()
                    {
                        $("#test_add_btn").prop('disabled',true);
                    },
                    success:function(response){

                        if(response.status=='success')
                        {
                            $("#test_add_resp").html(response.desc);
                            $("#test_add_form")[0].reset();
                        }
                        else
                        {
                            //alert(response);
                            $("#test_add_resp").html(response.desc);
                        }
                        $("#test_add_btn").prop('disabled',false);
                    }
                });
            });


        });
    </script>

</head>
<body class="fixed-nav sticky-footer">
<?php require_once('nav_bar.php');?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <h5 class="card-header">
                        Add Test Schedule
                    </h5>
                    <div class="card-body">
                        <form method="POST" name="test_add_form" id="test_add_form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="standard">Select Branch</label>
                                        <select class="form-control" name="branch" id="branch" required>
                                            <option value="">Select</option>
                                            <?php
                                            if(is_array($branches))
                                            {
                                                foreach($branches as $branch)
                                                {
                                                    ?>
                                                    <option value="<?php echo $branch['branch_id'];?>"><?php echo $branch['branch_name'];?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="standard">Select Standard</label>
                                        <select class="form-control" name="standard" id="standard" required>
                                            <option value="">Select</option>
                                            <?php
                                            if(is_array($standards))
                                            {
                                                foreach($standards as $std)
                                                {
                                                    ?>
                                                    <option value="<?php echo $std['std_id'];?>"><?php echo $std['std_name'];?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="standard_fld">Select Field</label>
                                        <select class="form-control" name="standard_fld" id="standard_fld" required>
                                            <option value="">Select</option>
                                            <?php
                                            if(is_array($std_fields))
                                            {
                                                foreach($std_fields as $std_fl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $std_fl['fld_id'];?>"><?php echo $std_fl['fld_name'];?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="subject">Select Subject</label>
                                        <select class="form-control" name="subject" id="subject" required>
                                            <option value="">Select</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="chapter">Select Chapter</label>
                                        <select class="form-control" name="chapter" id="chapter" required>
                                            <option value="">Select</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="question_type">Select Marks</label>
                                        <select class="form-control" name="marks" id="marks" required>
                                            <option value="">Select</option>
                                            <?php
                                            for($i=1;$i<=5;$i++)
                                            {
                                                ?>
                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="datetimes">Select Date</label>
                                        <input type="text" name="test_datetime" id="test_datetime" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div align="center">
                                        <button type="button" name="submit" id="test_add_btn" class="btn btn-md btn-primary">Submit</button>
                                    </div>
                                    <div id="test_add_resp"></div>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <?php require_once('footer.php');?>
</div>
</body>
</html>