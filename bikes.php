<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="logo.png">
  <title>Bikes | Rent a Ride</title>

  <style>
    /* CSS styles for the home page */
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

h1 {
  margin: 0;
  font-size: 30px;
  color: #fff;
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

main {
  margin: 20px;
  text-align: center;
}

.bike-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 300px;
  margin: 10px;
  padding: 40px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #fff;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s, box-shadow 0.3s;
}

.bike-container:hover {
  transform: translateY(-5px);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.bike-image {
  width: 350px;
  height: 240px;
  margin-bottom: 10px;
}

.bike-container:hover img {
  opacity: 0.85;
}

.bike-container:hover h3 {
  color: blue;
}
        

h2 {
  margin-top: 20px;
  color: #333;
}

.bike-details {
  color: #777;
  align-items: center;
  text-align: center;
}

.bike-wrapper {
  display: flex;
  flex-wrap: nowrap;
}

button {
  background-color: olive;
  color: #fff;
  border: none;
  padding: 12px 100px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #0056b32
}

button.book-now {
  margin-top: 10px;
}

button.book-now:hover {
  background-color: bl;
}

.center {
  overflow-x: scroll;
  margin-top: 20px;
}


footer {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
  margin-bottom: 0;
}

footer p {
  margin: 0;
}

/* Increase input box sizes */
input[type="date"],
input[type="text"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  box-sizing: border-box;
}

/* Center align buttons */
.center-align {
  display: flex;
  justify-content: center;
  margin-top: 20px;
  background-color: olive;
}
  </style>
</head>

<body>
  <header>
    <center><img src="logo.png" alt="Logo" height="60px" width="60px"></center>
    <h1>Rent a Ride</h1>
    
  </header>

  <?php
  class Bike {
    public $make;
    public $model;
    public $available;
    public $price_per_day;
    public $kms_limit;
    public $extra_kms;
    public $extra_hrs;
    public $image;

    public function __construct($make, $model, $available = true, $price_per_day, $kms_limit, $extra_kms,$extra_hrs, $image) {
      $this->make = $make;
      $this->model = $model;
      $this->available = $available;
      $this->price_per_day = $price_per_day;
      $this->kms_limit = $kms_limit;
      $this->extra_kms = $extra_kms;
      $this->extra_hrs = $extra_hrs;
      $this->image = $image;
    }

    public function __toString() {
      return "{$this->make} {$this->model}";
    }
  }

  class BikeBookingSystem {
    public $bikes = [];

    public function addBike($bike) {
      $this->bikes[] = $bike;
    }

    public function displayAvailableBikes() {
      $availableBikes = array_filter($this->bikes, function ($bike) {
        return $bike->available;
      });

      if (!empty($availableBikes)) {
        echo "<center><h2>Available Bikes</h2></center>";
        echo "<div class='center'>"; // Added wrapper div for horizontal scroll
        echo "<div class='bike-wrapper'>"; // Added wrapper div for bikes
        foreach ($availableBikes as $index => $bike) {
          echo "<div class='bike-container'>";
          echo "<h3>{$bike->make} {$bike->model}</h3>"; // Displaying the bike name
          echo "<div class='bike-image'><img src='{$bike->image}' alt='Bike Image' class='bike-image'></div>";
          echo "<div class='bike-details'>";
          echo "<p>Price / day : {$bike->price_per_day}</p>";
          echo "<p>Kms Limit / day: {$bike->kms_limit}</p>";
          echo "<p>Price / Extra Kms : {$bike->extra_kms}</p>";
          echo "<p>Price / Extra Hrs : {$bike->extra_hrs}</p>";
          echo "</div>";
          echo "<form action='booking_bikes.php' method='post'>";
          echo "<input type='hidden' name='bike_index' value='{$index}'>";
          echo "<label for='start_date'>Start Date:</label>";
          echo "<input type='date' name='start_date' min='" . date('Y-m-d') . "' required><br>";
          echo "<label for='end_date'>End Date:</label>";
          echo "<input type='date' name='end_date' min='" . date('Y-m-d') . "' required><br>";
          echo "<label for='start_location'>Start Location:</label>";
          echo "<input type='text' name='start_location' required><br>";
          echo "<label for='destination'>Destination:</label>";
          echo "<input type='text' name='destination' required><br>";
          echo "<div class='center-align'>";
          echo "<button type='submit' name='book_now'>Book Now</button>";
          echo "</div>";
          echo "</form>";
          echo "</div>";
        }
        echo "</div>"; // Close the bike wrapper div
        echo "</div>"; // Close the center div
      } else {
        echo "<p>No bikes available.</p>";
      }
    }

    public function bookBike($bikeIndex) {
      if (isset($this->bikes[$bikeIndex]) && $this->bikes[$bikeIndex]->available) {
        $this->bikes[$bikeIndex]->available = false;
      }
    }
  }

  // Creating bike booking system
  $bookingSystem = new BikeBookingSystem();

  // Creating bike objects
  $bike1 = new Bike("HONDA", "ACTIVA", true, 499, 80, 5 , 100 , "Activa.png");
  $bike2 = new Bike("BAJAJ", "CT100", true, 699, 80, 10, 100, "ct100.jpg");
  $bike3 = new Bike("YAMAHA", "CRUX", true, 699, 80, 10, 100, "crux.jpeg");
  $bike4 = new Bike("YAMAHA", "R15", true, 899, 80, 10, 150, "R15.jpg");
  $bike5 = new Bike("ROYAL ENFIELD", "METEOR 350", true, 999, 80 , 10, 150, "Meteor.jpg");

  // Adding bikes to the booking system
  $bookingSystem->addBike($bike1);
  $bookingSystem->addBike($bike2);
  $bookingSystem->addBike($bike3);
  $bookingSystem->addBike($bike4);
  $bookingSystem->addBike($bike5);

  // Displaying available bikes
  $bookingSystem->displayAvailableBikes();
  ?>

  <div class="center-align">
    <button type="button" onclick="window.location.href='home.php'">Back to Home</button>
  </div>

  <footer>
    <p>&copy; 2023 Travel Booking. All rights reserved.</p>
  </footer>
</body>
</html>
