<?php session_start();       // Start the session ?> 
<?php include "header.php" ?>

<?php
if (isset($_POST['cancel'])) {
  session_destroy();            //  destroys session 
  header('location: index.php');
}
?>



<?php

if (isset($_POST['login'])) {
  $username = $_POST['adminid'];
  $password = $_POST['adminpassword'];
  $query = "SELECT * from admin WHERE admin_user = '$username'AND admin_password = '$password'";
  $user = mysqli_query($conn, $query);

  if (!$user) {
    die('query Failed' . mysqli_error($conn));
  }

  while ($row = mysqli_fetch_array($user)) {

    $user_id = $row['admin_user'];
    $user_password = $row['admin_password'];

  }
  if ($user_id == $username &&$user_password == $password) {

    $_SESSION['AdminId'] = $user_id;       // Storing the value in session

  $message = "ok";
  echo "<script type='text/javascript'>alert('$message');</script>";
  header('location: admindashboard.php?user_id=' . $user_id);
  } else {
    header('location: adminlogin.php');
  }
}

?>




<div class="container col-4 border rounded bg-light mt-5" style='--bs-bg-opacity: .5;'>
  <h1 class="text-center">ITC Admin Login</h1>
  <hr>
  <form action="" method="POST">
    <div class="mb-3">
      <label for="adminid" class="form-label">Username</label>
      <input type="adminid" class="form-control" id="AdminId" name="adminid" placeholder="Admin Username" autocomplete="off">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="AdminPassword" name="adminpassword" placeholder="Admin Password" autocomplete="off">
    </div>

    <button type="submit" name='login' class=" btn btn-success mb-3">Login</button>
    <button type="submit" name='cancel' class=" btn btn-danger mb-3" style="float: right;">Cancel</button>

 



  </form>
</div>

<?php include "footer.php" ?>
