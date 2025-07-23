<!doctype html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="Stylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #F7CAC9, #0F4C81);
            background-size: 400% 400%;
            animation: gradientAnimation 8s ease infinite;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        #form {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            padding: 30px;
            width: 80%;
            max-width: 800px;
            margin: auto;
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2.contact-us {
            font-size: 3.5rem;
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        label {
            color: #fff;
            font-size: 1.2rem;
        }

        input.form-control, textarea.form-control {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            color: #000;
            margin-bottom: 20px;
            padding: 10px;
        }

        input.form-control::placeholder,
        textarea.form-control::placeholder {
            color: #666;
        }

        input#btn {
            width: 100%;
            background: #ff7200;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 15px;
            font-size: 1.2rem;
            border-radius: 8px;
            transition: 0.3s ease;
			top: 350px;
        }

        input#btn:hover {
            background: #d65d0e;
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
        }

        .btn {
            width: 150px;
            background: #ff7200;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 10px;
            font-size: 18px;
            border-radius: 5px;
            transition: 0.3s ease;
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .btn:hover {
            background: #d65d0e;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
        }

        .btn a {
            text-decoration: none;
            color: #fff;
        }

        /* Additional hover effects and styling */
        input#btn:active {
            background: #ff6600;
        }

        label:hover {
            color: #ffcc00;
            cursor: pointer;
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(255, 114, 0, 0.8);
        }
    </style>
</head>
<body>
<?php
require_once('../connection.php');
session_start();
$email = $_SESSION['email'];

if (isset($_POST['submit'])) {
    $comment = mysqli_real_escape_string($con, $_POST['comment']);
    $sql = "INSERT INTO feedback (EMAIL, COMMENT) VALUES ('$email', '$comment')";
    $result = mysqli_query($con, $sql);
    echo '<script>alert("Feedback Sent Successfully!! THANK YOU!!")</script>';
    header("Location: ../cardetails.php");
}
?>

<button class="btn">
    <a href="../cardetails.php">Go To Home</a>
</button>

<div id="form">
    <div class="col-md-12" id="mainform">
        <div class="col-sm-6">
            <h2 class="contact-us"><strong style="font-size: 5rem; color: #ff7200;">F</strong>eedback</h2>
        </div>
        <div class="col-sm-6">
            <form method="POST">
                <label><h4>Name:</h4></label>
                <input type="text" name="name" size="20" class="form-control" placeholder="User Name" required>
                <label><h4>Email:</h4></label>
                <input type="email" name="email" size="20" class="form-control" placeholder="User Email" required>
                <h4>Comments:</h4>
                <textarea class="form-control" name="comment" rows="6" placeholder="Message" required></textarea>
                <div class="form-group">
                    <input type="submit" class="btn" id="btn" value="SUBMIT" name="submit">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
