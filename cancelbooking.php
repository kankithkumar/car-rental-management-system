<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANCEL BOOKING</title>
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
        background: linear-gradient(120deg, #1e3c72, #2a5298);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        color: white;
    }

    .form-container {
        text-align: center;
        background: rgba(255, 255, 255, 0.1); /* Semi-transparent box */
        padding: 30px 50px;
        border-radius: 15px;
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(10px);
        animation: fadeIn 1.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h1 {
        font-size: 2rem;
        margin-bottom: 30px;
        color: white;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }

    .hai,
    .no {
        width: 200px;
        height: 45px;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        margin: 10px;
        cursor: pointer;
        color: #fff;
        transition: 0.3s ease-in-out;
        text-align: center;
    }

    .hai {
        background: #e74c3c; /* Bright red for cancel */
    }

    .hai:hover {
        background: #c0392b;
        transform: scale(1.1);
        box-shadow: 0 8px 20px rgba(231, 76, 60, 0.7);
    }

    .no {
        background: #27ae60; /* Bright green for Go Home */
    }

    .no:hover {
        background: #219150;
        transform: scale(1.1);
        box-shadow: 0 8px 20px rgba(39, 174, 96, 0.7);
    }

    .no a {
        text-decoration: none;
        color: white;
        display: block;
        line-height: 45px;
    }

    /* Add particles effect */
    .particles {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
    }

    .particles span {
        position: absolute;
        display: block;
        width: 10px;
        height: 10px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        animation: animate 10s linear infinite;
    }

    @keyframes animate {
        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 1;
        }
        100% {
            transform: translateY(-100vh) rotate(360deg);
            opacity: 0;
        }
    }

    .particles span:nth-child(odd) {
        animation-duration: 7s;
    }

    .particles span:nth-child(even) {
        animation-duration: 12s;
    }
</style>

<?php
	
    require_once('connection.php');
    session_start();
    $bid = $_SESSION['bid'];
    if(isset($_POST['cancelnow'])){
        $del = mysqli_query($con,"delete from booking where BOOK_ID = '$bid' order by BOOK_ID DESC limit 1");
        echo "<script>window.location.href='cardetails.php';</script>";
        
    }


?>
 <form class="form"  method="POST" >
        <h1>ARE YOU SURE YOU WANT TO CANCEL YOUR BOOKING?</h1>
        <input  type="submit" class="hai" value="CANCEL NOW" name="cancelnow">
        <button class="no"><a href="cardetails.php" >GO TO HOME</a></button>
    </form>
</body>
</html>
