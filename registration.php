<?php
include ("connection.php");
session_start();
 if(isset($_POST['submit'])){
    $username =mysqli_real_escape_string($conn,$_POST['user']);
    $password = mysqli_real_escape_string($conn,$_POST['pass']);
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $age = mysqli_real_escape_string($conn,$_POST['age']);
    $DOB = mysqli_real_escape_string($conn,$_POST['DOB']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $teacher=$_SESSION["teacher"];
    

    $sql = "SELECT * FROM `student` WHERE  username='$username'";
    $result = mysqli_query($conn,$sql);
    $count_user = mysqli_num_rows($result);

    
    $sql = "SELECT * FROM `student` WHERE email='$email'";
    $result = mysqli_query($conn,$sql);
    $count_email = mysqli_num_rows($result);

    if($count_user==0 || $count_email==0){
            $sql = "INSERT INTO `student`(`teacher id`, `username`, `password`, `name`, `age`, `DOB`, `Address`, `phone.no`, `email`) values('$teacher','$username','$password','$name','$age','$DOB','$address','$phone','$email')";
            $result = mysqli_query($conn,$sql) ;
            $sql = "SELECT * FROM `student` WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $student=$row["student id"];
            $identitiy=$row["identity"];
            $sql = "insert into main(username,email,password,identitiy) values('$username','$email','$hash','$identitiy')";
            $result = mysqli_query($conn,$sql);
            $sql = "INSERT INTO `marks`(`student id`) VALUES ('$student')";
            $result = mysqli_query($conn,$sql);
            $_SESSION["username"] = "$username";
            $_SESSION["password"] = "$password";
              header("Location: student.php");
    }
    else{

       echo' <script> alert("User already exists!!");
        window.location.href = "registration.php";
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
        <h1>Registration Form</h1>
        <form name="form" action="registration.php" method="post">
            <label for="username">Username <span class="required">*</span>:</label>
            <input type="text" id="user" name="user" placeholder="Username should not contain special characters" ><br>
            <label  for="Enter Password">Enter Password <span class="required">*</span> :</label>
            <input type="password" id="pass" name="pass" placeholder="Password should be atleast 8 characters"><br>
            <label  for="name">Enter Name <span class="required">*</span> :</label>
            <input type="text" id="name" name="name"><br>
            <label  for="Enter age">Enter Age <span class="required">*</span> :</label>
            <input type="age" id="age" name="age"><br>
            <label  for="Enter DOB">Enter Date of Birth <span class="required">*</span> :</label>
            <input type="date" id="DOB" name="DOB"><br>
            <label  for="Enter address">Enter Address<span class="required">*</span> :</label>
            <input type="text" id="address" name="address"><br>
            <label  for="Enter Phone.no">Enter Phone.No <span class="required">*</span> :</label>
            <input type="phone.no" id="phone" name="phone"><br>
            <label  for="Enter Email">Enter Email <span class="required">*</span> :</label>
            <input type="email" id="email" name="email"  placeholder="Email should be valid "><br><br>
            <button onclick="clearfield()" id="clear">Clear</button><br><br>
            <input type="submit" id="btn" value="Submit" name="submit"><br><br>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>