<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="logo.png">
  <title>Sign up | Rent a Ride</title>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
	
body {
  background-color: lawngreen;
}


header {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
}

h1 {
  margin: 0;
  font-size: 30px;
  color: #fff;
}

form {
	margin-bottom: 50px;
	margin-left: 450px;
}

.header {
	margin-left: 450px;
}


footer {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
  margin-top: 20px;
}

footer p {
  margin: 0;
}
</style>
</head>
<body>

  <header>
    <center><img src="logo.png" alt="Logo" height="60px" width="60px"></center>
    <h1>Rent a Ride</h1>
  </header>

	<style>
		 .logo {
      text-align: center;
      margin-bottom: 20px;
    }

    .logo img {
      width: 80px;
      height: auto;
      border-radius: 50%;
      border: 5px solid #333;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
	}

    .password-toggle {
      position: relative;
    }
	</style>
	

  <div class="header">
  	<h2>Sign Up</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>"required>
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>"required>
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password"required>
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_1"required>
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Sign UP</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>

  <footer>
    <p>&copy; 2023 Travel Booking. All rights reserved.</p>
  </footer> 

</body>
</html>