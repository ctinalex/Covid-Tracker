<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Autentificare</title>
	<link rel="stylesheet" type="text/css" href="stylez.css">
</head>
<body>

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>User</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Parola</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Autentificare</button>
		</div>
		<p>
			N-ai cont? <a href="register.php">Inregistreaza-te aici!</a>
		</p>
	</form>


</body>
</html>