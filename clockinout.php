<?php include "header.php" ?>
<?php
if (isset($_POST['clockin'])) {
  $employeeid = $_SESSION['empId'];
  $name = $_SESSION['name'];
  $status="Clock In";
  $clock=time();

  $query = "INSERT INTO clockinout(emId,itc_name,itc_status,itc_clock) VALUES('{$employeeid}','{$name}','{$status}','{$clock}'";

  $addUser = mysqli_query($conn1, $query);
  if (!$addUser) {
    echo "Connected";
    //echo "This EmployeeID is already taken!" . mysqli_error($conn1);
  } else {
    header('location: dashboard.php');
  }
}
?>

<?php include "footer.php" ?>

