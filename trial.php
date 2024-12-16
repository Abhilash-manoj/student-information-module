<?php
include ("connection.php");
session_start();
 if(isset($_POST['submit'])){
    $studentid= $_SESSION["student id"];
    $maths =mysqli_real_escape_string($conn,$_POST['maths']);
    $physics = mysqli_real_escape_string($conn,$_POST['physics']);
    $chemistry = mysqli_real_escape_string($conn,$_POST['chemistry']);
    $computer = mysqli_real_escape_string($conn,$_POST['computer']);
   
    

    $sql = "SELECT * FROM `marks` WHERE  `student id`= $studentid";
    $result = mysqli_query($conn,$sql);
    $count_user = mysqli_num_rows($result);


    if($count_user==1){
            $sql = "UPDATE `marks` SET `Maths`='$maths',`Physics`='$physics',`Chemistry`='$chemistry',`Computer`='$computer',
            `total` = (`Maths` + `Physics` + `Chemistry` + `Computer`),`percentage` = ((`total`/400)*100) WHERE `student id`=$studentid";
            $result = mysqli_query($conn,$sql) ;
            header("Location:view.php");
          
    }
    else{

       echo ' <script> alert("User does not  exists!!");
       window.location.href = "view.php";
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
        <h1>Enter Marks</h1>
        <form name="form" action="trial.php" method="post">
            <label for="maths">Maths <span class="required">*</span>:</label>
            <input type="mark" id="marks" name="maths"><br>
            <label  for="physics">Physics <span class="required">*</span> :</label>
            <input type="mark" id="marks" name="physics"><br>
            <label  for="chemistry">Chemistry <span class="required">*</span> :</label>
            <input type="mark" id="marks" name="chemistry"><br>
            <label  for="computer">Computer <span class="required">*</span> :</label>
            <input type="mark" id="marks" name="computer"><br><br>
            <button onclick="clearfield()" id="clear">Clear</button><br><br>
            <input type="submit" id="btn" value="Submit" name="submit"><br><br>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>