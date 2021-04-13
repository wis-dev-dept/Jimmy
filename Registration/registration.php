<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="POST" action="registration.php">
  	<?php include('errors.php'); ?>
	<div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="fname" value="<?php echo $Fname; ?>">
  	</div>
	<div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="lname" value="<?php echo $Lname; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Conact No</label>
  	  <input type="text" name="phone" value="<?php echo $Phone; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $Email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="../Login/login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>