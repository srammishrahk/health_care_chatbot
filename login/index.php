<?php

if (isset($_POST['login'])) {
    echo "<script>
    window.location.replace(\"login.php\");</script>";
}
if (isset($_POST['register'])) {
    echo "<script>
    window.location.replace(\"register.php\");</script>";
}

if (isset($_POST['registerdoc'])) {
    echo "<script>
    window.location.replace(\"docregister.php\");</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="lostyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Health Chatbot</title>
</head>
<body>
<div class="container" id="container">
    <div class="form-container log-in-container">
        <form method="post"> 
            <a>If you have a account</a>
            <div> 
            <button type="submit" name="login">Click Here</button>
            <!-- <button name="login"><a href="base.html"> Click Here</a></button>                                          -->
            </div>
            <a >If you are a new user</a>
            <div>
            <button type="submit" name="register">Click Here</button>
            </div>
            <a >If you are a expert in health field</a>
            <div>
            <button type="submit" name="registerdoc">Click here</button>
            </div>
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