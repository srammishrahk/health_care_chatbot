<?php
if (isset($_POST['loginbtn'])) {
    $host = 'localhost';
$user = 'root';
$password = '';
$database = 'chat';

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    echo "<script>alert(\"Database error retry after some time !\")</script>";
}
    if (isset($_POST['username']) && isset($_POST['password'])) {

        
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $sql = "select * from user where username='{$username}'";
        $res =   mysqli_query($conn, $sql);
        if ($res == true) {
            global $dbusername, $dbpw;
            while ($row = mysqli_fetch_array($res)) {
                $dbpw = $row['password'];
                $dbusername = $row['username'];
                $dbuser_id = $row['user_id'];
                $_SESSION["full_name"] = $row['full_name'];
                $_SESSION["username"] = $dbusername;
                $_SESSION["user_id"] = $dbuser_id;
            }
            if ($dbpw === $password) {
                echo "<script>alert('login sucessfully!');</script>";
                header("Location: base.html");
            }
            elseif ($dbpw !== $password && $dbusername === $username) {
                echo "<script>alert('password is wrong');</script>";
            } elseif ($dbpw !== $password && $dbusername !== $username) {
                echo "<script>alert('username name not found sing up');</script>";
            }
        }
        
    }
}
?>




<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="lostyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>
<body>
<div class="container" id="container">
    <div class="form-container log-in-container">
        <form method="post">
            <h1>Login</h1>
            
            
            <input type="username" name="username" placeholder="Username" required/>
            <input type="password" name ="password" placeholder="Password" required />
            
            <a href="register.php">New User! Register here</a>
            <button type="submit" name="loginbtn">Log In</button>
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