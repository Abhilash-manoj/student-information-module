<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>xyzschool </title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
  include ("navbar.php");
  ?>
<div id="form">
    <form action="forgotpassword.php" method="POST">
      <h1>Reset Password</h1>
      <label>Enter Email:</label>
            <input type="email" id="email" name="email"  placeholder="Email should be valid " required><br><br>
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
      <input type="submit" id="btn" name="submit" value="Reset Password"><br><br>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>



<?php
  include ("connection.php");
if (isset($_POST["submit"])) {  
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password =mysqli_real_escape_string($conn,$_POST['password']);
    $confirm_password =mysqli_real_escape_string($conn,$_POST['confirm_password']);

if($password==$confirm_password){
    $sql = "SELECT `password` FROM `main` WHERE  email='$email'";;
    $result = mysqli_query($conn,$sql);
    $count_email = mysqli_num_rows($result);

    if( $count_email==1){
            $hash = $password;
            $sql = "UPDATE `main` SET `password`='$hash' WHERE email='$email'";
            $result = mysqli_query($conn,$sql) ;
            header("Location:index.php");
    }
          
        }
        else{
            echo  '<script>
            alert(" This Email ID does not exist!!!");
            window.location.href = "forgotpassword.php"
      </script>' ;

        }
        if($password==$confirm_password){
            $sql = "SELECT `password` FROM `teacher` WHERE  email='$email'";;
            $result = mysqli_query($conn,$sql);
            $count_email = mysqli_num_rows($result);
    
    
    if( $count_email==1){
        $hash = $password;
        $sql = "UPDATE `teacher` SET `password`='$hash' WHERE email='$email'";
        $result = mysqli_query($conn,$sql) ;
}
        }
        if($password==$confirm_password){
            $sql = "SELECT `password` FROM `student` WHERE  email='$email'";;
            $result = mysqli_query($conn,$sql);
            $count_email = mysqli_num_rows($result);
    
    
    if( $count_email==1){
        $hash = $password;
        $sql = "UPDATE `student` SET `password`='$hash' WHERE email='$email'";
        $result = mysqli_query($conn,$sql) ;
}
        }
        else{
            echo  '<script>
            alert("Password do not match!!!");
            window.location.href = "forgotpassword.php";
      </script>';
        }
    }
    mysqli_close($conn);
     ?>