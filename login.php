<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="logo.png">
  <title>Login | Rent a Ride</title>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>

body {
  background-color: green;
}

form {
	margin-bottom: 65px;
	margin-left: 450px;
}

.header {
  margin-top: 65px;
	margin-left: 450px;
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
    
    .password-toggle {
      position: relative;
    }

    .password-toggle input[type="password"] {
      padding-right: 30px;
    }

    .password-toggle .toggle-icon {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
    }
  </style>
  <script>
    function togglePassword() {
      var passwordField = document.getElementById("password");
      var toggleIcon = document.getElementById("toggle-icon");

      if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.className = "fa fa-eye-slash";
      } else {  
        passwordField.type = "password";
        toggleIcon.className = "fa fa-eye";
      }
    }
  </script>
</head>
<body>
  
<header>
    <center><img src="logo.png" alt="Logo" height="60px" width="60px"></center>
    <h1>Rent a Ride</h1>
  </header>

  <div class="header">
    <h2>Login</h2>
  </div>
     
  <form method="post" action="login.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username">
    </div>
    <div class="input-group password-toggle">
      <label>Password</label>
      <input type="password" name="password" id="password">
      <span class="toggle-icon fa fa-eye" id="toggle-icon" onclick="togglePassword()"></span>
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
      Not yet a member? <a href="register.php">Sign up</a>
    </p>
  </form>

  <footer>
    <p>&copy; 2023 Travel Booking. All rights reserved.</p>
  </footer> 

</body>
</html>