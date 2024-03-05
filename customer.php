<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="logo.png">
  <title>Customer Support | Rent a Ride</title>
  <style>
    /* CSS styles for the contact page */
    body {
      font-family: Arial, sans-serif;
      background-color: lawngreen;
      margin: 0;
      padding: 0;
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


    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      margin: 0;
      font-size: 30px;
    }

    p {
      font-size: 18px;
      margin-bottom: 20px;
    }

    form {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
      margin-bottom: 10px;
    }

    input[type="submit"] {
      background-color: #ff6b6b;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #e35555;
    }

    /* CSS styles for the popup message */
    .popup {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      z-index: 9999;
    }

    footer {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    footer p {
      margin: 0;
    }
    
  </style>
  <script>
    // JavaScript code for the popup message and redirection
    function showPopup() {
      var popup = document.createElement('div');
      popup.classList.add('popup');
      popup.innerHTML = 'Submitted successfully!';

      document.body.appendChild(popup);

      setTimeout(function() {
        popup.style.display = 'none';
        window.location.href = 'home.php'; // Redirect to the home page
      }, 3000); // Display the popup for 3 seconds
    }
  </script>
</head>
<body>
<header>
<center><img src="logo.png" alt="Logo" height="60px" width="60px" ></center>
    <h1>Rent a Ride</h1>
    <nav>
      <ul>
        <li><a href="home.php">Home</a></li>
      </ul>
    </nav>
    </header>
  <section>
  <div class="container">
    <center><h1>Customer Support</h1></center>
    <center><p>If you have any questions or inquiries, please fill out the form below and we'll get back to you as soon as possible.</p></center>
    <form onsubmit="event.preventDefault(); showPopup();">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="text" id="email" name="email" required>

      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="4" required></textarea>

      <input type="submit" value="Submit">
    </form>
  </div>

  <footer>
    <p>&copy; 2023 Travel Booking. All rights reserved.</p>
  </footer>
</body>
</html>
