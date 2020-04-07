<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Inregistrare cont</title>
	<link rel="stylesheet" type="text/css" href="stylez.css">
</head>
<body>
	<div class="header">
		<h2>Inregistrare cont</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>User</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Parola</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Repeta parola</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Inregistrare</button>
		</div>
		<p>
			Ai deja cont? <a href="login.php">Autentificare</a>
		</p>
	</form>
</body>
</html>