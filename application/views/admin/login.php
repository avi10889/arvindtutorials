<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Question Generator - Login</title>
 <?php require_once('head.php');?>
  <script>
$(function(){
	$("#login_form").submit(function(e){
	e.preventDefault();
	$.ajax({
	type:"POST",
	url:"<?php echo site_url(ADMINCP.'/login/validate_login_admin');?>",
	dataType:"json",
	data:$("#login_form").serialize(),
	beforeSend:function()
    {
	    $("#login_btn").prop('disabled',true);
		$("#login_resp").html('');
	},
	success:function(response){
		if(response.status=='success')
		{
			$("#login_resp").html(response.desc);
			window.location.href= '<?php echo site_url(ADMINCP.'/dashboard');?>';
		}
		else
		{
			$("#login_resp").html(response.desc);
		}
		$("#login_btn").prop('disabled',false);
	}
	});
	//return false; 
	});
});
</script>
  
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form id="login_form" method="POST" name="login_form">
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" id="username" name="username" type="text" aria-describedby="username" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" id="password" name="password" type="password" placeholder="Password">
          </div>
         
          <button type="submit" name="submit" id="login_btn" class="btn btn-primary btn-block">Login</button>
        </form>
		<div id="login_resp"></div>
      </div>
    </div>
  </div>
  
</body>

</html>
