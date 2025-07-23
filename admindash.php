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
        box-sizing: border-box;
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
    }

    .icon {
        width: 200px;
        height: 70px;
    }

    .logo {
        color: #ff7200;
        font-size: 35px;
        font-family: Arial;
        padding-left: 20px;
        float: left;
        padding-top: 10px;
        transition: all 0.3s ease;
    }

    .logo:hover {
        color: #d65d0e;
        transform: scale(1.1);
    }

    .menu {
        display: flex;
        align-items: center;
    }

    ul {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    ul li {
        list-style: none;
        margin-left: 62px;
        margin-top: 27px;
        font-size: 14px;
        position: relative;
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
        transform: scale(1.05);
    }

    /* Table styles with transparent background */
    .content-table {
        border-collapse: collapse;
        font-size: 0.9em;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        margin-left: 350px;
        margin-top: 25px;
        width: 800px;
        height: auto;
        background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
        animation: fadeIn 1s ease-in-out;
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

    .content-table thead tr {
        background-color: orange;
        color: white;
        text-align: left;
    }

    .content-table th, .content-table td {
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
        margin-top: 70px;
        margin-left: 650px;
        color: white;
        font-size: 36px;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        animation: slideIn 1s ease-in-out;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(50px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .nn {
        width: 120px;
        background: #ff7200;
        border: none;
        height: 40px;
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        color: white;
        transition: 0.4s ease;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .nn:hover {
        background: #d65d0e;
        transform: scale(1.05);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    }

    .nn a {
        text-decoration: none;
        color: white;
        font-weight: bold;
    }

    .nn:focus {
        outline: none;
    }
</style>

</head>
<body>

<?php
require_once('connection.php');
$query = "SELECT * FROM feedback";
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

    <div>
        <h1 class="header">FEEDBACKS</h1>
        <div>
            <div>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>FEEDBACK_ID</th>
                            <th>EMAIL</th>
                            <th>COMMENT</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($res = mysqli_fetch_array($queryy)) { ?>
                        <tr class="active-row">
                            <td><?php echo $res['FED_ID']; ?></td>
                            <td><?php echo $res['EMAIL']; ?></td>
                            <td><?php echo $res['COMMENT']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
