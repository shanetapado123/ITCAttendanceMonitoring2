<?php session_start(); ?>
<?php include "header.php" ?>

<?php
if (isset($_POST['cancel'])) {
  session_destroy();            //  destroys session 
  header('location: index.php');
}
?>



<?php

if (isset($_POST['verify'])) {
  $username = $_POST['empid'];

  $query = "SELECT * from employeeid WHERE emId = '$username'";
  $user = mysqli_query($conn, $query);

  if (!$user) {
    die('query Failed' . mysqli_error($conn));
  }

  while ($row = mysqli_fetch_array($user)) {
    $IDuser = $row['id'];
    $user_id = $row['emId'];
    $user_name = $row['itc_name'];
    $user_address = $row['itc_address'];
    $user_contact = $row['itc_contact'];
    $user_department = $row['itc_department'];
    $user_gender = $row['itc_gender'];
  }
  if ($user_id == $username) {

    $_SESSION['empId'] = $user_id;       // Storing the value in session
    $_SESSION['name'] = $user_name;   // Storing the value in session
    $_SESSION['address'] = $user_address; // Storing the value in session
    $_SESSION['contact'] = $user_contact; // Storing the value in session
    $_SESSION['department'] = $user_department; // Storing the value in session
    $_SESSION['gender'] = $user_gender; // Storing the value in session
    //! Session data can be hijacked. Never store personal data such as Name, Address, Department and Contact Number and other important data in $_SESSION
  
    
    header('location: dashboard.php?user_id=' . $user_id);
  } else {
    header('location: login.php');
  }
}

?>


<div class="container col-4 border rounded bg-light mt-5" style='--bs-bg-opacity: .5;'>
  <h1 class="text-center">ITC Employee Login</h1>
  <hr>
  <form action="" method="POST">
    <div class="mb-3">
      <label for="empid" class="form-label">Employee ID</label>
      <input type="empid" class="form-control" id="EmpId" name="empid" placeholder="Enter your EmployeeID" autocomplete="off">
      <small class="text-muted">If you don't have Employee ID. Please contact Human Resources/Admin or IT Department.</small>
    </div>


    <button type="submit" name='verify' class=" btn btn-success mb-3">Verify</button>
    <button type="submit" name='cancel' class=" btn btn-danger mb-3" style="float: right;">Cancel</button>

 



  </form>
</div>

<?php include "footer.php" ?>




