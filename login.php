<?php
include "connection.php";
session_start();
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    $sql = "SELECT * FROM `student` WHERE username = '$username' or email='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if($row){
        if($password==$row["password"]){
          $_SESSION["username"] = $username;
          $_SESSION["password"] = $password;
          $_SESSION["student id"] = $studentid;
            header("Location: student.php");
        }
    }
    else{
          echo'<script>
        alert("Invalid Username or password!!");
        window.location.href = "login.php"
        </script>';

    }
}
mysqli_close($conn);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>xyzschool</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
  </head>
  <body>
  <?php
  include ("navbar.php");
  ?>
    <div id="form">
        <h1>Login Form</h1>
        <form id="myform" name="form" action="login.php" method="post">
            <label>Enter Username/Email<span class="required">*</span> :</label>
            <input type="text" id="user" name="user" required><br><br>
            <label>Enter Password<span class="required">*</span> :</label>
            <input type="password" id="pass" name="pass" required><br><br>
            <input type="submit" id="btn" value="Login" name="submit" ><br>
            <a href="forgotpassword.php">Forgot Password</a>
                  </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>