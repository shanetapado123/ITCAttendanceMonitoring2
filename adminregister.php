<?php session_start();       // Start the session ?> 
<?php include "header.php" ?>
<?php 
if (isset($_POST['signup'])) {
    date_default_timezone_set('Asia/Manila');
    $timestamp = time();
    $adminid = $_POST['adminuser'];
    $adminpassword = $_POST['adminpassword'];
    $admincreated = date('Y-m-d H:i:s');
    $admincreatedby = $_SESSION['AdminId'];
    $query = "INSERT INTO admin(admin_user,admin_password,admin_created,admin_createdby) VALUES('{$adminid}','{$adminpassword}','{$admincreated}','{$admincreatedby}')";
    $addUser = mysqli_query($conn, $query);
    if (!$addUser) {
     echo "This EmployeeID is already taken!" . mysqli_error($conn);
    } else {
    header('location: admindashboard.php');
  }
}
?>

<?php
if (isset($_POST['cancel'])) {
  //session_destroy();            //  destroys session 
  header('location: admindashboard.php');
}
?>
<h1 class="text-center mt-3">ITC Admin Registration</h1>

<hr>
<div class="container col-4 border rounded bg-light mt-5" style='--bs-bg-opacity: .5;'>
  <h2 class="text-center">Sign Up</h2>
  <small class="text-muted">Pleasse fill in this form to create an admin account!</small>
  <hr>
  <form action="" method="post">
    <div class="mb-3">
      <label for="adminuser" class="form-label">Create Username</label>
      <input type="adminuser" class="form-control" name="adminuser" placeholder="Enter your Username ID" autocomplete="off">
    </div>

    <div class="mb-3">
      <label for="adminpassword" class="form-label">Create Password</label>
      <input type="Password" class="form-control" name="adminpassword" placeholder="Enter your Password" autocomplete="off">
    </div>

    <div class="mb-3">
      <small style="float: right;"> <?php echo $_SESSION['AdminId']; ?> </small>
      <small class="text-muted"style="float: right;">User :  </small>
      <input type="submit" name="signup" value="Sign Up" class="btn btn-primary">
      <input type="submit" name="cancel" value="Cancel" class="btn btn-danger">
    </div>

    </div>
  </form>
</div>


<?php include "footer.php" ?>
