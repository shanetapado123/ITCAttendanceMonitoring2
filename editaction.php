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
if (isset($_POST['update'])) {
  $employeeid = $_POST['employeeid'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  $department = $_POST['department'];
  $gender = $_POST['gender'];

	$query = "UPDATE employeeid SET itc_name = '$name', itc_address = '$address', itc_contact = '$contact', itc_department = '$department', itc_gender = '$gender' WHERE emId = '$user_id'";
	$editUSer = mysqli_query($conn, $query);
 	if (!$editUSer) {
    echo "This EmployeeID is already taken!" . mysqli_error($conn);
  } else {
    header('location: edit.php');
  }

		//echo "<p><font color='green'>Data updated successfully!</p>"; 
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
      <input type="name" class="form-control" name="name" value="<?php echo $user_name; ?>" autocomplete="off"  >

    </div>

    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <input type="name" class="form-control" name="address" value="<?php echo $user_address; ?>" autocomplete="off"  >
    </div>

    <div class="mb-3">
      <label for="contact" class="form-label">Contact</label>
      <input type="name" class="form-control" name="contact" value="<?php echo $user_contact; ?>" autocomplete="off"  >
    </div>

      <div class="mb-3">
      <label for="department" class="form-label">Department</label>
      <input type="name" class="form-control" name="department" value="<?php echo $user_department; ?>" autocomplete="off"  >
    </div>

      <div class="mb-3">
      <label for="gender" class="form-label">Gender</label>
      <input type="name" class="form-control" name="gender" value="<?php echo $user_gender; ?>" autocomplete="off"  >
      <small class="text-muted">Your information is safe with us.</small>
    </div>

    <div class="mb-3">
      <input type="submit" name="update" value="Update" class="btn btn-success">
      <input type="submit" name="cancel" value="Cancel" class="btn btn-danger">
    </div>
  </form>
</div>


