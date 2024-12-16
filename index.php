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
    <?php
    
include ("connection.php");
session_start();
if(isset($_POST['confirm'])){
  header("Location:signup.php");
}
elseif(isset($_POST['submit'])){
if(isset($_POST['id'])){
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $person=$_POST["id"];

    $sql = "SELECT * FROM `main` WHERE username ='$username' or email= '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if($row){
        if($password==$row["password"]){

            if($person != $row["identitiy"]){

              echo '<script>
              alert("Select the correct Identity!!");
              window.location.href = "index.php"
              </script>';
              }
             else{
            
            if($row["identitiy"] == "Teacher"){
              
    $sql = "SELECT * FROM `teacher` WHERE username ='$username' or email= '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

              $_SESSION["teacher"]=$row["teacher id"];
                header("Location:teacher.php");
            }
            else{
                $_SESSION["username"]=$username;
                $_SESSION["password"]=$password;
                header("Location:student.php");

        }
    }
}
    else{
        echo '<script>
      alert("Invalid Username or password!!");
      window.location.href = "index.php"
      </script>';

  }
}
else{
    echo '<script>
alert("User does not exist!!");
window.location.href = "index.php"
</script>';

}
}
else{
echo '<script>
alert("Please select one of the options!!");
window.location.href = "index.php"
</script>';
}

}
mysqli_close($conn);
?>
    <div id="form">
        <h1>Login Form</h1>
        <form name="form" action="index.php" method="post">
            <label>Enter Username/Email<span class="required">*</span> :</label>
            <input type="text" id="user" name="user" required><br><br>
            <label>Enter Password<span class="required">*</span> :</label>
            <input type="password" id="pass" name="pass" required><br><br>
            <div class="container">
            <span class="required">*</span>
                <label class="radio">
            <input type="radio" id="per" name="id" value="Teacher">
            <h4>Teacher</h4> </label>
            <label class="radio">
            <input type="radio" id="per" name="id" value="Student">
            <h4>Student</h4> </label>
            </div>
            <input type="submit" id="btn" value="Login" name="submit" ><br>
            <a href="forgotpassword.php">Forgot Password</a>
</div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
