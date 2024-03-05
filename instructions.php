<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="logo.png">
  <title>Instructions | Rent a Ride</title>
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

    .inst {
      padding: 10px;
    }

    .inst h2 {
      font-size: 34px;
      margin-bottom: 0px;
    }


    .content {
      padding-left: 50px;
      padding-top: 10px;
    }

    .content h2 {
      font-size: 36px;
      margin-bottom: 0px;
      color : maroon;
    }

    .content h3 {
      font-size: 24px;
      margin-bottom: 30px;
      color : maroon;
    }

    .content p {
      font-size: 18px;
      color : maroon;
      margin-bottom: 30px;
    }

    .text {
      padding-left: 50px;
      padding-top: 35px;
    }

    .text p {
      font-size: 18px;
      color: #333;
      margin-bottom: 30px;
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
    top: 800px;
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

<div class="inst">
  <center><h2>- Instructions -</h2></center>
</div>

  <div class="content">
    <h3><b>Documents Required : </b></h3>
    <p>Original Driving License</p>
    <p>Original Aadhar card</p>
    <p>!..(Fake and duplicate cards are strictly prohobited)..!</p>
    <h3><b><br>Limitations and Damages:</br></b></h3>
    <p><b>Speed limit : </b>80 kmph for both bikes and cars.</p>
    <p>If the limit is violated, Rs.200 will be charged.</p>
    <p><b>Damages : </b></p>
    <p>If any internal or extrenal damage is caused during the rental period, customer is fully responsible for that.</p>
    <p>Customer will be charged according to the damage to the vehicle.</p>
</div>

<div class= "text">
    <center><p>We provide 24/7 services across many cities</p></center>
    <center><p>- R E N T - R I D E - E N J O Y -</p></center>
</div>

<a href="home.php" class="back-btn">Back</a>

<footer>
  <p>&copy; 2023 Rent a Ride. All rights reserved.</p>
</footer>

</body>
</html>
