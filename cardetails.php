<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
</head>

<body class="body">
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
    }

    body {
        background: linear-gradient(to bottom, #1e3c72, #2a5298);
        color: #fff;
        min-height: 100vh;
        font-size: 16px;
    }
    .navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    background-color: rgba(0, 0, 0, 0.7);
    height: 75px;
    position: sticky;
    top: 0;
    z-index: 1000;
}

.menu ul {
    display: flex;
    align-items: center;
    margin: 0;
    padding: 0;
    list-style: none;
}

.menu ul li {
    margin: 0 15px;
    display: flex;
    align-items: center;
}

.menu ul li img.circle {
    border-radius: 50%;
    width: 50px;
    height: 50px;
    object-fit: cover;
    border: 2px solid white;
    margin-left: 15px;
}

.menu ul li .phello {
    margin-left: 10px;
    font-size: 14px;
    color: white;
}

.menu ul li .phello a {
    color: #ff7200;
    font-weight: bold;
    text-decoration: none;
}

.menu ul li #stat {
    color: white;
    font-weight: bold;
    margin-left: 20px;
    text-decoration: none;
}

.nn {
    border: none;
    background: #ff7200;
    color: white;
    padding: 10px 20px;
    border-radius: 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.nn a {
    color: white;
    text-decoration: none;
}

.nn:hover {
    background: #ff5500;
}
    .overview {
        text-align: center;
        font-size: 28px;
        margin: 20px 0;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }

    .car-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 20px;
    }

    .box {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        width: 300px;
    }

    .box:hover {
        transform: translateY(-10px);
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.5);
    }

    .imgBx {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .imgBx img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .box:hover .imgBx img {
        transform: scale(1.1);
    }

    .content {
        padding: 20px;
        text-align: center;
        color: #fff;
    }

    .content h1 {
        font-size: 22px;
        margin-bottom: 10px;
    }

    .content h2 {
        font-size: 16px;
        margin: 5px 0;
    }

    .button {
        background: #ff7200;
        border: none;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 20px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 10px;
    }

    .button:hover {
        background: #ff5500;
    }

    label {
        display: block;
        margin: 10px 0;
        font-size: 14px;
    }

    input[type="date"] {
        padding: 5px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
        margin-bottom: 10px;
    }

    @media screen and (max-width: 768px) {
        .car-container {
            flex-direction: column;
            align-items: center;
        }

        .box {
            width: 90%;
        }

        ul {
            flex-direction: column;
            align-items: center;
        }

        ul li {
            margin: 10px 0;
        }
    }
    
</style>


<?php 
require_once('connection.php');
session_start();

$value = $_SESSION['email'];
$_SESSION['email'] = $value;

if (isset($_POST['check_availability'])) {
    $car_id = $_POST['car_id'];
    $available_from = $_POST['available_from'];
    $available_to = $_POST['available_to'];

    // Query to check if the car is booked within the selected date range
    $sql = "SELECT * FROM booking 
            WHERE CAR_ID = '$car_id' 
            AND (
                ('$available_from' BETWEEN BOOK_DATE AND RETURN_DATE) 
                OR ('$available_to' BETWEEN BOOK_DATE AND RETURN_DATE) 
                OR (BOOK_DATE BETWEEN '$available_from' AND '$available_to') 
                OR (RETURN_DATE BETWEEN '$available_from' AND '$available_to')
            )";

    $result = mysqli_query($con, $sql);

    // Check if any records are returned, which means the car is booked
    if (mysqli_num_rows($result) > 0) {
        // Car is not available
        echo "<script>alert('Sorry, the car is already booked during the selected dates.');</script>";
    } else {
        // Car is available for booking
        // Redirect to booking.php with car ID and other necessary data
        header("Location: booking.php?id=$car_id&available_from=$available_from&available_to=$available_to");
        exit();
    }
}

// Query to get user details
$sql = "SELECT * FROM users WHERE EMAIL='$value'";
$name = mysqli_query($con, $sql);
$rows = mysqli_fetch_assoc($name);

// Query to show all available cars (only those marked 'Y')
$sql2 = "SELECT * FROM cars WHERE AVAILABLE = 'Y'";
$cars = mysqli_query($con, $sql2);
?>

<div class="cd">
    <div class="main">
    <div class="navbar">
    <div class="icon">
        <h2 class="logo">Car Rent</h2>
    </div>
    <div class="menu">
        <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="aboutus.html">ABOUT</a></li>
            <li><a href="contactus.html">CONTACT</a></li>
            <li><a href="feedback/Feedbacks.php">FEEDBACK</a></li>
            <li><button class="nn"><a href="index.php">LOGOUT</a></button></li>
            <li>
                <img src="images/profile.png" class="circle" alt="Profile">
                <p class="phello">HELLO! &nbsp;<a id="pname"><?php echo $rows['FNAME'] . " " . $rows['LNAME']?></a></p>
            </li>
            <li><a id="stat" href="bookinstatus.php">BOOKING STATUS</a></li>
        </ul>
    </div>
</div>

        
        <h1 class="overview">OUR CARS OVERVIEW</h1>

        <!-- Container for cars, applying Flexbox -->
        <div class="car-container">
            <?php
            while ($result = mysqli_fetch_array($cars)) {
            ?>    
            <li>
                <form method="POST" action="cardetails.php">
                    <div class="box">
                        <div class="imgBx">
                            <img src="images/<?php echo $result['CAR_IMG']; ?>">
                        </div>
                        <div class="content">
                            <h1><?php echo $result['CAR_NAME']; ?></h1>
                            <h2>Fuel Type: <a><?php echo $result['FUEL_TYPE']; ?></a></h2>
                            <h2>Capacity: <a><?php echo $result['CAPACITY']; ?></a></h2>
                            <h2>Rent Per Day: <a>₹<?php echo $result['PRICE']; ?>/-</a></h2>

                            <!-- Date inputs for availability check -->
                            <label for="available_from">Start Date:</label>
                            <input type="date" name="available_from" required>
                            <br>
                            <label for="available_to">End Date:</label>
                            <input type="date" name="available_to" required>
                            <br>

                            <input type="hidden" name="car_id" value="<?php echo $result['CAR_ID']; ?>">
                            <button type="submit" name="check_availability" class="button">Check Availability</button>
                        </div>
                    </div>
                </form>
            </li>
            <?php
            }
            ?>
        </div> <!-- End of car-container -->
    </div>
</div>

</body>
</html>
