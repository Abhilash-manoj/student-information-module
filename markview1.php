
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
        <form name="form" action="student.php" method="post">
     <h1>Welcome</h1>
     <?php
session_start();

include "connection.php";
    $studentid = $_SESSION["student id"];

    $sql = "SELECT * FROM `marks` WHERE `student id` = '$studentid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if($row){
        echo "<h5>student ID:</h5>" . $row["student id"] . "<br>";
        echo "<h5>Maths:</h5>" . $row["Maths"] . "<br>";
        echo "<h5>Physics:</h5>" . $row["Physics"] . "<br>";
        echo "<h5>Chemistry:</h5>" . $row["Chemistry"] . "<br>";
        echo "<h5>Computer:</h5>" . $row["Computer"] . "<br>";
        echo "<h5>Total:</h5>" . $row["total"]."<br>";
        echo "<h5>Percentage:</h5>" . $row["percentage"]."%"."<br>";
        }
        else{
            echo '<script>
            alert("Error!!");
            window.location.href = "student.php"
            </script>';
        }
   
mysqli_close($conn);
?>
                  </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>