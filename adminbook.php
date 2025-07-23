<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
</head>
<body>

<style>
* {
    margin: 0;
    padding: 0;
}

.hai {
    width: 100%;
    background: linear-gradient(to top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0) 50%), url("./images/bg3.jpg");
    background-position: center;
    background-size: cover;
    height: 109vh;
    animation: infiniteScrollBg 50s linear infinite;
}

.main {
    width: 100%;
    background: linear-gradient(to top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0) 50%);
    background-position: center;
    background-size: cover;
    height: 109vh;
    animation: infiniteScrollBg 50s linear infinite;
}

.navbar {
    width: 1200px;
    height: 75px;
    margin: auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 10px;
    animation: fadeIn 2s ease-out;
}

.icon {
    width: 200px;
    float: left;
    height: 70px;
}

.logo {
    color: #ff7200;
    font-size: 35px;
    font-family: Arial;
    padding-left: 20px;
    float: left;
    padding-top: 10px;
}

.menu {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 600px;
}

ul {
    display: flex;
    justify-content: center;
    align-items: center;
}

ul li {
    list-style: none;
    margin-left: 62px;
    margin-top: 10px;
    font-size: 14px;
    transition: color 0.3s ease;
}

ul li a {
    text-decoration: none;
    color: white;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;
}

ul li:hover a {
    color: #ff7200;
}

.content-table {
    border-collapse: collapse;
    font-size: 1em;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    margin-left: 100px;
    margin-top: 25px;
    width: 1300px;
    height: 300px;
    background-color: rgba(255, 255, 255, 0.6); /* Transparent background */
    animation: fadeInTable 1s ease-out;
}

.content-table thead tr {
    background-color: orange;
    color: white;
    text-align: left;
}

.content-table th,
.content-table td {
    padding: 12px 15px;
}

.content-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
    border-bottom: 2px solid orange;
}

.content-table thead .active-row {
    font-weight: bold;
    color: orange;
}

.header {
    margin-top: -700px;
    margin-left: 650px;
    color: white;
    font-size: 48px;
    font-weight: bold;
    font-family: Arial, sans-serif;
    animation: slideIn 1s ease-out;
    animation: fadeIn 2s ease-in-out, glow 1.5s infinite alternate;
}
@keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

@keyframes glow {
        from {
            text-shadow: 0 0 5px black, 0 0 10px black, 0 0 15px black;
        }
        to {
            text-shadow: 0 0 15px black, 0 0 20px black, 0 0 25px black;
        }
    }

.nn {
    width: 100px;
    border: none;
    height: 40px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color: white;
    transition: 0.4s ease;
    background-color: #ff7200;
}

.nn a {
    text-decoration: none;
    color: black;
    font-weight: bold;
}

.but a {
    text-decoration: none;
    color: black;
}

/* Animations */
@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

@keyframes fadeInTable {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

@keyframes slideIn {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(0);
    }
}

</style>
<?php

require_once('connection.php');
$query="SELECT *from booking ORDER BY BOOK_ID DESC";    
$queryy=mysqli_query($con,$query);
$num=mysqli_num_rows($queryy);


?>

<div class="hai">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Car Rent</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="adminvehicle.php">VEHICLE MANAGEMENT</a></li>
                    <li><a href="adminusers.php">USERS</a></li>
                    <li><a href="admindash.php">FEEDBACKS</a></li>
                    
                    <li><a href="adminbook.php">BOOKING REQUEST</a></li>
                  <li> <button class="nn"><a href="index.php">LOGOUT</a></button></li>
                </ul>
            </div>
         </div>

         </div>
        <div>
            <h1 class="header">BOOKINGS</h1>
            <div>
                <div>
                    <table class="content-table">
                <thead>
                    <tr>
                        <th>CAR ID</th>
                        <th>EMAIL</th>
                        <th>BOOK PLACE</th>
                        <th>BOOK DATE</th>
                        <th>DURATION</th>
                        <th>PHONE NUMBER</th>
                        <th>DESTINATION</th>
                        <th>RETURN DATE</th>
                        <th>BOOKING STATUS</th>
                        <th>CAR RETURNED</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                
                while($res=mysqli_fetch_array($queryy)){
                
                
                ?>
                <tr  class="active-row">
                    
                    <td><?php echo $res['CAR_ID'];?></php></td>
                    <td><?php echo $res['EMAIL'];?></php></td>
                    <td><?php echo $res['BOOK_PLACE'];?></php></td>
                    <td><?php echo $res['BOOK_DATE'];?></php></td>
                    <td><?php echo $res['DURATION'];?></php></td>
                    <td><?php echo $res['PHONE_NUMBER'];?></php></td>
                    <td><?php echo $res['DESTINATION'];?></php></td>
                    <td><?php echo $res['RETURN_DATE'];?></php></td>
                    <td><?php echo $res['BOOK_STATUS'];?></php></td>
                    
                    <td><button type="submit" class="but" name="approve"><a href="adminreturn.php?id=<?php echo $res['CAR_ID']?>&bookid=<?php echo $res['BOOK_ID']?>">RETURNED</a></button></td>
                </tr>
               <?php } ?>
                </tbody>
                </table>
                
                </div>
            </div>
        </div>
</body>
</html>