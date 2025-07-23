<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING STATUS</title>
</head>
<body>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', Arial, sans-serif;
    background: url('images/bg1.jpg') no-repeat center center fixed; /* Add your image URL */
    background-size: cover; /* Ensures the image covers the entire screen */
    height: 100vh;
    color: #fff;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    padding: 20px;
}


@keyframes gradientBackground {
    0% { background: linear-gradient(120deg, #1e3c72, #2a5298); }
    100% { background: linear-gradient(120deg, #2a5298, #1e3c72); }
}

/* Home Button */
.utton {
    position: absolute;
    top: 20px;
    right: 20px;
    width: 150px;
    height: 45px;
    background: #ff7200;
    border: none;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    color: #fff;
    transition: 0.4s ease;
    text-align: center;
    line-height: 45px;
}

.utton:hover {
    background: #d65d0e;
    transform: scale(1.1);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
}

.utton a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}

/* Name Section */
.name {
    margin-top: 80px; /* Ensure it doesn't overlap the box */
    font-size: 1.8rem;
    font-weight: bold;
    color: #fff;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    animation: textPop 1s ease-in-out;
}

@keyframes textPop {
    0% { transform: scale(0.8); opacity: 0; }
    100% { transform: scale(1); opacity: 1; }
}

/* Booking Box */
.box {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    padding: 40px;
    text-align: center;
    width: 600px;
    animation: fadeIn 1.5s ease-in-out;
    backdrop-filter: blur(10px);
    margin-top: 20px; /* Add spacing from name */
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

.box h1 {
    font-size: 1.8rem;
    margin: 20px 0;
    color: #fdfdfd;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    animation: fadeInText 1s ease-in-out;
}

@keyframes fadeInText {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Particle Effect */
.particles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: -1;
}

.particles span {
    position: absolute;
    width: 8px;
    height: 8px;
    background: rgba(255, 255, 255, 0.7);
    border-radius: 50%;
    animation: float 8s infinite ease-in-out;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-30px); }
}

.particles span:nth-child(1) {
    top: 10%; left: 20%; animation-delay: 0s;
}
.particles span:nth-child(2) {
    top: 30%; left: 70%; animation-delay: 1.5s;
}
.particles span:nth-child(3) {
    top: 50%; left: 40%; animation-delay: 3s;
}
.particles span:nth-child(4) {
    top: 80%; left: 10%; animation-delay: 4.5s;
}
.particles span:nth-child(5) {
    top: 60%; left: 90%; animation-delay: 6s;
}
.cancel-btn {
        width: 200px;
        height: 45px;
        background: #ff4500; /* Bright red color for cancel button */
        border: none;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
        color: #fff;
        transition: 0.4s ease;
        text-align: center;
        line-height: 45px;
        margin-top: 20px; /* Spacing below content */
        display: inline-block;
    }

    .cancel-btn:hover {
        background: #d43d0d;
        transform: scale(1.1);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
    }

    .cancel-btn a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
    }

</style>

<?php
require_once('connection.php');
session_start();
$email = $_SESSION['email'];

// Fetch the latest booking for the user
$sql = "SELECT * FROM booking WHERE EMAIL = '$email' ORDER BY BOOK_ID DESC LIMIT 1";
$result = mysqli_query($con, $sql);
$booking = mysqli_fetch_assoc($result);

if ($booking == null || $booking['BOOK_STATUS'] == 'RETURNED' || strtotime($booking['RETURN_DATE']) < time()) {
    // No booking found or the booking is already returned/expired
    echo "<div class='box'>
            <h1>No car is currently booked.</h1>
            <button class='utton'><a href='cardetails.php'>Go to Home</a></button>
          </div>";
} else {
    // Fetch user details
    $sql2 = "SELECT * FROM users WHERE EMAIL = '$email'";
    $result2 = mysqli_query($con, $sql2);
    $user = mysqli_fetch_assoc($result2);

    // Fetch car details
    $car_id = $booking['CAR_ID'];
    $sql3 = "SELECT * FROM cars WHERE CAR_ID = '$car_id'";
    $result3 = mysqli_query($con, $sql3);
    $car = mysqli_fetch_assoc($result3);

    // Display booking details
    echo "
    <ul>
        <li><button class='utton'><a href='cardetails.php'>Go to Home</a></button></li>
    </ul>
    <div class='box'>
        <div class='name'>{$user['FNAME']} {$user['LNAME']}</div>
        <div class='content'>
            <h1>CAR NAME : {$car['CAR_NAME']}</h1><br>
            <h1>NO OF DAYS : {$booking['DURATION']}</h1><br>
            <h1>BOOKING STATUS : {$booking['BOOK_STATUS']}</h1><br>
            <h1>END DATE : {$booking['RETURN_DATE']}</h1><br>
            <button class='cancel-btn'>
                <a href='cancelbooking.php?id={$booking['BOOK_ID']}'>Cancel Booking</a>
            </button>
        </div>
    </div>";
}
?>
</body>
</html>
