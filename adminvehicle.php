<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
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

        .navbar {
            width: 1200px;
            height: 75px;
            margin: auto;
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
            width: 400px;
            float: left;
            height: 70px;
        }

        ul {
            float: left;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        ul li {
            list-style: none;
            margin-left: 62px;
            margin-top: 27px;
            font-size: 14px;
        }

        ul li a {
            text-decoration: none;
            color: white;
            font-family: Arial;
            font-weight: bold;
            transition: 0.4s ease-in-out;
        }

        ul li a:hover {
            color: #ff7200;
        }

        .content-table {
            border-collapse: collapse;
            font-size: 1em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            margin-left: 100px;
            margin-top: 25px;
            width: 1300px;
            height: 300px;
            background-color: rgba(255, 255, 255, 0.8); /* Transparent table */
        }

        .content-table thead tr {
            background-color: orange;
            color: white;
            text-align: left;
        }

        .content-table th, .content-table td {
            padding: 12px 15px;
            color: #333;
        }

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .content-table tbody tr:nth-of-type(even) {
            background-color: rgba(240, 240, 240, 0.8);
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
        animation: fadeIn 2s ease-in-out, glow 1.5s infinite alternate;
    }

    /* Animation for fading in the heading */
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

    /* Animation for glowing effect */
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
            background: #ff7200;
            transition: 0.4s ease;
        }

        .nn a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        .nn:hover {
            background-color: white;
            color: #ff7200;
        }

        .add {
            width: 200px;
            height: 40px;
            background: #ff7200;
            border: none;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color: #fff;
            transition: 0.4s ease;
            margin-left: 1200px;
        }

        .add a {
            text-decoration: none;
            color: white;
            font-weight: bolder;
        }

        .add:hover {
            background-color: white;
            color: #ff7200;
        }

        .but a {
            text-decoration: none;
            color: black;
        }

        .but:hover a {
            color: #ff7200;
        }
    </style>
</head>
<body>
    <?php
        require_once('connection.php');
        $query = "SELECT * FROM cars";
        $queryy = mysqli_query($con, $query);
        $num = mysqli_num_rows($queryy);
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
                    <li><button class="nn"><a href="index.php">LOGOUT</a></button></li>
                </ul>
            </div>
        </div>
    </div>
    <div>
        <h1 class="header">CARS</h1>
        <button class="add"><a href="addcar.php">+ ADD CARS</a></button>
        <div>
            <div>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>CAR ID</th>
                            <th>CAR NAME</th>
                            <th>FUEL TYPE</th>
                            <th>CAPACITY</th>
                            <th>PRICE</th>
                            <th>AVAILABLE</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($res = mysqli_fetch_array($queryy)) { ?>
                        <tr class="active-row">
                            <td><?php echo $res['CAR_ID']; ?></td>
                            <td><?php echo $res['CAR_NAME']; ?></td>
                            <td><?php echo $res['FUEL_TYPE']; ?></td>
                            <td><?php echo $res['CAPACITY']; ?></td>
                            <td><?php echo $res['PRICE']; ?></td>
                            <td><?php echo $res['AVAILABLE'] == 'Y' ? 'YES' : 'NO'; ?></td>
                            <td><button type="submit" class="but" name="approve"><a href="deletecar.php?id=<?php echo $res['CAR_ID']; ?>">DELETE CAR</a></button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
