<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="logo.png">
  <title>Car Booking</title>

  <style>
    /* CSS styles for the home page */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
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

.car-container {
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

.car-container:hover {
  transform: translateY(-5px);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.car-container:hover img {
  opacity: 0.85;
}

.car-container:hover h3 {
  color: blue;
}

.car-image {
  width: 350px;
  height: 240px;
  margin-bottom: 10px;
}

h2 {
  margin-top: 20px;
  color: #333;
}

.car-details {
  color: #777;
  align-items: center;
  text-align: center;
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

.car-wrapper {
  display: flex;
  flex-wrap: nowrap;
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
  class Car {
    public $make;
    public $model;
    public $available;
    public $pricePerKm;
    public $seatingCapacity;
    public $ac;
    public $image;

    public function __construct($make, $model, $available = true, $pricePerKm, $seatingCapacity, $ac, $image) {
      $this->make = $make;
      $this->model = $model;
      $this->available = $available;
      $this->pricePerKm = $pricePerKm;
      $this->seatingCapacity = $seatingCapacity;
      $this->ac = $ac;
      $this->image = $image;
    }

    public function __toString() {
      return "{$this->make} {$this->model}";
    }
  }

  class CarBookingSystem {
    public $cars = [];

    public function addCar($car) {
      $this->cars[] = $car;
    }

    public function displayAvailableCars() {
      $availableCars = array_filter($this->cars, function ($car) {
        return $car->available;
      });

      if (!empty($availableCars)) {
        echo "<center><h2>Available Cars</h2></center>";
        echo "<div class='center'>"; // Added wrapper div for horizontal scroll
        echo "<div class='car-wrapper'>"; // Added wrapper div for cars
        foreach ($availableCars as $index => $car) {
          echo "<div class='car-container'>";
          echo "<h3>{$car->make} {$car->model}</h3>"; // Displaying the car name
          echo "<div class='car-image'><img src='{$car->image}' alt='Car Image' class='car-image'></div>";
          echo "<div class='car-details'>";
          echo "<p>Price per KM: {$car->pricePerKm}</p>";
          echo "<p>Seating Capacity: {$car->seatingCapacity}</p>";
          echo "<p>AC: " . ($car->ac ? 'Yes' : 'No') . "</p>";
          echo "</div>";
          echo "<form action='bookings_cars.php' method='post'>";
          echo "<input type='hidden' name='car_index' value='{$index}'>";
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
        echo "</div>"; // Close the car wrapper div
        echo "</div>"; // Close the center div
      } else {
        echo "<p>No cars available.</p>";
      }
    }

    public function bookCar($carIndex) {
      if (isset($this->cars[$carIndex]) && $this->cars[$carIndex]->available) {
        $this->cars[$carIndex]->available = false;
      }
    }
  }

  // Creating car booking system
  $bookingSystem = new CarBookingSystem();

  // Creating car objects
  $car1 = new Car("TATA", "INDICA", true, 10.0, 5, false, "Indica.jpeg");
  $car2 = new Car("HYUNDAI", "XCENT", true, 12.0, 5, true, "Xcent.jpeg");
  $car3 = new Car("SWIFT", "DZIRE", true, 13.0, 5, true, "dzire.jpg");
  $car4 = new Car("TOYOTA", "ETIOS", true, 12.0, 5, true, "Etios.jpg");
  $car5 = new Car("MAHINDRA", "TUV 300", true, 15.0, 7, true, "TUV.jpeg");

  // Adding cars to the booking system
  $bookingSystem->addCar($car1);
  $bookingSystem->addCar($car2);
  $bookingSystem->addCar($car3);
  $bookingSystem->addCar($car4);
  $bookingSystem->addCar($car5);


  // Displaying available cars
  $bookingSystem->displayAvailableCars();
  ?>

  <div class="center-align">
    <button type="button" onclick="window.location.href='home.php'">Back to Home</button>
  </div>

  <footer>
    <p>&copy; 2023 Travel Booking. All rights reserved.</p>
  </footer>
</body>
</html>
