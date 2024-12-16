
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
include "connection.php";
session_start();
$teacher = $_SESSION["teacher"];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST['edit'] as $key => $value) {
        // Assuming $key corresponds to the index of the student id you want to edit
        // You'll need to fetch the correct student id here
        $studentId = $_POST['student_id'][$key];
        $_SESSION["student id"] = $studentId;
        header("Location: trial.php");
        exit;
    }
}


$sql = "SELECT `student id`, `username`, `password` FROM `student` WHERE `teacher id` = $teacher";
$result = mysqli_query($conn, $sql);

echo "<table>
        
            <tr>
                <th>Student ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        
        ";

if ($result->num_rows > 0) {
    $i=0;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["student id"]) . "</td>
                <td>" . htmlspecialchars($row["username"]) . "</td>
                <td>" . htmlspecialchars($row["password"]) . "</td>
                <td>
                    <form action='view.php' method='post' style='display:inline;'>
                    <input type='hidden' name='student_id[$i]' value='" . htmlspecialchars($row["student id"]) . "'>
                    <input type='submit' name='edit[$i]' value='Marks'>
                    </form>
                </td>
              </tr>";
              $i=$i+1;
}
        }
 else {
    echo "<tr><td colspan='4'>No records found</td></tr>";
}

echo "</table>";

mysqli_close($conn);

?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>