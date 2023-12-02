

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login</title>
</head>
<body>
<form class="form-horizontal" method = "post" action="login">
	<!-- <div class="alert alert-danger" v-if = "status == 2">
		<strong>Wrong Email or Password</strong> 
	</div> -->
	<div class="form-group">
	<label class="control-label col-sm-2" for="user_name">Email:</label>
	<div class="col-sm-10">
		<input class="form-control" type="text" name="user_name">
	</div>
	</div>
	<div class="form-group">
	<label class="control-label col-sm-2" for="password">Password:</label>
	<div class="col-sm-10">    
		<input class="form-control" type="password" name="password" v-model="password">
	</div>
	</div>
	<div class="form-group">        
	<div class="col-sm-offset-2 col-sm-10">
		<div class="checkbox">
		<label><input type="checkbox" name="remember"> Remember me</label>
		</div>
	</div>
	</div>
	<div class="form-group">        
	<div class="col-sm-offset-2 col-sm-10">
		<input type="submit" value="Login" class="btn btn-default">                      

	</div>
	</div>
</form>
</body>
</html>