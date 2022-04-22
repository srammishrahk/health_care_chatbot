<?php



if (isset($_POST['addtouserbtn'])) {
    
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'chat';

    $conn = mysqli_connect($host, $user, $password, $database);
    if (!$conn) {
        echo "<script>alert(\"Database error retry after some time !\")</script>";
    }

    if (isset($_POST['full_name']) && isset($_POST['phone_no']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password'])){
        
        $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
        $phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
        if ($password == $confirm_password) {
            $sql = "insert into user (full_name,phone_no,email,username,password) values('$full_name','$phone_no','$email','$username','$password')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>
                alert('successful!');
                window.location.replace(\"login.php\");</script>";
                
            } else {
                echo "<script>
                alert('Data enter by you alreay exist in Database please Sign In');
                window.location.replace(\"login.php\");</script>";
                
            }
        } else {
            echo "<script>
                alert(' Password should be same');
                window.location.replace(\"register.php\");</script>";
            
        }
    }
}

?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="lostyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register</title>
</head>
<body>
<div class="container" id="container">
    <div class="form-container log-in-container">
        <form method="post">
            <h1>Register</h1>
            <span></span>
            <input type="text" name="full_name" placeholder="Full Name" required/>
            <input type="tel" name="phone_no" placeholder="Phone Number" required/>
            <input type="email" name="email" placeholder="Email" required/>
            <input type="text" name="username"  placeholder="Username" required/>
            <input type="password" name="password" placeholder="Password" required/>
            <input type="confpassword" name="confirm_password" placeholder="Confirm Password" required/>
            <button type="submit" name="addtouserbtn">Register Now</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-right">
                <h1>Healthcare Chatbot</h1>
            </div>
        </div>
    </div>
</div>
</body>
</html>