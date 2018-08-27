<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Arvind Tutorials</title>
    <?php require_once('head.php');?>
</head>
<body>
<?php require_once('header.php');?>
<script>
    $(function(){
        $("#show_lecture_btn").click(function(){
            form_data = $("#lecture_schedule_form").serialize();
            $.ajax({
                type:"POST",
                url:"<?php echo site_url('home/get_lecture_schedule_by_std_id');?>",
                dataType:"html",
                data:form_data,
                beforeSend:function()
                {
                    $("#show_lecture_btn").prop('disabled',true);
                },
                success:function(response){
                    var resp = response.split('|@|');
                    if(resp[0]=='success')
                    {
                        $("#lecture_schedule_resp").html(resp[1]);
                        //$("#test_schedule_form")[0].reset();
                    }
                    else
                    {
                        //alert(response);
                        $("#lecture_schedule_resp").html(resp[1]);
                    }
                    $("#show_lecture_btn").prop('disabled',false);
                }
            });
        });

    });
</script>
<div class="clearfix"></div>

<section class="sec-pad">
    <div class="container">
        <form method="post" id="lecture_schedule_form" name="lecture_schedule_form">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4 form-group" style="text-align: center;">
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
                    <div class="col-md-4 form-group" style="text-align: center;">
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
                    <div class="col-md-4 form-group" align="center" style="margin-top: 25px;">
                        <button type="button" name="submit" id="show_lecture_btn" class="btn btn-md btn-primary">Submit</button>
                    </div>
                    <div id="lecture_schedule_resp"></div>
                </div><!--col-md-12-->
            </div><!--row-->
        </form>
    </div><!--container-->
</section>

<div class="clearfix"></div>

<?php require_once('footer.php');?>

</body>
</html>