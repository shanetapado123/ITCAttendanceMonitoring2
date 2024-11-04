<?php session_start();       // Start the session ?> 
<?php include "header.php" ?>

<?php
if (isset($_POST['cancel'])) {
  //session_destroy();            //  destroys session 
  header('location: edit.php');
}
?>

<?php
  $id = $_GET['user_id'];
  $query = "SELECT * from employeeid WHERE emId = '$id'";
  $user = mysqli_query($conn, $query);
  if (!$user) {
    die('query Failed' . mysqli_error($conn));
      }
  while ($row = mysqli_fetch_array($user)) {
  $user_id = $row['emId'];
  $user_name = $row['itc_name'];
  $user_address = $row['itc_address'];
  $user_contact = $row['itc_contact'];
  $user_department = $row['itc_department'];
  $user_gender = $row['itc_gender'];
  }
?>


<?php
if (isset($_POST['delete'])) {
$id = $_GET['user_id'];
$query = "DELETE FROM employeeid WHERE emId = '$id'";
$editUSer = mysqli_query($conn, $query);
header("Location:edit.php");
}
?>

<div class="container col-4 border rounded bg-light mt-5" style='--bs-bg-opacity: .5;'>
  <h1 class="text-center">ITC Employee Registration</h1>
  <hr>
  <form name="edit" action="" method="post">
    <div class="mb-3">
      <label for="employeeid" class="form-label">Employee ID</label>
      <input type="name" class="form-control" name="employeeid" value="<?php echo $user_id; ?>" autocomplete="off" disabled>
    </div>

    <div class="mb-3">
      <label for="name" class="form-label">Employee Name</label>
      <input type="name" class="form-control" name="name" value="<?php echo $user_name; ?>" autocomplete="off" disabled>

    </div>

    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <input type="name" class="form-control" name="address" value="<?php echo $user_address; ?>" autocomplete="off" disabled>
    </div>

    <div class="mb-3">
      <label for="contact" class="form-label">Contact</label>
      <input type="name" class="form-control" name="contact" value="<?php echo $user_contact; ?>" autocomplete="off"  disabled>
    </div>

      <div class="mb-3">
      <label for="department" class="form-label">Department</label>
      <input type="name" class="form-control" name="department" value="<?php echo $user_department; ?>" autocomplete="off" disabled>
    </div>

      <div class="mb-3">
      <label for="gender" class="form-label">Gender</label>
      <input type="name" class="form-control" name="gender" value="<?php echo $user_gender; ?>" autocomplete="off" disabled>
      <small class="text-muted">Your information is safe with us.</small>
    </div>

    <div class="mb-3">
      <input type="submit" name="delete" value="Delete" class="btn btn-warning">
      <input type="submit" name="cancel" value="Cancel" class="btn btn-danger">
    </div>
  </form>
</div>

