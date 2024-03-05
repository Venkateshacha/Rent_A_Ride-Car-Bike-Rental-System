<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="logo.png">
  <title>Contact Us | Rent a Ride</title>
  <style>
    /* CSS styles go here */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: lawngreen;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    
    nav {
      margin-top: 20px;
    }

    nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      text-align: center;
    }

    nav ul li {
      display: inline-block;
      margin-right: 10px;
    }

    nav ul li a {
      color: #fff;
      text-decoration: none;
      padding: 5px 10px;
      border: 1px solid #fff;
      border-radius: 5px;
    }

    nav ul li a:hover {
      background-color: #fff;
      color: #333;
    }

    h1 {
      margin: 0;
      font-size: 30px;
    }

    .content {
      padding: 50px;
      text-align: center;
    }

    .content h2 {
      font-size: 36px;
      margin-bottom: 30px;
      color : maroon;
    }

    .content p {
      font-size: 18px;
      color: #666;
      margin-bottom: 30px;
      color : maroon;
    }

    footer {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
      margin-top: auto;
    }

    footer p {
      margin: 0;
    }

    .back-btn {
    position: absolute;
    top: 555px;
    left: 610px;
    padding: 10px 20px;
    background-color: olive;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    border: none;
    font-size: 16px;
    transition: background-color 0.3s, color 0.3s;
  }

  .back-btn:hover {
    background-color: #fff;
    color: #333;
    border: 1px solid #333;
  }


  </style>
</head>
<body>
  <header>
  <center><img src="logo.png" alt="Logo" height="60px" width="60px" ></center>
    <h1>Rent a Ride</h1>
    
  </header>

  <div class="content">
    <h2>Contact Us</h2>
    <p>Email : rentaride111@gmail.com</p>
    <p>Phone : +91 7032160046<br>+91 6309383537</br></p>
    <p>Insta : @_rentaride_</p>
    <p>We provide 24/7 services across many cities</p>
    <p>- R E N T - R I D E - E N J O Y -</p>

  </div>
  
  <a href="home.php" class="back-btn">Back</a>

  <footer>
    <p>&copy; 2023 Rent a Ride. All rights reserved.</p>
  </footer>
  
</body>
</html>
