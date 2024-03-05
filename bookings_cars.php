<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <title>Booking Confirmation | Rent a Ride</title>
    <style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f8f8f8;
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

footer {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
  margin-bottom: 0px;
}

footer p {
  margin: 0;
}

h2 {
  color: #333;
}

.success-message {
  margin-top: 20px;
  padding: 10px;
  background-color: #e6f7e9;
  border: 1px solid #52c41a;
  border-radius: 4px;
  text-align: center;
}

.success-message p {
  margin: 0;
  color: #52c41a;
}

.booking-details {
  margin-top: 20px;
  padding: 10px;
  background-color: #f5f5f5;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.booking-details p {
  margin: 10px 0;
}

.back-buttons {
  text-align: center;
  margin-top: 20px;
  margin-bottom: 20px;
}

.back-buttons a {
  display: inline-block;
  padding: 10px 20px;
  background-color: olivedrab;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
  margin-right: 10px;
}

.back-buttons a:hover {
  background-color: #0056b3;
}



</style>
</head>
<body>

<header>
    <center><img src="logo.png" alt="Logo" height="60px" width="60px"></center>
    <h1>Rent a Ride</h1>
    <nav>
      <ul>
        <li><a href="home.php">Home</a></li>
      </ul>
    </nav>
  </header>

    <center><h2>Booking Confirmation</h2></center>

    <?php
	session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_SESSION['username'])) {
        // Retrieve form data
        $carIndex = $_POST['car_index'] ?? '';
        $startDate = $_POST['start_date'] ?? '';
        $endDate = $_POST['end_date'] ?? '';
        $startLocation = $_POST['start_location'] ?? '';
        $destination = $_POST['destination'] ?? '';

        if ($carIndex === '' || $startDate === '' || $endDate === '' || $startLocation === '' || $destination === '') {
            echo "<p>Please fill in all the required fields.</p>";
        } elseif ($endDate < $startDate) {
            echo "<p>End date cannot be before the start date.</p>";
        } else {
            // Create car booking system
            class Car {
                public $make;
                public $model;

                public function __construct($make, $model) {
                    $this->make = $make;
                    $this->model = $model;
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

    public function isCarAvailable($carIndex, $startDate, $endDate) {
    // Check if the car is available for the selected date range
    $selectedCar = $this->cars[$carIndex] ?? null;
    if ($selectedCar === null) {
        return false;
    }

    // Retrieve existing bookings from the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement to retrieve existing bookings for the selected car and date range
    $stmt = $conn->prepare("SELECT * FROM booking_car WHERE carname = ? AND ((startdate <= ? AND enddate >= ?) OR (startdate <= ? AND enddate >= ?) OR (startdate >= ? AND enddate <= ?) OR (startdate <= ? AND enddate >= ?))");
    $stmt->bind_param("sssssssss", $carName, $startDate, $startDate, $endDate, $endDate, $startDate, $endDate, $startDate, $endDate);

    // Set the values for the SQL statement
    $carName = $selectedCar->make . " " . $selectedCar->model;

    // Execute the SQL statement
    $stmt->execute();

    // Check if there are any conflicting bookings
    $result = $stmt->get_result();
    $bookingCount = $result->num_rows;

    // Close the database connection
    $stmt->close();
    $conn->close();

    return $bookingCount === 0;
             
                }
            }

            // Retrieve car details from the booking system
            $bookingSystem = new CarBookingSystem();

            // Creating car objects
            $car1 = new Car("Tata", "Indica");
            $car2 = new Car("Hyundai", "Xcent");
            $car3 = new Car("SWIFT", "DZIRE");
            $car4 = new Car("Toyota", "Etios");
            $car5 = new Car("Mahindra", "TUV 300");

            // Adding cars to the booking system
            $bookingSystem->addCar($car1);
            $bookingSystem->addCar($car2);
            $bookingSystem->addCar($car3);
            $bookingSystem->addCar($car4);
            $bookingSystem->addCar($car5);


            // Retrieve the selected car
            $selectedCar = $bookingSystem->cars[$carIndex] ?? null;

            if ($selectedCar === null) {
                echo "<p>Invalid car selection.</p>";
            } elseif (!$bookingSystem->isCarAvailable($carIndex, $startDate, $endDate)) {
                echo "<center><p>The selected car is not available for the selected date range.</p></center>";
            } else {
                // Display the booking details
                echo "<center><h2>Booking Successful</h2></center>";
                echo "<center><p>You have successfully booked the car.</p></center>";
                echo "<center><p>Car: " . $selectedCar->make . " " . $selectedCar->model . "</p></center>";
                echo "<center><p>Start Date: " . $startDate . "</p></center>";
                echo "<center><p>End Date: " . $endDate . "</p></center>";
                echo "<center><p>Start Location: " . $startLocation . "</p></center>";
                echo "<center><p>Destination: " . $destination . "</p></center>";

                // Insert booking details into the database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "project";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Prepare and bind the SQL statement
                $stmt = $conn->prepare("INSERT INTO booking_car (username, carname, startdate, enddate, startlocation, endlocation) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $username, $carName, $startDate, $endDate, $startLocation, $destination);

                // Set the values for the SQL statement
                $username = $_SESSION['username']; // Replace with the actual username
                $carName = $selectedCar->make . " " . $selectedCar->model;

                // Execute the SQL statement
                if ($stmt->execute()) {
                    echo "<center><p> Thank you for booking @Rent a Ride</p></center>";
                } else {
                   echo "<p>Error inserting booking details: " . $stmt->error . "</p>";
                }

                // Close the database connection
                $stmt->close();
                $conn->close();
            }
        }
    } else {
        echo "<p>Invalid Request</p>";
    }
	}
    ?>
<div class="back-buttons">
        <a href="cars.php">Back to Cars</a>
        <a href="home.php">Back to Home</a>
    </div>

    <footer>
    <p>&copy; 2023 Travel Booking. All rights reserved.</p>
  </footer> 

</body>
</html>