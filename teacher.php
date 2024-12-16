<?php
include "connection.php";
if(isset($_POST['submit'])){
    header("Location:registration.php");
    
    }
    elseif(isset($_POST["confirm"])){
    header("Location:signup.php");
}

elseif(isset($_POST["view"])){
  header("Location:view.php");
}


?><!doctype html>
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
        <h1>Signup Form</h1>
        <form name="form" action="teacher.php" method="post">
         <input type="submit" id="btn" value="Register Student" name="submit"><br><br>
            <input type="submit" id="btn" value="signup" name="confirm"><br><br>
            <input type="submit" id="btn" value="view students" name="view"><br><br>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>