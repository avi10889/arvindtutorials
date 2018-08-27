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
	$("#standard_fld").change(function(e){
	var standard_fld = $("#standard_fld").val();
	$.ajax({
	type:"POST",
	url:"<?php echo site_url(ADMINCP.'/qforms/get_subjects');?>",
	dataType:"html",
	data:{standard_fld:standard_fld},
	/*beforeSend:function()
    {
	    $("#login_btn").prop('disabled',true);
		$("#login_resp").html('');
	},*/
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

	$("#question_type").change(function(){
		var ques_type = $("#question_type").val();
		if(ques_type == 'theory')
		{
			$("#th_section").show();
			$("#mcq_section").hide();
		}
		else
		{
			$("#th_section").hide();
			$("#mcq_section").show();
		}
		
	});
	
	$("#ques_add_btn").click(function(){
        for ( instance in CKEDITOR.instances ) {
            CKEDITOR.instances[instance].updateElement();
        }
		form_data = $("#ques_add_form").serialize();
		$.ajax({
		type:"POST",
		url:"<?php echo site_url(ADMINCP.'/qforms/submit_question');?>",
		dataType:"json",
		data:form_data,
		beforeSend:function()
		{
			$("#ques_add_btn").prop('disabled',true);
		},
		success:function(response){
			
			if(response.status=='success')
			{
				$("#ques_add_resp").html(response.desc);
				$("#ques_add_form")[0].reset();
			}
			else
			{
				//alert(response);
				$("#ques_add_resp").html(response.desc);
			}
			$("#ques_add_btn").prop('disabled',false);
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
					Add Question
				  </h5>
				  <div class="card-body">
				  <form method="POST" name="ques_add_form" id="ques_add_form">
					<div class="row">
						<div class="col-md-4">
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
						<div class="col-md-4">
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
						<div class="col-md-4">
							<div class="form-group">
								<label for="subject">Select Subject</label>
								<select class="form-control" name="subject" id="subject" required>
									<option value="">Select</option>
									
								</select>	
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="chapter">Select Chapter</label>
								<select class="form-control" name="chapter" id="chapter" required>
									<option value="">Select</option>
									
								</select>	
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="question_type">Select Question Type</label>
								<select class="form-control" name="question_type" id="question_type" required>
									<option value="">Select</option>
									<option value="theory">Theory</option>
									<option value="mcq">Multiple Choice Questions(MCQ)</option>
								</select>	
							</div>
						</div>
						
						<div class="col-md-4">
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
								<label for="question">Question</label>
                                <textarea type="text" name="question" id="question" class="form-control"> </textarea>
							</div>
						</div>
						
						<div class="col-md-12" id="th_section" style="display:none;">
							<div class="form-group">
								<label for="th_answer">Theory Answer</label>
								<textarea type="text" name="th_answer" id="th_answer" class="form-control"></textarea>	
							</div>
						</div>
						
						<div class="col-md-12" id="mcq_section" style="display:none;">
							<div class="form-group">
								<label for="answer">MCQ Answers</label>
								<table class="table">
								<th width="30">Correct Answer</th>
								<th align="center">Answer</th>
								<tr>
									<td><input type="radio" name="mcq_ans" id="mcq_ans1" value="1"/></td>
                                    <td><textarea type="text" name="mcq_opt_1" id="mcq_opt_1" class="form-control"></textarea></td>
								</tr>
								<tr>
									<td><input type="radio" name="mcq_ans" id="mcq_ans_2" value="2" /></td>
                                    <td><textarea type="text" name="mcq_opt_2" id="mcq_opt_2" class="form-control"></textarea></td>
								</tr>
								<tr>
									<td><input type="radio" name="mcq_ans" id="mcq_ans_3" value="3" /></td>
                                    <td><textarea type="text" name="mcq_opt_3" id="mcq_opt_3" class="form-control"></textarea></td>
								</tr>
								<tr>
									<td><input type="radio" name="mcq_ans" id="mcq_ans_4" value="4" /></td>
                                    <td><textarea type="text" name="mcq_opt_4" id="mcq_opt_4" class="mform-control"> </textarea></td>
								</tr>
								
								</table>
								
							</div>
						</div>
						
						<div class="col-md-12">
							<div align="center">
								<button type="button" name="submit" id="ques_add_btn" class="btn btn-md btn-primary">Submit</button>
							</div>
							<div id="ques_add_resp"></div>
						</div>
						
						
					</div>
					</form>
				  </div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<script>
        CKEDITOR.replace('th_answer');
        CKEDITOR.replace('question',{ height: 70 ,toolbar: 'Basic'});
        CKEDITOR.replace('mcq_opt_1',{ height: 50 ,toolbar: 'Basic'});
        CKEDITOR.replace('mcq_opt_2',{ height: 50 ,toolbar: 'Basic'});
        CKEDITOR.replace('mcq_opt_3',{ height: 50 ,toolbar: 'Basic'});
        CKEDITOR.replace('mcq_opt_4',{ height: 50 ,toolbar: 'Basic'});
        if ( CKEDITOR.env.ie && CKEDITOR.env.version == 8 ) {
            document.getElementById( 'ie8-warning' ).className = 'tip alert';
        }

       /* window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl, function() {
            // Get the reference to a dialog window.
            var element, dialog = this.getDialog();
            // Check if this is the Image dialog window.
            if (dialog.getName() == 'image') {
                // Get the reference to a text field that holds the "alt" attribute.
                element = dialog.getContentElement( 'info', 'txtAlt' );
                // Assign the new value.
                if ( element )
                    element.setValue( "alt text" );
            }
            // Return false to stop further execution - in such case CKEditor will ignore the second argument (fileUrl)
            // and the onSelect function assigned to a button that called the file browser (if defined).
            return false;
        });*/
    </script>
<?php require_once('footer.php');?>
</div>
</body>
</html>