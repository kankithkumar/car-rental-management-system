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
    box-sizing: border-box;
}

.hai {
    width: 100%;
    background: linear-gradient(to top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0) 50%), url("./images/bg3.jpg");
    background-position: center;
    background-size: cover;
    height: 100vh;
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
    height: 70px;
}

.logo {
    color: #ff7200;
    font-size: 35px;
    font-family: Arial, sans-serif;
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
    padding: 0;
}

ul li {
    list-style: none;
    margin-left: 30px;
    margin-top: 15px;
    font-size: 16px;
    font-weight: bold;
    transition: color 0.3s ease;
}

ul li a {
    text-decoration: none;
    color: white;
    transition: color 0.4s ease-in-out;
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
    margin-left: 350px;
    margin-top: 30px;
    width: 800px;
    height: auto;
    background-color: rgba(255, 255, 255, 0.6); /* Transparent background */
    animation: fadeInTable 1s ease-out;
}

.content-table thead tr {
    background-color: orange;
    color: white;
    text-align: left;
    font-weight: bold;
}

.content-table th,
.content-table td {
    padding: 12px 15px;
}

.content-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
    background-color: #f9f9f9;
}

.content-table tbody tr:hover {
    background-color: rgba(255, 165, 0, 0.1);
}

.content-table tbody tr:last-of-type {
    border-bottom: 2px solid orange;
}

.content-table thead .active-row {
    font-weight: bold;
    color: orange;
}

.header {
    margin-top: 70px;
    margin-left: 650px;
    color: white;
    font-size: 40px;
    font-family: Arial, sans-serif;
    animation: slideIn 1s ease-out;
}

.nn {
    width: 100px;
    border: none;
    height: 40px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color: white;
    background-color: #ff7200;
    transition: 0.4s ease;
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

@keyframes infiniteScrollBg {
    0% {
        background-position: 0 0;
    }
    100% {
        background-position: 100% 0;
    }
}
 
</style>
<?php

require_once('connection.php');
$query="select *from users";
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
        <div>
            <h1 class="header">USERS</h1>
            <div>
                <div>
                    <table class="content-table">
                <thead>
                    <tr>
                        <th>NAME</th> 
                        <th>EMAIL</th>
                        <th>LICENSE NUMBER</th>
                        <th>PHONE NUMBER</th> 
                        <th>GENDER</th> 
                        <th>DELETE USERS</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                
                while($res=mysqli_fetch_array($queryy)){
                
                
                ?>
                <tr  class="active-row">
                    <td><?php echo $res['FNAME']."  ".$res['LNAME'];?></php></td>
                    <td><?php echo $res['EMAIL'];?></php></td>
                    <td><?php echo $res['LIC_NUM'];?></php></td>
                    <td><?php echo $res['PHONE_NUMBER'];?></php></td>
                    <td><?php echo $res['GENDER'];?></php></td>
                    <td><button type="submit" class="but" name="approve"><a href="deleteuser.php?id=<?php echo $res['EMAIL']?>">DELETE USER</a></button></td>
                </tr>
               <?php } ?>
                </tbody>
                </table>
                </div>
            </div>
        </div>
</body>
</html>