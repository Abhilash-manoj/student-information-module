<?php
include ("connection.php");
 if(isset($_POST['submit'])){
    $username =mysqli_real_escape_string($conn,$_POST['user']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['pass']);
    $cpassword = mysqli_real_escape_string($conn,$_POST['cpass']);

    $sql = "select * from teacher where username='$username'";
    $result = mysqli_query($conn,$sql);
    $count_user = mysqli_num_rows($result);

    
    $sql = "select * from teacher where email='$email'";
    $result = mysqli_query($conn,$sql);
    $count_email = mysqli_num_rows($result);

    if($count_user==0 || $count_email==0){
        if($password==$cpassword){
            $hash = $password;
            $sql = "insert into teacher(username,email,password) values('$username','$email','$hash')";
            $result = mysqli_query($conn,$sql) ;
            
            $sql = "SELECT * FROM `teacher` WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $identitiy=$row["identity"];
            $sql = "INSERT INTO `main`(`username`, `email`, `password`, `identitiy`) VALUES ('$username','$email','$hash','$identitiy')";
            $result = mysqli_query($conn,$sql);

            header("Location: teacher.php");


        }
        else{

          echo  '<script>
            alert("Passwords do not match!!!");
            window.location.href = "signup.php";
      </script>' ; }

    }
    else{

       echo' <script> alert("User already exists!!");
        window.location.href = "signup.php";
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
        <h1>Signup Form</h1>
        <form name="form" action="signup.php" method="post">
            <label for="username">Username <span class="required">*</span>:</label>
            <input type="text" id="user" name="user" placeholder="Username should not contain special characters" required><br>
            <label  for="Enter Email">Enter Email <span class="required">*</span> :</label>
            <input type="email" id="email" name="email"  placeholder="Email should be valid " required><br>
            <label  for="Enter Password">Enter Password <span class="required">*</span> :</label>
            <input type="password" id="pass" name="pass" placeholder="Password should be atleast 8 characters" required><br>
            <label  for="Retype Password">Retype Password <span class="required">*</span>:</label>
            <input type="password" id="cpass" name="cpass" required><br><br>
            <input type="submit" id="btn" value="signup" name="submit">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>